@extends('frontend.layouts.app')

@section('title', 'Articles - Requin BD')
@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.contact.css') }}">
    <style>
      /* ================= Animations ================= */
      @keyframes raFadeSlide {
        from {
          opacity: 0;
          transform: translateY(40px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .anim-fade-slide {
        opacity: 0;
        animation: raFadeSlide 1s ease-out forwards;
      }

      /* delay utility */
      .anim-delay-1 { animation-delay: 0.2s; }
      .anim-delay-2 { animation-delay: 0.4s; }
      .anim-delay-3 { animation-delay: 0.6s; }
      .anim-delay-4 { animation-delay: 0.8s; }
      .anim-delay-5 { animation-delay: 1s; }
    </style>
@endpush
@section('meta_description', 'Custom IT services for startups & SMBs.')

@push('styles')
@endpush

@section('content')

    <!-- ================= Contact Page ================= -->
    <section class="ra-section ra-dark anim-fade-slide" id="contact">
        <div class="ra-container">
            <div class="ra-section-header anim-fade-slide anim-delay-1">
                <div class="ra-eyebrow">Get in Touch</div>
                <h2 class="ra-h2">Contact Us</h2>
                <p class="ra-lead">Reach out to us for projects, services, or any other inquiries.।</p>
            </div>

            <div class="ra-grid contact-grid">
                <!-- Contact Form -->
                <div class="ra-card ra-contact-form anim-fade-slide anim-delay-2">
                    <h3 class="ra-h3">Send us a Message</h3>
                    <form>
                        <input type="text" placeholder="Your Name" required>
                        <input type="email" placeholder="Your Email" required>
                        <input type="text" placeholder="Subject">
                        <textarea rows="5" placeholder="Your Message" required></textarea>
                        <button type="submit" class="ra-btn">Send Message</button>
                    </form>
                </div>

                <!-- Contact Info + Map -->
                <div class="ra-card ra-contact-info anim-fade-slide anim-delay-3">
                    <h3 class="ra-h3">Contact Information</h3>
                    <p>📍 Nirala, Khulna, Bangladesh</p>
                    <p>📧 requinbd.info@gmail.com</p>
                    <p>📞 +880 1911 210 343</p>

                    <h3 class="ra-h3 mt-4">Find us on Map</h3>
                    <div class="ra-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29425.003191730928!2d89.51744881083984!3d22.797816900000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff8f8e00d83ec3%3A0xe64cc39b87f407f!2sNirala%20Park!5e0!3m2!1sen!2sbd!4v1756755580281!5m2!1sen!2sbd"
                            width="100%" height="300" style="border:0; border-radius:12px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>

            <!-- Extra Sections -->
            <div class="ra-grid extra-grid">
                <!-- Working Hours -->
                <div class="ra-card anim-fade-slide anim-delay-2">
                    <h3 class="ra-h3">Working Hours</h3>
                    <ul>
                        <li>🕘 Sat - Thu: 24 Hours</li>
                        <li>❌ Friday: Closed</li>
                    </ul>
                </div>

                <!-- Quick Contact -->
                <div class="ra-card anim-fade-slide anim-delay-3">
                    <h3 class="ra-h3">Quick Contact</h3>
                    <a href="tel:+8801911210343" class="ra-btn">📞 Call Now</a>
                    <a href="https://wa.me/+8801911210343" class="ra-btn">💬 WhatsApp</a>
                </div>

                <!-- FAQ -->
                <div class="ra-card anim-fade-slide anim-delay-4">
                    <h3 class="ra-h3">FAQ</h3>
                    <details>
                        <summary>How long will it take to get a reply?</summary>
                        <p>Usually within 24 hours.</p>
                    </details>
                    <details>
                        <summary>Do you offer international projects?</summary>
                        <p>Yes, we work with clients worldwide.</p>
                    </details>
                </div>
            </div>
        </div>
    </section>

    <script>
      // 👉 Animate on scroll
      const animItems = document.querySelectorAll('.anim-fade-slide');
      const onScrollAnim = () => {
        const triggerBottom = window.innerHeight * 0.9;
        animItems.forEach(item => {
          const boxTop = item.getBoundingClientRect().top;
          if (boxTop < triggerBottom) {
            item.style.opacity = "1";
            item.style.animationPlayState = "running";
          }
        });
      };
      window.addEventListener('scroll', onScrollAnim);
      window.addEventListener('load', onScrollAnim);
    </script>

@endsection
