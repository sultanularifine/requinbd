@extends('frontend.layouts.app')

@section('title', 'Articles - Requin')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.about.team.css') }}">
    <!-- Animation + Slideshow Script -->
    <style>
        /* Hero fade animation */
        .fade-anim-unique {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .fade-anim-unique.active {
            opacity: 1;
        }

        /* Slide up */
        .slide-up-unique {
            transform: translateY(30px);
            opacity: 0;
            transition: all 1s ease;
        }

        .slide-up-unique.show {
            transform: translateY(0);
            opacity: 1;
        }

        /* Fade-in general */
        .fade-in-unique {
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .fade-in-unique.show {
            opacity: 1;
        }

        /* Team card hover */
        .team-card-unique {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card-unique:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        /* Tab fade */
        .tab-content {
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
            display: none;
        }

        .tab-content.active {
            display: flex;
            opacity: 1;
        }
    </style>
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
@endpush

@section('content')
    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Hero Section with Auto-Slideshow -->
        <section class="hero">
            @if (!empty($page->hero_images))
                @foreach (json_decode($page->hero_images, true) as $index => $img)
                    <div class="hero-slide {{ $index === 0 ? 'active' : '' }} fade-anim-unique"
                        style="background-image: url('{{ asset($img) }}');">
                    </div>
                @endforeach
            @endif

            <div class="hero-content slide-up-unique">
                <h1>{{ $page->hero_title ?? 'About Our Company' }}</h1>
                <p>{{ $page->hero_subtitle ?? 'Innovating with passion, growing with purpose.' }}</p>
            </div>
        </section>


        <!-- About Us -->
        <section class="about fade-in-unique">
            <h2>About Us</h2>
            <p>
                {!! $page->about_text1 ?? '' !!}
            </p>
            <p>
                {!! $page->about_text2 ?? '' !!}
            </p>
        </section>

        <!-- Mission & Vision -->
        <section class="mission fade-in-unique">
            <h2>Our Mission & Vision</h2>
            <div class="mission-vision">
                <div class="mv-box slide-up-unique">
                    <h3>Our Mission</h3>
                    <p>
                        {{ $page->mission ?? '' }}
                    </p>
                </div>
                <div class="mv-box slide-up-unique">
                    <h3>Our Vision</h3>
                    <p>
                        {{ $page->vision ?? '' }}
                    </p>
                </div>
            </div>
        </section>
    </form>

    <h1 class="fade-in-unique">Introducing Our Dynamic <span>Team Members</span></h1>

    <div class="tabs">
        <button class="tab active" onclick="showTab('executives')">Executives</button>
        <button class="tab" onclick="showTab('directors')">Directors</button>
    </div>

    <!-- Executives -->
    <div id="executives" class="tab-content active d-flex flex-wrap fade-in-unique" style="gap:20px;">
        @foreach ($members as $member)
            <div class="card team-card-unique">
                <img src="{{ asset($member->photo) }}" alt="{{ $member->name }}" style="width:100%;  object-fit:cover;">
                <div class="name" style="font-weight:bold; margin-top:10px;">
                    {{ $member->name }}
                </div>
                <div class="role" style="color:#555; ">
                    {{ $member->designation }}
                </div>
                <div class="role" style="color:#555;">
                    {{ $member->department_id ? $member->department->name : '' }}
                </div>
            </div>
        @endforeach
    </div>


    <!-- Directors -->
    <div id="directors" class="tab-content fade-in-unique d-flex flex-wrap" style="gap:20px;">
        @foreach ($directors as $director)
            <div class="card team-card-unique">
                <img src="{{ $director->photo ? asset($director->photo) : 'https://via.placeholder.com/300x300' }}"
                    alt="{{ $director->name }}" style="width:100%; object-fit:cover;">
                <div class="name" style="font-weight:bold; margin-top:10px;">
                    {{ $director->name }}
                </div>
                <div class="role" style="color:#555; margin-bottom:10px;">
                    {{ $director->designation }}
                </div>
            </div>
        @endforeach
    </div>


    @if ($interns->count())
        <section class="team-section py-5">
            <div class="container">
                <h2 style="color:#fff; font-weight:700;">Our Interns</h2>
                <div class="members-container">
                    @foreach ($interns as $intern)
                        <div class="member-card">
                            <!-- Circular Image -->
                            <div class="member-img">
                                <img src="{{ $intern->photo ? asset($intern->photo) : 'https://via.placeholder.com/150' }}"
                                    alt="{{ $intern->name }}">
                            </div>
                            <div class="member-info">
                                <h3 style="color:#fff;">{{ $intern->name }}</h3>
                                <p style="color:#ccc;">{{ $intern->designation }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <p class="text-center" style="color:#ccc; font-size:1rem;">No active interns right now.</p>
    @endif

    

    <script>
        // Hero slideshow
        let slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;
        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 4000);

        // Scroll animation
        function revealOnScroll() {
            document.querySelectorAll('.fade-in-unique, .slide-up-unique').forEach(el => {
                let rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight - 50) {
                    el.classList.add('show');
                }
            });
        }
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);

        // Tab switching
        function showTab(id) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tab').forEach(btn => btn.classList.remove('active'));
            document.getElementById(id).classList.add('active');
            event.target.classList.add('active');
        }
    </script>
@endsection
