@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Dashboard & Analytics')

@section('content')
    <!-- KPI Counters Grid -->
    <div class="row g-4 mb-4">
        <!-- Total Projects -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <span class="text-muted small fw-semibold">Total Projects</span>
                    <h2 class="fw-bold text-dark mb-0 mt-1">{{ $stats['total_projects'] }}</h2>
                    <small class="text-primary fw-semibold"><i class="fa fa-folder-open me-1"></i> In Database</small>
                </div>
                <div class="admin-stat-icon bg-primary-light text-primary">
                    <i class="fa fa-layer-group"></i>
                </div>
            </div>
        </div>

        <!-- Published Projects -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <span class="text-muted small fw-semibold">Published Live</span>
                    <h2 class="fw-bold text-success mb-0 mt-1">{{ $stats['published_projects'] }}</h2>
                    <small class="text-success fw-semibold"><i class="fa fa-globe me-1"></i> Visible Publicly</small>
                </div>
                <div class="admin-stat-icon bg-success-subtle text-success">
                    <i class="fa fa-circle-check"></i>
                </div>
            </div>
        </div>

        <!-- Draft Projects -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <span class="text-muted small fw-semibold">Draft Projects</span>
                    <h2 class="fw-bold text-secondary mb-0 mt-1">{{ $stats['draft_projects'] }}</h2>
                    <small class="text-muted fw-semibold"><i class="fa fa-eye-slash me-1"></i> Private / Pending</small>
                </div>
                <div class="admin-stat-icon bg-light text-secondary">
                    <i class="fa fa-pen-ruler"></i>
                </div>
            </div>
        </div>

        <!-- Featured Projects -->
        <div class="col-sm-6 col-xl-3">
            <div class="admin-stat-card">
                <div>
                    <span class="text-muted small fw-semibold">Featured Models</span>
                    <h2 class="fw-bold text-warning mb-0 mt-1">{{ $stats['featured_projects'] }}</h2>
                    <small class="text-warning fw-semibold"><i class="fa fa-star me-1"></i> Spotlight on Homepage</small>
                </div>
                <div class="admin-stat-icon bg-warning-subtle text-warning">
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Stats: Inquiries & Views -->
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="p-4 bg-white rounded-4 border shadow-sm d-flex align-items-center justify-content-between">
                <div>
                    <div class="small text-muted fw-semibold">Customer Inquiries</div>
                    <h3 class="fw-bold text-dark mt-1 mb-0">{{ $stats['total_inquiries'] }} Submissions</h3>
                    <div class="mt-2">
                        @if ($stats['unread_inquiries'] > 0)
                            <span class="badge bg-danger rounded-pill px-3 py-1">
                                <i class="fa fa-bell me-1"></i> {{ $stats['unread_inquiries'] }} Unread Messages
                            </span>
                        @else
                            <span class="badge bg-success-subtle text-success rounded-pill px-3 py-1">
                                <i class="fa fa-check me-1"></i> All Messages Read
                            </span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="btn-modern btn-outline-modern btn-sm-modern">
                    View Inquiries <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="p-4 bg-white rounded-4 border shadow-sm d-flex align-items-center justify-content-between">
                <div>
                    <div class="small text-muted fw-semibold">Portfolio Engagement</div>
                    <h3 class="fw-bold text-dark mt-1 mb-0">{{ number_format($stats['total_views']) }} Total Views</h3>
                    <div class="mt-2 text-muted small">
                        Categories Managed: <strong>{{ $stats['categories'] }}</strong>
                    </div>
                </div>
                <a href="{{ route('admin.portfolio.create') }}" class="btn-modern btn-primary-modern btn-sm-modern">
                    <i class="fa fa-plus"></i> Upload New Project
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions Row -->
    <div class="card border-0 rounded-4 shadow-sm mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0">Recent Portfolio Projects</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.portfolio.create') }}" class="btn btn-sm btn-primary rounded-pill">
                    <i class="fa fa-plus me-1"></i> Add Project
                </a>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                    View All Projects
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Project</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Views</th>
                            <th>Created</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentProjects as $proj)
                            <tr>
                                <td class="ps-4">
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ $proj->thumbnail_url }}" alt="{{ $proj->title }}" style="width: 48px; height: 48px; object-fit: cover;" class="rounded-3 border">
                                        <div>
                                            <a href="{{ route('admin.portfolio.edit', $proj->id) }}" class="fw-bold text-dark text-decoration-none">
                                                {{ Str::limit($proj->title, 40) }}
                                            </a>
                                            <div class="text-muted small font-monospace">/portfolio/{{ $proj->slug }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $proj->category->name ?? 'Uncategorized' }}</span>
                                </td>
                                <td>
                                    @if ($proj->status === 'published')
                                        <span class="badge-status-published"><i class="fa fa-check-circle"></i> Published</span>
                                    @else
                                        <span class="badge-status-draft"><i class="fa fa-pencil"></i> Draft</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($proj->is_featured)
                                        <span class="text-warning"><i class="fa fa-star"></i> Featured</span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-muted small"><i class="fa fa-eye me-1"></i> {{ number_format($proj->views_count) }}</span>
                                </td>
                                <td>
                                    <span class="text-muted small">{{ $proj->created_at->format('M d, Y') }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group btn-group-sm">
                                        @if ($proj->status === 'published')
                                            <a href="{{ route('portfolio.show', $proj->slug) }}" target="_blank" class="btn btn-outline-secondary" title="Preview Public Page">
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.portfolio.edit', $proj->id) }}" class="btn btn-outline-primary" title="Edit Project">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">No projects found in database.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
