<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;



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



Auth::routes();
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashbord', [App\Http\Controllers\HomeController::class, 'index'])->name('dashbord');
    Route::resource('/post', PostController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/user', UserController::class);
    Route::get('/trashed', [App\Http\Controllers\PostController::class, 'trashed'])->name('trashed');
    Route::get('/trashed/{id}', [App\Http\Controllers\PostController::class, 'restore'])->name('trashed.restore');
   
    Route::resource('/user', UserController::class);
    Route::post('users/{id}/makeAdmin', [UserController::class,'makeAdmin'])->name('makeAdmin');
    Route::post('users/{id}/removeAdmin', [UserController::class,'removeAdmin'])->name('removeAdmin');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home',[App\Http\Controllers\FrontendControler::class,'index'])->name('home');
    Route::get('/showcategory/{category}',[App\Http\Controllers\FrontendControler::class,'showcategory'])->name('showcategory');
    Route::get('/viwopost/{post}',[App\Http\Controllers\FrontendControler::class,'post'])->name('viwopost');
    Route::get('/search',[App\Http\Controllers\FrontendControler::class,'search'])->name('search');
   
});


Route::middleware('auth')->group(function () {
    Route::get('/profile/{profile}/edit',[App\Http\Controllers\ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/profile/{profile}', [App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');
    Route::get('/profile/{profile}', [App\Http\Controllers\ProfileController::class,'show'])->name('profile.show');
});