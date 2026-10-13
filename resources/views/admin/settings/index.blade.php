@extends('layouts.admin')

@section('title', 'Website Contact & Social Settings')
@section('page_title', 'Website Settings')

@section('content')
    <div class="row">
        <div class="col-xl-10 mx-auto">

            <!-- Informational Banner -->
            <div class="alert alert-info border-0 shadow-sm rounded-4 p-4 mb-4 d-flex align-items-start gap-3">
                <div class="fs-3 text-info mt-1">
                    <i class="fa fa-circle-info"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Dynamic Visibility / Khali Chhodne Par Hide Ho Jayega</h5>
                    <p class="mb-0 text-secondary">
                        Aap yahan se company ke phone numbers, email, factory address, working hours, aur social media links ko update kar sakte hain.
                        <strong>Agar koi bhi field khali (empty) chhodenge, to wo automatically website par se gayab (hide) ho jayega.</strong>
                        Jaise hi aap usme link ya number daalenge, wo turant website par dikhne lagega.
                    </p>
                </div>
            </div>

            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- 1. Factory & Office Contact Information -->
                <div class="card border-0 rounded-4 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <span class="p-2 rounded-3 bg-danger-subtle text-danger">
                                <i class="fa fa-building fs-5"></i>
                            </span>
                            <div>
                                <h5 class="fw-bold text-dark mb-0">Factory &amp; Office Contact Info</h5>
                                <small class="text-muted">Displays in Topbar, Footer &amp; Contact Us page</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <!-- Address -->
                        <div class="mb-4">
                            <label for="contact_address" class="form-label fw-semibold text-secondary">
                                <i class="fa fa-map-location-dot text-danger me-1"></i> Factory &amp; Office Address
                            </label>
                            <textarea name="contact_address" id="contact_address" rows="2" class="form-control" placeholder="e.g. Near Gaushala, Phul Road, Rampura Phul, Distt. Bathinda, Punjab - 151103">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                            <small class="text-muted">Khali chhodne par footer aur contact page se address hide ho jayega.</small>
                        </div>

                        <!-- Phone 1 & Label -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-7">
                                <label for="contact_phone_1" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-phone text-danger me-1"></i> Primary Phone Number (Phone 1)
                                </label>
                                <input type="text" name="contact_phone_1" id="contact_phone_1" class="form-control" placeholder="e.g. +91-92162-07097" value="{{ old('contact_phone_1', $settings['contact_phone_1'] ?? '') }}">
                                <small class="text-muted">Dikhaya jayega: Topbar, Footer, CTA &amp; Contact page.</small>
                            </div>
                            <div class="col-md-5">
                                <label for="contact_phone_1_label" class="form-label fw-semibold text-secondary">
                                    Phone 1 Name / Person (Optional)
                                </label>
                                <input type="text" name="contact_phone_1_label" id="contact_phone_1_label" class="form-control" placeholder="e.g. Vishal Bansal" value="{{ old('contact_phone_1_label', $settings['contact_phone_1_label'] ?? '') }}">
                                <small class="text-muted">Phone number ke sath bracket mai show hoga.</small>
                            </div>
                        </div>

                        <!-- Phone 2 & Label -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-7">
                                <label for="contact_phone_2" class="form-label fw-semibold text-secondary">
                                    <i class="fa fa-phone text-danger me-1"></i> Secondary Phone Number (Phone 2)
                                </label>
                                <input type="text" name="contact_phone_2" id="contact_phone_2" class="form-control" placeholder="e.g. +91-92162-01187" value="{{ old('contact_phone_2', $settings['contact_phone_2'] ?? '') }}">
                                <small class="text-muted">Khali chhodne par dusra number website par nahi aayega.</small>
                            </div>
                            <div class="col-md-5">
                                <label for="contact_phone_2_label" class="form-label fw-semibold text-secondary">
                                    Phone 2 Name / Person (Optional)
                                </label>
                                <input type="text" name="contact_phone_2_label" id="contact_phone_2_label" class="form-control" placeholder="e.g. Ashok Bansal" value="{{ old('contact_phone_2_label', $settings['contact_phone_2_label'] ?? '') }}">
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-4">
                            <label for="contact_email" class="form-label fw-semibold text-secondary">
                                <i class="fa fa-envelope text-danger me-1"></i> Official Email Address
                            </label>
                            <input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="e.g. hindfan@yahoo.com" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}">
                            <small class="text-muted">Khali chhodne par topbar, footer aur contact page se email hide ho jayega.</small>
                        </div>

                        <!-- Working Hours -->
                        <div class="mb-4">
                            <label for="working_hours" class="form-label fw-semibold text-secondary">
                                <i class="fa fa-clock text-danger me-1"></i> Factory &amp; Office Working Hours
                            </label>
                            <input type="text" name="working_hours" id="working_hours" class="form-control" placeholder="e.g. Mon - Sat: 08:00 - 19:00" value="{{ old('working_hours', $settings['working_hours'] ?? '') }}">
                            <small class="text-muted">Khali chhodne par working hours timing hide ho jayegi.</small>
                        </div>

                        <!-- Google Maps Location Link -->
                        <div class="mb-4">
                            <label for="google_maps_link" class="form-label fw-semibold text-secondary">
                                <i class="fa fa-map-location-dot text-danger me-1"></i> Google Maps Place Link / CID URL
                            </label>
                            <input type="url" name="google_maps_link" id="google_maps_link" class="form-control" placeholder="https://www.google.com/maps?cid=557396234949805422" value="{{ old('google_maps_link', $settings['google_maps_link'] ?? '') }}">
                            <small class="text-muted">Direct button "Open in Google Maps" aur "Get Directions" ke liye open link.</small>
                        </div>

                        <!-- Google Maps Embed URL -->
                        <div class="mb-2">
                            <label for="google_maps_embed_url" class="form-label fw-semibold text-secondary">
                                <i class="fa fa-map text-danger me-1"></i> Google Maps Embed URL (Iframe)
                            </label>
                            <input type="url" name="google_maps_embed_url" id="google_maps_embed_url" class="form-control" placeholder="https://www.google.com/maps/embed?pb=..." value="{{ old('google_maps_embed_url', $settings['google_maps_embed_url'] ?? '') }}">
                            <small class="text-muted">Contact page par interactive map frame load karne ke liye responsive embed link.</small>
                        </div>
                    </div>
                </div>

                <!-- 2. Social Media Channels -->
                <div class="card border-0 rounded-4 shadow-sm mb-4">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <span class="p-2 rounded-3 bg-primary-subtle text-primary">
                                <i class="fa fa-share-nodes fs-5"></i>
                            </span>
                            <div>
                                <h5 class="fw-bold text-dark mb-0">Social Media Profiles</h5>
                                <small class="text-muted">Icons in Header Topbar and Footer</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <div class="row g-4">
                            <!-- Facebook -->
                            <div class="col-md-6">
                                <label for="social_facebook" class="form-label fw-semibold text-secondary">
                                    <i class="fab fa-facebook text-primary me-1"></i> Facebook Page URL
                                </label>
                                <input type="url" name="social_facebook" id="social_facebook" class="form-control" placeholder="https://facebook.com/hindfan7" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}">
                                <small class="text-muted">Khali chhodne par Facebook icon nahi dikhega.</small>
                            </div>

                            <!-- YouTube -->
                            <div class="col-md-6">
                                <label for="social_youtube" class="form-label fw-semibold text-secondary">
                                    <i class="fab fa-youtube text-danger me-1"></i> YouTube Channel URL
                                </label>
                                <input type="url" name="social_youtube" id="social_youtube" class="form-control" placeholder="https://youtube.com/..." value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}">
                                <small class="text-muted">Khali chhodne par YouTube icon nahi dikhega.</small>
                            </div>

                            <!-- Instagram -->
                            <div class="col-md-6">
                                <label for="social_instagram" class="form-label fw-semibold text-secondary">
                                    <i class="fab fa-instagram text-danger me-1"></i> Instagram Profile URL
                                </label>
                                <input type="url" name="social_instagram" id="social_instagram" class="form-control" placeholder="https://instagram.com/..." value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}">
                                <small class="text-muted">Khali chhodne par Instagram icon nahi dikhega.</small>
                            </div>

                            <!-- LinkedIn -->
                            <div class="col-md-6">
                                <label for="social_linkedin" class="form-label fw-semibold text-secondary">
                                    <i class="fab fa-linkedin text-primary me-1"></i> LinkedIn Profile URL
                                </label>
                                <input type="url" name="social_linkedin" id="social_linkedin" class="form-control" placeholder="https://linkedin.com/in/..." value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}">
                                <small class="text-muted">Khali chhodne par LinkedIn icon nahi dikhega.</small>
                            </div>

                            <!-- Twitter / X -->
                            <div class="col-md-6">
                                <label for="social_twitter" class="form-label fw-semibold text-secondary">
                                    <i class="fab fa-x-twitter text-dark me-1"></i> Twitter / X Profile URL
                                </label>
                                <input type="url" name="social_twitter" id="social_twitter" class="form-control" placeholder="https://twitter.com/hindfan7" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}">
                                <small class="text-muted">Khali chhodne par Twitter icon nahi dikhega.</small>
                            </div>

                            <!-- WhatsApp -->
                            <div class="col-md-6">
                                <label for="social_whatsapp" class="form-label fw-semibold text-secondary">
                                    <i class="fab fa-whatsapp text-success me-1"></i> WhatsApp Number
                                </label>
                                <input type="text" name="social_whatsapp" id="social_whatsapp" class="form-control" placeholder="e.g. +919216207097" value="{{ old('social_whatsapp', $settings['social_whatsapp'] ?? '') }}">
                                <small class="text-muted">International format (e.g. +919216207097).</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Bar -->
                <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded-4 border shadow-sm">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary rounded-pill">
                        <i class="fa fa-globe me-1"></i> View Live Website
                    </a>
                    <button type="submit" class="btn-modern btn-primary-modern btn-lg-modern">
                        <i class="fa fa-save"></i> Save Settings
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
