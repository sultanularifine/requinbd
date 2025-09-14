@extends('frontend.layouts.app')

@section('title', 'Articles - Glevo Tech')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.blog.css') }}">
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
@endpush

@section('content')

  <main class="containerr">
    <section class="posts">
        @forelse($blogs as $blog)
            <article class="post">
                <img src="{{ asset('backend/' . $blog->thumbnail) }}" alt="{{ $blog->title }}">
                <div class="post-content">
                    <h2>
                        <a href="{{ route('articles.view', $blog->id) }}">{{ $blog->title }}</a>
                    </h2>
                    <small>
                        {{ \Carbon\Carbon::parse($blog->blog_date)->format('M d, Y') }} 
                        • {{ $blog->author ?? 'Admin' }}
                    </small>
                    <p>{!! implode(' ', array_slice(explode(' ', $blog->description), 0, 17)) !!} ...</p>
                </div>
            </article>
        @empty
            <p>No articles found.</p>
        @endforelse
    </section>

    <aside>
        <h3>Categories</h3>
        <ul>
            <li><a href="#">Design</a></li>
            <li><a href="#">Web Dev</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Branding</a></li>
        </ul>
    </aside>
</main>


@endsection

