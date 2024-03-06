@extends('layouts.layout')

@section('title', 'User')

@section('content')


<div class="mt-5 flex justify-end">
    <a href="/user">
        <button type="button" class=" my-6 mb-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 
        dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</button>
    </a>
</div>

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Nama
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$loop->iteration}}
            </td>
            <td class="px-6 py-4">
                {{$item->username}}
            </td>
            <td class="px-6 py-4">
                <a href="/user-restore/{{$item->slug}}">restore</a> |
            </td>
            
        </tr>
        @endforeach
    
    </tbody>
</table>

@endsection