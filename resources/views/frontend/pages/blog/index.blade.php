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
      <article class="post">
        <img src="https://picsum.photos/400/250?random=1" alt="">
        <div class="post-content">
          <h2><a href="view.html">5 Essential Tips for Designing a Memorable Brand Logo</a></h2>
          <small>Dec 15, 2022 • John Smith</small>
          <p>Learn how to design logos that people will remember...</p>
        </div>
      </article>
      <article class="post">
        <img src="https://picsum.photos/400/250?random=2" alt="">
        <div class="post-content">
          <h2><a href="view.html">The Dos and Don’ts of Social Media Marketing</a></h2>
          <small>Dec 10, 2022 • Sarah Johnson</small>
          <p>Avoid common mistakes in social media campaigns...</p>
        </div>
      </article>
      <article class="post">
        <img src="https://picsum.photos/400/250?random=6" alt="">
        <div class="post-content">
          <h2><a href="view.html">5 Essential Tips for Designing a Memorable Brand Logo</a></h2>
          <small>Dec 15, 2022 • John Smith</small>
          <p>Learn how to design logos that people will remember...</p>
        </div>
      </article>
      <article class="post">
        <img src="https://picsum.photos/400/250?random=5" alt="">
        <div class="post-content">
          <h2><a href="view.html">The Dos and Don’ts of Social Media Marketing</a></h2>
          <small>Dec 10, 2022 • Sarah Johnson</small>
          <p>Avoid common mistakes in social media campaigns...</p>
        </div>
      </article>
      <article class="post">
        <img src="https://picsum.photos/400/250?random=3" alt="">
        <div class="post-content">
          <h2><a href="view.html">5 Essential Tips for Designing a Memorable Brand Logo</a></h2>
          <small>Dec 15, 2022 • John Smith</small>
          <p>Learn how to design logos that people will remember...</p>
        </div>
      </article>
      <article class="post">
        <img src="https://picsum.photos/400/250?random=4" alt="">
        <div class="post-content">
          <h2><a href="view.html">The Dos and Don’ts of Social Media Marketing</a></h2>
          <small>Dec 10, 2022 • Sarah Johnson</small>
          <p>Avoid common mistakes in social media campaigns...</p>
        </div>
      </article>
      <!-- more posts -->
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

