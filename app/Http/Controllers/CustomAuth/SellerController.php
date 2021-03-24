<?php

namespace App\Http\Controllers\CustomAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller {

    public function login(Request $request)
    {
        if (!Auth::check()){
            validator($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            $email = $request['email'];
            $cr = array('email' => $request->email, 'password' => $request->password);
            if(Auth::attempt($cr, true)){
                return redirect('book');
            }else{
                dd('auth failed');
                return view('seller.login')->with('message', 'Login Failed');
            }
        }else{
            return redirect('book');
        }



    }
}
