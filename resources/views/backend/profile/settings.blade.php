@extends('backend.layouts.app')

@section('title', 'Settings')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Settings</div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Alert Messages --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">

                        <!-- Profile Photo (optional) -->
                        <img src="{{ asset('img/avatar/avatar-1.png') }}" alt="Avatar" class="rounded-circle mb-3" width="150" height="150">

                        <!-- Name and Role -->
                        <h3 class="card-title mb-1">{{ Auth::user()->name }}</h3>
                        <p class="text-muted mb-3">
                            <span class="badge badge-primary">{{ ucfirst(Auth::user()->role) }}</span>
                        </p>

                        <hr>

                        <!-- Change Password Form -->
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-8 text-left">
                                <form action="{{ route('profile.password.update') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label"><strong>Current Password:</strong></label>
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label"><strong>New Password:</strong></label>
                                        <input type="password" name="new_password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label"><strong>Confirm New Password:</strong></label>
                                        <input type="password" name="new_password_confirmation" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-warning w-100">Update Password</button>
                                </form>
                            </div>
                        </div>

                        <hr>

                        <!-- Actions -->
                        <div class="d-flex justify-content-center mt-3 flex-wrap gap-2">
                            <a href="{{ route('executive.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
