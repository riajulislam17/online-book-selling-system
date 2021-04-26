<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Seller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:seller');
        $this->middleware('guest:customer');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {
        return User::create([
            'first_name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createSeller(Request $request): RedirectResponse
    {
        $validationRules = array(
            'shop_name' => 'required|min:3',
            'proprietor_name' => 'required|min:5',
            'email' => 'required|unique:sellers',
            'mobile' => 'required|unique:sellers',
            'address' => 'required|min:5',
            'shop_image' => 'nullable|max:2048|mimes:jpg,jpeg,png',
            'password' => 'required|confirmed'
        );
        $attributes = array(
            'shop_name' => $request->input('shop_name'),
            'proprietor_name' => $request->input('proprietor_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'shop_image' => $request->input('shop_image'),
            'password' => Hash::make($request->input('password')),
        );

        $validator = Validator::make($request->all(),$validationRules);

        if (!$validator->fails()){
            if ($request->hasFile('shop_image')){
                $imageName = 'shop_image_'. time() . '.'. $request->shop_image->extension();
                $request->shop_image->move(public_path('images'), $imageName);
                $attributes['shop_image'] = 'images/'.$imageName;
            }else{
                $attributes['shop_image'] = '';
            }
            Seller::create($attributes);
        }

        return redirect()->intended('auth/seller/login');
    }

    public function showSellerRegisterForm()
    {
        return view('seller.register', ['url' => 'seller']);
    }
    public function showCustomerRegisterForm()
    {
        return view('customer.register', ['url' => 'customer']);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function customerRegister(Request $request)
    {
        $attribute = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|unique:customers',
            'email' => 'required|unique:customers',
            'address' => 'required',
            'password' => 'required|confirmed'
        ]);
       if($attribute->validate()){
           Customer::create([
               'first_name' => $request->input('first_name'),
               'last_name' => $request->input('last_name'),
               'mobile' => $request->input('mobile'),
               'email' => $request->input('email'),
               'address' => $request->input('address'),
               'password' => Hash::make($request->input('password'))
           ]);
           return redirect()->intended('auth/customer/login');
       }else{
           //return back()->withInput($request->only(['first_name', 'last_name', 'mobile', 'address']))->with('');
           return view('customer.register');
       }
    }
}
