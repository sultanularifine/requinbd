@extends('frontend.layouts.app')

@section('title', $blog->title . ' - Requin BD')

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.blogView.css') }}">
<style>
    .hero-wrap img {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .article h3 {
        margin-bottom: 10px;
    }

    .article p {
        line-height: 1.7;
        margin-bottom: 15px;
    }

    .gallery img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        margin-bottom: 10px;
        border-radius: 6px;
    }

    .suggested-blogs {
    margin-top: 40px;
    padding: 15px;
    border-radius: 6px;
}

.suggested-blogs h3 {
    margin-bottom: 15px;
}

.suggested-list {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
}

.suggested-list li {
    width: calc(50% - 7.5px); /* 2 per row */
    display: flex;
    align-items: center;
    gap: 10px;
    background: #00cfa9;
    padding: 8px;
    border-radius: 5px;
    transition: 0.3s;
}

.suggested-list li:hover {
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.suggested-list img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 5px;
}

/* Responsive for Mobile */
@media (max-width: 768px) {
    .suggested-list li {
        width: 100%; /* full width on mobile */
    }
}


    /* Comment Section */
    .comments-section {
        margin-top: 50px;
        padding: 20px;
        
        border-radius: 6px;
    }

    .comments-section h3 {
        margin-bottom: 20px;
    }

    .comment {
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #ddd;
    }

    .comment strong {
        display: block;
        margin-bottom: 5px;
    }

    .comment small {
        color: #888;
    }

    .add-comment form {
        margin-top: 20px;
    }

    .add-comment input, .add-comment textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .add-comment button {
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        background: #007bff;
        color: #fff;
        cursor: pointer;
    }

    .add-comment button:hover {
        background: #0056b3;
    }
</style>
@endpush

@section('meta_description', Str::limit(strip_tags($blog->description), 150))

@section('content')
<div class="frame">
    <div class=" blog-content">

        <!-- Breadcrumb & Title -->
        <div class="crumb">
            <a href="{{ route('articles') }}">Blogs</a> <span class="dash">/</span> 
            Posted {{ \Carbon\Carbon::parse($blog->blog_date)->format('d F, Y, h:ia') }} 
            • Author: {{ $blog->author ?? $blog->user->name ?? 'Admin' }}
        </div>

        <h1 class="title">{{ $blog->title }}</h1>

        <!-- Hero Image -->
        <div class="hero-wrap">
            @if($blog->thumbnail)
                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title }}">
            @else
                <img src="https://via.placeholder.com/1200x500?text=No+Image" alt="{{ $blog->title }}">
            @endif
        </div>

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
                    <img src="{{ asset($image->image) }}" alt="Blog Image {{ $loop->iteration }}">
                @endforeach
            </div>
            @endif
        </article>

        <!-- Suggested Blogs at Bottom Left -->
        @if($suggestedBlogs && $suggestedBlogs->count() > 0)
        <div class="suggested-blogs">
            <h3>Suggested Blogs</h3>
            <ul class="suggested-list">
                @foreach($suggestedBlogs as $sblog)
                <li>
                    @if($sblog->thumbnail)
                        <img src="{{ asset($sblog->thumbnail) }}" alt="{{ $sblog->title }}">
                    @endif
                    <a href="{{ route('articles.view', $sblog->id) }}">{{ $sblog->title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Comment Section -->
        <div class="comments-section">
            <h3>Comments ({{ $blog->comments->count() ?? 0 }})</h3>

            @foreach($blog->comments as $comment)
            <div class="comment">
                <strong>{{ $comment->name }}</strong> 
                <small>• {{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y') }}</small>
                <p>{{ $comment->comment }}</p>
            </div>
            @endforeach

            <div class="add-comment">
                <h4>Leave a Comment</h4>
                <form action="{{ route('blog.comment.store', $blog->id) }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name*" required>
                    <input type="email" name="email" placeholder="Your Email*" required>
                    <textarea name="comment" rows="4" placeholder="Your Comment*" required></textarea>
                    <button type="submit">Submit Comment</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
