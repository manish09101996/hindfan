@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold text-white mb-2">Contact &amp; Factory Inquiries</h1>
            <p class="lead text-white-50 mb-0">Get in touch directly with our manufacturing headquarters in Rampura Phul, Punjab.</p>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="row g-4 g-lg-5">
                <!-- Left: Factory & Contact Details -->
                <div class="col-lg-5">
                    <span class="section-tag">
                        <i class="fa fa-building"></i> Direct Factory Contact
                    </span>
                    <h2 class="section-title mb-4">We Welcome Your Orders &amp; Inquiries</h2>
                    <p class="text-secondary mb-4">
                        Whether you are an electrical distributor looking for high-demand dealership rights, an event tent decorator, or a dairy cooperative, our management is always at your service.
                    </p>

                    <div class="d-flex flex-column gap-3 mb-4">
                        @if(site_setting('contact_address'))
                            <!-- Address -->
                            <div class="p-3 bg-light rounded-3 border d-flex gap-3">
                                <div class="text-primary fs-4 mt-1"><i class="fa fa-map-location-dot"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Manufacturing Plant</h6>
                                    <p class="text-muted small mb-1">
                                        {!! nl2br(e(site_setting('contact_address'))) !!}
                                    </p>
                                    @if(site_setting('google_maps_link'))
                                        <div>
                                            <a href="{{ site_setting('google_maps_link') }}" target="_blank" rel="noopener noreferrer" class="text-primary fw-semibold small text-decoration-underline">
                                                <i class="fa fa-location-arrow me-1"></i> Get Directions on Google Maps
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if(site_setting('contact_phone_1') || site_setting('contact_phone_2'))
                            <!-- Phone Numbers -->
                            <div class="p-3 bg-light rounded-3 border d-flex gap-3">
                                <div class="text-primary fs-4 mt-1"><i class="fa fa-phone"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Direct Phone Line</h6>
                                    @if(site_setting('contact_phone_1'))
                                        <div class="text-muted small mb-1">
                                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_1')) }}" class="text-dark text-decoration-none">
                                                <strong>{{ site_setting('contact_phone_1') }}</strong>
                                            </a>
                                            @if(site_setting('contact_phone_1_label'))
                                                ({{ site_setting('contact_phone_1_label') }})
                                            @endif
                                        </div>
                                    @endif
                                    @if(site_setting('contact_phone_2'))
                                        <div class="text-muted small">
                                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_2')) }}" class="text-dark text-decoration-none">
                                                <strong>{{ site_setting('contact_phone_2') }}</strong>
                                            </a>
                                            @if(site_setting('contact_phone_2_label'))
                                                ({{ site_setting('contact_phone_2_label') }})
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if(site_setting('contact_email'))
                            <!-- Email -->
                            <div class="p-3 bg-light rounded-3 border d-flex gap-3">
                                <div class="text-primary fs-4 mt-1"><i class="fa fa-envelope"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Email Inquiries</h6>
                                    <p class="text-muted small mb-0">
                                        <a href="mailto:{{ site_setting('contact_email') }}" class="text-primary text-decoration-none fw-semibold">{{ site_setting('contact_email') }}</a>
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if(site_setting('working_hours'))
                            <!-- Operating Hours -->
                            <div class="p-3 bg-light rounded-3 border d-flex gap-3">
                                <div class="text-primary fs-4 mt-1"><i class="fa fa-clock"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Factory Working Hours</h6>
                                    <p class="text-muted small mb-0">
                                        {{ site_setting('working_hours') }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <!-- Direct WhatsApp Chat Card -->
                        <div class="p-3 bg-success-subtle rounded-3 border border-success-subtle d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="text-success fs-3"><i class="fab fa-whatsapp"></i></div>
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark">Instant WhatsApp Chat</h6>
                                    <small class="text-muted">Direct sales &amp; technical desk</small>
                                </div>
                            </div>
                            <a href="{{ whatsapp_url() }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp btn-sm-modern">
                                Chat Now <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Inquiry Form -->
                <div class="col-lg-7">
                    <div class="p-4 p-md-5 bg-light rounded-4 border shadow-sm">
                        <h3 class="fw-bold text-dark mb-2">Send an Inquiry or Request a Quote</h3>
                        <p class="text-muted mb-4 small">Fill in the form below and our sales engineering department will reply within 24 hours.</p>

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf

                            <!-- Honeypot anti-spam trap (invisible to human users) -->
                            <div class="d-none">
                                <label for="website_hp">Leave empty</label>
                                <input type="text" name="website_hp" id="website_hp" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold small text-secondary">Full Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fa fa-user text-muted"></i></span>
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="e.g. Gurpreet Singh" value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold small text-secondary">Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fa fa-envelope text-muted"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" required placeholder="name@company.com" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-semibold small text-secondary">Phone Number (with WhatsApp)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fa fa-phone text-muted"></i></span>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="e.g. +91 98765 43210" value="{{ old('phone') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="service_needed" class="form-label fw-semibold small text-secondary">Product Line of Interest</label>
                                    <select class="form-select bg-white" id="service_needed" name="service_needed">
                                        <option value="">Select Product Line...</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->name }}" {{ old('service_needed') == $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                        <option value="Dealership / Wholesale Distribution">Dealership / Wholesale Distribution</option>
                                        <option value="Custom Engineering / OEM">Custom Engineering / OEM</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="subject" class="form-label fw-semibold small text-secondary">Subject / Model Name</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="e.g. Wholesale inquiry for CHIDHI 21 inch Pedestal Fans" value="{{ old('subject', request('model') ? 'Inquiry for ' . request('model') : '') }}">
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label fw-semibold small text-secondary">Your Message / Quantity Requirements <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Please provide details of quantities, destination city, or technical questions...">{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12 pt-2">
                                    <button type="submit" class="btn-modern btn-primary-modern btn-lg-modern w-100">
                                        <i class="fa fa-paper-plane"></i> Submit Inquiry to Factory
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Google Maps Embed for Hindson Industries (Near Gaushala, Phul Road) -->
            <div class="mt-5 pt-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                    <div>
                        <h4 class="fw-bold mb-1 text-dark"><i class="fa fa-map-location-dot text-danger me-2"></i> Factory Location on Google Maps</h4>
                        <p class="text-muted small mb-0">{{ site_setting('contact_address', 'Near Gaushala, Phul Road, Rampura Phul, Distt. Bathinda, Punjab - 151103') }}</p>
                    </div>
                    @if(site_setting('google_maps_link'))
                        <div class="mt-1 mt-sm-0">
                            <a href="{{ site_setting('google_maps_link') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-outline-dark-modern btn-sm-modern">
                                <i class="fa fa-arrow-up-right-from-square me-1"></i> Open in Google Maps
                            </a>
                        </div>
                    @endif
                </div>
                <div class="rounded-4 overflow-hidden shadow-sm border bg-light position-relative" style="height: 450px; min-height: 420px;">
                    <iframe src="{{ site_setting('google_maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.441!2d75.23584!3d30.2814947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3910c50132330e43%3A0x7bc44ec2752c56e!2sHind%20Fan%20(Hindson%20Industries)!5e0!3m2!1sen!2sin!4v1728800000000!5m2!1sen!2sin') }}" 
                            width="100%" 
                            height="100%" 
                            style="border:0; width:100%; height:100%; display:block; min-height:420px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Hind Fan (Hindson Industries) Factory Location">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
