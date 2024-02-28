<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticating(Request $request){
        // dd('hay');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){

            if(Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Youracoount isnot active yet, please contact admin');

                
                return redirect('/login');
            } 

            // $request->session()->regenerate();
            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }

            if(Auth::user()->role_id == 2){
                return redirect('profile');
            }
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Yotu login is invalid');
        return redirect('/login');
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);

        return view('register');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}