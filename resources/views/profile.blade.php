@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
</div>
@endsection
