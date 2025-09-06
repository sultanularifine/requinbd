@extends('frontend.layouts.app')

@section('title', 'Home - Requin BD')

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
@endpush

@section('meta_description', 'Custom IT services for startups & SMBs.')

@section('content')

  <!-- Hero Section -->
  <section class="hero">
    <div class="container inner">
      <div class="text">
        <h1>Empowering Youth,<br>Driving Innovation.</h1>
        <p>Reliable end-to-end IT services, training, and collaborations that make an impact.</p>
        <div class="actions">
          <a href="{{ route('contact') }}" class="btn" style="background:#2563eb;">Explore Requin BD</a>
          <a href="#services" class="btn secondary">Our Services</a>
        </div>
      </div>
      <div class="media">
        <img src="https://images.unsplash.com/photo-1552581234-26160f608093?q=80&w=1600&auto=format&fit=crop" alt="Team collaborating" />
      </div>
    </div>
  </section>

  <!-- Impact Section -->
  <section class="section">
    <div class="container">
      <h2 style="text-align:center;">Our Impact</h2>
      <div class="stats">
        <div class="stat"><b>3+</b><br>Years of Impact</div>
        <div class="stat"><b>30+</b><br>Projects</div>
        <div class="stat"><b>50+</b><br>Virtual Workshops</div>
        <div class="stat"><b>1000+</b><br>Youth Trained</div>
      </div>
    </div>
  </section>

  <!-- Collaborations -->
  <section class="section">
    <div class="container" style="text-align:center;">
      <h2 data-aos="fade-up">We proudly collaborated with...</h2>

      <!-- Swiper -->
      <div class="swiper mySwiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1581090700227-4c4c90e2e04d?q=80&w=800&auto=format&fit=crop" alt="Collab 1">
          </div>
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?q=80&w=800&auto=format&fit=crop" alt="Collab 2">
          </div>
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=800&auto=format&fit=crop" alt="Collab 3">
          </div>
          <div class="swiper-slide">
            <img src="https://images.unsplash.com/photo-1506765515384-028b60a970df?q=80&w=800&auto=format&fit=crop" alt="Collab 4">
          </div>
        </div>

        <!-- Controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section cta">
    <div class="container" style="text-align:center;">
      <h2>Get In Touch</h2>
      <a href="{{ route('contact') }}" class="btn" style="background:#ffd60a;color:#000;">Contact Us</a>
    </div>
  </section>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });

  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      1024: { slidesPerView: 3 },
      768: { slidesPerView: 2 },
      480: { slidesPerView: 1 }
    }
  });
</script>
@endpush
