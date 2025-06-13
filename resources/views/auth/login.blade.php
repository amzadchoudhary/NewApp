@extends('layouts.app')
@extends('layouts.auth')
@section('content')
    <div class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" required autofocus value="{{ old('email') }}">
                    @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label">Password
                        <input name="password" type="password" class="form-control" required autocomplete="current-password">
                    @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                        @if (Route::has('password.request'))
                            <span class="mt-2 form-label-description">
                                <a href="{{ route('password.request') }}">Forgot password?</a>
                            </span>
                        @endif
                    </label>
                </div>

                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" />
                        <span class="form-check-label">Remember me</span>
                    </label>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </div>
            </form>
        </div>
        <div class="text-center text-muted mb-2">
            Don’t have account? <a href="{{ route('register') }}" tabindex="-1">Register</a>
        </div>
    </div>
@endsection
