@extends('frontend.layouts.app')

@section('title', 'Blog - Requin BD')
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.blog.css') }}">
@endpush

@section('content')

<main class="containerr">
    <section class="posts">
        @forelse($blogs as $blog)
            <article class="post">
                <img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->title ?? 'Blog Image' }}">
                <div class="post-content">
                    <h2>
                        <a href="{{ route('articles.view', $blog->id) }}">{{ $blog->title }}</a>
                    </h2>
                    <small>
                        {{ \Carbon\Carbon::parse($blog->blog_date)->format('M d, Y') }} 
                        • {{ $blog->author ?? $blog->user->name ?? 'Admin' }}
                    </small>
                    <p>
                        {!! implode(' ', array_slice(explode(' ', strip_tags($blog->description)), 0, 17)) !!} ...
                    </p>
                </div>
            </article>
        @empty
            <p>No articles found.</p>
        @endforelse
    </section>

    <aside>
        <h3>Categories</h3>
        <ul>
            @forelse($categories as $cat)
                <li>
                    <a href="{{ route('articles.category', $cat->category) }}">
                        {{ $cat->category }}
                    </a>
                </li>
            @empty
                <li>No categories found.</li>
            @endforelse
        </ul>
    </aside>
</main>

@endsection
