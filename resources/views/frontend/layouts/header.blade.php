<header>
      <link rel="stylesheet" href="{{ asset('frontend/css/header.css') }}">
  <div class="container nav">
    <a href="{{ url('/') }}" class="brand">
      <img src="{{ asset('frontend/logo/logo.png') }}" alt="Logo" width="80px">
    </a>

    <button class="menu-toggle btn secondary" aria-label="Toggle Menu">
      <i class="ri-menu-3-line"></i>
    </button>

    <ul id="menu">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>

      <!-- Dropdown -->
      <li class="nav-dropdown">
        <a href="#" class="nav-dropdown-toggle">Our Concern ▾</a>
        <ul class="nav-submenu">
          <li><a href="{{ route('services') }}">Requin IT</a></li>
          <li><a href="{{ route('academy') }}">Academy</a></li>
        </ul>
      </li>
      <!-- End Dropdown -->

      <li><a href="{{ route('articles') }}">Articles</a></li>
      <li><a href="{{ route('career') }}">Career</a></li>
      <li><a href="{{ route('contact') }}" class="btn" style="padding:.6rem 1rem">Get in touch</a></li>
      <li>
        <a href="{{ route('login') }}">
          <i class="ri-login-box-line" style="font-size:1.3rem"></i>
        </a>
      </li>
    </ul>
  </div>
</header>
