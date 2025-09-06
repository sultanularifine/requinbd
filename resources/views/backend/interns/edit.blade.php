@extends('backend.layouts.app')

@section('title', 'Edit Intern')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Intern</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.interns.index') }}">Interns</a></div>
                <div class="breadcrumb-item">Edit Intern</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-body">
                        <form action="{{ route('admin.interns.update', $intern->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Name & Email -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Formal Name*</b></label>
                                    <input type="text" name="name" class="form-control" value="{{ $intern->name }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Email Address*</b></label>
                                    <input type="email" name="email" class="form-control" value="{{ $intern->email }}" required>
                                </div>
                            </div>

                            <!-- Department, Contact, Designation & DOB -->
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label><b>Department*</b></label>
                                    <select name="department_id" class="form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" 
                                                {{ $intern->department_id == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label><b>Contact No*</b></label>
                                    <input type="text" name="phone" class="form-control" value="{{ $intern->phone }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label><b>Designation</b></label>
                                    <input type="text" name="designation" class="form-control" value="{{ $intern->designation }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label><b>Date of Birth</b></label>
                                    <input type="date" name="dob" class="form-control" value="{{ $intern->dob }}">
                                </div>
                            </div>

                            <!-- Social Links -->
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><b>WhatsApp No.</b></label>
                                    <input type="text" name="whatsapp_no" class="form-control" value="{{ $intern->whatsapp_no }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>Facebook Profile Link</b></label>
                                    <input type="url" name="facebook_link" class="form-control" value="{{ $intern->facebook_link }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label><b>LinkedIn Profile Link</b></label>
                                    <input type="url" name="linkedin_link" class="form-control" value="{{ $intern->linkedin_link }}">
                                </div>
                            </div>

                            <!-- Education & Address -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Institution</b></label>
                                    <input type="text" name="institution" class="form-control" value="{{ $intern->institution }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Present Address</b></label>
                                    <input type="text" name="present_address" class="form-control" value="{{ $intern->present_address }}">
                                </div>
                            </div>

                            <!-- Joining & Ending Dates -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Joining Date*</b></label>
                                    <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ $intern->joining_date }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Ending Date</b></label>
                                    <input type="date" id="ending_date" name="ending_date" class="form-control" value="{{ $intern->ending_date }}">
                                </div>
                            </div>

                            <!-- Upload CV & Photo -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Upload CV (PDF)*</b></label>
                                    <input type="file" name="cv" class="form-control" accept="application/pdf">
                                    @if($intern->cv)
                                        <a href="{{ asset('storage/' . $intern->cv) }}" target="_blank" class="d-block mt-1">View Current CV</a>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Attach Formal Photo</b></label>
                                    <input type="file" name="photo" class="form-control" accept="image/*">
                                    @if ($intern->photo)
                                        <img src="{{ asset($intern->photo) }}" alt="photo" width="80" class="mt-2">
                                    @endif
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-left my-2">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    </section>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('joining_date').addEventListener('change', function() {
        let joiningDate = new Date(this.value);

        if (!isNaN(joiningDate.getTime())) {
            joiningDate.setMonth(joiningDate.getMonth() + 4);
            let year = joiningDate.getFullYear();
            let month = String(joiningDate.getMonth() + 1).padStart(2, '0');
            let day = String(joiningDate.getDate()).padStart(2, '0');

            let endingField = document.getElementById('ending_date');
            if (!endingField.value) {
                endingField.value = `${year}-${month}-${day}`;
            }
        }
    });
</script>
@endpush
