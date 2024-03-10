@extends('layouts.layout')

@section('title', 'User')

@section('content')

<h2 class="text-4xl font-extrabold dark:text-white mb-6">Your Rent Log</h2>

<div class="mt-5">
    <x-rent-log-table :rentlog='$rentlog'/>
</div>

@endsection