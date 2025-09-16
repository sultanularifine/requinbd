<header>
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
    <div class="container nav">
        <!-- Brand -->
        <a href="{{ url('/') }}" class="brand">
            <img src="{{ asset('frontend/logo/logo.png') }}" alt="Logo" width="80px">
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="menu-toggle btn secondary" aria-label="Toggle Menu">
            <i class="ri-menu-3-line"></i>
        </button>

        <!-- Navigation Menu -->
        <ul id="menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>

            <!-- Dropdown -->
            <li class="nav-dropdown">
                <a href="#" class="nav-dropdown-toggle">Our Concern ▾</a>
                <ul class="nav-submenu">
                    <li><a href="{{ route('requin-it') }}">Requin IT</a></li>
                    <li><a href="{{ route('academy') }}">Academy</a></li>
                </ul>
            </li>

            <li><a href="{{ route('articles') }}">Blogs</a></li>
            <li><a href="{{ route('contact') }}">Contact us</a></li>
            <li>
                <a href="{{ route('career') }}" class="btn" style="padding:.6rem 1rem">Join with us</a>
            </li>
            <li>
                <a href="{{ route('executive.dashboard') }}">
                    <i class="ri-login-box-line" style="font-size:1.3rem"></i>
                </a>
            </li>
        </ul>
    </div>
</header>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const btn = document.querySelector('.menu-toggle');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', () => menu.classList.toggle('open'));

    // Close mobile menu when a link is clicked
    menu.querySelectorAll('a').forEach(a =>
        a.addEventListener('click', () => menu.classList.remove('open'))
    );

    // Dropdown Toggle (Mobile)
    const toggles = document.querySelectorAll('.nav-dropdown-toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            this.parentElement.classList.toggle('open');
        });
    });

    // Dynamic year for footer
    const yearEl = document.getElementById('year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();
});
</script>
