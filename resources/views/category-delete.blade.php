@extends('layouts.layout')

@section('title', 'Category')

@section('content')

<h2>Are you sure to delete this?</h2>

<div>
    <a href="/category-destroy/{{$category->slug}}">
        <button type="button" class=" my-6 mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Category</button>
    </a>
</div>

@endsection