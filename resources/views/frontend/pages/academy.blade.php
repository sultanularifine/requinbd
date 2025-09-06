@extends('frontend.layouts.app')

@section('title', 'Articles - Requin BD')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.academy.css') }}">
<style>
  /* Animation Classes - Conflict Free (anim- prefix used) */
  .anim-fade-up {
    opacity: 0;
    transform: translateY(20px);
    transition: all .8s ease;
  }
  .anim-fade-up.anim-visible {
    opacity: 1;
    transform: translateY(0);
  }

  .anim-fade-in {
    opacity: 0;
    transition: opacity .8s ease;
  }
  .anim-fade-in.anim-visible {
    opacity: 1;
  }

  .anim-zoom-in {
    opacity: 0;
    transform: scale(0.9);
    transition: all .8s ease;
  }
  .anim-zoom-in.anim-visible {
    opacity: 1;
    transform: scale(1);
  }

  .anim-delay-1 { transition-delay: .2s; }
  .anim-delay-2 { transition-delay: .4s; }
  .anim-delay-3 { transition-delay: .6s; }
</style>
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@section('content')

<main class="ra">

  <!-- HERO -->
  <section class="ra-section ra-hero">
    <div class="ra-container ra-hero-grid">
      <div class="anim-fade-up">
        <div class="ra-eyebrow">Requin Academy</div>
        <h1 class="ra-h1">শিখুন, তৈরি করুন, ক্যারিয়ার গড়ুন</h1>
        <p class="ra-lead">ইন্ডাস্ট্রি-অরিয়েন্টেড কোর্স, পেইড ইন্টার্নশিপ, লাইভ সেশন এবং ভেরিফাইএবল সার্টিফিকেট — এক জায়গায়।</p>
        <div class="ra-hero-badges anim-fade-in anim-delay-1">
          <span class="ra-hero-badge">Job-ready Curriculum</span>
          <span class="ra-hero-badge">Mentor-led</span>
          <span class="ra-hero-badge">Project-based</span>
        </div>
        <div style="margin-top:16px; display:flex; gap:10px; flex-wrap:wrap;" class="anim-fade-in anim-delay-2">
          <a href="#courses" class="ra-btn">কোর্স দেখুন</a>
          <a href="#apply" class="ra-btn secondary">Apply Now</a>
        </div>
      </div>
      <div class="ra-hero-art ra-card anim-zoom-in anim-delay-2"><img src="https://scontent.fdac8-1.fna.fbcdn.net/v/t1.15752-9/541083000_3375928119237346_87491268734359593_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeEKXbixGlwmT8IqgLPp3M2lg7NgTRZL6IiDs2BNFkvoiKK6lqtyrxNELd3YniF2XqnfwjJ6r6nUbKXX_HUNLurB&_nc_ohc=u9xaa3NfSXoQ7kNvwGnnIr-&_nc_oc=AdkrhoGH9iS7JG_yFNoR5S_jXDKM5BGliXlJaFclh_SHpUNCWW0OhCnGCQwTHt6C0Y4&_nc_zt=23&_nc_ht=scontent.fdac8-1.fna&oh=03_Q7cD3QGY91oJrvcbooFeoC_0jbPsjGUn8aY3tdPlA4yD5K8X6w&oe=68DEC72C" alt="" style="padding: 20px" width="490" height="280px"; ></div>
    </div>
  </section>

  <!-- COURSES -->
  <section id="courses" class="ra-section">
    <div class="ra-container anim-fade-up">
      <div class="ra-eyebrow">Courses</div>
      <h2 class="ra-h2">ইন্ডাস্ট্রি-অ্যালাইন্ড টপ কোর্স</h2>
      <input id="courseSearch" type="search" class="ra-search" placeholder="Search courses…"/>
      <div id="courseGrid" class="ra-grid" style="margin-top:20px;">
        <article class="ra-card ra-course-card anim-zoom-in" data-title="full stack web development javascript react node">
          <div class="ra-course-head">
            <div class="ra-course-icon">W</div>
            <div>
              <h3>Full Stack Web Development</h3>
              <p class="ra-lead">React, Node, MongoDB</p>
            </div>
          </div>
        </article>
        <article class="ra-card ra-course-card anim-zoom-in anim-delay-1" data-title="ui ux design figma adobe">
          <div class="ra-course-head">
            <div class="ra-course-icon">D</div>
            <div>
              <h3>Video Editing</h3>
              <p class="ra-lead">Figma, Adobe XD</p>
            </div>
          </div>
        </article>
        <article class="ra-card ra-course-card anim-zoom-in anim-delay-2" data-title="data science python ai ml">
          <div class="ra-course-head">
            <div class="ra-course-icon">DS</div>
            <div>
              <h3>Graphic Design</h3>
              <p class="ra-lead">AI, PS,</p>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- APPLY -->
  <section id="apply" class="ra-section">
    <div class="ra-container anim-fade-up">
      <div class="ra-eyebrow">Apply</div>
      <h2 class="ra-h2">এখনই আবেদন করুন</h2>
      <form class="ra-form anim-fade-in anim-delay-1" onsubmit="event.preventDefault(); alert('Submitted!');">
        <div class="ra-grid-2">
          <input type="text" class="ra-input" placeholder="পূর্ণ নাম" required>
          <input type="email" class="ra-input" placeholder="ইমেইল" required>
        </div>
        <select class="ra-select" required>
          <option value="">কোর্স সিলেক্ট করুন</option>
          <option>Full Stack</option>
          <option>UI/UX</option>
          <option>Data Science</option>
        </select>
        <textarea class="ra-textarea" rows="4" placeholder="আপনার সম্পর্কে..."></textarea>
        <button class="ra-btn">Submit</button>
      </form>
    </div>
  </section>

  <!-- INTERNSHIPS -->
  <section id="internships" class="ra-section">
    <div class="ra-container anim-fade-up">
      <div class="ra-section-header">
        <div class="ra-eyebrow">Internships</div>
        <h2 class="ra-h2">পেইড ইন্টার্নশিপ সুযোগ</h2>
        <p class="ra-lead">আমাদের কোর্স শেষ করার পর বাছাইকৃত শিক্ষার্থীরা রিয়েল ক্লায়েন্ট প্রজেক্টে কাজ করার সুযোগ পাবেন।</p>
      </div>

      <div class="ra-grid">
        <article class="ra-card ra-course-card anim-zoom-in">
          <div class="ra-course-head">
            <div class="ra-course-icon">💻</div>
            <div class="ra-stack-s">
              <strong>Web Development Intern</strong>
              <span class="ra-muted">Duration: 3 months</span>
            </div>
          </div>
          <p>React, Node.js এবং MongoDB প্রজেক্টে কাজের অভিজ্ঞতা।</p>
          <div class="ra-tags">
            <span class="ra-tag">Stipend: 10k BDT</span>
            <span class="ra-tag">Remote</span>
          </div>
        </article>

        <article class="ra-card ra-course-card anim-zoom-in anim-delay-1">
          <div class="ra-course-head">
            <div class="ra-course-icon">🎨</div>
            <div class="ra-stack-s">
              <strong>UI/UX Intern</strong>
              <span class="ra-muted">Duration: 2 months</span>
            </div>
          </div>
          <p>Figma, Prototyping এবং Real client design tasks।</p>
          <div class="ra-tags">
            <span class="ra-tag">Stipend: 8k BDT</span>
            <span class="ra-tag">On-site</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- SESSIONS -->
  <section id="sessions" class="ra-section">
    <div class="ra-container anim-fade-up">
      <div class="ra-section-header">
        <div class="ra-eyebrow">Sessions</div>
        <h2 class="ra-h2">লাইভ সেশন ও ওয়ার্কশপ</h2>
        <p class="ra-lead">ইন্ডাস্ট্রি এক্সপার্টদের সাথে লাইভ Q&A এবং প্র্যাকটিকাল ওয়ার্কশপ।</p>
      </div>

      <div class="ra-grid">
        <article class="ra-card ra-course-card anim-zoom-in">
          <div class="ra-course-head">
            <div class="ra-course-icon">🧑‍🏫</div>
            <div class="ra-stack-s">
              <strong>Career in Tech</strong>
              <span class="ra-muted">5 Sept, 2025</span>
            </div>
          </div>
          <p>কিভাবে Tech Career শুরু করবেন এবং Next Level এ নেবেন।</p>
          <div class="ra-tags">
            <span class="ra-tag">Free</span>
            <span class="ra-tag">Zoom</span>
          </div>
        </article>

        <article class="ra-card ra-course-card anim-zoom-in anim-delay-1">
          <div class="ra-course-head">
            <div class="ra-course-icon">🚀</div>
            <div class="ra-stack-s">
              <strong>Startup Workshop</strong>
              <span class="ra-muted">15 Sept, 2025</span>
            </div>
          </div>
          <p>নিজস্ব Product Idea কিভাবে Market-ready করা যায়।</p>
          <div class="ra-tags">
            <span class="ra-tag">Paid</span>
            <span class="ra-tag">On-site</span>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- VERIFY -->
  <section class="ra-section">
    <div class="ra-container anim-fade-up">
      <div class="ra-eyebrow">Certificate</div>
      <h2 class="ra-h2">ভেরিফাই করুন</h2>

      {{-- Error Message --}}
      @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
      @endif

      {{-- Verify Form --}}
      <form 
        action="{{ route('certificate.verification.verify') }}" 
        method="POST" 
        class="ra-verify anim-fade-in anim-delay-1" 
        target="_blank"
      >
        @csrf
        <input 
          type="text" 
          name="certificate_no" 
          id="certificate_no" 
          class="ra-input" 
          placeholder="Enter Certificate ID" 
          required
        >
        <button type="submit" class="ra-btn">Verify</button>
      </form>
    </div>
  </section>

</main>

<script>
  // Reveal Animations on Scroll
  const animEls = document.querySelectorAll('.anim-fade-up, .anim-fade-in, .anim-zoom-in');
  const animObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if(entry.isIntersecting){
        entry.target.classList.add('anim-visible');
      }
    });
  }, { threshold: 0.1 });

  animEls.forEach(el => animObserver.observe(el));

  // Course Search
  document.getElementById("courseSearch").addEventListener("input", function(){
    let q = this.value.toLowerCase();
    document.querySelectorAll("#courseGrid .ra-course-card").forEach(card=>{
      card.style.display = card.dataset.title.includes(q) ? "block" : "none";
    });
  });
</script>
@endsection
