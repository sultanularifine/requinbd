@extends('backend.layouts.app')

@section('title', 'Intern Profile')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Intern Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('executive.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.interns.index') }}">Interns</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">

                            <!-- Profile Photo -->
                            <div class="mb-4">
                                @if ($intern->photo)
                                    <img src="{{ asset($intern->photo) }}" alt="Photo" class="rounded-circle border"
                                        width="150" height="150">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="Photo" class="rounded-circle border">
                                @endif
                            </div>

                            <!-- Name & Designation -->
                            <h2 class="card-title mb-1">{{ $intern->name }}</h2>
                            <p class="text-primary mb-2">{{ $intern->designation ?? '-' }}</p>
                            <p class="text-muted mb-3">{{ $intern->department ? $intern->department->name : '-' }}</p>

                            <hr class="my-3">

                            <!-- Info -->
                            <div class="row text-left mt-3">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Email:</strong> {{ $intern->email }}</li>
                                        <li class="list-group-item"><strong>Phone:</strong> {{ $intern->phone ?? '-' }}</li>
                                        <li class="list-group-item"><strong>WhatsApp:</strong>
                                            {{ $intern->whatsapp_no ?? '-' }}</li>
                                        <li class="list-group-item"><strong>Facebook:</strong>
                                            @if ($intern->facebook_link)
                                                <a href="{{ $intern->facebook_link }}"
                                                    target="_blank">{{ $intern->facebook_link }}</a>
                                            @else
                                                -
                                            @endif
                                        </li>
                                        <li class="list-group-item"><strong>LinkedIn:</strong>
                                            @if ($intern->linkedin_link)
                                                <a href="{{ $intern->linkedin_link }}"
                                                    target="_blank">{{ $intern->linkedin_link }}</a>
                                            @else
                                                -
                                            @endif
                                        </li>
                                        <li class="list-group-item"><strong>Date of Birth:</strong>
                                            {{ $intern->dob ? date('d F, Y', strtotime($intern->dob)) : '-' }}
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Institution:</strong>
                                            {{ $intern->institution ?? '-' }}</li>
                                        <li class="list-group-item"><strong>Address:</strong>
                                            {{ $intern->present_address ?? '-' }}</li>
                                        <li class="list-group-item"><strong>Joining Date:</strong>
                                            {{ $intern->joining_date ? date('d F, Y', strtotime($intern->joining_date)) : '-' }}
                                        </li>
                                        <li class="list-group-item"><strong>Ending Date:</strong>
                                            {{ $intern->ending_date ? date('d F, Y', strtotime($intern->ending_date)) : '-' }}
                                        </li>
                                        <li class="list-group-item"><strong>Certificate No:</strong>
                                            {{ $intern->certificate_no ?? '-' }}</li>
                                        <li class="list-group-item"><strong>Upload CV:</strong>
                                            @if ($intern->cv && file_exists(public_path($intern->cv)))
                                                <a href="{{ asset($intern->cv) }}" target="_blank">View CV</a>
                                            @else
                                                -
                                            @endif
                                        </li>


                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr class="my-3">

                            <!-- Actions -->
                            <div class=" flex-wrap justify-content-center gap-2 mt-3">


                                {{-- @if (!empty($intern->certificate_no))
                                    <a href="{{ route('admin.interns.certificate', $intern->id) }}"
                                        class="btn btn-success btn-sm">Certificate</a>
                                @endif --}}

                                <a href="{{ route('admin.interns.edit', $intern->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.interns.destroy', $intern->id) }}" method="POST"
                                    class="d-inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this intern?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                                <a href="{{ route('admin.interns.index') }}" class="btn btn-secondary btn-sm">Back</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
