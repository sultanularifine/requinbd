@extends('backend.layouts.app')

@section('title', 'Edit Brand')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Brand</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body card card-primary">
                                    <!-- Brand Name -->
                                    <div class="form-group">
                                        <label><b>Name*</b></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $brand->name }}" required>
                                    </div>

                                    <!-- Brand Link -->
                                    <div class="form-group">
                                        <label><b>Link (optional)</b></label>
                                        <input type="url" name="link" class="form-control"
                                            value="{{ $brand->link }}">
                                    </div>

                                    <!-- Brand Logo -->
                                    <div class="form-group">
                                        <label><b>Brand Logo</b></label>
                                        <input type="file" name="image" class="form-control">
                                        @if ($brand->image)
                                            <img src="{{ asset('uploads/brands/' . $brand->image) }}" alt="{{ $brand->name }}"
                                                width="80">
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="card-footer text-left my-3">
                                    <button type="submit" class="btn btn-primary">Update Brand</button>
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
