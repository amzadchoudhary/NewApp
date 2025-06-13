@extends('layouts.tabler')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Display all errors at once --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row row-deck">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body border-top">
                            <form action="{{ route('profile.update') }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('POST') {{-- Add this for update route --}}

                                {{-- Full Name --}}
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name', $user->name) }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email (readonly) --}}
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input name="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone', $user->phone) }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Date of Birth --}}
                                <div class="mb-3">
                                    <label class="form-label">Date of Birth</label>
                                    <input name="date_of_birth" type="date"
                                           class="form-control @error('date_of_birth') is-invalid @enderror"
                                           value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           value="{{ old('address', $user->address) }}">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- City --}}
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input name="city" type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           value="{{ old('city', $user->city) }}">
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Country --}}
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <input name="country" type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           value="{{ old('country', $user->country) }}">
                                    @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Occupation --}}
                                <div class="mb-3">
                                    <label class="form-label">Occupation</label>
                                    <input name="occupation" type="text"
                                           class="form-control @error('occupation') is-invalid @enderror"
                                           value="{{ old('occupation', $user->occupation) }}">
                                    @error('occupation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input name="status" type="text"
                                           class="form-control @error('status') is-invalid @enderror"
                                           value="{{ old('status', $user->status) }}">
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="mb-3">
                                    <label class="form-label">New Password</label>
                                    <input name="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label class="form-label">Confirm New Password</label>
                                    <input name="password_confirmation" type="password" class="form-control">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
