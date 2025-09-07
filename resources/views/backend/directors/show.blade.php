@extends('backend.layouts.app')

@section('title', 'Director Profile')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Director Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.directors.index') }}">Directors</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <!-- Profile Photo -->
                            @if ($director->photo)
                                <img src="{{ asset($director->photo) }}" alt="Photo" class="rounded-circle mb-3"
                                    width="150" height="150">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Photo" class="rounded-circle mb-3">
                            @endif

                            <!-- Name and Designation -->
                            <h3 class="card-title mb-1">{{ $director->name }}</h3>
                            <p class="text-muted mb-3">{{ $director->designation }} - {{ $director->department }}</p>

                            <hr>

                            <!-- Info -->
                            <div class="row text-left mt-3">
                                <div class="col-sm-6">
                                    <p><strong>Email:</strong> {{ $director->email }}</p>
                                    <p><strong>Mobile:</strong> {{ $director->mobile_number }}</p>
                                    <p><strong>Duration of Employment:</strong> {{ $director->duration_of_employment }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong>Birthday (Certificate):</strong> {{ $director->birthday_certificate }}</p>
                                    <p><strong>Birthday (Original):</strong> {{ $director->birthday_original }}</p>
                                    <p><strong>Permanent Address:</strong> {{ $director->permanent_address }}</p>
                                </div>
                            </div>

                            <hr>

                            <!-- Social Links -->
                            <div class="mt-3">
                                @if ($director->facebook_profile)
                                    <a href="{{ $director->facebook_profile }}" target="_blank" class="btn btn-primary btn-sm mr-2">
                                        <i class="fab fa-facebook"></i> Facebook
                                    </a>
                                @endif
                                @if ($director->linkedin_profile)
                                    <a href="{{ $director->linkedin_profile }}" target="_blank" class="btn btn-info btn-sm">
                                        <i class="fab fa-linkedin"></i> LinkedIn
                                    </a>
                                @endif
                            </div>

                            <hr>

                            <!-- Actions -->
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('admin.directors.edit', $director) }}" class="btn btn-warning mr-2">Edit</a>

                                <form action="{{ route('admin.directors.destroy', $director) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger mr-2">Delete</button>
                                </form>

                                <a href="{{ route('admin.directors.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
