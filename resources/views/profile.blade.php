@extends('layouts.tabler')

@section('title', 'Your Profile')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <h3>{{ Auth::user()->name }}</h3>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Registered on:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
