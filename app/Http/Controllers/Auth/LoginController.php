<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:seller')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function showSellerLoginForm()
    {
        return view('seller.login', ['url' => 'login']);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sellerLogin(Request $request)
    {
        $attributes = $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('seller')->attempt($attributes)) {

            return redirect()->intended('/ook');
        }
        return back()->withInput($request->only('email'))->with('message', 'Login Failed');

    }

    public function showCustomerLoginForm()
    {
        return view('customer.login');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function customerLogin(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'mobile'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['mobile' => $request->input('mobile'), 'password' => $request->input('password')], $request->get('remember'))) {

            return redirect()->intended('/customer');
        }
        return back()->withInput($request->only('mobile', 'remember'));
    }


}
