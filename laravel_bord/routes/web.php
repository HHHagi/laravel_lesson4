<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', 'App\Http\Controllers\PostController', ['only' => ['index', 'create', 'store', 'edit', 'destroy', 'update']]);

Route::get('/post/{id}/like', 'App\Http\Controllers\PostController@like')->name('post.like');
Route::get('/post/{id}/unlike', 'App\Http\Controllers\PostController@unlike')->name('post.unlike');