@extends('backend.layouts.app')

@section('title', 'Edit Certificate Signature')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Certificate Signature</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.certificates.index') }}">Certificates</a></div>
                <div class="breadcrumb-item">Edit Signature</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary shadow-sm border-0">
                        <div class="card-body">

                            <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Department -->
                                <div class="form-group">
                                    <label><b>Department*</b></label>
                                    <select name="department_id" class="form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" 
                                                {{ $certificate->department_id == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <hr>

                                <!-- Signature 1 -->
                                <h5>Signature 1</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Name*</b></label>
                                        <input type="text" name="name1" class="form-control" value="{{ $certificate->name1 }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Designation*</b></label>
                                        <input type="text" name="designation1" class="form-control" value="{{ $certificate->designation1 }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Signature Image</b></label>
                                    <input type="file" name="signature1" class="form-control">
                                    @if($certificate->signature1)
                                        <img src="{{ asset('storage/' . $certificate->signature1) }}" alt="Signature 1" width="80" class="mt-2">
                                    @endif
                                </div>

                                <hr>

                                <!-- Signature 2 -->
                                <h5>Signature 2</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Name*</b></label>
                                        <input type="text" name="name2" class="form-control" value="{{ $certificate->name2 }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Designation*</b></label>
                                        <input type="text" name="designation2" class="form-control" value="{{ $certificate->designation2 }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Signature Image</b></label>
                                    <input type="file" name="signature2" class="form-control">
                                    @if($certificate->signature2)
                                        <img src="{{ asset('storage/' . $certificate->signature2) }}" alt="Signature 2" width="80" class="mt-2">
                                    @endif
                                </div>

                                <!-- Submit Button -->
                                <div class="card-footer text-left my-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </form>

                            <!-- Validation Errors -->
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
        </div>
    </section>
</div>
@endsection
