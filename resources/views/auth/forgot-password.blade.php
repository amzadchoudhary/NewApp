@extends('layouts.app')
@extends('layouts.auth')
@section('content')
    <div class="card card-md">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Forgot your password?</h2>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" required>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                </div>
            </form>
            @if (Route::has('login'))
                <span class="mt-2 form-label-description">
                      <a href="{{ route('login') }}">Login?</a>
                    </span>
            @endif
            <div class="text-center text-muted mt-2">
                Don’t have account? <a href="{{ route('register') }}" tabindex="-1">Register</a>
            </div>
        </div>
    </div>
@endsection
