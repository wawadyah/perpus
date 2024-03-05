<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;

class BookController extends Controller
{
    public function index(){
        $book = Book::all();
        return view ('books', ['book' => $book]);
    }

    public function add(){
        $categories = Category::all();
        return view ('book-add', ['categories' => $categories]);
    }

    public function edit($slug){
        $categories = Category::all();
        $book = Category::where('slug', $slug)->first();
        return view('book-edit', ['categories' => $categories, 'book' => $book]);
    }

    public function submit(Request $request){
        $validated = $request->validate([
            'title' => 'unique:books|required',
        ]);

        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('image', $newName);
        }

        $requestData = $request->all();
        $requestData['cover'] = $newName;

        $book = Book::create($requestData);
        $book->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book success updated!');

    }
}
