<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/post', PostController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/user', UserController::class)->middleware('admin');
    Route::get('/trashed', [App\Http\Controllers\PostController::class, 'trashed'])->name('trashed');
    Route::get('/trashed/{id}', [App\Http\Controllers\PostController::class, 'restore'])->name('trashed.restore');
    Route::get('/user/{id}/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
});
