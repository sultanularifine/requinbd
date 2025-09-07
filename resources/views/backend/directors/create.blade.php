@extends('backend.layouts.app')

@section('title', 'Create Director')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Director</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Directors</div>
                <div class="breadcrumb-item">Add Director</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-body">
                        <form action="{{ route('admin.directors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Name*</b></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Designation*</b></label>
                                    <input type="text" name="designation" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><b>Department</b></label>
                                    <input type="text" name="department" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Duration of Employment</b></label>
                                    <input type="text" name="duration_of_employment" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Email*</b></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><b>Mobile Number</b></label>
                                    <input type="text" name="mobile_number" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Birthday (Certificate Wise)</b></label>
                                    <input type="date" name="birthday_certificate" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Birthday (Original)</b></label>
                                    <input type="date" name="birthday_original" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Permanent Address</b></label>
                                    <textarea name="permanent_address" class="form-control"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Best Photo</b></label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Facebook Profile Link</b></label>
                                    <input type="url" name="facebook_profile" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>LinkedIn Profile Link</b></label>
                                    <input type="url" name="linkedin_profile" class="form-control">
                                </div>
                            </div>

                            <div class="text-left my-2">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="mt-3">
                                <ul class="list-group">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
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

@push('scripts')
    <script src="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endpush
