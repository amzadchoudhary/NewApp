@extends('layouts.app')

@extends('layouts.auth')
@section('content')
    <div class="card card-md">
        <div class="card-body">
            @if (Route::has('login'))
                <span class="card-title text-center mt-2 mb-2">
                      <a href="{{ route('login') }}">Login?</a>
                    </span>
            @endif
            <h2 class="card-title text-center mb-0">Create an account</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" required>
                </div>

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>
                @if (Route::has('password.request'))
                    <span class="mt-4 form-label-description">
                      <a href="{{ route('password.request') }}">Forgot password?</a>
                    </span>
                @endif
            </form>
        </div>
    </div>
@endsection
