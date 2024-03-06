@extends('layouts.layout')

@section('title', 'Category')

@section('content')

<h2 class="mb-3">Are you sure to delete this?</h2>

<div>
    <a href="/book-destroy/{{$book->slug}}">
        <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 
        focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 
        dark:focus:ring-red-900">Sure</button>
    </a>
    <a href="/books">
        <button type="button" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
        focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
        dark:focus:ring-blue-900">Back</button>
    </a>
</div>

@endsection