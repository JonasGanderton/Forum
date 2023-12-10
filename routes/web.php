<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/home', [PostController::class, 'index'])->name('posts.index');

Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/user/{userAccount}', [UserController::class, 'show'])->name('users.show');
