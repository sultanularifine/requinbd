@extends('frontend.layouts.app')

@section('title', 'Home - Requin BD')
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

    <!-- Hero -->
    <section class="hero section" id="home">
        <div class="container inner">
            <div class="float-up">
                <h1>Empowering Youth, Driving Innovation</h1>
                <p>Reliable end-to-end IT services...</p>
                <div class="actions">
                    <a href="{{ route('contact') }}" class="btn">Explore Requin BD <i
                            class="ri-arrow-right-up-line"></i></a>
                    <a href="#services" class="btn secondary">Explore Services</a>
                </div>
            </div>
            <div class="media float-up" style="animation-delay:.3s">
                <div class="circle">
                    <img src="https://images.unsplash.com/photo-1552581234-26160f608093?q=80&w=1600&auto=format&fit=crop"
                        alt="Team collaborating" />
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about section" id="about">
        <div class="container wrap">
            <div class="card float-up">
                <p class="eyebrow">About Company</p>
                <h2>Custom IT Solutions for Business Growth</h2>
                <p class="muted">We provide scalable IT outsourcing...</p>
                <div class="kpis">
                    <div class="kpi float-up" style="animation-delay:.2s">
                        <div class="muted">Projects</div><b>250+</b>
                    </div>
                    <div class="kpi float-up" style="animation-delay:.4s">
                        <div class="muted">Avg. NPS</div><b>72</b>
                    </div>
                    <div class="kpi float-up" style="animation-delay:.6s">
                        <div class="muted">Countries</div><b>18</b>
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
                    <i class="ri-layout-2-line"></i>
                    <h4>UI/UX Design</h4>
                    <p>Clean, fast, and accessible interfaces that convert — designed to look great and work
                        beautifully.</p>
                    <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
                </article>
                <article class="service primary float-up" style="animation-delay:.2s">
                    <i class="ri-apps-2-line"></i>
                    <h4>App Development</h4>
                    <p>Web & mobile apps crafted with scalable architecture and delightful UX. From MVPs to enterprise
                        platforms.</p>
                    <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
                </article>
                <article class="service float-up" style="animation-delay:.3s">
                    <i class="ri-radar-line"></i>
                    <h4>IoT Solutions</h4>
                    <p>Connect devices with secure, real-time data flows and automated workflows that boost efficiency.
                    </p>
                    <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
                </article>
                <article class="service float-up" style="animation-delay:.4s">
                    <i class="ri-cpu-line"></i>
                    <h4>AI & Machine Learning</h4>
                    <p>From predictive insights to automation — fine-tuned models that transform your data into action.
                    </p>
                    <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
                </article>
                <article class="service float-up" style="animation-delay:.5s">
                    <i class="ri-shield-keyhole-line"></i>
                    <h4>Cybersecurity Services</h4>
                    <p>Assess, harden, and monitor your posture. SOC-as-a-Service and incident response on tap.</p>
                    <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
                </article>
                <article class="service float-up" style="animation-delay:.6s">
                    <i class="ri-cloud-line"></i>
                    <h4>Cloud Solutions</h4>
                    <p>Reliable infra on AWS/Azure/GCP with CI/CD, cost control, and best-practice architecture.</p>
                    <a href="#contact" class="btn secondary" style="margin-top:12px">Learn More</a>
                </article>
            </div>
        </div>
    </section>

    <!-- Portfolio -->
    <section class="portfolio section" id="portfolio">
        <div class="container">
            <div style="display:flex; align-items:end; justify-content:space-between; gap:16px; flex-wrap:wrap; margin-bottom:18px"
                class="float-up">
                <div>
                    <p class="eyebrow">Portfolio</p>
                    <h2 style="margin:.25rem 0 0">Work that <em>defines</em> us</h2>
                </div>
                <a href="#contact" class="btn secondary">View More</a>
            </div>
            <div class="shots">
                <div class="shot float-up"><img
                        src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1600&auto=format&fit=crop"
                        alt="App UI 1"></div>
                <div class="shot float-up" style="animation-delay:.2s"><img
                        src="https://images.unsplash.com/photo-1547658719-98e6ac04ef87?q=80&w=1600&auto=format&fit=crop"
                        alt="App UI 2"></div>
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

    <!-- Articles -->
    <section class="articles section" id="articles">
        <div class="container">
            <p class="eyebrow float-up">Article</p>
            <h2 class="float-up">What they said about
                <span style="background:var(--accent); -webkit-background-clip:text; -webkit-text-fill-color:transparent">
                    Requin BD</span>
            </h2>
            <div class="list" style="margin-top:18px">
                <article class="post float-up">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=1600&auto=format&fit=crop"
                        alt="IT Export Boom" />
                    <div class="meta">
                        <div class="muted">IT EXPORT • 2 min read</div>
                        <h4>IT Export Boom: $210 Billion Target</h4>
                    </div>
                </article>
                <article class="post float-up" style="animation-delay:.2s">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=1600&auto=format&fit=crop"
                        alt="Industry Revenue" />
                    <div class="meta">
                        <div class="muted">IT EXPORT • 7 min read</div>
                        <h4>Industry Revenue Growth</h4>
                    </div>
                </article>
                <article class="post float-up" style="animation-delay:.4s">
                    <img src="https://images.unsplash.com/photo-1518779578993-ec3579fee39f?q=80&w=1600&auto=format&fit=crop"
                        alt="Jobs Growth" />
                    <div class="meta">
                        <div class="muted">JOBS • 7 min read</div>
                        <h4>Job Growth & Demand</h4>
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
                <form onsubmit="event.preventDefault(); alert('Thanks! We\'ll reach out shortly.');" class="grid"
                    style=" gap:14px; margin-top:8px">
                    <input class="card" placeholder="Your name" required
                        style="padding:14px; background:transparent; color:var(--text); border-radius:12px; border:1px solid rgba(255,255,255,.12)" />
                    <input class="card" placeholder="Email" type="email" required
                        style="padding:14px; background:transparent; color:var(--text); border-radius:12px; border:1px solid rgba(255,255,255,.12)" />
                    <input class="card" placeholder="Company"
                        style="grid-column:1/-1; padding:14px; background:transparent; color:var(--text); border-radius:12px; border:1px solid rgba(255,255,255,.12)" />
                    <textarea class="card" placeholder="Project details" rows="4"
                        style="grid-column:1/-1; padding:14px; background:transparent; color:var(--text); border-radius:12px; border:1px solid rgba(255,255,255,.12)"></textarea>
                    <button class="btn" style="grid-column:1/-1">Schedule a call</button>
                </form>
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
