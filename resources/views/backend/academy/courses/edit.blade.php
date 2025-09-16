@extends('backend.layouts.app')
@section('title', 'Edit Course')

@push('style')
<link rel="stylesheet" href="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Course</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('courses.index') }}">Courses</a></div>
                <div class="breadcrumb-item">Edit Course</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body card card-primary">

                                <!-- Title & Icon -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Course Title*</b></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $course->title) }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Course Icon</b></label>
                                        <input type="text" class="form-control" name="icon" value="{{ old('icon', $course->icon) }}" placeholder="Enter icon or abbreviation">
                                    </div>
                                </div>

                                <!-- Tags & Thumbnail -->
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label><b>Tags</b></label>
                                        <input type="text" class="form-control" name="tags" value="{{ old('tags', $course->tags) }}" placeholder="Separate tags with commas">
                                    </div>
                                    
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-0">
                                    <label><b>Description</b></label>
                                    <textarea class="form-control summernote" data-height="150" name="description">{{ old('description', $course->description) }}</textarea>
                                </div>

                            </div>

                            <div class="card-footer text-left my-5">
                                <button type="submit" class="btn btn-primary">Update</button>
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
