<footer>
    <link rel="stylesheet" href="{{ asset('frontend/css/footer.css') }}">
    <div class="container section" style="padding-bottom:0px">
        <div class="footer-grid">
            <div>
                <div class="brand">
                    <span class="logo">
                        <img src="{{ $basic && $basic->image ? asset('backend/' . $basic->image) : asset('frontend/logo/logo.png') }}" alt="logo">
                    </span>
                    
                </div>
                <p class="muted" style="margin:.75rem 0 0">
                    {{ $basic->site_tagline ?? 'Youth-led social & skill development organization from Bangladesh...' }}
                </p>
                <div class="socials">
                    @if($basic)
                        @if($basic->facebook)<a href="{{ $basic->facebook }}" aria-label="Facebook"><i class="ri-facebook-line"></i></a>@endif
                        @if($basic->instagram)<a href="{{ $basic->instagram }}" aria-label="Instagram"><i class="ri-instagram-line"></i></a>@endif
                        @if($basic->twitter)<a href="{{ $basic->twitter }}" aria-label="Linkedin"><i class="ri-linkedin-line"></i></a>@endif
                        
                        
                    @endif
                </div>
            </div>

            <div>
                <h5>About</h5>
                <ul>
                    <li><a href="{{ route('about') }}">Company</a></li>
                    <li><a href="{{ route('requin-it') }}">Services</a></li>
                    <li><a href="{{ route('articles') }}">Blogs</a></li>
                </ul>
            </div>

            <div>
                <h5>Support</h5>
                <ul>
                    <li><a href="{{ route('contact') }}">Help Center</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
            </div>

            <div>
                <h5>Contact Us</h5>
                <ul>
                    <li class="muted">{{ $basic->address ?? 'Nirala, Khulna, Bangladesh' }}</li>
                    <li><a href="mailto:{{ $basic->email ?? 'requinbd.info@gmail.com' }}">{{ $basic->email ?? 'requinbd.info@gmail.com' }}</a></li>
                    <li><a href="tel:{{ $basic->phone ?? '+880 1911 210 343' }}">{{ $basic->phone ?? '+880 1911 210 343' }}</a></li>
                </ul>
            </div>
        </div>
<div class="copyright" style="background-color:#0b1020; color:#ccc; font-size:14px; text-align:center; padding:15px 0;">
    © <span id="year"></span> 
    <a href="{{ route('home') }}" style="color:#5b86ff; text-decoration:none;">{{ $basic->site_title ?? 'Requin BD' }}</a>. 
    All rights reserved. 
    <small> Developed by 
        <a href="https://www.linkedin.com/in/sultanularifine" target="_blank" rel="noopener" style="color:#5b86ff; text-decoration:none;">
            Sultanul Arifine
        </a>
    </small>
</div>

    </div>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>
