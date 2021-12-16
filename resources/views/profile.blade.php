@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4">
        <div class="col-md-4 d-flex justify-content-center">
            <img src="images/134275659_215207200087206_4868482135702417265_n.jpeg" width="200" height="200" class="rounded-circle">
        </div>
        <div class="col-md-8">
            <h2>{{ $user->username }}</h2>
            <div class="d-flex gap-4 statistics fs-5 mb-3">
                <div class="">
                    <strong >34</strong> posts
                </div>
                <div class="">
                    <strong>465</strong> followers
                </div>
                <div class="">
                    <strong>289</strong> following
                </div>
            </div>
            <p class="fw-bold mb-0 fs-5">{{ $user->profile->displayName ?? "display Name"}}</p>
            <p class="mb-0 me-5">{{ $user->profile->bio ?? "Bio"}}</p>
            <a class="fw-bold text-decoration-none" href="{{$user->profile->hyperlink ?? 'hyperlink'}}">{{$user->profile->hyperlink ?? "hyperlink"}}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs justify-content-center border-0 border-top" id="nav-tab" role="tablist">
                    <button class="nav-link text-uppercase border-0 active" id="nav-posts-tab" data-bs-toggle="tab" data-bs-target="#nav-posts" type="button" role="tab" aria-controls="nav-posts" aria-selected="true">Posts</button>
                    <button class="nav-link text-uppercase border-0" id="nav-reels-tab" data-bs-toggle="tab" data-bs-target="#nav-reels" type="button" role="tab" aria-controls="nav-reels" aria-selected="false">Reels</button>
                    <button class="nav-link text-uppercase border-0" id="nav-tags-tab" data-bs-toggle="tab" data-bs-target="#nav-tags" type="button" role="tab" aria-controls="nav-tags" aria-selected="false">Tags</button>
                </div>
            </nav>
            <div class="tab-content mt-2" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-posts" role="tabpanel" aria-labelledby="nav-posts-tab">
                    <div class="row">
                        <div class="col-md-4 overflow-hidden">
                            <img src="images/134275659_215207200087206_4868482135702417265_n.jpeg" width="100%">
                        </div>
                        <div class="col-md-4">
                            <img src="images/134275659_215207200087206_4868482135702417265_n.jpeg" width="100%">
                        </div>
                        <div class="col-md-4">
                            <img src="images/134275659_215207200087206_4868482135702417265_n.jpeg" width="100%">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-reels" role="tabpanel" aria-labelledby="nav-reels-tab">...</div>
                <div class="tab-pane fade" id="nav-tags" role="tabpanel" aria-labelledby="nav-tags-tab">...</div>
            </div>
        </div>
    </div>
</div>
@endsection
