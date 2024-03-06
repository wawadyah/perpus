@extends('layouts.layout')

@section('title', 'User')

@section('content')

<h2 class="text-4xl font-extrabold dark:text-white">Are You sure to delete this user</h2>

{{ $user }}

<div class="mt-5 flex justify-end">
    <a href="/user-destroy/{{ $user->slug }}">
        <button type="button" class=" my-6 mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Sure</button>
    </a>
    <a href="user">
        <button type="button" class=" my-6 mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</button>
    </a>
</div>

@endsection