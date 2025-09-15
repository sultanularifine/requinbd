@extends('backend.layouts.app')

@section('title', 'Add Blog')

@push('style')
<link rel="stylesheet" href="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add Blog</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Blogs</a></div>
                <div class="breadcrumb-item">Add Blog</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card-body card card-primary">
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title & Sub Title -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Title*</b></label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Sub Title</b></label>
                                    <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}">
                                </div>
                            </div>

                            <!-- Author & Date -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Author</b></label>
                                    <input type="text" class="form-control" name="author" 
                                        value="{{ old('author', auth()->user()->name) }}" placeholder="Author Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Date*</b></label>
                                    <input type="text" name="blog_date" class="form-control datepicker" value="{{ old('blog_date') }}" required>
                                </div>
                            </div>

                            <!-- Category & Tags -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Category*</b></label>
                                    <input type="text" class="form-control" name="category" value="{{ old('category') }}" required placeholder="Enter category">
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Tags</b></label>
                                    <input type="text" class="form-control" name="tags" value="{{ old('tags') }}" placeholder="Separate tags with commas">
                                </div>
                            </div>

                            <!-- Thumbnail & Images -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><b>Thumbnail*</b></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" required>
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label><b>Gallery Images</b></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="images" name="image[]" multiple>
                                        <label class="custom-file-label" for="images">Choose files</label>
                                    </div>
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
