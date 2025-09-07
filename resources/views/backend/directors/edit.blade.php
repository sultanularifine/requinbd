@extends('backend.layouts.app')

@section('title', 'Edit Director')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Director</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.directors.index') }}">Directors</a></div>
                    <div class="breadcrumb-item">Edit Director</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('admin.directors.update', $director->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body card card-primary">
                                    <!-- Name & Designation -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Name*</b></label>
                                            <input type="text" name="name" class="form-control" value="{{ $director->name }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>Designation*</b></label>
                                            <input type="text" name="designation" class="form-control" value="{{ $director->designation }}" required>
                                        </div>
                                    </div>

                                    <!-- Department, Duration, Email -->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label><b>Department</b></label>
                                            <input type="text" name="department" class="form-control" value="{{ $director->department }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Duration of Employment</b></label>
                                            <input type="text" name="duration_of_employment" class="form-control" value="{{ $director->duration_of_employment }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Email*</b></label>
                                            <input type="email" name="email" class="form-control" value="{{ $director->email }}" required>
                                        </div>
                                    </div>

                                    <!-- Mobile & Birthdays -->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label><b>Mobile Number</b></label>
                                            <input type="text" name="mobile_number" class="form-control" value="{{ $director->mobile_number }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Birthday (Certificate Wise)</b></label>
                                            <input type="date" name="birthday_certificate" class="form-control" value="{{ $director->birthday_certificate }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Birthday (Original)</b></label>
                                            <input type="date" name="birthday_original" class="form-control" value="{{ $director->birthday_original }}">
                                        </div>
                                    </div>

                                    <!-- Address & Photo -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Permanent Address</b></label>
                                            <textarea name="permanent_address" class="form-control">{{ $director->permanent_address }}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>Best Photo</b></label>
                                            <input type="file" name="photo" class="form-control">
                                            @if ($director->photo)
                                                <img src="{{ asset($director->photo) }}" alt="photo" width="80" class="mt-2">
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Social Links -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Facebook Profile Link</b></label>
                                            <input type="url" name="facebook_profile" class="form-control" value="{{ $director->facebook_profile }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>LinkedIn Profile Link</b></label>
                                            <input type="url" name="linkedin_profile" class="form-control" value="{{ $director->linkedin_profile }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="card-footer text-left my-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="card-body">
                                    <ul class="text-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
