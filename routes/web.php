<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RentBookController;

Route::get('/', [PublicController::class, 'index'])->middleware(['only_guest']);;


Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
    Route::post('login', [AuthController::class, 'authenticating']);
});

Route::get('logout', [AuthController::class, 'logout']);

Route::get('dashboard',  [DashboardController::class,'index'])->middleware(['auth','only_admin']);
Route::get('profile',  [UserController::class,'index'])->middleware(['auth']);

// ONLY ADMIN
Route::middleware('only_admin')->group(function () {

Route::get('books', [BookController::class, 'index']);
Route::get('book-add', [BookController::class, 'add']);
Route::post('book-add', [BookController::class, 'submit']);
Route::get('book-edit/{slug}', [BookController::class, 'edit']);
Route::post('book-edit/{slug}', [BookController::class, 'update']);
Route::get('book-delete/{slug}', [BookController::class, 'delete']);
Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);
Route::get('book-restore/{slug}', [BookController::class, 'restore']);
Route::get('book-deleted', [BookController::class, 'showDeleted']);
Route::get('book-restore/{slug}', [BookController::class, 'restore']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('add-category', [CategoryController::class, 'add']);
Route::post('add-category', [CategoryController::class, 'addProcess']);
Route::get('edit-category/{slug}', [CategoryController::class, 'edit']);
Route::put('edit-category/{slug}', [CategoryController::class, 'update']);
Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
Route::get('category-deleted', [CategoryController::class, 'showDeleted']);
Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

Route::get('user', [UserController::class, 'index']);
Route::get('user/new-user', [UserController::class, 'newUser']);
Route::get('user-detail/{slug}', [UserController::class, 'userDetail']);
Route::get('user-approve/{slug}', [UserController::class, 'approve']);
Route::get('user-delete/{slug}', [UserController::class, 'delete']);
Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
Route::get('user/user-deleted', [UserController::class, 'showDeleted']);
Route::get('user-restore/{slug}', [UserController::class, 'restore']);

Route::get('book-rent', [RentBookController::class, 'index']);
});