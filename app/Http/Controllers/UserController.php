<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

    $user = User::where('role_id', 2)->where('status', 'active')->get();
    return view ('users.user', ['user' => $user]);
    }

    public function newUser(){
        $user = User::where('role_id', 2)->where('status', 'inactive')->get();
        return view ('users.newUSer', ['user' => $user]);
    }

    public function userDetail($slug){
        $user = User::where('slug', $slug)->first();
        return view ('users.userDetail', ['user' => $user]);
    }

    public function approve($slug){
        $user = User::where('slug', $slug)->first();
        $user['status'] = 'active';
        $user->save();

        return redirect('users.user')->with('status', 'Status approved succesfully!');
    }
    
    public function delete($slug){
        $user = User::where('slug', $slug)->first();
        return view('users.user-delete', ['user' => $user]);
    }

    public function destroy($slug){
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('user')->with('status', 'Book Deleted Successfully!');
    }

    public function restore($slug){
        $user = User::onlyTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('user')->with('status', 'User Restored Successfully!');
    }

    public function showDeleted(){
        $user = User::onlyTrashed()->get();
        return view('users.user-deleted', ['user' => $user]);
    }
}
