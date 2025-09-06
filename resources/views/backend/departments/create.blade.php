@extends('backend.layouts.app')

@section('title', 'Add Department')

@push('style')
    <!-- Optional CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Department</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">Departments</a></div>
                <div class="breadcrumb-item">Add Department</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('admin.departments.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label><b>Department Name*</b></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="text-left my-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </form>

                            @if($errors->any())
                                <div class="mt-3">
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
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- Optional JS Libraries -->
@endpush
