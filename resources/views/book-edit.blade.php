@extends('layouts.layout')

@section('title', 'Book Edit')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<form class="max-w-sm" method="post"  enctype="multipart/form-data" action="/book-edit/{{$book->slug}}">
    @csrf
    <div class="mb-5">
      <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Code</label>
      <input type="text" id="code" name="book_code" value="{{$book->book_code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="category" required />
    </div>
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category name</label>
        <input type="text" id="title" name="title" value="{{$book->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="category" required />
    </div>
    <div class="mb-5">
        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Cover</label>
        <input  id="image" name="image" type="file" class="lock w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="cover" name="cover" type="file">
    </div>
    <div class="mb-3">
        <label for="currentImage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Image</label>
        @if ($book->cover!='')
            <img src="{{ asset('storage/image/'.$book->cover) }}" alt="cover" width="200px">           
        @else
            <img src="{{ asset('storage/image/tHfDId7S7ViCqWxt43RT8XRBC91lCDWlJwGsZM82.png') }}" alt="cover" width="200px">
        @endif
    </div>
    <div class="mb-5">
      <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Book Category</label>
      <select id="categories" name="categories[]" multiple class="select-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
  </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
   $(document).ready(function() {
    $('.select-multiple').select2();
  });
 </script>
  @endsection