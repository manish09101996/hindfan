@extends('layouts.app')

@section('content')
    <!-- Project Breadcrumb & Hero Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('portfolio') }}" class="text-white-50 text-decoration-none">Portfolio</a></li>
                    @if ($project->category)
                        <li class="breadcrumb-item">
                            <a href="{{ route('portfolio', ['category' => $project->category->slug]) }}" class="text-white-50 text-decoration-none">
                                {{ $project->category->name }}
                            </a>
                        </li>
                    @endif
                    <li class="breadcrumb-item active text-white" aria-current="page">{{ Str::limit($project->title, 40) }}</li>
                </ol>
            </nav>
            <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                @if ($project->category)
                    <span class="badge bg-primary px-3 py-2 text-uppercase">{{ $project->category->name }}</span>
                @endif
                @if ($project->is_featured)
                    <span class="badge bg-warning text-dark px-3 py-2"><i class="fa fa-star me-1"></i> Featured Model</span>
                @endif
                <span class="badge bg-secondary px-3 py-2"><i class="fa fa-eye me-1"></i> {{ number_format($project->views_count) }} Views</span>
            </div>
            <h1 class="display-5 fw-bold text-white mb-2">{{ $project->title }}</h1>
            @if ($project->short_description)
                <p class="lead text-white-50 mb-0 max-w-3xl">{{ $project->short_description }}</p>
            @endif
        </div>
    </section>

    <!-- Main Project Detail Content -->
    <section class="py-5 bg-white">
        <div class="container py-lg-4">
            <div class="row g-5">
                <!-- Left Column: Gallery & Description -->
                <div class="col-lg-8">
                    <!-- Main Image Showcase -->
                    <div class="border rounded-4 overflow-hidden shadow-sm bg-light mb-3 position-relative" style="aspect-ratio: 16/10;">
                        <img id="mainGalleryImage" 
                             src="{{ $project->thumbnail_url }}" 
                             alt="{{ $project->alt_text ?? $project->title }}" 
                             class="w-100 h-100 object-fit-contain p-3"
                             onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/products/pedestal_fan_chidhi.jpg';">
                    </div>

                    <!-- Gallery Thumbnails (if multiple images exist) -->
                    @if ($project->images->count() > 0)
                        <div class="d-flex flex-wrap gap-2 mb-5">
                            <div class="gallery-thumbnail-item active" 
                                 data-image-src="{{ $project->thumbnail_url }}" 
                                 data-image-alt="{{ $project->alt_text ?? $project->title }}"
                                 style="width: 80px; height: 80px;">
                                <img src="{{ $project->thumbnail_url }}" alt="Primary View">
                            </div>
                            @foreach ($project->images as $img)
                                <div class="gallery-thumbnail-item" 
                                     data-image-src="{{ $img->image_url }}" 
                                     data-image-alt="{{ $img->alt_text ?? $project->title }}"
                                     style="width: 80px; height: 80px;">
                                    <img src="{{ $img->image_url }}" alt="{{ $img->alt_text ?? 'Gallery Photo' }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Full Description -->
                    <div class="project-detailed-content mb-5">
                        <h3 class="fw-bold text-dark border-bottom pb-3 mb-4">Project Overview &amp; Specifications</h3>
                        <div class="article-body text-secondary fs-6 lh-lg">
                            {!! $project->description ?? '<p class="text-muted">Detailed technical documentation is available upon request.</p>' !!}
                        </div>
                    </div>

                    <!-- Previous & Next Navigation -->
                    <div class="border-top border-bottom py-4 my-4 d-flex justify-content-between align-items-center">
                        @if ($previous)
                            <a href="{{ route('portfolio.show', $previous->slug) }}" class="btn-modern btn-outline-modern">
                                <i class="fa fa-arrow-left"></i>
                                <span class="d-none d-sm-inline">{{ Str::limit($previous->title, 25) }}</span>
                                <span class="d-inline d-sm-none">Previous</span>
                            </a>
                        @else
                            <div></div>
                        @endif

                        <a href="{{ route('portfolio') }}" class="btn-modern btn-outline-modern text-muted">
                            <i class="fa fa-grid-2"></i> All Projects
                        </a>

                        @if ($next)
                            <a href="{{ route('portfolio.show', $next->slug) }}" class="btn-modern btn-outline-modern">
                                <span class="d-none d-sm-inline">{{ Str::limit($next->title, 25) }}</span>
                                <span class="d-inline d-sm-none">Next</span>
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        @else
                            <div></div>
                        @endif
                    </div>
                </div>

                <!-- Right Column: Project Meta Sidebar -->
                <div class="col-lg-4">
                    <div class="p-4 bg-light rounded-4 border shadow-sm sticky-top" style="top: 100px;">
                        <h4 class="fw-bold text-dark mb-4 border-bottom pb-2">Technical Overview</h4>

                        <ul class="list-unstyled mb-4">
                            @if ($project->category)
                                <li class="mb-3">
                                    <small class="text-muted d-block">Category</small>
                                    <span class="fw-bold text-dark">{{ $project->category->name }}</span>
                                </li>
                            @endif

                            @if ($project->client_name)
                                <li class="mb-3">
                                    <small class="text-muted d-block">Target Application / Client</small>
                                    <span class="fw-bold text-dark">{{ $project->client_name }}</span>
                                </li>
                            @endif

                            @if ($project->formatted_date)
                                <li class="mb-3">
                                    <small class="text-muted d-block">Production / Launch Date</small>
                                    <span class="fw-bold text-dark">{{ $project->formatted_date }}</span>
                                </li>
                            @endif

                            @if (!empty($project->technologies_list))
                                <li class="mb-3">
                                    <small class="text-muted d-block mb-1">Key Specifications</small>
                                    <div class="d-flex flex-wrap gap-1">
                                        @foreach ($project->technologies_list as $tech)
                                            <span class="badge bg-white text-secondary border px-2 py-1">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                </li>
                            @endif

                            @if ($project->external_url)
                                <li class="mb-3">
                                    <small class="text-muted d-block">Official Reference Link</small>
                                    <a href="{{ $project->external_url }}" target="_blank" rel="noopener" class="text-primary text-break">
                                        {{ $project->external_url }} <i class="fa fa-arrow-up-right-from-square small"></i>
                                    </a>
                                </li>
                            @endif

                            <li class="mb-0">
                                <small class="text-muted d-block">Quality Warranty</small>
                                <span class="badge bg-success-subtle text-success border border-success-subtle fw-semibold">
                                    100% Original Hind Guarantee
                                </span>
                            </li>
                        </ul>

                        <div class="d-grid gap-2 pt-2 border-top">
                            <a href="{{ whatsapp_url('Hello Hindson Industries, I would like to enquire about ' . $project->title) }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-whatsapp">
                                <i class="fab fa-whatsapp me-1"></i> Enquire on WhatsApp
                            </a>
                            <a href="{{ route('contact') }}?model={{ urlencode($project->title) }}" class="btn-modern btn-primary-modern">
                                <i class="fa fa-envelope me-1"></i> Request Quote for this Model
                            </a>
                            <div class="d-flex gap-2">
                                <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-outline-dark-modern flex-grow-1 text-center" title="View Brochure in new tab">
                                    <i class="fa fa-eye me-1"></i> View Brochure
                                </a>
                                <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" download="Hindson_Industries_Brochure_2026.pdf" class="btn-modern btn-outline-dark-modern flex-grow-1 text-center" title="Download Brochure PDF">
                                    <i class="fa fa-download me-1"></i> Download PDF
                                </a>
                            </div>
                            @if(site_setting('contact_phone_1'))
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', site_setting('contact_phone_1')) }}" class="btn-modern btn-outline-modern">
                                    <i class="fa fa-phone me-1"></i> Call Direct: {{ site_setting('contact_phone_1') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Schema.org JSON-LD -->
            <script type="application/ld+json">
            {
              "@context": "https://schema.org/",
              "@type": "Product",
              "name": "{{ addslashes($project->title) }}",
              "image": "{{ $project->thumbnail_url }}",
              "description": "{{ addslashes(strip_tags($project->short_description ?? $project->title)) }}",
              "brand": {
                "@type": "Brand",
                "name": "HIND"
              },
              "manufacturer": {
                "@type": "Organization",
                "name": "Hindson Industries"
              }
            }
            </script>

            <!-- Related Projects Grid -->
            @if ($relatedProjects->count() > 0)
                <div class="mt-5 pt-4 border-top">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-bold text-dark mb-0">Related Models in this Category</h3>
                        <a href="{{ route('portfolio', ['category' => $project->category->slug ?? '']) }}" class="text-primary text-decoration-none fw-semibold">
                            View All <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="row g-4">
                        @foreach ($relatedProjects as $rel)
                            <div class="col-lg-4 col-md-6">
                                <div class="project-card">
                                    <div class="project-thumbnail-wrapper" style="aspect-ratio: 16/10;">
                                        <img src="{{ $rel->thumbnail_url }}" alt="{{ $rel->title }}" loading="lazy">
                                    </div>
                                    <div class="project-card-body">
                                        <h4 class="project-card-title fs-5">
                                            <a href="{{ route('portfolio.show', $rel->slug) }}">{{ $rel->title }}</a>
                                        </h4>
                                        <p class="project-card-desc small">
                                            {{ $rel->short_description ?? Str::limit(strip_tags($rel->description), 90) }}
                                        </p>
                                        <div class="project-card-footer">
                                            <a href="{{ route('portfolio.show', $rel->slug) }}" class="btn-modern btn-primary-modern btn-sm-modern">
                                                View Model <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
