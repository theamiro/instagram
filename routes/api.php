<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Users Endpoints
Route::get('users', function () {
    return User::all();
});
Route::get('users/{username}', function ($username) {
    return User::whereUsername($username)->firstOrFail();
});
Route::get('/posts', function () {
    return Post::with('user')->get();
});