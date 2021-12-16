<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function create() {
        return view('posts.create');
    }

    public function store() {
        $data = request()->validate([
            'caption'=> 'required',
            'media'=> ['required', 'image'],
        ]);
        $path = request('media')->store('uploads', 'public');
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'media' => $path,
        ]);

        return redirect('/');
    }
}
