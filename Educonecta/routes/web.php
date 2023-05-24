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
Route::get('api/fetch-categories', [App\Http\Controllers\DropDownController::class, 'fetchCategory']);
Route::post('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/dislike', [App\Http\Controllers\PostController::class, 'dislike'])->name('posts.dislike');
Route::get('/posts/{post}/pdf', [App\Http\Controllers\PostController::class, 'pdf'])->name('posts.pdf');
Route::get('/posts/{post}/download', [App\Http\Controllers\PostController::class, 'download'])->name('posts.download');

// Route::prefix('firebase')->group(function () {
//     Route::get('insert', '@insert');
//     Route::get('get_data', 'FirebaseDBController@getData');
//     Route::get('update', 'FirebaseDBController@update');
//     Route::get('delete', 'FirebaseDBController@delete');
//     Route::get('delete_all', 'FirebaseDBController@deleteAll');
// });

Route::get('/firebase/insert', [App\Http\Controllers\FirebaseDBController::class, 'insert']);
Route::get('/firebase/get_data', [App\Http\Controllers\FirebaseDBController::class, 'getData']);
Route::get('/firebase/update', [App\Http\Controllers\FirebaseDBController::class, 'update']);
Route::get('/firebase/delete', [App\Http\Controllers\FirebaseDBController::class, 'delete']);
Route::get('/firebase/delete_all', [App\Http\Controllers\FirebaseDBController::class, 'deleteAll']);
