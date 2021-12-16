<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

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
        $manager = new ImageManager();

        $image = $manager->make(public_path("/storage/{$path}"))->fit(1200, 1200);

        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'media' => $path,
        ]);

        return redirect('/');
    }
}
