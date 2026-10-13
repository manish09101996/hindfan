@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <section class="py-5 bg-dark text-white position-relative overflow-hidden">
        <div class="hero-pattern"></div>
        <div class="container position-relative py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Portfolio</li>
                </ol>
            </nav>
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h1 class="display-5 fw-bold text-white mb-2">Portfolio &amp; Product Gallery</h1>
                    <p class="lead text-white-50 mb-0">Browse our dynamic portfolio of industrial fans, dairy churners, and custom ventilation engineering.</p>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-modern btn-primary-modern">
                        <i class="fa fa-eye me-1"></i> View 2026 Brochure
                    </a>
                    <a href="{{ asset('assets/images/Brochure/Brochure 2026.pdf') }}" download="Hindson_Industries_Brochure_2026.pdf" class="btn-modern btn-outline-modern text-white border-white">
                        <i class="fa fa-download me-1"></i> Download PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Listing Section -->
    <section class="py-5 bg-white">
        <div class="container py-lg-3">
            <!-- Search & Filters Header Bar -->
            <div class="row g-3 align-items-center justify-content-between mb-4">
                <div class="col-lg-7">
                    <!-- Category Filter Pills -->
                    <div class="portfolio-filter-nav mb-0">
                        <a href="{{ route('portfolio', request()->only('search')) }}" 
                           class="filter-pill {{ empty(request('category')) ? 'active' : '' }}">
                            All Projects
                            <span class="pill-count">{{ \App\Models\Project::published()->count() }}</span>
                        </a>
                        @foreach ($categories as $cat)
                            <a href="{{ route('portfolio', array_merge(request()->only('search'), ['category' => $cat->slug])) }}" 
                               class="filter-pill {{ request('category') === $cat->slug ? 'active' : '' }}">
                                {{ $cat->name }}
                                <span class="pill-count">{{ $cat->published_projects_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Search Input Form -->
                <div class="col-lg-4 col-md-6 ms-auto">
                    <form action="{{ route('portfolio') }}" method="GET" class="position-relative">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <div class="input-group">
                            <input type="text" 
                                   name="search" 
                                   class="form-control rounded-start-pill ps-4 py-2 border-end-0" 
                                   placeholder="Search models, specs, sizes..." 
                                   value="{{ request('search') }}">
                            <button class="btn btn-primary rounded-end-pill px-4" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        @if(request('search'))
                            <div class="small text-muted mt-1 ps-2">
                                Showing results for "<strong>{{ request('search') }}</strong>" — 
                                <a href="{{ route('portfolio', request()->only('category')) }}" class="text-danger text-decoration-none">Clear search</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Active Filter Banner if Category Selected -->
            @if($activeCategory)
                <div class="p-3 mb-4 rounded-3 bg-light border d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small">Category Filter:</span>
                        <h5 class="mb-0 fw-bold text-dark">{{ $activeCategory->name }}</h5>
                        @if($activeCategory->description)
                            <small class="text-muted">{{ $activeCategory->description }}</small>
                        @endif
                    </div>
                    <a href="{{ route('portfolio', request()->only('search')) }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                        <i class="fa fa-times"></i> View All Categories
                    </a>
                </div>
            @endif

            <!-- Portfolio Grid -->
            @if ($projects->count() > 0)
                <div class="row g-4">
                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6">
                            <div class="project-card">
                                <div class="project-thumbnail-wrapper" style="background-color: #f8fafc; aspect-ratio: 4/3; display: flex; align-items: center; justify-content: center; padding: 12px;">
                                    <img src="{{ $project->thumbnail_url }}" alt="{{ $project->alt_text ?? $project->title }}" loading="lazy" style="max-width: 100%; max-height: 100%; object-fit: contain;" onerror="this.onerror=null; this.src='http://www.hindfan.com/cdn/images/products/pedestal_fan_chidhi.jpg';">
                                    @if ($project->category)
                                        <span class="project-category-badge">{{ $project->category->name }}</span>
                                    @endif
                                    @if ($project->is_featured)
                                        <span class="project-featured-star" title="Featured Model">
                                            <i class="fa fa-star"></i>
                                        </span>
                                    @endif
                                </div>
                                <div class="project-card-body">
                                    <h3 class="project-card-title">
                                        <a href="{{ route('portfolio.show', $project->slug) }}">{{ $project->title }}</a>
                                    </h3>
                                    <p class="project-card-desc">
                                        {{ $project->short_description ?? Str::limit(strip_tags($project->description), 110) }}
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
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-5 my-4">
                    <div class="mb-3 text-secondary opacity-50">
                        <i class="fa fa-folder-open display-1"></i>
                    </div>
                    <h3 class="fw-bold text-dark">No projects found</h3>
                    <p class="text-muted max-w-md mx-auto mb-4">
                        We could not find any published projects matching your current filter or search criteria.
                    </p>
                    <a href="{{ route('portfolio') }}" class="btn-modern btn-primary-modern">
                        <i class="fa fa-arrow-rotate-left"></i> Reset All Filters
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
