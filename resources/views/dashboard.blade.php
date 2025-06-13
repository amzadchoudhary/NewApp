@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck">
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('users') }}" class="text-decoration-none text-reset">
                        <div class="card position-relative">
                            <div class="card-body">
                                <h3 class="card-title">Total Users</h3>
                                <div class="d-flex align-items-center">
                                    {{-- Use the variable passed from the controller --}}
                                    <span class="h1 mb-0">{{ number_format($totalUsers) }}</span>
                                    {{-- Conditionally apply text-success or text-danger based on percentage change --}}
                                    <span class="ms-2 @if($totalUsersPercentageChange >= 0) text-success @else text-danger @endif">
                                        {{ $totalUsersPercentageChange > 0 ? '+' : '' }}{{ $totalUsersPercentageChange }}%
                                    </span>
                                </div>
                                <div class="text-muted">
                                    {{ number_format($totalUsersChange) }} users increased from last month
                                </div>
                                <span class="stretched-link"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Active Users</h3>
                            <div class="d-flex align-items-center">
                                {{-- Use the variable passed from the controller --}}
                                <span class="h1 mb-0">{{ number_format($activeUsers) }}</span>
                                {{-- Conditionally apply text-success or text-danger based on percentage change --}}
                                <span class="ms-2 @if($activeUsersPercentageChange >= 0) text-success @else text-danger @endif">
                                    {{ $activeUsersPercentageChange > 0 ? '+' : '' }}{{ $activeUsersPercentageChange }}%
                                </span>
                            </div>
                            <div class="text-muted">Last 7 days</div>
                        </div>
                    </div>
                </div>
            </div>
            @if($birthdayUsers->count())
                <div style="position: fixed; bottom: 2.5rem; right: 1rem; z-index: 1055; max-height: 400px; overflow-y: auto; width: 350px;">
                    @foreach($birthdayUsers as $user)
                        <div class="toast show mb-2" role="alert" data-bs-autohide="false">
                            <div class="toast-header">
                                <strong class="me-auto">🎉 Happy Birthday!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Happy Birthday, <strong>{{ $user->name }}</strong>! Wishing you a fantastic year ahead!
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
