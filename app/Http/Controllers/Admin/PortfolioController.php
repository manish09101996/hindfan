<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('category');

        // Search by title or technologies
        if ($request->filled('search')) {
            $search = trim($request->query('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('technologies', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->query('category_id'));
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->boolean('featured'));
        }

        $projects = $query->orderBy('display_order')
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::active()->get();

        $stats = [
            'total' => Project::count(),
            'published' => Project::where('status', 'published')->count(),
            'draft' => Project::where('status', 'draft')->count(),
            'featured' => Project::where('is_featured', true)->count(),
        ];

        return view('admin.portfolio.index', compact('projects', 'categories', 'stats'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.portfolio.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:1000',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'alt_text' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'external_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Auto slug generation if not provided
        if (empty($validated['slug'])) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $counter = 1;
            while (Project::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            $validated['slug'] = $slug;
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['display_order'] = $request->input('display_order', 0);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('portfolio', $fileName, 'public');
            $validated['thumbnail'] = $path;
        }

        $project = Project::create($validated);

        // Handle multiple gallery images upload
        if ($request->hasFile('gallery_images')) {
            $order = 1;
            foreach ($request->file('gallery_images') as $imageFile) {
                $imageFileName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();
                $imgPath = $imageFile->storeAs('portfolio/gallery', $imageFileName, 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imgPath,
                    'alt_text' => $project->title . ' - Gallery ' . $order,
                    'display_order' => $order++,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Project "' . $project->title . '" created successfully!');
    }

    public function edit(Project $project)
    {
        $project->load(['category', 'images']);
        $categories = Category::active()->get();

        return view('admin.portfolio.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $project->id,
            'category_id' => 'required|exists:categories,id',
            'short_description' => 'nullable|string|max:1000',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'alt_text' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'external_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|string|max:500',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'is_featured' => 'nullable|boolean',
            'status' => 'required|in:draft,published',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['display_order'] = $request->input('display_order', 0);

        // Handle thumbnail replacement
        if ($request->hasFile('thumbnail')) {
            // Delete old file if stored in public storage
            if ($project->thumbnail && !Str::startsWith($project->thumbnail, ['assets/', 'http://', 'https://'])) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            $file = $request->file('thumbnail');
            $fileName = time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('portfolio', $fileName, 'public');
            $validated['thumbnail'] = $path;
        }

        $project->update($validated);

        // Handle additional gallery images
        if ($request->hasFile('gallery_images')) {
            $lastOrder = $project->images()->max('display_order') ?? 0;
            foreach ($request->file('gallery_images') as $imageFile) {
                $lastOrder++;
                $imageFileName = time() . '_' . Str::random(10) . '.' . $imageFile->getClientOriginalExtension();
                $imgPath = $imageFile->storeAs('portfolio/gallery', $imageFileName, 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => $imgPath,
                    'alt_text' => $project->title . ' - Gallery ' . $lastOrder,
                    'display_order' => $lastOrder,
                ]);
            }
        }

        return redirect()->route('admin.portfolio.index')
            ->with('success', 'Project "' . $project->title . '" updated successfully!');
    }

    public function toggleStatus(Project $project)
    {
        $newStatus = $project->status === 'published' ? 'draft' : 'published';
        $project->update(['status' => $newStatus]);

        $label = $newStatus === 'published' ? 'Published' : 'Moved to Draft';
        return redirect()->back()->with('success', "Project \"{$project->title}\" is now {$label}.");
    }

    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);
        $statusText = $project->is_featured ? 'featured' : 'unfeatured';

        return redirect()->back()->with('success', "Project \"{$project->title}\" marked as {$statusText}.");
    }

    public function destroy(Project $project)
    {
        $title = $project->title;

        // Delete thumbnail file if locally stored
        if ($project->thumbnail && !Str::startsWith($project->thumbnail, ['assets/', 'http://', 'https://'])) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        // Delete gallery files
        foreach ($project->images as $img) {
            if ($img->image_path && !Str::startsWith($img->image_path, ['assets/', 'http://', 'https://'])) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        $project->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', "Project \"{$title}\" has been deleted permanently.");
    }

    public function destroyImage(ProjectImage $image)
    {
        if ($image->image_path && !Str::startsWith($image->image_path, ['assets/', 'http://', 'https://'])) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->back()->with('success', 'Gallery image removed successfully.');
    }
}
