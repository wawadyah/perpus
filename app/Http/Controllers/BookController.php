<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view ('books', ['book' => $book]);
    }

    public function add(){
        return view ('book-add');
    }

    public function submit(Request $request){
        $validated = $request->validate([
            'title' => 'unique:books|required',
        ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $book = Book::create($request->all());
        $request['cover'] = $newName;
        // return redirect('categories')->with('status', 'Category success updated!');
        return ($request['cover']);

        $book = Book::create($request->all());
        return redirect('books')->with('status', 'Book success updated!');
    }
}
