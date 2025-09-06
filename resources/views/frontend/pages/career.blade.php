@extends('frontend.layouts.app')

@section('title', 'Articles - Requin BD')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.career.css') }}">
    <style>
      /* 👉 Animation keyframes */
      @keyframes raFadeSlide {
        from {
          opacity: 0;
          transform: translateY(40px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Animation utility */
      .anim-fade-slide {
        opacity: 0;
        animation: raFadeSlide 1s ease-out forwards;
      }

      /* Delay classes */
      .anim-delay-1 { animation-delay: 0.2s; }
      .anim-delay-2 { animation-delay: 0.4s; }
      .anim-delay-3 { animation-delay: 0.6s; }
    </style>
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
@endpush

@section('content')

<section id="career" class="ra-section anim-fade-slide">
  <div class="ra-container">
    <div class="ra-section-header anim-fade-slide anim-delay-1">
      <div class="ra-eyebrow">Career</div>
      <h2 class="ra-h2">ক্যারিয়ার সম্ভাবনা</h2>
      <p class="ra-lead">
        আমাদের কোর্স শেষ করার পর আপনার জন্য রয়েছে বিভিন্ন ইন্ডাস্ট্রি-অরিয়েন্টেড সুযোগ।
      </p>
    </div>

    <div class="ra-grid">
      <article class="ra-card ra-career-card anim-fade-slide anim-delay-1">
        <div class="ra-career-icon">💼</div>
        <h3 class="ra-h3">Internship Programs</h3>
        <p class="ra-muted">
          কোর্সের সাথে পেইড ইন্টার্নশিপ – রিয়েল প্রজেক্টে কাজ করার সুযোগ।
        </p>
      </article>

      <article class="ra-card ra-career-card anim-fade-slide anim-delay-2">
        <div class="ra-career-icon">🚀</div>
        <h3 class="ra-h3">Job Placement</h3>
        <p class="ra-muted">
          সফল গ্র্যাজুয়েটদের জন্য ইন্ডাস্ট্রি কানেকশন এবং জব রেফারেন্স।
        </p>
      </article>

      <article class="ra-card ra-career-card anim-fade-slide anim-delay-3">
        <div class="ra-career-icon">🌍</div>
        <h3 class="ra-h3">Freelance Readiness</h3>
        <p class="ra-muted">
          গ্লোবাল ফ্রিল্যান্স মার্কেটপ্লেসে কাজ করার জন্য স্কিল-ভিত্তিক ট্রেনিং।
        </p>
      </article>
    </div>
  </div>
</section>

<script>
  // Optional: Animate on scroll (basic JS, no conflict)
  const animItems = document.querySelectorAll('.anim-fade-slide');
  const onScrollAnim = () => {
    const triggerBottom = window.innerHeight * 0.9;
    animItems.forEach(item => {
      const boxTop = item.getBoundingClientRect().top;
      if (boxTop < triggerBottom) {
        item.style.opacity = "1";
        item.style.animationPlayState = "running";
      }
    });
  };
  window.addEventListener('scroll', onScrollAnim);
  window.addEventListener('load', onScrollAnim);
</script>

@endsection
