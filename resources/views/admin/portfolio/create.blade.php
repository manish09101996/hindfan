@extends('layouts.admin')

@section('title', 'Add New Portfolio Project')
@section('page_title', 'Create Portfolio Project')

@section('content')
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card border-0 rounded-4 shadow-sm mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0"><i class="fa fa-folder-plus text-primary me-2"></i> New Project Details</h5>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill">
                        <i class="fa fa-arrow-left me-1"></i> Back to Projects
                    </a>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- 1. Basic Project Identity -->
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
                                       placeholder="e.g. CHIDHI 21 Inch Industrial Pedestal Fan" 
                                       value="{{ old('title') }}" 
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Slug with auto-generation & manual override -->
                            <div class="mb-3">
                                <label for="projectSlugInput" class="form-label fw-semibold text-secondary">
                                    URL Slug <span class="text-muted fw-normal small">(Auto-generated from title, editable)</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted font-monospace small">/portfolio/</span>
                                    <input type="text" 
                                           class="form-control font-monospace @error('slug') is-invalid @enderror" 
                                           id="projectSlugInput" 
                                           name="slug" 
                                           placeholder="chidhi-21-inch-industrial-pedestal-fan" 
                                           value="{{ old('slug') }}">
                                </div>
                                <small class="text-muted">Unique URL path used by visitors and search engines.</small>
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
                                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
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
                                    <input type="number" class="form-control" id="display_order" name="display_order" value="{{ old('display_order', 0) }}" min="0">
                                    <small class="text-muted">Lower numbers (e.g. 1, 2) appear first.</small>
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
                                <textarea class="form-control" id="short_description" name="short_description" rows="2" placeholder="Brief 1-2 sentence overview shown in project cards...">{{ old('short_description') }}</textarea>
                            </div>

                            <!-- Full Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold text-secondary">Full Project Description &amp; Technical Specifications</label>
                                <textarea class="form-control font-monospace" id="description" name="description" rows="8" placeholder="Enter detailed description, HTML lists, technical parameters, sweep, power consumption, etc...">{{ old('description') }}</textarea>
                                <small class="text-muted">Supports HTML formatting like &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, and &lt;strong&gt;.</small>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 3. Image Uploads -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">3. Image Uploads &amp; Media</h6>

                            <div class="row g-4">
                                <!-- Thumbnail Upload -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <label for="thumbnailFileInput" class="form-label fw-semibold text-dark">
                                            Primary Thumbnail Image <span class="text-danger">*</span>
                                        </label>
                                        <input type="file" 
                                               class="form-control @error('thumbnail') is-invalid @enderror" 
                                               id="thumbnailFileInput" 
                                               name="thumbnail" 
                                               accept="image/jpeg,image/png,image/webp,image/gif">
                                        <small class="text-muted d-block mt-1">Recommended: 800x600px or 1000x750px (JPG, PNG, WebP). Max 5MB.</small>
                                        @error('thumbnail')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror

                                        <!-- Live Preview Box -->
                                        <div id="thumbnailPreviewBox" class="mt-2"></div>
                                    </div>
                                </div>

                                <!-- Alt Text -->
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <label for="alt_text" class="form-label fw-semibold text-dark">Image Alt Text (SEO)</label>
                                        <input type="text" class="form-control" id="alt_text" name="alt_text" placeholder="e.g. Hindfan CHIDHI 21 inch Pedestal Fan Front View" value="{{ old('alt_text') }}">
                                        <small class="text-muted d-block mt-1">Improves accessibility and Google Image search ranking.</small>
                                    </div>
                                </div>

                                <!-- Multiple Gallery Images -->
                                <div class="col-12">
                                    <div class="p-3 bg-light rounded-3 border">
                                        <label for="galleryFileInput" class="form-label fw-semibold text-dark">
                                            Multiple Project Gallery Images
                                        </label>
                                        <input type="file" 
                                               class="form-control @error('gallery_images.*') is-invalid @enderror" 
                                               id="galleryFileInput" 
                                               name="gallery_images[]" 
                                               multiple 
                                               accept="image/jpeg,image/png,image/webp,image/gif">
                                        <small class="text-muted d-block mt-1">You can select multiple photos from your computer at once. Max 5MB each.</small>
                                        @error('gallery_images.*')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror

                                        <!-- Multiple Gallery Preview Container -->
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
                                <!-- Client Name -->
                                <div class="col-md-6">
                                    <label for="client_name" class="form-label fw-semibold text-secondary">Target Market / Client Name</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="e.g. Wedding Palaces, Dairy Farms, Wholesale Dealers" value="{{ old('client_name') }}">
                                </div>

                                <!-- Completion Date -->
                                <div class="col-md-6">
                                    <label for="completion_date" class="form-label fw-semibold text-secondary">Completion / Launch Date</label>
                                    <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ old('completion_date') }}">
                                </div>

                                <!-- Technologies / Specs -->
                                <div class="col-md-6">
                                    <label for="technologies" class="form-label fw-semibold text-secondary">Key Specifications (Comma Separated)</label>
                                    <input type="text" class="form-control" id="technologies" name="technologies" placeholder="e.g. 21 Inch Sweep, 160W, 1400 RPM, Copper Motor, Double Bearings" value="{{ old('technologies') }}">
                                    <small class="text-muted">Separate specs by commas to display badge pills.</small>
                                </div>

                                <!-- External URL -->
                                <div class="col-md-6">
                                    <label for="external_url" class="form-label fw-semibold text-secondary">External Project / Video URL (Optional)</label>
                                    <input type="url" class="form-control" id="external_url" name="external_url" placeholder="https://..." value="{{ old('external_url') }}">
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- 5. SEO Optimization -->
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary text-uppercase small mb-3">5. Search Engine Optimization (SEO)</h6>

                            <div class="mb-3">
                                <label for="meta_title" class="form-label fw-semibold text-secondary">SEO Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Custom page title for search engine results..." value="{{ old('meta_title') }}">
                            </div>

                            <div class="mb-3">
                                <label for="meta_description" class="form-label fw-semibold text-secondary">SEO Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="2" placeholder="Brief summary for Google search snippet (approx 150-160 characters)...">{{ old('meta_description') }}</textarea>
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
                                        <option value="published" {{ old('status', 'published') === 'published' ? 'selected' : '' }}>Published (Live on Public Website)</option>
                                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Private, Visible only to Admin)</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 pt-md-4">
                                    <div class="form-check form-switch fs-5">
                                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                        <label class="form-check-label fs-6 fw-semibold text-dark" for="is_featured">
                                            Highlight as Featured Model (Spotlight on Homepage)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Submit Actions -->
                        <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                            <a href="{{ route('admin.portfolio.index') }}" class="btn-modern btn-outline-modern">
                                Cancel
                            </a>
                            <button type="submit" class="btn-modern btn-primary-modern btn-lg-modern">
                                <i class="fa fa-save"></i> Save &amp; Upload Project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
