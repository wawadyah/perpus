<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PublicController extends Controller
{
    public function index(Request $request){
        $category = Category::all();

       if($request->categories || $request->title){
            $book = Book::where('title', 'like', '%'.$request->title.'%')
                    ->orWhereHas('categories', function($q) use($request){
                        $q->where('categories.id', $request->categories);
                    })
                    ->get();
        } else{
        $book = Book::all();
       }
        return view('publics.public', ['book' => $book, 'categories' => $category]);
    }
}
