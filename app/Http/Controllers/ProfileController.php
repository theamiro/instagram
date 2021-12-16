<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username) {
        $user = User::where('username', $username)->first();
        $posts = Post::where('user_id', $user->id)->get();
    
        return view('profile', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
