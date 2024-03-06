<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view ('category', ['categories' => $categories]);
    }

    public function add(){
        return view('addCategory');
    }

    public function addProcess(Request $request){
        $validated = $request->validate([
            'name' => 'unique:categories|required',
        ]);

        $category = Category::create($request->all());
       return redirect('categories')->with('status', 'Category success updated!');

    }

    public function edit( $slug){
    $category = Category::where('slug', $slug)->first();

    return view('category-edit', ['category' => $category]);

    // dd('ay');
    }

    public function update(Request $request, $slug){
        $validated = $request->validate([
            'name' => 'unique:categories|required',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Successfully!');
    }

    public function delete($slug){
        $category = Category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);
    }

    public function destroy($slug){
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully!');
    }

    public function showDeleted(){
        $category = Category::onlyTrashed()->get();
        return view ('category-deleted', ['category' => $category]);
    }

    public function restore($slug){
        $category = Category::onlyTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Category Restored Successfully!');
    }
}
