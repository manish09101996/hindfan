@extends('layouts.admin')

@section('title', 'Edit Portfolio Project: ' . $project->title)
@section('page_title', 'Edit Project')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <h5 class="fw-bold text-dark mb-0"><i class="fa fa-pen-to-square text-primary me-1"></i> Edit Project: {{ Str::limit($project->title, 35) }}</h5>
                        @if ($project->status === 'published')
                            <span class="badge-status-published">Live</span>
                        @else
                            <span class="badge-status-draft">Draft</span>
                        @endif
                    </div>
                    <div class="d-flex gap-2">
                        @if ($project->status === 'published')
                            <a href="{{ route('portfolio.show', $project->slug) }}" target="_blank" class="btn btn-sm btn-outline-info rounded-pill">
                                <i class="fa fa-external-link me-1"></i> Preview Live Page
                            </a>
                        @endif
                        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                            <i class="fa fa-arrow-left me-1"></i> All Projects
                        </a>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.portfolio.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- 1. Basic Information -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">1. Basic Information</h6>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="projectTitleInput" class="form-label fw-semibold text-secondary">
                                    Project Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                       id="projectTitleInput" 
                                       name="title" 
                                       value="{{ old('title', $project->title) }}" 
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Slug with manual editing -->
                            <div class="mb-3">
                                <label for="projectSlugInput" class="form-label fw-semibold text-secondary">
                                    URL Slug <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted font-monospace small">/portfolio/</span>
                                    <input type="text" 
                                           class="form-control font-monospace @error('slug') is-invalid @enderror" 
                                           id="projectSlugInput" 
                                           name="slug" 
                                           value="{{ old('slug', $project->slug) }}" 
                                           required>
                                </div>
                                <small class="text-muted">Direct public URL for this model.</small>
                                @error('slug')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row g-3">
                                <!-- Category -->
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label fw-semibold text-secondary">
                                        Project Category <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                        <option value="">Select Category...</option>
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ old('category_id', $project->category_id) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Display Order -->
                                <div class="col-md-6">
                                    <label for="display_order" class="form-label fw-semibold text-secondary">Display Priority Order</label>
                                    <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', $project->display_order) }}" min="0">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 2. Descriptions -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">2. Descriptions &amp; Content</h6>

                            <!-- Short Description -->
                            <div class="mb-3">
                                <label for="short_description" class="form-label fw-semibold text-secondary">Short Summary Description</label>
                                <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description', $project->short_description) }}</textarea>
                            </div>

                            <!-- Full Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold text-secondary">Full Project Description &amp; Technical Specifications</label>
                                <textarea class="form-control font-monospace" id="description" name="description" rows="8">{{ old('description', $project->description) }}</textarea>
                                <small class="text-muted">Supports HTML formatting.</small>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 3. Image Media Management -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">3. Image Media &amp; Gallery Management</h6>

                            <div class="row g-4">
                                <!-- Current Thumbnail & Replacement -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <label class="form-label fw-semibold text-dark">Current Primary Thumbnail</label>
                                        <div class="d-flex align-items-center gap-3 mb-3">
                                            <img src="{{ $project->thumbnail_url }}" alt="Current Thumbnail" style="width: 100px; height: 100px; object-fit: cover;" class="rounded-3 border shadow-sm">
                                            <div>
                                                <span class="badge bg-secondary mb-1">Active Thumbnail</span>
                                                <small class="text-muted d-block font-monospace text-break" style="font-size: 0.75rem;">{{ $project->thumbnail }}</small>
                                            </div>
                                        </div>

                                        <label for="thumbnailFileInput" class="form-label fw-semibold text-secondary small">Replace Thumbnail (Optional)</label>
                                        <input type="file" 
                                               class="form-control form-control-sm @error('thumbnail') is-invalid @enderror" 
                                               id="thumbnailFileInput" 
                                               name="thumbnail" 
                                               accept="image/jpeg,image/png,image/webp,image/gif">
                                        <div id="thumbnailPreviewBox" class="mt-2"></div>
                                        @error('thumbnail')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Alt Text -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <label for="alt_text" class="form-label fw-semibold text-dark">Image Alt Text (SEO)</label>
                                        <input type="text" class="form-control" id="alt_text" name="alt_text" value="{{ old('alt_text', $project->alt_text) }}">
                                        <small class="text-muted d-block mt-1">Keywords describing the fan or machinery image.</small>
                                    </div>
                                </div>

                                <!-- Existing Gallery Images -->
                                <div class="col-12">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <label class="form-label fw-semibold text-dark d-block">
                                            Existing Gallery Images ({{ $project->images->count() }})
                                        </label>
                                        
                                        @if ($project->images->count() > 0)
                                            <div class="d-flex flex-wrap gap-3 mb-3">
                                                @foreach ($project->images as $img)
                                                    <div class="position-relative border rounded-3 overflow-hidden bg-white shadow-sm" style="width: 120px; height: 120px;">
                                                        <img src="{{ $img->image_url }}" alt="Gallery Image" style="width: 100%; height: 100%; object-fit: cover;">
                                                        <button type="button" 
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 p-1 rounded-circle lh-1" 
                                                                style="width: 24px; height: 24px;"
                                                                title="Delete this image"
                                                                onclick="confirmDeletion('deleteImgForm{{ $img->id }}', 'Remove this image from project gallery?')">
                                                            <i class="fa fa-times small"></i>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p class="text-muted small mb-3">No additional gallery photos attached yet.</p>
                                        @endif

                                        <!-- Upload More Gallery Images -->
                                        <label for="galleryFileInput" class="form-label fw-semibold text-secondary small">Add More Gallery Images</label>
                                        <input type="file" 
                                               class="form-control form-control-sm @error('gallery_images.*') is-invalid @enderror" 
                                               id="galleryFileInput" 
                                               name="gallery_images[]" 
                                               multiple 
                                               accept="image/jpeg,image/png,image/webp,image/gif">
                                        <small class="text-muted d-block mt-1">Select one or multiple images to add to the existing gallery.</small>
                                        @error('gallery_images.*')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror

                                        <div id="galleryPreviewContainer" class="image-preview-container"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 4. Project Attributes & Specs -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">4. Specifications &amp; Metadata</h6>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="client_name" class="form-label fw-semibold text-secondary">Target Market / Client Name</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name', $project->client_name) }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="completion_date" class="form-label fw-semibold text-secondary">Completion / Launch Date</label>
                                    <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ old('completion_date', $project->completion_date ? $project->completion_date->format('Y-m-d') : '') }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="technologies" class="form-label fw-semibold text-secondary">Key Specifications (Comma Separated)</label>
                                    <input type="text" class="form-control" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies) }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="external_url" class="form-label fw-semibold text-secondary">External Project URL</label>
                                    <input type="url" class="form-control" id="external_url" name="external_url" value="{{ old('external_url', $project->external_url) }}">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 5. SEO Optimization -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">5. Search Engine Optimization (SEO)</h6>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label fw-semibold text-secondary">SEO Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $project->meta_title) }}">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label fw-semibold text-secondary">SEO Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $project->meta_description) }}</textarea>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 6. Publishing & Visibility -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">6. Visibility &amp; Publishing</h6>

                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label for="status" class="form-label fw-semibold text-secondary">Publication Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="published" {{ old('status', $project->status) === 'published' ? 'selected' : '' }}>Published (Live on Public Website)</option>
                                        <option value="draft" {{ old('status', $project->status) === 'draft' ? 'selected' : '' }}>Draft (Private, Visible only to Admin)</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 pt-md-4">
                                    <div class="form-check form-switch fs-5">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                                        <label class="form-check-label fs-6 fw-semibold text-dark" for="is_featured">
                                            Highlight as Featured Model (Spotlight on Homepage)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                            <a href="{{ route('admin.portfolio.index') }}" class="btn-modern btn-outline-modern">
                                Cancel &amp; Back
                            </a>
                            <button type="submit" class="btn-modern btn-primary-modern btn-lg-modern">
                                <i class="fa fa-save"></i> Save Changes to Project
                            </button>
                        </div>
                    </form>

                    <!-- Separate Delete Forms for Gallery Images -->
                    @foreach ($project->images as $img)
                        <form id="deleteImgForm{{ $img->id }}" action="{{ route('admin.portfolio.image.destroy', $img->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
