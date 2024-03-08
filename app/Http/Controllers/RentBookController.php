<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentBookController extends Controller
{
    public function index(){
        $user = User::where('role_id', '!=', '1')->get();
        $books = Book::all();
        return view('rent.rent-book', ['user' => $user, 'book' => $books]);
    }
}
