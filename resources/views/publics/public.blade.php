@extends('layouts.layout')

@section('title', 'Book')

@section('content')


<div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-3 mb-3 mt-5">
    
@foreach ($book as $item)
    <div class="h-100 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <img class="rounded-t-lg" src="{{ $item->cover == NULL?  asset('storage/image/-1709759429.png'): asset('storage/image/'.$item->cover)  }}" height="500px" />
        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->title }}</h5>
            </a>
            <p class="text-right {{ $item->status != 'in stock'? 'text-red-600': 'text-blue-600' }} font-bold">{{$item->status}}</p>
        </div>
    </div>
@endforeach

</div>



@endsection