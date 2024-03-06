<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index(){
        $book = Book::all();
        return view('publics.public', ['book' => $book]);
    }
}
