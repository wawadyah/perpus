@extends('layouts.layout')

@section('title', 'Book Rent')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<h2 class="text-4xl font-extrabold dark:text-white mb-6">Book Rent Form</h2>


<form action="" class="mb-3">
    <div class="w-1/2 mb-3  ">
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <select id="username" name="username" class="userbox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Choose a option</option>
            @foreach ($user as $item)
            <option value="{{ $item->id }}">{{ $item->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="w-1/2 mb-3">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book</label>
        <select id="title" name="title" class="userbox bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Choose a option</option>
            @foreach ($book as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
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