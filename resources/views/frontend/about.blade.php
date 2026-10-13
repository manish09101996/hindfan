@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold text-white mb-2">About Hindson Industries</h1>
            <p class="lead text-white-50 mb-0">Setting North India's benchmark in electric ventilation and milk churners since 1980.</p>
        </div>
    </section>

    <!-- Company Heritage -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="row g-4 g-lg-5 align-items-center">
                <div class="col-lg-6">
                    <span class="section-tag">
                        <i class="fa fa-history"></i> Established in 1980
                    </span>
                    <h2 class="section-title">A Journey of Four Decades in Industrial Innovation</h2>
                    <p class="text-secondary fs-5 fw-semibold mb-3">
                        We at Hindson Industries feel immense pride and pleasure while introducing ourselves as a pioneer and leading manufacturer of Pedestal Fans, Ceiling Fans, Tent Fans, Pulling Fans, Wall Fans &amp; Madhani.
                    </p>
                    <p class="text-muted mb-3">
                        We started as a modest manufacturing unit in Rampura Phul (Distt. Bathinda, Punjab) in 1980, producing Table Fans and Madhani under the reputable brand name <strong>HIND</strong>.
                    </p>
                    <p class="text-muted mb-4">
                        The groundbreaking turning point came in <strong>1985</strong>, when we commenced manufacturing <strong>Fratta Fans</strong>. In North India's regional markets, these ultra-high-speed fans became famously recognized by various names such as <em>Fratta, Toffan, and Helicopter</em>. Today, Hindfan products are exported across all states of India and neighboring international markets.
                    </p>

                    <div class="hindfan-warning-box">
                        <div class="hindfan-warning-title">
                            <i class="fa fa-shield-halved"></i> सावधान ! (Consumer Protection Notice)
                        </div>
                        <p class="hindfan-warning-text mb-0">
                            प्रिय ग्राहक, कंपनी ने कड़े परिश्रम के पश्चात अपना और अपने उत्पाद का नाम बनाया है। कुछ उत्पादक और दुकानदार हमारे ब्रांड से मिलते-जुलते नामों से उत्पाद बना व बेच रहे हैं। इस तरह आपके साथ धोखा कर रहे हैं। कृपया कोई भी उत्पाद खरीदने से पहले मोटर और वारंटी कार्ड पर कंपनी के मालिक <strong>श्री अशोक कुमार बंसल</strong> और उनके सुपुत्र <strong>श्री विशाल बंसल</strong> की फोटो जरूर देख लें। धन्यवाद।
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="founder-card h-100">
                                <div class="founder-avatar-wrapper">
                                    <img src="{{ asset('assets/images/team/ashok.jpg') }}" alt="Shri Ashok Hind">
                                </div>
                                <h4 class="founder-name">Ashok Hind</h4>
                                <div class="founder-role">Founder &amp; Managing Director</div>
                                <p class="text-muted small mb-0">
                                    Visionary behind the brand HIND since 1980, ensuring rigorous standards of pure copper and mechanical precision.
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="founder-card h-100">
                                <div class="founder-avatar-wrapper">
                                    <img src="{{ asset('assets/images/team/vishal.jpg') }}" alt="Shri Vishal Hind">
                                </div>
                                <h4 class="founder-name">Vishal Hind</h4>
                                <div class="founder-role">Director &amp; Operations Head</div>
                                <p class="text-muted small mb-0">
                                    Driving modern assembly lines, dynamic balancing technology, and nationwide dealer network expansion.
                                </p>
                            </div>
                        </div>

                        <!-- Punjab Govt. Quality Certificate Badge -->
                        <div class="col-12">
                            <div class="bg-light p-4 rounded-4 border d-flex flex-column flex-sm-row align-items-center gap-4 text-center text-sm-start">
                                <img src="{{ asset('assets/images/mark_cer.png') }}" alt="Approved Quality Punjab Govt" style="height: 80px;">
                                <div>
                                    <h5 class="fw-bold text-dark mb-1">Approved Quality by Punjab Govt.</h5>
                                    <p class="text-muted small mb-1">AN ISO 9001:2015 Certified Manufacturing Facility.</p>
                                    <div class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">100% Quality Inspected Before Dispatch</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Manufacturing Infrastructure & Ethics -->
    <section class="py-5 bg-light">
        <div class="container py-lg-4">
            <div class="text-center mb-5">
                <span class="section-tag">
                    <i class="fa fa-microchip"></i> Engineering Ethics
                </span>
                <h2 class="section-title">Our Technical Standards</h2>
                <p class="section-desc">Our products are user-friendly, easy to operate, power efficient, and built to make life cooler and productive.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <div class="service-icon-box mb-3">
                            <i class="fa fa-bolt"></i>
                        </div>
                        <h4 class="fw-bold mb-2">High Grade Electrolytic Copper</h4>
                        <p class="text-muted mb-0">
                            Every single motor stator at Hindson Industries is wound with virgin electrical grade copper. It yields lower electrical resistance, eliminates overheating, and handles Indian voltage fluctuations.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <div class="service-icon-box mb-3">
                            <i class="fa fa-circle-notch"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Double Ball Bearings</h4>
                        <p class="text-muted mb-0">
                            Instead of cheap sleeve bushings, our fans employ dual precision ball bearings. This ensures whisper smooth spinning, zero axle play, and continuous years of service without jamming.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <div class="service-icon-box mb-3">
                            <i class="fa fa-sliders"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Dynamic Blade Balancing</h4>
                        <p class="text-muted mb-0">
                            High-velocity aluminium blades undergo computerized dynamic balancing to eliminate vibrations and ensure long-range air throw across marriage pandals and workshops.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
