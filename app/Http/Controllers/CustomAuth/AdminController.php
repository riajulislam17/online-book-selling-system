<?php

namespace App\Http\Controllers\CustomAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {

    public function login(Request $request)
    {
        if (!Auth::check()){
            validator($request->all(), [
                'email' => 'required',
                'password' => 'required'
            ]);

            $cr = array('email' => $request->email, 'password' => $request->password, 'permission' => 1);
            if(Auth::attempt($cr, true)){
                return redirect('book');
            }else{
                return view('seller.login')->with('message', 'Login Failed');
            }
        }else{
            return redirect('seller');
        }



    }
}
