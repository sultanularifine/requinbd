@extends('backend.layouts.app')

@section('title', 'Edit Hero Section')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hero Section Settings</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Home</a></div>
                    <div class="breadcrumb-item">Edit Hero</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body card card-primary">

                                    {{-- Title + Subtitle --}}
                                    <h3 class="mb-3">Hero Texts</h3>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Title</b></label>
                                            <input type="text" name="title" value="{{ $hero->title ?? '' }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>Subtitle</b></label>
                                            <textarea name="subtitle" class="form-control">{{ $hero->subtitle ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Button --}}
                                    <h3 class="mb-3">Hero Button</h3>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label><b>Button Text</b></label>
                                            <input type="text" name="button_text" value="{{ $hero->button_text ?? '' }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>Button Link</b></label>
                                            <input type="text" name="button_link" value="{{ $hero->button_link ?? '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    {{-- Social Links --}}
                                    <h3 class="mb-3">Social Links</h3>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label><b>Facebook Link</b></label>
                                            <input type="text" name="facebook" value="{{ $hero->facebook ?? '' }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>LinkedIn Link</b></label>
                                            <input type="text" name="linkedin" value="{{ $hero->linkedin ?? '' }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><b>Instagram Link</b></label>
                                            <input type="text" name="instagram" value="{{ $hero->instagram ?? '' }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    {{-- Image --}}
                                    <h3 class="mb-3">Hero Image</h3>
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control">
                                        @if (!empty($hero->image))
                                            <div class="mt-3">
                                                <img src="{{ asset($hero->image) }}" width="250"
                                                    style="border:1px solid #ddd; border-radius:8px;">
                                            </div>
                                        @endif
                                    </div>

                                </div>

                                <div class="card-footer text-left my-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            {{-- Error Messages --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul>
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
    <!-- JS Libraries -->
    <script src="{{ asset('backend/library/summernote/dist/summernote-bs4.min.js') }}"></script>
@endpush
