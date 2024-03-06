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
        $bookCategory = Category::where('slug', $slug)->first();
        $book = Book::where('slug', $slug)->first();
        return view('book-edit', ['categories' => $categories, 'book_category' => $bookCategory, 'book' => $book]);
    }

    public function update(Request $request, $slug){
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->slug.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('image', $newName);
            $request['cover'] = $newName;
        }
        $book = Book::where('slug', $slug)->first();
        $book->slug = null;
        if($request->categories){
            $book->categories()->sync($request->categories);
            // dd('ini ada');
        }
        $book->update($request->all());
        // dd($request->all());
        return redirect('books')->with('status', 'Book success updated!');

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
        // dd($request->all());
        return redirect('books')->with('status', 'Book success updated!');

    }

    public function delete($slug){
        $book = Book::where('slug', $slug)->first();
        return view('book-delete', ['book' => $book]);
    }

    public function destroy($slug){
        $category = Book::where('slug', $slug)->first();
        $category->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully!');
    }

    public function restore($slug){
        $book = Book::onlyTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Book Restored Successfully!');
    }

    public function showDeleted(){
        $book = Book::onlyTrashed()->get();
        return view ('book-deleted', ['book' => $book]);
    }


}
