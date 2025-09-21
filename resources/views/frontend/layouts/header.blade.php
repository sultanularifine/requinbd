<header>
    <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
    <nav id="navbar">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('frontend/logo/logo.png') }}" alt="Requin BD logo">
            </a>
          
        </div>

        <ul class="nav-links" id="navLinks">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>

            <li class="has-dropdown" id="concernItem">
                <button class="dropdown-toggle" aria-expanded="false" aria-controls="concernMenu">
                    Our Concern <span class="dropdown-caret">▾</span>
                </button>
                <ul class="dropdown" id="concernMenu" role="menu" aria-hidden="true">
                    <li><a href="{{ route('requin-it') }}">Requin IT</a></li>
                    <li><a href="{{ route('academy') }}">Requin Academy</a></li>
                    <li><a href="{{ route('home') }}">The Light of Youth</a></li>
                    <li><a href="{{ route('home') }}">Requin Nexus Creation</a></li>
                </ul>
            </li>

            <li><a href="{{ route('articles') }}">Blogs</a></li>
            <li><a href="{{ route('contact') }}">Contact us</a></li>
            <li><a href="{{ route('career') }}" class="join">Join with us</a></li>
            <li>
                <a href="{{ route('executive.dashboard') }}">
                    <i class="ri-login-box-line" style="font-size:1.3rem"></i>
                </a>
            </li>
        </ul>

        <div class="hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false" role="button" tabindex="0">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.querySelector('nav');
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.getElementById('navLinks');
    const concernItem = document.getElementById('concernItem');
    const dropdownToggle = concernItem.querySelector('.dropdown-toggle');
    const concernMenu = document.getElementById('concernMenu');

    // Scroll effect
    window.addEventListener('scroll', () => {
        if(window.scrollY > 50) nav.classList.add('scrolled');
        else nav.classList.remove('scrolled');
    });

    // Hamburger toggle
    const toggleMenu = () => {
        const isActive = navLinks.classList.toggle('active');
        hamburger.classList.toggle('active');
        hamburger.setAttribute('aria-expanded', isActive);
        if(!isActive) concernItem.classList.remove('open');
    }
    hamburger.addEventListener('click', toggleMenu);

    // Dropdown mobile
    dropdownToggle.addEventListener('click', e => {
        if(window.innerWidth <= 768){
            e.preventDefault();
            concernItem.classList.toggle('open');
        }
    });

    // Close menu on outside click
    document.addEventListener('click', e => {
        if(!nav.contains(e.target)){
            navLinks.classList.remove('active');
            hamburger.classList.remove('active');
            concernItem.classList.remove('open');
        }
    });

    // Close menu on window resize >768px
    window.addEventListener('resize', () => {
        if(window.innerWidth > 768){
            navLinks.classList.remove('active');
            hamburger.classList.remove('active');
            concernItem.classList.remove('open');
        }
    });
});
</script>
