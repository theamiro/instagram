<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Story;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        // $stories = Story::all();
        // dd($posts);
        return view('home', [
            'posts'=> $posts,
            // 'stories' => $stories
        ]);
    }
}
