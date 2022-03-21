<?php

namespace App\Http\Controllers;

use App\Events\NewFollower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function store($username) {
        $user = User::whereUsername($username)->first();
        $activeUser = auth()->user();
        if($user != $activeUser) {
            event(new NewFollower($activeUser->username));
            return auth()->user()->following()->toggle($user->profile);
        }
    }
}
