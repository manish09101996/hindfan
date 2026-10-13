@extends('layouts.app')

@section('content')
    <!-- 1. Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>
        <div class="container position-relative">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="hero-badge">
                        <i class="fa fa-award"></i>
                        <span>Trusted Since 1980</span>
                    </div>
                    <h1 class="hero-title text-dark">
                        Engineered for Power.<br>
                        <span class="text-brand-red">Built for Generations.</span>
                    </h1>
                    <p class="hero-subtitle text-muted">
                        Hindson Industries pioneers industrial pedestal fans, high-velocity horizontal circulators, and electrical Madhani churners since 1980. Crafted with 100% pure copper and heavy-duty double ball bearings for unmatched performance.
                    </p>
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        <a href="{{ route('portfolio') }}" class="btn-modern btn-primary-modern btn-lg-modern">
                            View Our Products <i class="fa fa-arrow-right ms-1"></i>
                        </a>
                        <a href="{{ route('contact') }}" class="btn-modern btn-dark-modern btn-lg-modern">
                            <i class="fa fa-paper-plane me-1"></i> Request a Quote
                        </a>
                        <a href="{{ route('brochure') }}" class="btn-modern btn-outline-dark-modern btn-lg-modern">
                            <i class="fa fa-download me-1"></i> Download Brochure
                        </a>
                    </div>

                    <!-- Industrial Key Stats (4 columns matching mockup) -->
                    <div class="hero-stats">
                        <div class="row g-3">
                            <div class="col-6 col-sm-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="p-2 rounded-circle bg-danger-subtle text-danger"><i class="fa fa-award fs-5"></i></div>
                                    <div>
                                        <div class="hero-stat-number text-dark">40+</div>
                                        <div class="hero-stat-label">Years of Expertise</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="p-2 rounded-circle bg-danger-subtle text-danger"><i class="fa fa-bolt fs-5"></i></div>
                                    <div>
                                        <div class="hero-stat-number text-dark">100%</div>
                                        <div class="hero-stat-label">Pure Copper Motors</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="p-2 rounded-circle bg-danger-subtle text-danger"><i class="fa fa-fan fs-5"></i></div>
                                    <div>
                                        <div class="hero-stat-number text-dark">{{ $totalProjectsCount }}+</div>
                                        <div class="hero-stat-label">Engineered Models</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="p-2 rounded-circle bg-danger-subtle text-danger"><i class="fa fa-shield-halved fs-5"></i></div>
                                    <div>
                                        <div class="hero-stat-number text-dark">Trusted</div>
                                        <div class="hero-stat-label">Across India</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-showcase-container">
                        <div class="hero-fan-backdrop"></div>
                        <img src="{{ asset('assets/images/products/pedestal_fan_26.jpg') }}" alt="Hindfan 26 Inch Industrial Pedestal Fan" class="hero-fan-img" onerror="this.onerror=null; this.src='{{ asset('assets/images/products/pedestal_fan_chidhi.jpg') }}';">
                        
                        <!-- Calligraphy script accent matching reference mockup -->
                        <div class="hero-script-tag d-none d-sm-block">
                            Reliable Performance
                            <span class="script-accent">Since 1980</span>
                        </div>

                        <!-- Brand Authenticity Badge -->
                        <div class="hero-floating-badge-clean">
                            <div class="bg-primary text-white p-2 rounded-circle">
                                <i class="fa fa-shield-halved fs-5"></i>
                            </div>
                            <div>
                                <div class="text-dark fw-bold small">Original Brand HIND</div>
                                <div class="text-muted" style="font-size: 0.72rem;">Double Ball Bearings • Pure Copper</div>
                            </div>
                            <span class="badge bg-danger ms-2">PIONEER</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. About Company & Founders Section -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <span class="section-tag">
                        <i class="fa fa-industry"></i> About Hindson Industries
                    </span>
                    <h2 class="section-title">
                        Four Decades of Unmatched <br>
                        <span class="text-gradient">Manufacturing Leadership</span>
                    </h2>
                    <p class="lead text-secondary fw-semibold mb-3">
                        We started as a modest unit manufacturing Table Fans and Madhani in 1980 under the trusted brand name <strong>HIND</strong>.
                    </p>
                    <p class="text-muted mb-4">
                        The landmark turning point arrived in 1985 when we introduced high-velocity <em>Fratta Fans</em> (also popularly called Toffan and Helicopter fans). Today, Hindson Industries is an acknowledged pioneer across North India and an exporter of heavy-duty ventilation used in wedding functions, pandals, dairy farms, and factories.
                    </p>

                    <!-- Authentic Notice / Savdhaan Box from Original Hindfan.com -->
                    <div class="hindfan-warning-box mb-4">
                        <div class="hindfan-warning-title">
                            <i class="fa fa-triangle-exclamation"></i> सावधान ! ग्राहक चेतावनी (Consumer Advisory)
                        </div>
                        <p class="hindfan-warning-text mb-0">
                            प्रिय ग्राहक, कंपनी ने कड़े परिश्रम के पश्चात अपना और अपने उत्पाद का नाम बनाया है। कुछ उत्पादक व दुकानदार हमारे ब्रांड से मिलते-जुलते नामों से नकली उत्पाद बना व बेच रहे हैं। कृपया कोई भी उत्पाद खरीदने से पहले मोटर और वारंटी कार्ड पर कंपनी के मालिक <strong>श्री अशोक कुमार बंसल</strong> और उनके सुपुत्र <strong>श्री विशाल बंसल</strong> की फोटो अवश्य देख लें। धन्यवाद।
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-4 pt-2">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('assets/images/mark_cer.png') }}" alt="Punjab Govt Approved Quality" style="height: 60px;" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/mark_cer.png';">
                            <div>
                                <div class="fw-bold text-dark">Approved Quality</div>
                                <small class="text-muted">By Punjab Government</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 bg-primary-light text-primary rounded-circle">
                                <i class="fa fa-certificate fs-3"></i>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">ISO 9001:2015</div>
                                <small class="text-muted">Certified Production Systems</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Founders Profiles -->
                <div class="col-lg-5">
                    <div class="row g-4">
                        <div class="col-12 col-sm-6">
                            <div class="founder-card shadow-sm h-100">
                                <div class="founder-avatar-wrapper">
                                    <img src="{{ asset('assets/images/team/ashok.jpg') }}" alt="Shri Ashok Hind - Founder" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/team/ashok.jpg';">
                                </div>
                                <h4 class="founder-name">Ashok Hind</h4>
                                <div class="founder-role">Founder &amp; Managing Director</div>
                                <small class="text-muted d-block">Pioneering HIND brand since 1980</small>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="founder-card shadow-sm h-100">
                                <div class="founder-avatar-wrapper">
                                    <img src="{{ asset('assets/images/team/vishal.jpg') }}" alt="Shri Vishal Hind - Director" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/team/vishal.jpg';">
                                </div>
                                <h4 class="founder-name">Vishal Hind</h4>
                                <div class="founder-role">Director &amp; Operations Head</div>
                                <small class="text-muted d-block">Modernizing production &amp; dispatch</small>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('about') }}" class="btn-modern btn-outline-modern">
                            Read Full Company Story <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Services / Manufacturing Divisions Section -->
    <section class="py-5 bg-light">
        <div class="container py-lg-4">
            <div class="text-center mb-5">
                <span class="section-tag">
                    <i class="fa fa-layer-group"></i> Manufacturing Specializations
                </span>
                <h2 class="section-title">Our Core Product Divisions</h2>
                <p class="section-desc">
                    Precision electrical machinery crafted for rigorous duty cycles, optimal airflow velocity, and high thermal endurance.
                </p>
            </div>

            <div class="row g-4">
                <!-- Service 1: Pedestal Fans -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-feature-card">
                        <div class="service-icon-box">
                            <i class="fa fa-fan"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Heavy Duty Pedestal Fans</h4>
                        <p class="text-muted mb-3 flex-grow-1">
                            Flagship CHIDHI 21", DABBI 21", and 26" models with 1400 RPM double-bearing copper motors and dynamically balanced aluminium aerodynamic blades.
                        </p>
                        <div class="border-top pt-3 mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'pedestal-fans']) }}" class="fw-bold text-primary text-decoration-none">
                                View Pedestal Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 2: Madhani Churners -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-feature-card">
                        <div class="service-icon-box">
                            <i class="fa fa-blender"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Electrical Madhani Churners</h4>
                        <p class="text-muted mb-3 flex-grow-1">
                            India's leading milk and curd churner range from 3-5 kg domestic ELEGANT to 70-80 kg commercial MAJESTIC with high-torque copper motors.
                        </p>
                        <div class="border-top pt-3 mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'madhani-churners']) }}" class="fw-bold text-primary text-decoration-none">
                                View Madhani Models <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Tent Fans -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-feature-card">
                        <div class="service-icon-box">
                            <i class="fa fa-tent"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Tent &amp; Event Clump Fans</h4>
                        <p class="text-muted mb-3 flex-grow-1">
                            Specialized 21" and 26" high-velocity fans with robust pipe mounting clamps and 4 kg protective grills engineered for wedding pandals and poultry sheds.
                        </p>
                        <div class="border-top pt-3 mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'tent-event-fans']) }}" class="fw-bold text-primary text-decoration-none">
                                View Tent Fans <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 4: Wall Mounting Fans -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-feature-card">
                        <div class="service-icon-box">
                            <i class="fa fa-arrows-to-dot"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Industrial Wall &amp; Bracket Fans</h4>
                        <p class="text-muted mb-3 flex-grow-1">
                            Available in 21", 23", 26", and 30" sweeps with wide oscillation coverage and heavy-gauge mounting brackets for factories and workshops.
                        </p>
                        <div class="border-top pt-3 mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'wall-mounting-fans']) }}" class="fw-bold text-primary text-decoration-none">
                                View Wall Fans <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 5: Water Mist Fans -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-feature-card">
                        <div class="service-icon-box">
                            <i class="fa fa-droplet"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Commercial Water Mist Fans</h4>
                        <p class="text-muted mb-3 flex-grow-1">
                            26-inch outdoor misting fans with 45 Liter water tanks and centrifugal non-clog misting discs, dropping ambient temperatures by up to 8°C.
                        </p>
                        <div class="border-top pt-3 mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'water-mist-fans']) }}" class="fw-bold text-primary text-decoration-none">
                                View Mist Fans <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 6: Cooler Motors -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-feature-card">
                        <div class="service-icon-box">
                            <i class="fa fa-gears"></i>
                        </div>
                        <h4 class="fw-bold mb-2">110 Dia Cooler Motors</h4>
                        <p class="text-muted mb-3 flex-grow-1">
                            High-efficiency copper cooler motors manufactured in 1", 1-1/4", 1-1/2", and 1-3/4" stack heights for peak performance in desert coolers.
                        </p>
                        <div class="border-top pt-3 mt-auto">
                            <a href="{{ route('portfolio', ['category' => 'cooler-motors']) }}" class="fw-bold text-primary text-decoration-none">
                                View Cooler Motors <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Featured Portfolio (Connected to Real Backend Database!) -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-5">
                <div>
                    <span class="section-tag">
                        <i class="fa fa-star"></i> Dynamic Portfolio
                    </span>
                    <h2 class="section-title mb-2">Featured Projects &amp; Models</h2>
                    <p class="text-muted mb-0">Directly synchronized with our live backend database. Real-time updates as new projects are published.</p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('portfolio') }}" class="btn-modern btn-outline-modern">
                        View All Projects ({{ $totalProjectsCount }}) <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Grid of Featured Projects -->
            <div class="row g-4">
                @forelse ($featuredProjects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="project-card">
                            <div class="project-thumbnail-wrapper" style="background-color: #f8fafc; aspect-ratio: 4/3; display: flex; align-items: center; justify-content: center; padding: 12px;">
                                <img src="{{ $project->thumbnail_url }}" alt="{{ $project->alt_text ?? $project->title }}" loading="lazy" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/products/pedestal_fan_chidhi.jpg';">
                                @if ($project->category)
                                    <span class="project-category-badge">{{ $project->category->name }}</span>
                                @endif
                                @if ($project->is_featured)
                                    <span class="project-featured-star" title="Featured Project">
                                        <i class="fa fa-star"></i>
                                    </span>
                                @endif
                            </div>
                            <div class="project-card-body">
                                <h3 class="project-card-title">
                                    <a href="{{ route('portfolio.show', $project->slug) }}">{{ $project->title }}</a>
                                </h3>
                                <p class="project-card-desc">
                                    {{ $project->short_description ?? Str::limit(strip_tags($project->description), 100) }}
                                </p>

                                @if (!empty($project->technologies_list))
                                    <div class="project-tech-tags">
                                        @foreach (array_slice($project->technologies_list, 0, 3) as $tech)
                                            <span class="project-tech-tag">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="project-card-footer">
                                    <span class="text-muted small">
                                        <i class="fa fa-eye me-1"></i> {{ number_format($project->views_count) }} views
                                    </span>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to enquire about ' . $project->title) }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-outline-modern btn-sm-modern px-2 text-success" title="Enquire on WhatsApp">
                                            <i class="fab fa-whatsapp fs-6"></i>
                                        </a>
                                        <a href="{{ route('portfolio.show', $project->slug) }}" class="btn-modern btn-primary-modern btn-sm-modern">
                                            View Model <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="text-muted fs-5">No projects published yet. Please publish projects from the Admin panel.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Product Brochure 2026 Section -->
    <section class="py-5 bg-light border-top border-bottom" id="brochure-section">
        <div class="container py-lg-4">
            <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 bg-danger-subtle text-danger rounded-pill fw-semibold small mb-3">
                            <i class="fa fa-file-pdf"></i> NEW RELEASE • 2026 EDITION
                        </div>
                        <h2 class="display-6 fw-bold text-dark mb-2">Product Brochure 2026</h2>
                        <p class="text-muted lead mb-4">
                            Explore our comprehensive 31-page technical catalog featuring our entire lineup of heavy-duty Pedestal Fans, electrical Madhani churners, Tent &amp; Event fans, Fresh Air fans, Transair exhausts, and 110 Dia Cooler Motors.
                        </p>
                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-check-circle text-danger"></i>
                                    <span class="text-dark small fw-semibold">31 Full-Color Technical Pages</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-check-circle text-danger"></i>
                                    <span class="text-dark small fw-semibold">28+ Verified Engineering Models</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-check-circle text-danger"></i>
                                    <span class="text-dark small fw-semibold">1400 RPM &amp; Pure Copper Specs</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="fa fa-check-circle text-danger"></i>
                                    <span class="text-dark small fw-semibold">ISO 9001:2015 Quality Tested</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern btn-lg-modern">
                                <i class="fa fa-eye me-2"></i> View Brochure
                            </a>
                            <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" download="Hindson_Industries_Brochure_2026.pdf" class="btn-modern btn-dark-modern btn-lg-modern">
                                <i class="fa fa-download me-2"></i> Download Brochure
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the new 2026 Product Brochure PDF.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp btn-lg-modern">
                                <i class="fab fa-whatsapp me-2"></i> Get on WhatsApp
                            </a>
                        </div>
                        <div class="mt-3 text-muted small">
                            <i class="fa fa-link me-1"></i> Direct PDF Path: <a href="{{ asset('assets/images/Brochure/Brochure%202026.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline text-secondary font-monospace">/assets/images/Brochure/Brochure%202026.pdf</a>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="p-4 rounded-4 bg-light border d-inline-flex flex-column align-items-center justify-content-center shadow-sm" style="width: 220px; height: 280px; border-top: 6px solid #C8102E !important;">
                            <div class="bg-danger text-white p-3 rounded-circle mb-3 shadow-sm">
                                <i class="fa fa-file-pdf fs-1"></i>
                            </div>
                            <div class="fw-bold text-dark lh-sm text-uppercase small">HINDSON INDUSTRIES</div>
                            <div class="text-danger fw-bold fs-5">BROCHURE 2026</div>
                            <div class="text-muted small mt-1">31 Pages • 27.8 MB</div>
                            <span class="badge bg-danger mt-3 px-3 py-1">OFFICIAL PDF</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Why Choose Us Section -->
    <section class="py-5 text-white position-relative overflow-hidden" style="background-color: #20252B !important;">
        <div class="container py-lg-4 position-relative">
            <div class="text-center mb-5">
                <span class="section-tag" style="background-color: rgba(200, 16, 46, 0.2); color: #FFFFFF; border-color: rgba(200, 16, 46, 0.4);">
                    <i class="fa fa-shield"></i> Hindfan Advantages
                </span>
                <h2 class="section-title text-white">Why Industry Chooses Hindfan</h2>
                <p class="section-desc text-white-50">
                    Trusted by hundreds of dealers, wedding decorators, and dairy enterprises across India.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon-box">
                            <i class="fa fa-bolt"></i>
                        </div>
                        <h4 class="text-white fw-bold mb-2">100% Pure Copper</h4>
                        <p class="text-white-50 mb-0 small">
                            High electrolytic grade copper magnet wire that resists heating under continuous 24/7 operating cycles.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon-box">
                            <i class="fa fa-compact-disc"></i>
                        </div>
                        <h4 class="text-white fw-bold mb-2">Double Ball Bearings</h4>
                        <p class="text-white-50 mb-0 small">
                            Precision ground double ball bearings eliminate shaft friction, vibration, and premature motor failure.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon-box">
                            <i class="fa fa-wind"></i>
                        </div>
                        <h4 class="text-white fw-bold mb-2">Aerodynamic Throw</h4>
                        <p class="text-white-50 mb-0 small">
                            Dynamically balanced heavy aluminium blades designed for maximum air delivery and extensive throw distance.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon-box">
                            <i class="fa fa-certificate"></i>
                        </div>
                        <h4 class="text-white fw-bold mb-2">ISO 9001:2015</h4>
                        <p class="text-white-50 mb-0 small">
                            Rigorous quality checks approved by Punjab Government with authentic manufacturer warranty backing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Testimonials Section -->
    <section class="py-5 bg-light">
        <div class="container py-lg-4">
            <div class="text-center mb-5">
                <span class="section-tag">
                    <i class="fa fa-quote-left"></i> Verified Feedback
                </span>
                <h2 class="section-title">What Our Dealers &amp; Clients Say</h2>
                <p class="section-desc">Real experiences from long-term distributors and commercial operators.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 border border-light-subtle d-flex flex-column">
                        <div class="text-warning mb-3">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="text-secondary flex-grow-1">
                            "We have been buying CHIDHI 21" pedestal fans from Hindson Industries for over 15 years for our wedding palace in Bathinda. Not a single motor burned out even during peak 45°C summer marriages."
                        </p>
                        <div class="d-flex align-items-center gap-3 border-top pt-3">
                            <div class="bg-primary-light text-primary fw-bold rounded-circle p-2 px-3">GS</div>
                            <div>
                                <h6 class="mb-0 fw-bold">Gurpreet Singh Brar</h6>
                                <small class="text-muted">Royal Grand Palace, Bathinda</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 border border-light-subtle d-flex flex-column">
                        <div class="text-warning mb-3">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="text-secondary flex-grow-1">
                            "The Majestic 70-80 KG Madhani is a miracle machine for dairy operators. We process curd in huge tanks and the butter separation is completely smooth and quick. Pure copper motor power!"
                        </p>
                        <div class="d-flex align-items-center gap-3 border-top pt-3">
                            <div class="bg-primary-light text-primary fw-bold rounded-circle p-2 px-3">KS</div>
                            <div>
                                <h6 class="mb-0 fw-bold">Sardar Kuldeep Singh</h6>
                                <small class="text-muted">Barnala Milk Cooperative</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 border border-light-subtle d-flex flex-column">
                        <div class="text-warning mb-3">
                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        </div>
                        <p class="text-secondary flex-grow-1">
                            "As an electrical wholesale dealer in Ludhiana, Hindfan fans are the easiest to sell because customers specifically demand the original HIND brand with Ashok & Vishal Hind's warranty seal."
                        </p>
                        <div class="d-flex align-items-center gap-3 border-top pt-3">
                            <div class="bg-primary-light text-primary fw-bold rounded-circle p-2 px-3">AK</div>
                            <div>
                                <h6 class="mb-0 fw-bold">Ashish Kumar Jain</h6>
                                <small class="text-muted">Jain Electricals, Ludhiana</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. Industrial B2B Wholesale & Dealership CTA Banner -->
    <section class="industrial-cta-banner py-5">
        <div class="cta-pattern"></div>
        <div class="container py-lg-4 position-relative">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge bg-danger px-3 py-2 text-uppercase mb-3 fw-semibold">
                        <i class="fa fa-handshake me-1"></i> Direct Manufacturer Wholesale &amp; Dealerships
                    </span>
                    <h2 class="display-6 fw-bold text-white mb-3">
                        Partner with North India's Leading Fan &amp; Madhani Manufacturer
                    </h2>
                    <p class="text-white-50 lead mb-0">
                        Hindson Industries supplies electrical distributors, wedding event decorators, dairy cooperatives, and industrial facilities nationwide. Prompt factory dispatch, 100% original copper guarantee, and verified after-sales service.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex flex-column flex-sm-row flex-lg-column gap-3 justify-content-lg-end">
                        <a href="{{ route('contact') }}" class="btn-modern btn-primary-modern btn-lg-modern">
                            <i class="fa fa-envelope me-1"></i> Request a Factory Quote
                        </a>
                        <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about bulk ordering and dealership opportunities.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp btn-lg-modern">
                            <i class="fab fa-whatsapp me-1"></i> WhatsApp Sales Desk
                        </a>
                        @if(site_setting('contact_phone_1'))
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_1')) }}" class="btn-modern btn-outline-dark-modern text-white border-white-50 btn-lg-modern">
                                <i class="fa fa-phone me-1"></i> Call {{ site_setting('contact_phone_1') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
