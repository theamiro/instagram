@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
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
                        <div class="card-body" style="height: 800px; width: 100%; background-image:url('{{ $post->media }}'); background-size: cover; background-repeat: no-repeat;">
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
    </div>
</div>
@endsection
