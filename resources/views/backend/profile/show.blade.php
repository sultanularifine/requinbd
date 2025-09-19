@extends('backend.layouts.app')

@section('title', 'Profile')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>My Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                       <!-- Profile Photo -->
<img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('img/avatar/avatar-1.png') }}"
     alt="Avatar" class="rounded-circle mb-3" width="150" height="150">

                        <!-- Name and Role -->
                        <h3 class="card-title mb-1">{{ Auth::user()->name }}</h3>
                        <p class="text-muted mb-3">
                            <span class="badge badge-primary">{{ ucfirst(Auth::user()->role) }}</span>
                        </p>

                        <hr>

                        <!-- Info -->
                        <div class="row text-left mt-3">
                            <div class="col-sm-6">
                                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                <p><strong>Joined At:</strong> {{ Auth::user()->created_at->format('d F, Y') }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p><strong>Last Updated:</strong> {{ Auth::user()->updated_at->format('d F, Y') }}</p>
                                <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role) }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Actions -->
                        <div class="d-flex justify-content-center mt-3 flex-wrap gap-2">
                            <a href="{{ route('profile.settings') }}" class="btn btn-warning">Change Password</a>
                            <a href="{{ route('executive.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
