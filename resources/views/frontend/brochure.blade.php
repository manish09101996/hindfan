@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Product Brochure</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold text-white mb-2">Hindfan Product Brochures &amp; Catalogs</h1>
            <p class="lead text-white-50 mb-0">Download official technical specifications and product catalogs.</p>
        </div>
    </section>

    <!-- Brochure Cards -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="text-center mb-5">
                <span class="section-tag">
                    <i class="fa fa-file-pdf"></i> Technical Catalogs
                </span>
                <h2 class="section-title">Official Product Literature</h2>
                <p class="section-desc">Get comprehensive motor ratings, air delivery figures, dimensions, and wiring schematics.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border h-100 d-flex flex-column text-center">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-fan fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Pedestal Fans</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Specifications for CHIDHI 21", DABBI 21", and 26" heavy air circulators with air delivery metrics and RPM curves.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ route('contact') }}?subject=Pedestal+Brochure+Request" class="btn-modern btn-primary-modern">
                                <i class="fa fa-envelope"></i> Request Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Pedestal Fans PDF Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border h-100 d-flex flex-column text-center">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-blender fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Madhani Churners</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Technical guide covering 3 KG to 80 KG domestic and commercial dairy churners with bowl capacities and stator specs.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ route('contact') }}?subject=Madhani+Brochure+Request" class="btn-modern btn-primary-modern">
                                <i class="fa fa-envelope"></i> Request Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Electrical Madhani Churners PDF Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border h-100 d-flex flex-column text-center">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-tent fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Tent &amp; Mist Fans</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Engineering guide for 21" Clump tent fans, 45L high-pressure water mist coolers, and 21"-30" wall mounting circulators.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ route('contact') }}?subject=Tent+Fans+Brochure+Request" class="btn-modern btn-primary-modern">
                                <i class="fa fa-envelope"></i> Request Catalog
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Tent & Mist Fans PDF Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="p-4 bg-light rounded-4 border h-100 d-flex flex-column text-center">
                        <div class="mx-auto p-3 bg-danger-subtle text-danger rounded-circle mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                            <i class="fa fa-file-pdf fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Master Catalog</h4>
                        <p class="text-muted small mb-4 flex-grow-1">
                            Full comprehensive product literature including cooler motors, specifications, and wholesale dealer terms.
                        </p>
                        <div class="d-grid gap-2 mt-auto">
                            <a href="{{ route('contact') }}?subject=Master+Product+Catalog+Request" class="btn-modern btn-primary-modern">
                                <i class="fa fa-envelope"></i> Request Master Guide
                            </a>
                            <a href="{{ whatsapp_url('Hello Hindson Industries, please send me the Complete Master Product Catalog.') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp"></i> Get on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
