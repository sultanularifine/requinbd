@extends('backend.layouts.app')

@section('title', 'Blog View')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/chocolat/dist/css/chocolat.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <!-- Header -->
        <div class="section-header">
            <h1>Blog View</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('blog.list') }}">Blogs</a></div>
                <div class="breadcrumb-item"><a href="{{ route('blog.list') }}">Blog List</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>

        <div class="row">
            <!-- Main Blog Content -->
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <!-- Date & Author -->
                        <div class="d-flex justify-content-between mb-2">
                            <small>{{ date('d F, Y', strtotime($blog->blog_date)) }}</small>
                            <small>Author: {{ $blog->author ?? $blog->user->name ?? 'Admin' }}</small>
                        </div>

                        <!-- Title -->
                        <h3>{{ $blog->title }}</h3>

                        <!-- Thumbnail -->
                        <div class="my-4 text-center">
                            @if ($blog->thumbnail)
                                <img src="{{ asset($blog->thumbnail) }}" class="img-fluid" alt="{{ $blog->title }}" style="max-width:100%; height:auto;">
                            @else
                                <img src="https://via.placeholder.com/1200x500?text=No+Image" class="img-fluid" alt="{{ $blog->title }}">
                            @endif
                        </div>

                        <!-- Sub Title -->
                        @if($blog->sub_title)
                            <h5 class="mb-3">{{ $blog->sub_title }}</h5>
                        @endif

                        <!-- Description -->
                        <div>
                            <p>{!! $blog->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gallery Images -->
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Gallery</h4>
                        <div class="gallery gallery-fw" data-item-height="150">
                            @foreach ($blog->blogImage as $img)
                                <div class="gallery-item gallery-md" data-image="{{ asset($img->image) }}" data-title="Image {{ $loop->iteration }}">
                                </div>
                            @endforeach
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
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Initialize Chocolat Gallery -->
    <script>
        $(document).ready(function(){
            $('.gallery').Chocolat();
        });
    </script>
@endpush
