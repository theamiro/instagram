@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4 justify-content-center">
        <div class="col-md-8">
            <div class="feed-post mb-4">
                <div class="card shadow border-0">  
                    <div class="card-header bg-white py-3">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="rounded-circle" style="height: 33px; width: 33px; background-image:url('/storage/{{$post->user->profile->profilePicture ?? ""}}'); background-size: cover; background-repeat: no-repeat;">
                            </div>
                            <a href="/{{$post->user->username}}" class="h5 mb-0 text-decoration-none text-dark username">{{ $post->user->username }}</a>
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
        </div>
    </div>
</div>
@endsection
