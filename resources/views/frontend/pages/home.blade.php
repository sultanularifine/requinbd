@extends('frontend.layouts.app')

@section('title', 'Home - Requin BD')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .hero .container.inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .hero .text {
            flex: 1;
        }

        .hero .media {
            flex: 1;
        }

        @media (max-width: 768px) {
            .hero .container.inner {
                flex-direction: column;
            }

            .hero .media {
                order: -1;
                /* Image comes first */
                width: 100%;
                text-align: center;
            }

            .hero .media img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
@endpush

@section('meta_description', 'Custom IT services for startups & SMBs.')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container inner">
            <div class="text">
                <h1>Empowering Youth,<br>Driving Innovation.</h1>
                <p>Requin BD delivers reliable end-to-end IT services, professional training, and strategic collaborations —
                    empowering businesses and individuals to grow with innovation and impact.</p>
                <div class="actions">
                    <a href="{{ route('contact') }}" class="btn" style="background:#2563eb;">Explore Requin BD</a>
                    <div class="social-links">
                        <a href="https://facebook.com/RequinBD.officialPage" target="_blank" class="social-icon">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/requin-bd/" target="_blank" class="social-icon">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/requinbd/" target="_blank" class="social-icon">
                            <i class="ri-instagram-line"></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="media">
                <img src="{{ asset('frontend/hero/hero-Image.jpg') }}" alt="Team collaborating" />
            </div>

        </div>
    </section>
    <section class="section">
        <div class="container">
            <h2 class="brand-title">Our Concern</h2>
            <div class="brand-grid">
                <a href="{{ route('requin-it') }}"><img src="{{ asset('frontend/logo/IT logo.png') }}"
                        alt="Partner 2 Logo"></a>
                <a href="{{ route('academy') }}"> <img src="{{ asset('frontend/logo/Requin Academy Logo White.png') }}"
                        alt="Partner 3 Logo"></a>
                <img src="{{ asset('frontend/logo/Requin Nexus Logo White.png') }}" alt="Partner 1 Logo">

                <img src="{{ asset('frontend/logo/The Light of Youth Logo.png') }}" alt="Partner 4 Logo">
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
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGBhH5qpcwsUoTw_46-6bY7jkWjOhrUzat6A&s"
                            alt="Collab 1">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1556761175-4b46a572b786?q=80&w=800&auto=format&fit=crop"
                            alt="Collab 2">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=800&auto=format&fit=crop"
                            alt="Collab 3">
                    </div>
                    <div class="swiper-slide">
                        <img src="https://images.unsplash.com/photo-1506765515384-028b60a970df?q=80&w=800&auto=format&fit=crop"
                            alt="Collab 4">
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
            <a href="{{ route('contact') }}" class="btn" style="background:#E9692C;color:#ffffff;">Contact Us</a>
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
                1024: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 1
                }
            }
        });
    </script>
@endpush
