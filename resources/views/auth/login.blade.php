@extends('auth.layouts.app')

@section('content')
<div class="container">
    <div class="row" id="pwd-container">
        <div class="col-md-4"></div>
        
        <div class="col-md-4">
            <section class="mt-5 shadow-lg p-3 bg-white">

                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/Logo.png') }}" class="mb-5" alt="Logo" width="100" /> <span class="fs-1 mt-3 fw-bold">WheelsRent</span>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">{{ __('Email Address') }}</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="password">{{ __('Password') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <button type="submit" class="d-flex btn btn-dark mt-3">
                        {{ __('Login') }}
                    </button>
                    
                    <div class="text-center mt-3">
                        <a href="/register">Create account</a>
                        or
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>  
                </form>
                
            </section>  
        </div>
            
        <div class="col-md-4"></div>
    </div>    
</div>
@endsection
