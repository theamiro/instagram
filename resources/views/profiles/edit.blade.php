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
                    <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")

                        <div class="form-group mb-3">
                            <label for="profilePicture">{{ __('Profile Picture') }}</label>
                            <input id="profilePicture" type="file" class="form-control @error('profilePicture') is-invalid @enderror" name="profilePicture" value="{{ old('profilePicture') ?? $profile->profilePicture ?? ""}}" autocomplete="profilePicture">

                            @error('profilePicture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="displayName">{{ __('Display Name') }}</label>
                            <input id="displayName" type="text" class="form-control @error('displayName') is-invalid @enderror" name="displayName" value="{{ old('displayName') ?? $profile->displayName ?? ""}}" required autocomplete="displayName">

                            @error('displayName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="bio">{{ __('Bio') }}</label>
                            <textarea id="bio" rows="8" class="form-control @error('bio') is-invalid @enderror" name="bio" required autocomplete="bio">{{ old('bio') ?? $profile->bio ?? ""}}</textarea>
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="hyperlink">{{ __('Website') }}</label>
                            <input id="hyperlink" type="text" class="form-control @error('hyperlink') is-invalid @enderror" name="hyperlink" value="{{ old('hyperlink') ?? $profile->hyperlink ?? "" }}" required autocomplete="hyperlink">

                            @error('hyperlink')
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
