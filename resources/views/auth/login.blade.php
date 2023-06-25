@extends('auth.layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo bg-dark py-3 mb-0">
            <a href="{{ url('/') }}">
                <img src="{{ url($siteSetting->logo) }}" alt="">
            </a>
        </div>

        <div class="card">
            <div class="card-body login-card-body text-capitalize">
                <h5 class="login-box-msg text-dark">Sign in to start your session</h5>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="Your Adress Email" value="{{ old('email') }}">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Your Password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in"></i> {{ __('Login') }}
                            </button>
                        </div>
                    </div>

                    <div class="links mt-2">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-left d-block p-0" href="{{ route('password.request') }}">
                                I forgot my password
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a class="btn btn-link text-left d-block mt-1 p-0" href="{{ route('register') }}">
                                Register a new membership
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
