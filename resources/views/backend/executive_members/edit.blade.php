@extends('backend.layouts.app')

@section('title', 'Edit Executive Member')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Executive Member</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.executive_members.index') }}">Executive Members</a></div>
                    <div class="breadcrumb-item">Edit Member</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- Add enctype for file uploads -->
                            <form action="{{ route('admin.executive_members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body card card-primary">
                                    <!-- Name & Email -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Name*</b></label>
                                            <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>Email*</b></label>
                                            <input type="email" name="email" class="form-control" value="{{ $member->email }}" required>
                                        </div>
                                    </div>

                                    <!-- Phone, Department & Designation -->
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label><b>Phone</b></label>
                                            <input type="text" name="phone" class="form-control" value="{{ $member->phone }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Department*</b></label>
                                            <select name="department_id" class="form-control" >
                                                <option value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}" 
                                                        {{ $member->department_id == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Designation</b></label>
                                            <input type="text" name="designation" class="form-control" value="{{ $member->designation }}">
                                        </div>
                                    </div>

                                    <!-- Joining Date & Photo -->
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Joining Date</b></label>
                                            <input type="date" name="joining_date" class="form-control" value="{{ $member->joining_date }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label><b>Photo</b></label>
                                            <input type="file" name="photo" class="form-control">
                                            @if ($member->photo)
                                                <img src="{{ asset($member->photo) }}" alt="photo" width="80" class="mt-2">
                                            @endif
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
