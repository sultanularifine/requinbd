@extends('backend.layouts.app')
@section('title', 'Edit Blog')

@push('style')
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Blog</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Blogs</a></div>
                <div class="breadcrumb-item"><a href="#">Blog List</a></div>
                <div class="breadcrumb-item">Edit Blog</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body card card-primary">

                                <!-- Title & Sub Title -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Title*</b></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $blog->title) }}" required>
                                    </div>                                    
                                    <div class="form-group col-md-6">
                                        <label><b>Sub Title</b></label>
                                        <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title', $blog->sub_title) }}">
                                    </div>
                                </div>

                                <!-- Author & Date -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Author</b></label>
                                        <input type="text" class="form-control" name="author" 
                                            value="{{ old('author', $blog->author ?? auth()->user()->name) }}" placeholder="Author Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Date*</b></label>
                                        <input type="text" name="blog_date" class="form-control datepicker" value="{{ old('blog_date', $blog->blog_date) }}" required>
                                    </div>
                                </div>

                                <!-- Category & Tags -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Category*</b></label>
                                        <input type="text" class="form-control" name="category" value="{{ old('category', $blog->category) }}" required placeholder="Enter category">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Tags</b></label>
                                        <input type="text" class="form-control" name="tags" value="{{ old('tags', $blog->tags) }}" placeholder="Separate tags with commas">
                                    </div>
                                </div>

                                <!-- Thumbnail & Images -->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label><b>Thumbnail*</b></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">{{ $blog->thumbnail ? basename($blog->thumbnail) : 'Choose file' }}</label>
                                        </div>
                                        @if($blog->thumbnail)
                                            <img src="{{ asset($blog->thumbnail) }}" alt="Thumbnail" class="mt-2" width="100">
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label><b>Gallery Images</b></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="image[]" multiple>
                                            <label class="custom-file-label" for="images">Choose files</label>
                                        </div>
                                        @if($blog->blogImage->count() > 0)
                                            <div class="mt-2">
                                                @foreach($blog->blogImage as $img)
                                                    <img src="{{ asset($img->image) }}" alt="Blog Image" width="80" class="mr-2 mb-2">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-0">
                                    <label><b>Description</b></label>
                                    <textarea class="form-control summernote" data-height="150" name="description">{{ old('description', $blog->description) }}</textarea>
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
