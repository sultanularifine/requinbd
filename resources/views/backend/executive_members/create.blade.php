@extends('backend.layouts.app')

@section('title', 'Create Executive Member')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Executive Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Executive Members</div>
                <div class="breadcrumb-item">Add Member</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-body">
                        <form action="{{ route('admin.executive_members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Name*</b></label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Email*</b></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><b>Phone*</b></label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Department*</b></label>
                                    <select name="department_id" class="form-control" >
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Designation</b></label>
                                    <input type="text" name="designation" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Joining Date</b></label>
                                    <input type="date" name="joining_date" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Photo</b></label>
                                    <input type="file" name="photo" class="form-control">
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
