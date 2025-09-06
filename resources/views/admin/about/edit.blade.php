@extends('backend.layouts.app')

@section('title', 'Edit About Page')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit About Page</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">About</a></div>
                <div class="breadcrumb-item">Edit About</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body card card-primary">
                                
                                {{-- Hero Section --}}
                                <h3 class="mb-3">Hero Section</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Hero Images</b></label>
                                        <input type="file" class="form-control" name="hero_images[]" multiple>
                                        <div class="mt-2 d-flex flex-wrap" style="gap:10px; max-width:400px;">
                                            @if(!empty($page->hero_images))
                                                @foreach(json_decode($page->hero_images, true) as $img)
                                                    <div style="text-align:center;">
                                                        <img src="{{ asset($img) }}" 
                                                            alt="Hero Image"
                                                            style="width:120px; height:auto; border:1px solid #ccc; border-radius:8px; margin-bottom:5px;">
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><b>Hero Title</b></label>
                                        <input type="text" class="form-control" name="hero_title" value="{{ $page->hero_title ?? '' }}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><b>Hero Subtitle</b></label>
                                        <input type="text" class="form-control" name="hero_subtitle" value="{{ $page->hero_subtitle ?? '' }}">
                                    </div>
                                </div>

                                {{-- About Section --}}
                                <h3 class="mb-3">About Section</h3>
                                <div class="form-group">
                                    <label><b>About Text 1</b></label>
                                    <textarea class="form-control summernote" rows="3" name="about_text1">{{ $page->about_text1 ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label><b>About Text 2</b></label>
                                    <textarea class="form-control summernote" rows="3" name="about_text2">{{ $page->about_text2 ?? '' }}</textarea>
                                </div>

                                {{-- Mission & Vision --}}
                                <h3 class="mb-3">Mission & Vision</h3>
                                <div class="form-group">
                                    <label><b>Mission</b></label>
                                    <textarea class="form-control summernote" rows="3" name="mission">{{ $page->mission ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label><b>Vision</b></label>
                                    <textarea class="form-control summernote" rows="3" name="vision">{{ $page->vision ?? '' }}</textarea>
                                </div>

                            </div>

                            <div class="card-footer text-left my-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                        {{-- Error Messages --}}
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
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
    <!-- JS Libraries -->
    <script src="{{ asset('backend/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('backend/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('backend/library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('backend/js/page/index-0.js') }}"></script>
@endpush
