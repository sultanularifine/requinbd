@extends('backend.layouts.app')

@section('title', 'Add Brand')

@push('style')
    <!-- Optional: Add any extra CSS libraries if needed -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Brand</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-primary card-body">

                        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Brand Name --}}
                            <div class="form-group">
                                <label><b>Name*</b></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            {{-- Brand Link --}}
                            <div class="form-group">
                                <label><b>Link (Optional)</b></label>
                                <input type="url" name="link" class="form-control" value="{{ old('link') }}">
                            </div>

                            {{-- Brand Logo --}}
                            <div class="form-group">
                                <label><b>Brand Logo*</b></label>
                                <input type="file" name="image" class="form-control" required>
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-left my-3">
                                <button type="submit" class="btn btn-success">Add Brand</button>
                            </div>
                        </form>

                        {{-- Display Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Success Message --}}
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
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
    <!-- Optional: Add extra JS libraries if needed -->
@endpush
