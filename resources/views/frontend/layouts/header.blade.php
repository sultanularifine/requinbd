<header>
  <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
  <nav id="header-navbar">
    <div class="header-logo">
      <a href="{{ url('/') }}">
        <img src="{{ $basic && $basic->image ? asset('backend/' . $basic->image) : asset('frontend/logo/logo.png') }}" alt="Requin BD logo">
      </a>
    </div>

    <ul class="header-nav-links" id="headerNavLinks">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>

      <li class="header-has-dropdown" id="headerConcernItem">
        <button class="header-dropdown-toggle" aria-expanded="false" aria-controls="headerConcernMenu">
          Our Concern <span class="header-dropdown-caret">▾</span>
        </button>
        <ul class="header-dropdown" id="headerConcernMenu" role="menu" aria-hidden="true">
          <li><a href="{{ route('requin-it') }}">Requin IT</a></li>
          <li><a href="{{ route('academy') }}">Requin Academy</a></li>
          <li><a href="{{ route('home') }}">The Light of Youth</a></li>
          <li><a href="{{ route('home') }}">Requin Nexus Creation</a></li>
        </ul>
      </li>

      <li><a href="{{ route('articles') }}">Blogs</a></li>
      <li><a href="{{ route('brand.guidelines') }}">Brand</a></li>
      <li><a href="{{ route('contact') }}">Contact us</a></li>
      <li><a href="{{ route('career') }}" class="header-join">Join with us</a></li>
      <li>
        <a href="{{ route('executive.dashboard') }}">
          <i class="ri-login-box-line" style="font-size:1.3rem"></i>
        </a>
      </li>
    </ul>

    <div class="header-hamburger" id="headerHamburger" aria-label="Open menu" aria-expanded="false" role="button" tabindex="0">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const nav = document.querySelector('nav');
  const hamburger = document.getElementById('headerHamburger');
  const navLinks = document.getElementById('headerNavLinks');
  const concernItem = document.getElementById('headerConcernItem');
  const dropdownToggle = concernItem.querySelector('.header-dropdown-toggle');
  const concernMenu = document.getElementById('headerConcernMenu');

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
