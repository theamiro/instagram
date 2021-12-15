@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row min-vh-100 align-items-center justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="card border-0 shadow px-4 py-5">
                <div class="card-body">
                    <h2 class="fw-medium">{{ __('Login') }}</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>

                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mb-4">
                                {{ __('Login') }}
                            </button>
                            
                            @if (Route::has('password.request'))
                                <span class="text-center">
                                    Don't have an account? <a class="text-decoration-none" href="{{ route('register') }}">
                                        {{ __('Create an account') }}
                                    </a>
                                </span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center my-3">
                @if (Route::has('password.request'))
                    <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
