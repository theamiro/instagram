@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div @class([
            'col-md-8' => Auth::user(),
            'col-md-12' => !Auth::user()
        ])>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card shadow border-0 mb-4">                
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3">
                        @forelse ($stories as $story)
                            <div class="story" style="border: 2px solid grey; border-radius: 50%; padding: 2px;">
                                <div class="rounded-circle" style="height: 66px; width: 66px; background-image:url('images/134275659_215207200087206_4868482135702417265_n.jpeg'); background-size: cover; background-repeat: no-repeat;">
                                </div>
                            </div>
                        @empty
                            <p>No stories posted yet. Check again soon.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            @forelse ($posts as $post)
                <div class="feed-post mb-4">
                    <div class="card shadow border-0">  
                        <div class="card-header bg-white py-3">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="rounded-circle" style="height: 33px; width: 33px; background-image:url('images/134275659_215207200087206_4868482135702417265_n.jpeg'); background-size: cover; background-repeat: no-repeat;">
                                </div>
                                <h5 class="mb-0 username">{{ $post->user->username }}</h5>
                            </div>
                        </div>              
                        <div class="card-body" style="height: 800px; width: 100%; background-image:url('/storage/{{ $post->media }}'); background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <div class="card-footer">
                            <div class="interaction-buttons d-flex gap-2 my-2">
                                <button>Like</button>
                                <button>Comment</button>
                                <button>Share</button>
                            </div>
                            <p class="mb-0"><strong>{{ $post->user->username }}</strong> {{ $post->caption }}</p>
                            <p class="mb-0 text-uppercase fs-6 "><small>{{$post->created_at}}</small></p>
                        </div>
                    </div>
                </div>
            @empty 
                <div class="card shadow border-0">  
                    <div class="card-body text-center">
                        <p>No posts found at the moment, check again soon!</p>
                    </div>
                </div>
            @endforelse
        </div>
        @auth
        <div class="col-md-4">
            <div class="d-flex justfy-content-between align-items-center mb-4 gap-3">
                <img class="rounded-circle" src="{{asset('/images/134275659_215207200087206_4868482135702417265_n.jpeg')}}" height="60" width="60">
                <div class="d-flex flex-column">
                    <h5 class="mb-0">{{Auth::user()->username}}</h5>
                    <p class="mb-0">{{Auth::user()->name}}</p>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                <h6 class="mb-0 text-grey fw-bold">Suggestions for you</h6>
                <a class="btn btn-link btn-sm fw-bold text-dark text-decoration-none" href="#">See all</a>
            </div>
            <div class="d-flex flex-row align-items-center gap-3">
                <img class="rounded-circle" src="{{asset('/images/134275659_215207200087206_4868482135702417265_n.jpeg')}}" height="36" width="36">
                <div class="d-flex flex-column">
                    <h6 class="mb-0 fw-bold lh-sm">LogosChristianSchool</h6>
                    <p class="mb-0 lh-sm text-muted">
                        <small>
                        Followed by theamiro, honester + 1 more
                        </small>
                    </p>
                </div>
                <a class="btn btn-link btn-sm fw-bold text-decoration-none ms-auto" href="#">Follow</a>
            </div>
        </div>
        @endauth
    </div>
</div>
@endsection
