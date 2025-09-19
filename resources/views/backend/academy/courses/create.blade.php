@extends('backend.layouts.app')

@section('title', 'Add Course')

@push('style')
<link rel="stylesheet" href="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Course</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Academic</a></div>
                <div class="breadcrumb-item">Add Course</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card-body card card-primary">
                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title & Icon -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Course Title*</b></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Course Icon</b></label>
                                    <input type="text" class="form-control" name="icon" value="{{ old('icon') }}" placeholder="Enter icon or abbreviation">
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label><b>Tags</b></label>
                                    <input type="text" class="form-control" name="tags" value="{{ old('tags') }}" placeholder="Separate tags with commas">
                                </div>
                                
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label><b>Description</b></label>
                                <textarea class="form-control summernote" data-height="150" name="description">{{ old('description') }}</textarea>
                            </div>

                            <div class="card-left text-left my-1">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- Validation Errors -->
                        <div class="mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('backend/library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('backend/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('backend/library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/js/page/index-0.js') }}"></script>
@endpush
