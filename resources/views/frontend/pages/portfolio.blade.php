@extends('frontend.layouts.app')

@section('title', 'postfollio - Glevo Tech')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/style.portfolio.css') }}">
<style>
  /* ==== Animation CSS ==== */
  .anim-fade-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.8s ease-out;
  }
  .anim-fade-up.anim-visible {
    opacity: 1;
    transform: translateY(0);
  }

  .anim-scale-in {
    opacity: 0;
    transform: scale(0.9);
    transition: all 0.8s ease-out;
  }
  .anim-scale-in.anim-visible {
    opacity: 1;
    transform: scale(1);
  }

  .anim-fade-in {
    opacity: 0;
    transition: opacity 1s ease-out;
  }
  .anim-fade-in.anim-visible {
    opacity: 1;
  }
</style>
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
@endpush

@section('content')

<!-- ========== PORTFOLIO PAGE ========== -->
<main class="ra">
  <!-- HERO -->
  <section class="ra-section ra-portfolio-hero anim-fade-up">
    <div class="ra-container">
      <div class="ra-portfolio-hero-inner ra-card anim-scale-in">
        <div>
          <div class="ra-eyebrow anim-fade-in">Portfolio</div>
          <h1 class="ra-h1 anim-fade-up">আমার কাজগুলো — বাস্তব প্রোজেক্টে প্রমাণ</h1>
          <p class="ra-lead anim-fade-up">
            ক্লায়েন্ট প্রোজেক্ট, ওয়েবসাইট, মোবাইল অ্যাপ, UI/UX এবং গ্রাফিক ডিজাইন— এখানে সব এক জায়গায়।
          </p>
          <div class="ra-portfolio-hero-badges anim-fade-up">
            <span class="ra-hero-badge">Client-first</span>
            <span class="ra-hero-badge">Pixel-perfect</span>
            <span class="ra-hero-badge">Performance</span>
          </div>
        </div>
        <div class="ra-portfolio-hero-art anim-scale-in"></div>
      </div>
    </div>
  </section>

  <!-- FILTERS + SEARCH -->
  <section class="ra-section anim-fade-up">
    <div class="ra-container">
      <div class="ra-section-header">
        <div class="ra-eyebrow anim-fade-in">Showcase</div>
        <div class="ra-spread ra-portfolio-controls anim-fade-up">
          <h2 class="ra-h2">প্রোজেক্টস</h2>

          <div class="ra-portfolio-actions">
            <div class="ra-portfolio-tabs" role="tablist" aria-label="Project filters">
              <button class="ra-tab is-active" data-cat="all">All</button>
              <button class="ra-tab" data-cat="client">Client</button>
              <button class="ra-tab" data-cat="website">Website</button>
              <button class="ra-tab" data-cat="app">App</button>
              <button class="ra-tab" data-cat="uiux">UI/UX</button>
              <button class="ra-tab" data-cat="graphic">Graphic</button>
            </div>
            <input id="raPortfolioSearch" type="search" class="ra-search" placeholder="Search projects…">
          </div>
        </div>
        <p class="ra-lead anim-fade-up">নিচের গ্রিড থেকে কেটাগরি/সার্চ দিয়ে দ্রুত খুঁজে নিন।</p>
      </div>

      <!-- GRID -->
      <div id="raPortfolioGrid" class="ra-grid ra-portfolio-grid">
        <!-- CARD 1 -->
        <article class="ra-card ra-portfolio-card anim-scale-in" data-cat="client website" data-title="E-commerce Website Redesign React Next.js Stripe">
          <div class="ra-portfolio-thumb" style="--img:url('https://dcassetcdn.com/design_img/796104/30934/30934_4793971_796104_74cb62dd_image.jpg');"></div>
          <div class="ra-portfolio-body">
            <h3 class="ra-h3">E-commerce Website Redesign</h3>
            <p class="ra-muted">Modern storefront with Next.js, Stripe, CMS integration.</p>
            <div class="ra-tags">
              <span class="ra-tag">Client</span>
              <span class="ra-tag">Website</span>
              <span class="ra-tag">Next.js</span>
            </div>
          </div>
          <div class="ra-portfolio-actions-row">
            <button class="ra-btn sm ra-portfolio-view" data-gallery='[
              "https://dcassetcdn.com/design_img/796104/30934/30934_4793971_796104_74cb62dd_image.jpg",
              "https://dcassetcdn.com/design_img/796104/30934/30934_4793971_796104_74cb62dd_image.jpg"
            ]' data-title="E-commerce Website Redesign" data-desc="Next.js, Stripe payment, Headless CMS, Lighthouse 95+.">Preview</button>
            <a class="ra-btn sm secondary" href="#" target="_blank" rel="noopener">Live</a>
          </div>
        </article>

        <!-- CARD 2 -->
        <article class="ra-card ra-portfolio-card anim-scale-in" data-cat="app client" data-title="Fitness Tracker Mobile App Flutter Firebase">
          <div class="ra-portfolio-thumb" style="--img:url('https://cdn.sanity.io/images/599r6htc/regionalized/5817fe6977be7c7639ed40f262100232dc13fed7-2416x2416.png?w=2416&h=2416&q=75&fit=max&auto=format');"></div>
          <div class="ra-portfolio-body">
            <h3 class="ra-h3">Fitness Tracker App</h3>
            <p class="ra-muted">Flutter + Firebase, real-time analytics & goals.</p>
            <div class="ra-tags">
              <span class="ra-tag">Client</span>
              <span class="ra-tag">App</span>
              <span class="ra-tag">Flutter</span>
            </div>
          </div>
          <div class="ra-portfolio-actions-row">
            <button class="ra-btn sm ra-portfolio-view" data-gallery='[
              "https://cdn.sanity.io/images/599r6htc/regionalized/5817fe6977be7c7639ed40f262100232dc13fed7-2416x2416.png?w=2416&h=2416&q=75&fit=max&auto=format",
              "https://cdn.sanity.io/images/599r6htc/regionalized/5817fe6977be7c7639ed40f262100232dc13fed7-2416x2416.png?w=2416&h=2416&q=75&fit=max&auto=format"
            ]' data-title="Fitness Tracker App" data-desc="Custom charts, offline sync, push notifications.">Preview</button>
            <a class="ra-btn sm secondary" href="#" target="_blank" rel="noopener">Case Study</a>
          </div>
        </article>

        <!-- CARD 3 -->
        <article class="ra-card ra-portfolio-card anim-scale-in" data-cat="uiux" data-title="Banking Dashboard UX Research Wireframe Prototype">
          <div class="ra-portfolio-thumb" style="--img:url('https://sitemile.com/wp-content/uploads/2023/06/design123-e1680159178134.webp');"></div>
          <div class="ra-portfolio-body">
            <h3 class="ra-h3">Banking Dashboard UX</h3>
            <p class="ra-muted">Research → Wireframe → Interactive prototype.</p>
            <div class="ra-tags">
              <span class="ra-tag">UI/UX</span>
              <span class="ra-tag">Prototype</span>
            </div>
          </div>
          <div class="ra-portfolio-actions-row">
            <button class="ra-btn sm ra-portfolio-view" data-gallery='[
              "https://sitemile.com/wp-content/uploads/2023/06/design123-e1680159178134.webp"
            ]' data-title="Banking Dashboard UX" data-desc="Usability testing, heuristic evaluation, micro-interactions.">Preview</button>
            <a class="ra-btn sm secondary" href="#" target="_blank" rel="noopener">Figma</a>
          </div>
        </article>

        <!-- CARD 4 -->
        <article class="ra-card ra-portfolio-card anim-scale-in" data-cat="graphic client" data-title="Brand Identity Logo Design Packaging">
          <div class="ra-portfolio-thumb" style="--img:url('https://sitemile.com/wp-content/uploads/2023/06/design123-e1680159178134.webp');"></div>
          <div class="ra-portfolio-body">
            <h3 class="ra-h3">Brand Identity & Logo</h3>
            <p class="ra-muted">Logo, color system, packaging mockups.</p>
            <div class="ra-tags">
              <span class="ra-tag">Graphic</span>
              <span class="ra-tag">Branding</span>
            </div>
          </div>
          <div class="ra-portfolio-actions-row">
            <button class="ra-btn sm ra-portfolio-view" data-gallery='[
              "https://sitemile.com/wp-content/uploads/2023/06/design123-e1680159178134.webp",
              "https://sitemile.com/wp-content/uploads/2023/06/design123-e1680159178134.webp"
            ]' data-title="Brand Identity & Logo" data-desc="Grid-based mark, typography system, mockups.">Preview</button>
            <a class="ra-btn sm secondary" href="#" target="_blank" rel="noopener">Behance</a>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- MODAL -->
  <div class="ra-portfolio-modal" id="raPortfolioModal" aria-hidden="true">
    <div class="ra-portfolio-modal-backdrop" data-close-modal></div>
    <div class="ra-portfolio-modal-dialog anim-scale-in" role="dialog" aria-modal="true" aria-labelledby="raPortfolioModalTitle">
      <button class="ra-portfolio-modal-close" aria-label="Close" data-close-modal>&times;</button>
      <h3 id="raPortfolioModalTitle" class="ra-h3">Project Title</h3>
      <p id="raPortfolioModalDesc" class="ra-muted" style="margin-bottom:10px;">Short description</p>
      <div id="raPortfolioGallery" class="ra-portfolio-gallery"></div>
    </div>
  </div>
</main>


<script>
  // ===== Filter + Search =====
  (function(){
    const tabs = document.querySelectorAll('.ra-tab');
    const grid = document.getElementById('raPortfolioGrid');
    const cards = Array.from(grid.querySelectorAll('.ra-portfolio-card'));
    const search = document.getElementById('raPortfolioSearch');

    let activeCat = 'all';
    let q = '';

    function applyFilter(){
      const query = q.trim().toLowerCase();
      cards.forEach(card=>{
        const cats = (card.getAttribute('data-cat')||'').toLowerCase();
        const title = (card.getAttribute('data-title')||'').toLowerCase();
        const inCat = activeCat==='all' || cats.includes(activeCat);
        const inQuery = !query || title.includes(query);
        card.style.display = (inCat && inQuery) ? '' : 'none';
      });
    }

    tabs.forEach(btn=>{
      btn.addEventListener('click', ()=>{
        tabs.forEach(b=>b.classList.remove('is-active'));
        btn.classList.add('is-active');
        activeCat = btn.dataset.cat || 'all';
        applyFilter();
      });
    });

    search && search.addEventListener('input', (e)=>{ q = e.target.value; applyFilter(); });
  })();

  // ===== Modal / Preview =====
  (function(){
    const modal = document.getElementById('raPortfolioModal');
    const gallery = document.getElementById('raPortfolioGallery');
    const titleEl = document.getElementById('raPortfolioModalTitle');
    const descEl = document.getElementById('raPortfolioModalDesc');

    function openModal(payload){
      titleEl.textContent = payload.title || 'Project';
      descEl.textContent = payload.desc || '';
      gallery.innerHTML = '';
      (payload.images||[]).forEach(src=>{
        const img = new Image();
        img.loading = 'lazy';
        img.src = src;
        gallery.appendChild(img);
      });
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }
    function closeModal(){
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    modal.addEventListener('click', (e)=>{ if(e.target.closest('[data-close-modal]')) closeModal(); });
    window.addEventListener('keydown', (e)=>{ if(e.key==='Escape') closeModal(); });

    document.querySelectorAll('.ra-portfolio-view').forEach(btn=>{
      btn.addEventListener('click', ()=>{
        const title = btn.dataset.title || '';
        const desc = btn.dataset.desc || '';
        let images = [];
        try { images = JSON.parse(btn.dataset.gallery || '[]'); } catch(e){}
        openModal({title, desc, images});
      });
    });
  })();

  // ===== Animation Trigger =====
  (function(){
    const animatedEls = document.querySelectorAll('.anim-fade-up, .anim-scale-in, .anim-fade-in');
    const observer = new IntersectionObserver((entries)=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){
          entry.target.classList.add('anim-visible');
        }
      });
    }, {threshold: 0.15});

    animatedEls.forEach(el=>observer.observe(el));
  })();
</script>

@endsection
