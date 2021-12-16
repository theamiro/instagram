@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-4 justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 rounded-xl shadow">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h4 class="my-2">Create a new post</h4>
                </div>
                <div class="card-body">                
                    <form method="POST" action="{{ route('storePost') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="caption">{{ __('Caption') }}</label>
                            <textarea id="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus></textarea>
                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="media">{{ __('Media') }}</label>
                            <input id="media" type="file" class="form-control @error('media') is-invalid @enderror" name="media" value="{{ old('media') }}" required autocomplete="media">

                            @error('media')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-grid pb-3" >
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Add new post') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
