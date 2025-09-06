@extends('frontend.layouts.app')

@section('title', 'Article - Glevo Tech')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.blogView.css') }}">
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
@endpush

@section('content')

   
 <div class="frame">
    <div class="panel">
     

      <!-- Breadcrumb & Title -->
      <div class="crumb">Blog <span class="dash"></span> Posted 01 December 2021, 09:30am</div>
      <h1 class="title">A work of art which did not <span class="accent">begin in emotion</span> is not art.</h1>

      <!-- Hero -->
      <div class="hero-wrap">
        <img class="hero" src="https://images.unsplash.com/photo-1549880338-65ddcdfd017b?q=80&w=1920&auto=format&fit=crop" alt="Artistic portrait">
      </div>

      <!-- Content -->
      <section class="content">
        <!-- Social -->
        <aside class="social">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fa fa-link"></i></a>
        </aside>

        <!-- Article -->
        <article class="article">
          <h3>If I create from the heart, nearly everything works; if from the head, almost nothing.</h3>
          <p>
            80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. 
            Time—we’ll fight against the time, and we’ll fly beyond the sky into the light of endless possibilities.
          </p>

          <!-- Gallery -->
          <div class="gallery">
            <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=800&q=80" alt="Artwork 1">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&q=80" alt="Artwork 2">
            <img src="https://images.unsplash.com/photo-1495567720989-cebdbdd97913?w=800&q=80" alt="Artwork 3">
            <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?w=800&q=80" alt="Artwork 4">
          </div>

          <p>
            Creativity is allowing yourself to make mistakes. Art is knowing which ones to keep. 
            A great piece of art comes from countless trials, endless patience, and emotions woven together.
          </p>
        </article>
      </section>
    </div>
  </div>


@endsection

