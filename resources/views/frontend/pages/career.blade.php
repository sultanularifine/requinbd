@extends('frontend.layouts.app')

@section('title', 'Career - Requin BD')
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

      /* Apply Now Button */
  .apply-btn {
    position: absolute;
    top: 20px;
    right: 20px;
    background-color: #E9692C;
    color: #fff;
    padding: 6px 14px;          /* smaller size */
    font-size: 14px;            /* smaller font */
    border-radius: 4px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 0 0 10px #fd5f16;
    animation: glow 1.5s infinite alternate;
}

.apply-btn:hover {
    background-color: #ca4f16;
    box-shadow: 0 0 20px #ff5203;
}

/* Glowing animation */
@keyframes glow {
    0% {
        box-shadow: 0 0 5px rgba(233,105,44,0.5), 0 0 10px rgba(233,105,44,0.3);
    }
    50% {
        box-shadow: 0 0 15px rgba(233,105,44,0.7), 0 0 25px rgba(233,105,44,0.5);
    }
    100% {
        box-shadow: 0 0 10px rgba(233,105,44,0.6), 0 0 20px rgba(233,105,44,0.4);
    }
}


    </style>
@endpush

@section('meta_description', 'Career opportunities and internships for IT courses at Requin BD.')

@section('content')

<section id="career" class="ra-section anim-fade-slide" style="position: relative;">
  

  <div class="ra-container">
    <div class="ra-section-header anim-fade-slide anim-delay-1">
      <div class="ra-eyebrow">Career</div>
    <a href="{{ route('internship.form') }}" class="apply-btn">Apply Now</a> 
    
      <h2 class="ra-h2">Career Opportunities</h2>
      <p class="ra-lead">
        After completing our courses, various industry-oriented opportunities await you.
      </p>
    </div>

    <div class="ra-grid">
      <article class="ra-card ra-career-card anim-fade-slide anim-delay-1">
        <div class="ra-career-icon">💼</div>
        <h3 class="ra-h3">Internship Programs</h3>
        <p class="ra-muted">
          Paid internships along with the course – opportunity to work on real projects.
        </p>
      </article>

      <article class="ra-card ra-career-card anim-fade-slide anim-delay-2">
        <div class="ra-career-icon">🚀</div>
        <h3 class="ra-h3">Job Placement</h3>
        <p class="ra-muted">
          Industry connections and job references for successful graduates.
        </p>
      </article>

      <article class="ra-card ra-career-card anim-fade-slide anim-delay-3">
        <div class="ra-career-icon">🌍</div>
        <h3 class="ra-h3">Freelance Readiness</h3>
        <p class="ra-muted">
          Skill-based training to work in global freelance marketplaces.
        </p>
      </article>
    </div>
  </div>
</section>

<script>
  // Animate on scroll
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
