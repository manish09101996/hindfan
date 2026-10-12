@extends('layouts.admin')

@section('title', 'Manage Portfolio Projects')
@section('page_title', 'Portfolio Projects')

@section('content')
    <!-- Top KPI Summary Bar -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded-3 border shadow-sm">
                <div class="text-muted small fw-semibold">Total Projects</div>
                <div class="fs-4 fw-bold text-dark">{{ $stats['total'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded-3 border shadow-sm">
                <div class="text-muted small fw-semibold">Published</div>
                <div class="fs-4 fw-bold text-success">{{ $stats['published'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded-3 border shadow-sm">
                <div class="text-muted small fw-semibold">Drafts</div>
                <div class="fs-4 fw-bold text-secondary">{{ $stats['draft'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="p-3 bg-white rounded-3 border shadow-sm">
                <div class="text-muted small fw-semibold">Featured</div>
                <div class="fs-4 fw-bold text-warning">{{ $stats['featured'] }}</div>
            </div>
        </div>
    </div>

    <!-- Action Bar & Filters -->
    <div class="card border-0 rounded-4 shadow-sm mb-4">
        <div class="card-body p-3 p-md-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-3">
                <div class="d-flex align-items-center gap-2">
                    <h5 class="fw-bold text-dark mb-0">Project Directory</h5>
                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">Showing {{ $projects->total() }} results</span>
                </div>
                <div>
                    <a href="{{ route('admin.portfolio.create') }}" class="btn-modern btn-primary-modern btn-sm-modern">
                        <i class="fa fa-plus"></i> Add New Project
                    </a>
                </div>
            </div>

            <!-- Filter Controls -->
            <form action="{{ route('admin.portfolio.index') }}" method="GET">
                <div class="row g-2">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-muted"></i></span>
                            <input type="text" name="search" class="form-control form-control-sm border-start-0" placeholder="Search by title, specs, or client..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="category_id" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Statuses</option>
                            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published Only</option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Drafts Only</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="featured" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>Featured Only</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-flex gap-1">
                        <button type="submit" class="btn btn-sm btn-primary w-100" title="Apply Filters">Filter</button>
                        @if(request()->hasAny(['search', 'category_id', 'status', 'featured']))
                            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-outline-danger" title="Clear Filters">
                                <i class="fa fa-times"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Projects Table -->
    <div class="card border-0 rounded-4 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4" style="width: 70px;">Thumbnail</th>
                            <th>Title &amp; Slug</th>
                            <th>Category</th>
                            <th>Publication</th>
                            <th>Featured</th>
                            <th>Order</th>
                            <th>Views</th>
                            <th class="text-end pe-4" style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td class="ps-4">
                                    <img src="{{ $project->thumbnail_url }}" alt="{{ $project->title }}" class="rounded-3 border" style="width: 54px; height: 54px; object-fit: cover;">
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">
                                        <a href="{{ route('admin.portfolio.edit', $project->id) }}" class="text-dark text-decoration-none">
                                            {{ $project->title }}
                                        </a>
                                    </div>
                                    <div class="text-muted small font-monospace">/portfolio/{{ $project->slug }}</div>
                                    @if ($project->client_name)
                                        <small class="text-primary d-block"><i class="fa fa-user-tag me-1"></i> {{ $project->client_name }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">{{ $project->category->name ?? 'Unassigned' }}</span>
                                </td>
                                <td>
                                    <!-- One-click toggle publish status -->
                                    <form action="{{ route('admin.portfolio.toggle-status', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @if ($project->status === 'published')
                                            <button type="submit" class="btn btn-sm p-0 border-0 badge-status-published" title="Click to unpublish">
                                                <i class="fa fa-circle-check"></i> Published
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm p-0 border-0 badge-status-draft" title="Click to publish">
                                                <i class="fa fa-clock"></i> Draft
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <!-- One-click toggle featured status -->
                                    <form action="{{ route('admin.portfolio.toggle-featured', $project->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @if ($project->is_featured)
                                            <button type="submit" class="btn btn-sm btn-link text-warning p-0 text-decoration-none" title="Click to remove from featured">
                                                <i class="fa fa-star fs-5"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-link text-muted p-0 text-decoration-none opacity-50" title="Click to mark as featured">
                                                <i class="far fa-star fs-5"></i>
                                            </button>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <span class="badge bg-light text-secondary">{{ $project->display_order }}</span>
                                </td>
                                <td>
                                    <span class="small text-muted"><i class="fa fa-eye me-1"></i> {{ number_format($project->views_count) }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group btn-group-sm">
                                        @if ($project->status === 'published')
                                            <a href="{{ route('portfolio.show', $project->slug) }}" target="_blank" class="btn btn-outline-secondary" title="View Public Page">
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.portfolio.edit', $project->id) }}" class="btn btn-outline-primary" title="Edit Project">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" title="Delete Project" onclick="confirmDeletion('deleteForm{{ $project->id }}', 'Permanently delete project \'{{ addslashes($project->title) }}\'? This will also remove all associated gallery images.')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>

                                    <form id="deleteForm{{ $project->id }}" action="{{ route('admin.portfolio.destroy', $project->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted fs-5 mb-2"><i class="fa fa-folder-open display-4 d-block mb-3 opacity-50"></i> No projects match your criteria.</div>
                                    <a href="{{ route('admin.portfolio.create') }}" class="btn-modern btn-primary-modern btn-sm-modern">
                                        <i class="fa fa-plus"></i> Create Your First Project
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Table Footer with Pagination -->
            @if ($projects->hasPages())
                <div class="p-3 border-top d-flex justify-content-center">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
@endsection
