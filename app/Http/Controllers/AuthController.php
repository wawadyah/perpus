<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticating(Request $request){
        $credentials = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if(Auth::attempt($credentials)){

            if(Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet, please contact admin');
                return redirect('/login');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'your login is invalid');

        return redirect('/login');
    }
}
