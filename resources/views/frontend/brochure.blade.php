@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Product Brochure 2026</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold text-white mb-2">Product Brochure 2026</h1>
            <p class="lead text-white-50 mb-0">Official 2026 technical catalog and comprehensive industrial equipment literature from Hindson Industries.</p>
        </div>
    </section>

    <!-- Featured Product Brochure 2026 Showcase -->
    <section class="py-5 bg-white border-bottom" id="brochure-2026">
        <div class="container py-lg-3">
            <div class="row align-items-center g-4 g-lg-5">
                <!-- Brochure Visual Presentation -->
                <div class="col-lg-5 col-md-6 order-2 order-md-1">
                    <div class="p-4 p-sm-5 bg-light rounded-4 border text-center shadow-sm position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 fw-bold small rounded-bottom-start" style="font-size: 0.75rem; letter-spacing: 0.05em;">
                            2026 EDITION
                        </div>
                        <div class="mb-4 d-inline-block position-relative">
                            <div class="p-4 rounded-4 bg-white shadow-sm border d-inline-flex flex-column align-items-center justify-content-center" style="width: 200px; height: 260px; border-top: 5px solid #C8102E !important;">
                                <div class="bg-danger-subtle text-danger p-3 rounded-circle mb-3">
                                    <i class="fa fa-file-pdf fs-1"></i>
                                </div>
                                <div class="fw-bold text-dark lh-sm text-uppercase small">HINDSON INDUSTRIES</div>
                                <div class="text-danger fw-bold small">BROCHURE 2026</div>
                                <div class="text-muted" style="font-size: 0.7rem;">31 Full Pages • 27.8 MB</div>
                            </div>
                        </div>
                        <h4 class="fw-bold mb-1">Hindson Industries Catalog</h4>
                        <p class="text-muted small mb-3">Complete range of Fans, Madhani &amp; Motors</p>
                        <div class="d-flex flex-wrap justify-content-center gap-2">
                            <span class="badge bg-white text-dark border"><i class="fa fa-check text-success me-1"></i> ISO 9001:2015</span>
                            <span class="badge bg-white text-dark border"><i class="fa fa-check text-success me-1"></i> Punjab Govt. Approved</span>
                            <span class="badge bg-white text-dark border"><i class="fa fa-check text-success me-1"></i> 100% Copper</span>
                        </div>
                    </div>
                </div>

                <!-- Brochure Details & Actions -->
                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    <div class="ps-lg-3">
                        <span class="section-tag mb-2">
                            <i class="fa fa-book-open"></i> Product Brochure 2026
                        </span>
                        <h2 class="display-6 fw-bold text-dark mb-3">Official Hindson Industries Product Brochure 2026</h2>
                        <p class="text-muted lead mb-4">
                            Explore our complete 31-page industrial manufacturing catalog featuring our entire lineup of heavy-duty Pedestal Fans, electrical Madhani churners, Tent &amp; Event fans, Fresh Air fans, Transair heavy exhaust units, and precision 110 Dia Cooler Motors.
                        </p>

                        <!-- Key Feature Highlights -->
                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="fa fa-circle-check text-danger mt-1"></i>
                                    <div>
                                        <strong class="d-block text-dark small">Complete Specifications</strong>
                                        <span class="text-muted small">Sweep sizes, wattages, 1400 RPM ratings, and blade details.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="fa fa-circle-check text-danger mt-1"></i>
                                    <div>
                                        <strong class="d-block text-dark small">28+ Verified Models</strong>
                                        <span class="text-muted small">From CHIDHI 21" to 30" Moveable Pedestal &amp; 80 KG Madhanis.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="fa fa-circle-check text-danger mt-1"></i>
                                    <div>
                                        <strong class="d-block text-dark small">Quality Certifications</strong>
                                        <span class="text-muted small">ISO 9001:2015, Punjab Govt. quality test records &amp; warranty info.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="fa fa-circle-check text-danger mt-1"></i>
                                    <div>
                                        <strong class="d-block text-dark small">Wholesale &amp; Dealer Inquiries</strong>
                                        <span class="text-muted small">Direct manufacturer pricing, bulk supply, and OEM guidelines.</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
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

                        <div class="text-muted small">
                            <i class="fa fa-link me-1"></i> PDF Path: <a href="{{ asset('assets/images/Brochure/Brochure%202026.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline text-secondary font-monospace">/assets/images/Brochure/Brochure%202026.pdf</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Specific Category Literature Section -->
    <section class="py-5 bg-light">
        <div class="container py-lg-4">
            <div class="text-center mb-5">
                <span class="section-tag">
                    <i class="fa fa-file-lines"></i> Category Catalogs
                </span>
                <h2 class="section-title">Specialized Product Literature</h2>
                <p class="section-desc">Download or request category-specific technical datasheets and dealer price lists.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-white rounded-4 border h-100 d-flex flex-column text-center shadow-sm">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-fan fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Pedestal Fans</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Specifications for CHIDHI 21", DABBI 21", SILVERLINE 21"-23", ECONOMY 21"-26", AIRKING 500 mm, and 30" MOVEABLE circulators.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern">
                                <i class="fa fa-eye"></i> View Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Pedestal Fans Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-white rounded-4 border h-100 d-flex flex-column text-center shadow-sm">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-blender fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Madhani Churners</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Technical guide covering 3 KG to 80 KG domestic and dairy churners: SANJIVNI, SUKHMANI, ELEGANT, HEAVY, SUPREME, SAMRAT &amp; MAJESTIC.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern">
                                <i class="fa fa-eye"></i> View Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Electrical Madhani Churners Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-white rounded-4 border h-100 d-flex flex-column text-center shadow-sm">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-tent fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Tent, Mist &amp; Exhaust</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Engineering guide for 30" Tent Coolers, 21"-26" Clump &amp; Stand Fans, 26" 50L Water Mist Coolers, and TRANSAIR heavy industrial exhausts.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern">
                                <i class="fa fa-eye"></i> View Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Tent, Mist & Exhaust Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-white rounded-4 border h-100 d-flex flex-column text-center shadow-sm">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-gears fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">110 Dia Cooler Motors</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Complete specifications for 1", 1-1/4", 1-1/2", and 1-3/4" stack copper cooler motors engineered for OEMs and distributors.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern">
                                <i class="fa fa-eye"></i> View Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the 110 Dia Cooler Motors Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Request Printed Copy / Factory Inquiries -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="p-4 p-md-5 rounded-4 border bg-light text-center">
                <span class="badge bg-danger-subtle text-danger fw-bold px-3 py-2 rounded-pill mb-3">Distributor Inquiries</span>
                <h3 class="fw-bold mb-2">Need Printed Copies or Dealership Price Lists?</h3>
                <p class="text-muted mb-4 max-w-600 mx-auto" style="max-width: 650px;">
                    We supply registered wholesale distributors, retail dealers, and institutional buyers across India with physical catalog kits, technical datasheets, and sample units.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('contact') }}?subject=Printed+Catalog+and+Dealership+Inquiry" class="btn-modern btn-primary-modern btn-lg-modern">
                        <i class="fa fa-envelope me-2"></i> Request Dealer Price List
                    </a>
                    <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to inquire about Dealership and Wholesale Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp btn-lg-modern">
                        <i class="fab fa-whatsapp me-2"></i> Chat with Factory Sales
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
