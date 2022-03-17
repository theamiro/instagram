<?php

use Illuminate\Support\Facades\Auth;
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

Route::post('/follow/{username}', '\App\Http\Controllers\FollowsController@store');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/accounts/edit', 'App\Http\Controllers\EditProfileController@index')->name('account');

Route::get('/{username}', 'App\Http\Controllers\ProfileController@index')->name('profile.show');
Route::get('/{username}/edit', 'App\Http\Controllers\ProfileController@edit')->name('editProfile');

Route::get('/posts/create', 'App\Http\Controllers\PostController@create')->name('createPost');
Route::get('/posts/{post}', 'App\Http\Controllers\PostController@show')->name('showPost');

Route::post('/', 'App\Http\Controllers\PostController@store')->name('storePost');
Route::patch('/', 'App\Http\Controllers\ProfileController@update')->name('updateProfile');