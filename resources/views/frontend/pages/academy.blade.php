@extends('frontend.layouts.app')

@section('title', 'Academy - Requin BD')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.academy.css') }}">
     <!-- Add Animate.css for nice animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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

        .anim-delay-1 {
            transition-delay: .2s;
        }

        .anim-delay-2 {
            transition-delay: .4s;
        }

        .anim-delay-3 {
            transition-delay: .6s;
        }
        .ra-hero-img {
    max-width: 90%;
    height: auto;
    display: block;
    margin: 0 auto;
    padding: 20px;
    border-radius: 12px; /* optional */
}

.ra-hero-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 20px;
}

@media (max-width: 768px) {
    .ra-hero-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .ra-hero-art {
        order: -1; /* optional: moves image above text on mobile */
       
    }
}

    </style>
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@section('content')

    <main class="ra">
        <section class="ra-section">
            <div class="ra-container anim-fade-up">
                <div class="ra-eyebrow">Intern Certificate</div>
                <h2 class="ra-h2">Verify</h2>

                {{-- Dynamic Message --}}
                @if (session('success'))
                    <div class="alert alert-success text-center animate__animated animate__fadeInDown">
                        🎉 <strong>Congratulations!</strong> Your certificate has been verified successfully.
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger text-center animate__animated animate__shakeX">
                        ❌ <strong>Oops!</strong> Certificate not found. Please check your ID and try again.
                    </div>
                @endif

                {{-- Verify Form --}}
                <form action="{{ route('certificate.verification.verify') }}" method="POST"
                    class="ra-verify anim-fade-in anim-delay-1">
                    @csrf
                    <input type="text" name="certificate_no" id="certificate_no" class="ra-input"
                        placeholder="Enter Certificate ID" required>
                    <button type="submit" class="ra-btn">Verify</button>
                </form>
            </div>
        </section>

        <!-- HERO -->
        <section class="ra-section ra-hero">
            <div class="ra-container ra-hero-grid">
                <div class="anim-fade-up">
                    <div class="ra-eyebrow">{{ $hero->eyebrow ?? 'Requin Academy' }}</div>
                    <h1 class="ra-h1">{{ $hero->title ?? 'Learn, Build, and Grow Your Career' }}</h1>
                    <p class="ra-lead">
                        {{ $hero->subtitle ?? 'Industry-oriented courses, paid internships, live sessions, and verifiable certificates — all in one place.' }}
                    </p>

                    <div class="ra-hero-badges anim-fade-in anim-delay-1">
                        @if (!empty($hero->badges))
                            @foreach (json_decode($hero->badges, true) as $badge)
                                <span class="ra-hero-badge">{{ $badge }}</span>
                            @endforeach
                        @endif
                    </div>

                    <div style="margin-top:16px; display:flex; gap:10px; flex-wrap:wrap;" class="anim-fade-in anim-delay-2">
                        <a href="#courses" class="ra-btn">{{ $hero->btn_primary ?? 'View Courses' }}</a>
                        <a href="#apply" class="ra-btn secondary">{{ $hero->btn_secondary ?? 'Apply Now' }}</a>
                    </div>
                </div>

            <div class="ra-hero-art ra-card anim-zoom-in anim-delay-2">
    @if (!empty($hero->hero_image) && file_exists(public_path($hero->hero_image)))
        <img src="{{ asset($hero->hero_image) }}" alt="Hero Image" class="ra-hero-img">
    @else
        <img src="{{ asset('frontend/images/default-hero.jpg') }}" alt="Default Hero" class="ra-hero-img">
    @endif
</div>

            </div>
        </section>

        <!-- COURSES -->
        <section id="courses" class="ra-section">
            <div class="ra-container anim-fade-up">
                <div class="ra-eyebrow">Courses</div>
                <h2 class="ra-h2">Top Industry-Aligned Courses</h2>
                <input id="courseSearch" type="search" class="ra-search" placeholder="Search courses…" />
                <div id="courseGrid" class="ra-grid" style="margin-top:20px;">
                    @foreach ($courses as $course)
                        <article class="ra-card ra-course-card anim-zoom-in" data-title="{{ $course->tags }}">
                            <div class="ra-course-head">
                                <div class="ra-course-icon">{{ $course->icon }}</div>
                                <div>
                                    <h3>{{ $course->title }}</h3>
                                    <p class="ra-lead">{{ $course->description }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- INTERNSHIPS -->
        <section id="internships" class="ra-section">
    <div class="ra-container anim-fade-up">
        <div class="ra-section-header">
            <div class="ra-eyebrow">Internships</div>
            <h2 class="ra-h2">Internship Opportunities</h2>
            <p class="ra-lead">Selected students after completing our courses will get the chance to work on real client projects.</p>
        </div>

        <div class="ra-grid">
            @foreach($internships as $internship)
                <article class="ra-card ra-course-card anim-zoom-in">
                    <div class="ra-course-head">
                        <div class="ra-course-icon">{{ $internship->icon ?? '💼' }}</div>
                        <div class="ra-stack-s">
                            <strong>{{ $internship->title }}</strong>
                            <span class="ra-muted">Duration: {{ $internship->duration ?? '-' }}</span>
                        </div>
                    </div>
                    <p>{{ $internship->description ?? '-' }}</p>
                    <div class="ra-tags">
                        @if($internship->stipend)
                            <span class="ra-tag">Stipend: {{ $internship->stipend }}</span>
                        @endif
                        <span class="ra-tag">{{ $internship->mode ?? 'Remote' }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>


        <!-- SESSIONS -->
       <section id="sessions" class="ra-section">
    <div class="ra-container anim-fade-up">
        <div class="ra-section-header">
            <div class="ra-eyebrow">Sessions</div>
            <h2 class="ra-h2">Live Sessions & Workshops</h2>
            <p class="ra-lead">Live Q&A and practical workshops with industry experts.</p>
        </div>

        <div class="ra-grid">
            @foreach($sessions as $session)
                <article class="ra-card ra-course-card anim-zoom-in {{ $loop->index % 2 ? 'anim-delay-1' : '' }}">
                    <div class="ra-course-head">
                        <div class="ra-course-icon">{{ $session->icon ?? '🧑‍🏫' }}</div>
                        <div class="ra-stack-s">
                            <strong>{{ $session->title }}</strong>
                            <span class="ra-muted">{{ \Carbon\Carbon::parse($session->date)->format('d M, Y') }}</span>
                        </div>
                    </div>
                    <p>{{ $session->description }}</p>
                    <div class="ra-tags">
                        <span class="ra-tag">{{ $session->mode }}</span>
                        <span class="ra-tag">{{ $session->platform }}</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

    </main>
   
    <script>
        // Reveal Animations on Scroll
        const animEls = document.querySelectorAll('.anim-fade-up, .anim-fade-in, .anim-zoom-in');
        const animObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('anim-visible');
                }
            });
        }, {
            threshold: 0.1
        });

        animEls.forEach(el => animObserver.observe(el));

        // Course Search
        document.getElementById("courseSearch").addEventListener("input", function() {
            let q = this.value.toLowerCase();
            document.querySelectorAll("#courseGrid .ra-course-card").forEach(card => {
                card.style.display = card.dataset.title.includes(q) ? "block" : "none";
            });
        });
    </script>
@endsection
