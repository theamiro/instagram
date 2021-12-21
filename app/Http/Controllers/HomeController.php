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
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->orWhereIn('user_id', [auth()->user()->id])->with('user')->latest()->get();
        $stories = Story::whereIn('user_id', $users)->with('user')->latest()->get();
        // dd($posts);
        return view('home', [
            'posts'=> $posts,
            'stories' => $stories
        ]);
    }
}
