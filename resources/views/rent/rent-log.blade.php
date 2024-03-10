@extends('layouts.layout')

@section('title', 'Book Rent')

@section('content')

<h2 class="text-4xl font-extrabold dark:text-white mb-6">Rent Log List</h2>
<x-rent-log-table :rentlog='$rentlog'/>

@endsection