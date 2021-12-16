<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/accounts/edit', 'App\Http\Controllers\EditProfileController@index')->name('account');

Route::get('/{username}', 'App\Http\Controllers\ProfileController@index')->name('profile.show');

Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('createPost');
Route::post('/', 'App\Http\Controllers\PostController@store')->name('storePost');
