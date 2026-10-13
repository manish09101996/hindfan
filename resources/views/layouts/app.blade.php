<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>{{ $metaTitle ?? 'Hindson Industries | Premium Fans & Madhani Since 1980' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Leading manufacturer of heavy-duty Pedestal Fans, Madhani churners, Tent Fans, Wall Mounting Fans, and Cooler Motors in Punjab & North India. ISO 9001:2015 Certified.' }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $metaTitle ?? 'Hindson Industries | Hindfan' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Pioneers in high-performance industrial pedestal fans, tent ventilation, and electric madhani churners since 1980.' }}">
    <meta property="og:image" content="{{ asset('assets/images/banner-1.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Modern Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=2.2">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Hindson Industries - Hindfan",
      "image": "{{ asset('assets/images/logo.png') }}",
      "telephone": "{{ site_setting('contact_phone_1', '+91-92162-07097') }}",
      "email": "{{ site_setting('contact_email', 'info@hindfan.com') }}",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Near Gaushala, Phul Road",
        "addressLocality": "Rampura Phul",
        "addressRegion": "Punjab",
        "postalCode": "151103",
        "addressCountry": "IN"
      },
      "url": "http://hindfan.com",
      "priceRange": "₹₹",
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "08:00",
        "closes": "19:00"
      }
    }
    </script>
</head>
<body>

    <!-- Topbar -->
    <div class="topbar-modern d-none d-md-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    @if(site_setting('contact_phone_1'))
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_1')) }}" class="d-inline-flex align-items-center gap-2">
                            <i class="fa fa-phone text-warning"></i> {{ site_setting('contact_phone_1') }}
                        </a>
                    @endif
                    @if(site_setting('contact_email'))
                        <a href="mailto:{{ site_setting('contact_email') }}" class="d-inline-flex align-items-center gap-2">
                            <i class="fa fa-envelope text-white-50"></i> {{ site_setting('contact_email') }}
                        </a>
                    @endif
                    <span class="topbar-badge">
                        <i class="fa fa-check-circle"></i> ISO 9001:2015 Certified
                    </span>
                    <span class="topbar-badge text-white border-white-50">
                        <i class="fa fa-shield-halved text-warning"></i> Punjab Govt. Approved Quality
                    </span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if(site_setting('social_facebook'))
                        <a href="{{ site_setting('social_facebook') }}" target="_blank" rel="noopener" title="Facebook" class="text-secondary-emphasis hover-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    @if(site_setting('social_twitter'))
                        <a href="{{ site_setting('social_twitter') }}" target="_blank" rel="noopener" title="Twitter" class="text-secondary-emphasis hover-white">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    @endif
                    @if(site_setting('social_instagram'))
                        <a href="{{ site_setting('social_instagram') }}" target="_blank" rel="noopener" title="Instagram" class="text-secondary-emphasis hover-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    @if(site_setting('social_youtube'))
                        <a href="{{ site_setting('social_youtube') }}" target="_blank" rel="noopener" title="YouTube" class="text-secondary-emphasis hover-white">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif
                    @if(site_setting('social_linkedin'))
                        <a href="{{ site_setting('social_linkedin') }}" target="_blank" rel="noopener" title="LinkedIn" class="text-secondary-emphasis hover-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-modern">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Hindfan - Hindson Industries" class="navbar-brand-img" style="height: 48px; max-height: 48px; width: auto; object-fit: contain;" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/logo.png';">
                <div class="d-none d-sm-block">
                    <div class="fw-bold text-dark lh-1" style="font-size: 1.15rem; letter-spacing: -0.02em;">HINDSON INDUSTRIES</div>
                    <small class="text-primary fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.08em;">PREMIUM FANS & MADHANI SINCE 1980</small>
                </div>
            </a>

            <button class="navbar-toggler border-0 shadow-none p-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarMenu" aria-controls="mainNavbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars fs-4 text-dark"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbarMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ request()->routeIs('services') || request()->routeIs('products') ? 'active' : '' }}" href="{{ route('services') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ request()->routeIs('portfolio*') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ request()->routeIs('brochure') ? 'active' : '' }}" href="{{ route('brochure') }}">Brochure</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="{{ route('contact') }}" class="btn-modern btn-primary-modern btn-sm-modern">
                            <i class="fa fa-paper-plane"></i> Request a Quote
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Global Flash Feedback Notifications -->
    <div class="container pt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                <i class="fa fa-check-circle fs-5"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert">
                <i class="fa fa-circle-exclamation fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="fw-bold mb-1"><i class="fa fa-triangle-exclamation me-1"></i> Please check the following issues:</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Main Content Slot -->
    <main>
        @yield('content')
    </main>

    <!-- Global Inquiry Banner Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="cta-banner" style="background: linear-gradient(135deg, #8F1024 0%, #C8102E 100%) !important; color: #ffffff !important; border-radius: 20px; padding: 50px 35px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);">
                <div class="cta-banner-pattern"></div>
                <div class="row align-items-center position-relative">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <span class="badge bg-white text-danger fw-bold text-uppercase px-3 py-2 rounded-pill mb-3" style="color: #8F1024 !important;">Direct Factory Supply</span>
                        <h2 class="display-6 fw-bold text-white mb-2">Need Bulk Industrial Ventilation or Custom Madhani Churners?</h2>
                        <p class="text-white-50 fs-5 mb-0">Speak directly with our engineering team for dealership inquiries, wholesale pricing, and custom requirements.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <div class="d-flex flex-column flex-sm-row flex-lg-column gap-3 justify-content-lg-end">
                            <a href="{{ route('contact') }}" class="btn-modern btn-white-modern btn-lg-modern">
                                <i class="fa fa-bolt text-danger"></i> Get Instant Factory Quote
                            </a>
                            @if(site_setting('contact_phone_1'))
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_1')) }}" class="btn-modern btn-outline-modern text-white border-white">
                                    <i class="fa fa-phone"></i> Call {{ site_setting('contact_phone_1') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-modern">
        <div class="container">
            <div class="row g-4">
                <!-- Column 1: Company Profile -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Hindfan Logo" style="height: 48px; filter: brightness(1.15);" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/logo.png';">
                        <div>
                            <h4 class="footer-brand-title mb-0 text-white">HINDSON INDUSTRIES</h4>
                            <small class="text-white-50 fw-semibold" style="font-size: 0.72rem; letter-spacing: 0.08em; text-transform: uppercase;">Household &amp; Industrial Fans</small>
                        </div>
                    </div>
                    <p class="footer-desc mb-4">
                        India's trusted manufacturer of heavy-duty Pedestal Fans, Madhani churners, Tent Fans, and precision Cooler Motors since 1980 under the pioneering brand <strong>HIND</strong>.
                    </p>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="footer-badge"><i class="fa fa-certificate text-danger"></i> ISO 9001:2015</span>
                        <span class="footer-badge"><i class="fa fa-shield-halved text-danger"></i> Punjab Govt. Quality</span>
                        <span class="footer-badge"><i class="fa fa-award text-danger"></i> 40+ Years</span>
                    </div>

                    @php
                        $hasSocials = site_setting('social_facebook') || site_setting('social_youtube') || site_setting('social_instagram') || site_setting('social_linkedin') || site_setting('social_twitter') || site_setting('social_whatsapp');
                    @endphp
                    @if($hasSocials)
                        <div class="d-flex align-items-center gap-2">
                            @if(site_setting('social_facebook'))
                                <a href="{{ site_setting('social_facebook') }}" target="_blank" rel="noopener" class="footer-social-icon" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(site_setting('social_youtube'))
                                <a href="{{ site_setting('social_youtube') }}" target="_blank" rel="noopener" class="footer-social-icon" title="YouTube"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(site_setting('social_instagram'))
                                <a href="{{ site_setting('social_instagram') }}" target="_blank" rel="noopener" class="footer-social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if(site_setting('social_linkedin'))
                                <a href="{{ site_setting('social_linkedin') }}" target="_blank" rel="noopener" class="footer-social-icon" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(site_setting('social_twitter'))
                                <a href="{{ site_setting('social_twitter') }}" target="_blank" rel="noopener" class="footer-social-icon" title="Twitter"><i class="fab fa-x-twitter"></i></a>
                            @endif
                            @if(site_setting('social_whatsapp'))
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', site_setting('social_whatsapp')) }}" target="_blank" rel="noopener" class="footer-social-icon" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            @endif
                        </div>
                    @endif
                </div>

                <!-- Column 2: Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-links-title">Quick Links</h5>
                    <ul class="footer-links-list">
                        <li><a href="{{ route('home') }}"><i class="fa fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fa fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('services') }}"><i class="fa fa-chevron-right"></i> Products</a></li>
                        <li><a href="{{ route('portfolio') }}"><i class="fa fa-chevron-right"></i> Portfolio</a></li>
                        <li><a href="{{ route('brochure') }}"><i class="fa fa-chevron-right"></i> Brochure</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fa fa-chevron-right"></i> Contact Us</a></li>
                    </ul>
                </div>

                <!-- Column 3: Product Categories -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-links-title">Product Lines</h5>
                    <ul class="footer-links-list">
                        <li><a href="{{ route('portfolio', ['category' => 'pedestal-fans']) }}"><i class="fa fa-chevron-right"></i> Pedestal Fans (CHIDHI 21")</a></li>
                        <li><a href="{{ route('portfolio', ['category' => 'madhani-churners']) }}"><i class="fa fa-chevron-right"></i> Madhani Churners (3-80 KG)</a></li>
                        <li><a href="{{ route('portfolio', ['category' => 'tent-event-fans']) }}"><i class="fa fa-chevron-right"></i> Tent &amp; Clump Fans</a></li>
                        <li><a href="{{ route('portfolio', ['category' => 'wall-mounting-fans']) }}"><i class="fa fa-chevron-right"></i> Wall &amp; Bracket Fans</a></li>
                        <li><a href="{{ route('portfolio', ['category' => 'water-mist-fans']) }}"><i class="fa fa-chevron-right"></i> Water Mist Cooling Fans</a></li>
                        <li><a href="{{ route('portfolio', ['category' => 'cooler-motors']) }}"><i class="fa fa-chevron-right"></i> 110 Dia Cooler Motors</a></li>
                    </ul>
                </div>

                <!-- Column 4: Factory Contact Info -->
                @php
                    $hasContact = site_setting('contact_address') || site_setting('contact_phone_1') || site_setting('contact_phone_2') || site_setting('contact_email') || site_setting('working_hours');
                @endphp
                @if($hasContact)
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-links-title">Factory &amp; Office</h5>
                    <ul class="footer-links-list">
                        @if(site_setting('contact_address'))
                            <li class="footer-contact-item">
                                <i class="fa fa-map-location-dot"></i>
                                <span>{{ site_setting('contact_address') }}</span>
                            </li>
                        @endif
                        @if(site_setting('contact_phone_1'))
                            <li class="footer-contact-item">
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_1')) }}">
                                    {{ site_setting('contact_phone_1') }}
                                    @if(site_setting('contact_phone_1_label'))
                                        ({{ site_setting('contact_phone_1_label') }})
                                    @endif
                                </a>
                            </li>
                        @endif
                        @if(site_setting('contact_phone_2'))
                            <li class="footer-contact-item">
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_2')) }}">
                                    {{ site_setting('contact_phone_2') }}
                                    @if(site_setting('contact_phone_2_label'))
                                        ({{ site_setting('contact_phone_2_label') }})
                                    @endif
                                </a>
                            </li>
                        @endif
                        @if(site_setting('contact_email'))
                            <li class="footer-contact-item">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ site_setting('contact_email') }}">{{ site_setting('contact_email') }}</a>
                            </li>
                        @endif
                        @if(site_setting('working_hours'))
                            <li class="footer-contact-item">
                                <i class="fa fa-clock"></i>
                                <span>{{ site_setting('working_hours') }}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                @endif
            </div>

            <!-- Footer Bottom: Copyright -->
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div>
                    &copy; {{ date('Y') }} <strong>Hindson Industries</strong>. All Rights Reserved.
                </div>
                <div class="text-light opacity-75">
                    Pioneers in Fans &amp; Madhani Since 1980
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3.3 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
