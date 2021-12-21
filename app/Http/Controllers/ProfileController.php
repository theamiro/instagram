<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{
    public function index($username) {
        $user = User::whereUsername($username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
        return view('profiles.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function edit($username) {
        $user = User::whereUsername($username)->firstOrFail();
        $profile = Profile::where('user_id', $user->id)->firstOrFail();

        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user', 'profile'));
    }

    public function update(User $user) {
        $data = request()->validate([
            'displayName'=> 'required',
            'bio'=> 'required',
            'hyperlink'=> ['url', 'required'],
            'profilePicture'=> ['image']
        ]);

        if (request('profilePicture')) {
            $path = request('profilePicture')->store('profile', 'public');
            $manager = new ImageManager();

            $image = $manager->make(public_path("/storage/{$path}"))->fit(400, 400);

            $image->save();
            $imageArray = ['profilePicture' => $path];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/{$user->username}");

    }
}
