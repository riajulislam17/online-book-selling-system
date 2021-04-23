<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
     Seller::create([
          'shop_name' => $request['shop_name'],
          'proprietor_name' => $request['proprietor_name'],
          'email' => $request['email'],
          'mobile' => $request['mobile'],
          'address' => $request['address'],
          'password' => Hash::make($request['password'])
      ]);


/*        $attribute = $request->validate([
           'shop_name' => 'required|min:3',
           'proprietor_name' => 'required|min:5',
           'email' => 'required|unique:sellers',
           'mobile' => 'required|unique:sellers',
           'address' => 'required|min:5',
           'password' => 'required|confirmed'
        ]);*/
        //$data = $request->all();

        /*$this->validate($request, [
            'shop_name' => 'required|min:3',
            'proprietor_name' => 'required|min:5',
            'email' => 'required|unique:sellers',
            'mobile' => 'required|unique:sellers',
            'address' => 'required|min:5',
            'password' => 'required|confirmed'
        ]);*/
        /*Seller::create([
            'shop_name' => $request->input('shop_name'),
            'proprietor_name' => $request->input('proprietor_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('password')),
        ]);*/

      //  Seller::create($attribute);
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
}
