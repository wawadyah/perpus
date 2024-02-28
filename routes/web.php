<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/log', function () {
    return view('welcome');
})->middleware('auth');


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::middleware('only_guest')->group(function () {

    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('dashboard',  [DashboardController::class,'index'])->middleware(['auth','only_admin']);
Route::get('profile',  [UserController::class,'index'])->middleware(['auth', 'only_client']);

Route::get('books', [BookController::class, 'index']);