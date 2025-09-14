@extends('frontend.layouts.app')

@section('title', $blog->title . ' - Glevo Tech')

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.blogView.css') }}">
@endpush

@section('meta_description', Str::limit(strip_tags($blog->description), 150))

@section('content')
<div class="frame">
    <div class="panel">

        <!-- Breadcrumb & Title -->
        <div class="crumb">
            <a href="{{ route('articles') }}">Blogs</a> <span class="dash">/</span> 
            Posted {{ \Carbon\Carbon::parse($blog->blog_date)->format('d F, Y, h:ia') }}
        </div>
        <h1 class="title">{{ $blog->title }}</h1>

        <!-- Hero Image (Thumbnail) -->
        <div class="hero-wrap">
            @if($blog->thumbnail)
                <img class="hero" src="{{ asset('backend/' . $blog->thumbnail) }}" alt="{{ $blog->title }}">
            @else
                <img class="hero" src="https://via.placeholder.com/1200x500?text=No+Image" alt="{{ $blog->title }}">
            @endif
        </div>

        <!-- Content Section -->
        <section class="content">

            <!-- Social Share -->
            <aside class="social">
                <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fa fa-link"></i></a> -->
            </aside>

            <!-- Article Content -->
            <article class="article">
                @if($blog->sub_title)
                    <h3>{{ $blog->sub_title }}</h3>
                @endif
                <p>{!! $blog->description !!}</p>

                <!-- Gallery Images -->
                @if($blog->images && $blog->images->count() > 0)
                <div class="gallery">
                    @foreach($blog->images as $image)
                        <img src="{{ asset('backend/' . $image->image) }}" alt="Blog Image {{ $loop->iteration }}">
                    @endforeach
                </div>
                @endif
            </article>
        </section>
    </div>
</div>
@endsection
