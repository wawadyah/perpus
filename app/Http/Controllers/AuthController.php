<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your acoount is not active yet, please contact admin');
                
                return redirect('/login');
            } 

            if(Auth::user()->role_id == 1){
                $request->session()->regenerate();
                return redirect('dashboard');
            } else{
                $request->session()->regenerate();
                return redirect('profile');
            }
        }
    }

    public function register(){

        return view('register');

        // dd('hay');
    }

    public function registerProcess(Request $request){
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:5|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Your register is success, please contact admin for active');
        return redirect('/register');
        // return redirect('/login')->with('success', 'Registration successfull! Please login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}