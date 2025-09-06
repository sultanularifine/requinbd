@extends('backend.layouts.app')

@section('title', 'Executive Member Profile')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Executive Member Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.executive_members.index') }}">Executive Members</a>
                    </div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                            <!-- Profile Photo -->
                            @if ($member->photo)
                                <img src="{{ asset($member->photo) }}" alt="Photo" class="rounded-circle mb-3"
                                    width="150" height="150">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Photo" class="rounded-circle mb-3">
                            @endif

                            <!-- Name and Department -->
                            <h3 class="card-title mb-1">{{ $member->name }}</h3>
                            <p class="text-muted mb-3">{{ $member->department ? $member->department->name : '-' }}</p>

                            <hr>

                            <!-- Info -->
                            <div class="row text-left mt-3">
                                <div class="col-sm-6">
                                    <p><strong>Email:</strong> {{ $member->email }}</p>
                                    <p><strong>Phone:</strong> {{ $member->phone }}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong>Designation:</strong> {{ $member->designation }}</p>
                                    <p><strong>Joining Date:</strong> {{ date('d F, Y', strtotime($member->joining_date)) }}
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <!-- Actions -->
                            <div class="d-flex justify-content-center mt-3">
                                <a href="{{ route('admin.executive_members.edit', $member) }}"
                                    class="btn btn-warning mr-2">Edit</a>

                                <form action="{{ route('admin.executive_members.destroy', $member) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger mr-2">Delete</button>
                                </form>
                                <a href="{{ route('admin.executive_members.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
