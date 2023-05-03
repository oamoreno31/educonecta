<?php

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

Auth::routes();

Route::get('/', function () {
    $logged = Route::redirect('/', '/posts');
    $notlogged = Route::redirect('/', '/login');

    if (Auth::user() == ''){
        return view('auth/login'); 
    }else{
        return view('welcome');
    }
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/posts', App\Http\Controllers\PostController::class);
Route::resource('/categories', App\Http\Controllers\CategoryController::class);
Route::resource('/comments', App\Http\Controllers\CommentController::class);
Route::resource('/permissions', App\Http\Controllers\PermissionController::class);
Route::resource('/roles', App\Http\Controllers\RoleController::class);
Route::resource('/tags', App\Http\Controllers\TagController::class);