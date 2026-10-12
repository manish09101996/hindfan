@extends('layouts.admin')

@section('title', 'Manage Portfolio Categories')
@section('page_title', 'Portfolio Categories')

@section('content')
    <div class="row g-4">
        <!-- Left: Add New Category Form -->
        <div class="col-lg-4">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="fw-bold text-dark mb-0"><i class="fa fa-folder-plus text-primary me-2"></i> Add New Category</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold text-secondary small">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required placeholder="e.g. Industrial Exhaust Fans" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label fw-semibold text-secondary small">Slug (Optional)</label>
                            <input type="text" class="form-control font-monospace @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="industrial-exhaust-fans" value="{{ old('slug') }}">
                            <small class="text-muted">Auto-generated if left blank.</small>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold text-secondary small">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief overview of this product category...">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="display_order" class="form-label fw-semibold text-secondary small">Display Order</label>
                            <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', 0) }}" min="0">
                        </div>

                        <button type="submit" class="btn-modern btn-primary-modern w-100">
                            <i class="fa fa-plus"></i> Save Category
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right: Existing Categories Table -->
        <div class="col-lg-8">
            <div class="card border-0 rounded-4 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0">Active Categories ({{ $categories->count() }})</h5>
                    <span class="badge bg-primary-subtle text-primary rounded-pill">Total: {{ $categories->count() }}</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Name</th>
                                    <th>Slug</th>
                                    <th>Projects</th>
                                    <th>Order</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $cat)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="fw-bold text-dark">{{ $cat->name }}</div>
                                            @if ($cat->description)
                                                <small class="text-muted d-block">{{ Str::limit($cat->description, 60) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <code class="text-secondary small">{{ $cat->slug }}</code>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.portfolio.index', ['category_id' => $cat->id]) }}" class="badge bg-light text-primary text-decoration-none border px-2 py-1">
                                                <i class="fa fa-layer-group me-1"></i> {{ $cat->projects_count }} projects
                                            </a>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark">{{ $cat->display_order }}</span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCatModal{{ $cat->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDeletion('delCatForm{{ $cat->id }}', 'Delete category \'{{ addslashes($cat->name) }}\'? Projects will remain as uncategorized.')">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                            <form id="delCatForm{{ $cat->id }}" action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Category Modal -->
                                    <div class="modal fade" id="editCatModal{{ $cat->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4 border-0 shadow">
                                                <form action="{{ route('admin.categories.update', $cat->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header border-bottom">
                                                        <h5 class="modal-title fw-bold">Edit Category: {{ $cat->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4">
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold small text-secondary">Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{ $cat->name }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold small text-secondary">Slug</label>
                                                            <input type="text" class="form-control font-monospace" name="slug" value="{{ $cat->slug }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold small text-secondary">Description</label>
                                                            <textarea class="form-control" name="description" rows="3">{{ $cat->description }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label fw-semibold small text-secondary">Display Order</label>
                                                            <input type="number" class="form-control" name="display_order" value="{{ $cat->display_order }}" min="0">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-top">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No categories created yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
