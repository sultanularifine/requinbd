@extends('frontend.layouts.app')

@section('title', 'Requin IT - Requin BD')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.service.css') }}">

    <style>
        /* ======================
           FLOATY ANIMATION
           ====================== */
        @keyframes floatUp {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            60% {
                opacity: 1;
                transform: translateY(-6px) scale(1.02);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .float-up {
            opacity: 0;
            animation: floatUp 1s ease-out forwards;
            animation-play-state: paused; /* only run when visible */
        }
    </style>
@endpush

@section('meta_description', 'Custom IT services for startups & SMBs.')

@section('content')

 
    <!-- About -->
    <section class="about section" id="about">
        <div class="container wrap">
            <div class="card float-up">
                <p class="eyebrow">About Company</p>
                <h2>Custom IT Solutions for Business Growth</h2>
                <p class="muted">We provide scalable IT outsourcing...</p>
                <div class="kpis">
                    <div class="kpi float-up" style="animation-delay:.2s">
                        <div class="muted">Projects</div><b>30+</b>
                    </div>
                    <div class="kpi float-up" style="animation-delay:.4s">
                        <div class="muted">Client</div><b>50+</b>
                    </div>
                    <div class="kpi float-up" style="animation-delay:.6s">
                        <div class="muted">Countries</div><b>5+</b>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm float-up" style="animation-delay:.8s">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1600&auto=format&fit=crop"
                    alt="Developers collaborating" />
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section" id="services">
    <div class="container">
        <div style="display:flex; align-items:end; justify-content:space-between; gap:16px; flex-wrap:wrap; margin-bottom:18px"
            class="float-up">
            <div>
                <p class="eyebrow">Services</p>
                <h2 style="margin:.25rem 0 0">What we serve for your Business</h2>
            </div>
            <a href="#contact" class="btn secondary">View More</a>
        </div>

        <div class="services-grid">
            <article class="service float-up" style="animation-delay:.1s">
                <i class="ri-code-line"></i>
                <h4>Web Development</h4>
                <p>Custom website design and development. Responsive, fast, and SEO-friendly websites. CMS integration (WordPress, Laravel, etc.).</p>
                <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
            </article>

            <article class="service primary float-up" style="animation-delay:.2s">
                <i class="ri-smartphone-line"></i>
                <h4>Mobile App Development</h4>
                <p>Native and cross-platform app development (iOS & Android). User-friendly UI/UX for mobile apps. App deployment and maintenance.</p>
                <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
            </article>

            <article class="service float-up" style="animation-delay:.3s">
                <i class="ri-pencil-ruler-2-line"></i>
                <h4>UI/UX Design</h4>
                <p>Wireframing, prototyping, and interactive design. User-centered design for websites and apps. Branding consistency and visual storytelling.</p>
                <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
            </article>

            <article class="service float-up" style="animation-delay:.4s">
                <i class="ri-global-line"></i>
                <h4>Digital Marketing & SEO</h4>
                <p>On-page and off-page SEO optimization. Social media marketing and management. Pay-per-click campaigns and analytics tracking.</p>
                <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
            </article>

            <article class="service float-up" style="animation-delay:.5s">
                <i class="ri-shopping-cart-line"></i>
                <h4>E-commerce Solutions</h4>
                <p>Online store development with secure payment integration. WooCommerce, Shopify, and custom solutions. Inventory management and analytics setup.</p>
                <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
            </article>

            <article class="service float-up" style="animation-delay:.6s">
                <i class="ri-cpu-line"></i>
                <h4>Software & ERP Solutions</h4>
                <p>Custom business software and automation tools. Enterprise Resource Planning (ERP) development. Workflow optimization and reporting dashboards.</p>
                <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
            </article>
        </div>
    </div>
</section>


    <!-- Portfolio -->
   <section class="portfolio section" id="portfolio">
    <div class="container">
        <div class="section-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <div>
                <p class="eyebrow">Portfolio</p>
                <h2>Our Recent <em>Work</em></h2>
            </div>
            <a href="#contact" class="btn secondary">View All Projects</a>
        </div>

        <div class="portfolio-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:16px;">
            <div class="portfolio-item float-up">
                <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1600&auto=format&fit=crop" alt="Portfolio 1" style="width:100%; border-radius:8px;">
            </div>
            
            
            <div class="portfolio-item float-up" style="animation-delay:.5s">
                <img src="https://images.unsplash.com/photo-1554415707-6e8cfc93fe23?q=80&w=1600&auto=format&fit=crop" alt="Portfolio 6" style="width:100%; border-radius:8px;">
            </div>
        </div>
    </div>
</section>

    <!-- Testimonials -->
    <section class="testimonials section" id="testimonials">
        <div class="container">
            <p class="eyebrow float-up">Testimonials</p>
            <h2 class="float-up">What they said about Requin BD</h2>
            <div class="items" style="margin-top:18px">
                <article class="testimonial card float-up">
                    <div class="avatar"><img
                            src="https://images.unsplash.com/photo-1544723795-3fb6469f5b39?q=80&w=400&auto=format&fit=crop"
                            alt="John Doe"></div>
                    <div>
                        <strong>John Doe</strong>
                        <div class="muted" style="font-size:.9rem">Director</div>
                        <p style="margin:.5rem 0 0">“Requin BD was timely, detail-oriented, and highly skilled — a
                            reliable end-to-end partner throughout.”</p>
                    </div>
                </article>
                <article class="testimonial card float-up" style="animation-delay:.3s">
                    <div class="avatar"><img
                            src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=400&auto=format&fit=crop"
                            alt="Meddy Mark"></div>
                    <div>
                        <strong>Meddy Mark</strong>
                        <div class="muted" style="font-size:.9rem">CEO</div>
                        <p style="margin:.5rem 0 0">“Working with Requin BD felt like an extension of our own team.
                            The collaboration and engineering rigor have been invaluable.”</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

   

    <!-- CTA -->
    <section class="cta section" id="contact">
        <div class="container wrap">
            <div class="panel float-up">
                <h2>Begin your journey with us!</h2>
                <p class="muted">Tell us about your project and we’ll get back within one business day.</p>
                
                 <a href="{{ route('contact') }}"> 
    <button class="btn" style="grid-column:1/-1; cursor:pointer;">Contact us</button>
</a>

               
            </div>
            <div class="panel card float-up" style="animation-delay:.3s">
                <img src="https://images.unsplash.com/photo-1525182008055-f88b95ff7980?q=80&w=1600&auto=format&fit=crop"
                    alt="Support" />
            </div>
        </div>
    </section>

    <script>
        // Mobile menu toggle
        const btn = document.querySelector('.menu-toggle');
        const menu = document.getElementById('menu');
        if (btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('open'));
            menu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => menu.classList.remove('open')));
        }

        // Dynamic year
        const yearEl = document.getElementById('year');
        if (yearEl) {
            yearEl.textContent = new Date().getFullYear();
        }

        // FLOAT-UP SCROLL TRIGGER
        const floatItems = document.querySelectorAll('.float-up');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        floatItems.forEach(el => observer.observe(el));
    </script>
@endsection
