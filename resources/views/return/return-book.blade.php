@extends('layouts.layout')

@section('title', 'Book Rent')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h2 class="text-4xl font-extrabold dark:text-white mb-6">Book Rent Form</h2>

@if (session('status'))
<div id="alert-3" class="flex items-center p-4 mb-4 {{(session('alert-class'))}}" role="alert">
<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<span class="sr-only">Info</span>
<div class="ms-3 text-sm font-medium">
    {{ session('status') }}
</div>
<button type="button" class="{{(session('close-class'))}} ms-auto -mx-1.5 -my-1.5  dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
    </svg>
</button>
</div>
@endif

<form action="return-book" class="mb-3" method="post">
    @csrf
    <div class="w-1/2 mb-3  ">
        <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <select id="user_id" name="user_id" class="userbox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Choose a option</option>
            @foreach ($user as $item)
            <option value="{{ $item->id }}"> {{ $item->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="w-1/2 mb-3">
        <label for="book_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book</label>
        <select id="book_id" name="book_id" class="userbox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Choose a option</option>
            @foreach ($book as $item)
            <option value="{{ $item->id }}">{{ $item->book_code }} {{ $item->title }}</option>
            @endforeach
        </select>
        </div>
    <div class="w-1/2">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
        font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none 
        dark:focus:ring-blue-800">Submit</button>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.userbox').select2();
});
</script>
@endsection