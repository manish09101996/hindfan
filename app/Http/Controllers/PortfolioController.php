<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::active()->withCount('publishedProjects')->get();

        $query = Project::with('category')->published();

        // Filter by category slug
        $activeCategory = null;
        if ($request->filled('category')) {
            $catSlug = $request->query('category');
            $activeCategory = Category::where('slug', $catSlug)->first();
            if ($activeCategory) {
                $query->where('category_id', $activeCategory->id);
            }
        }

        // Search by title or technologies or description
        if ($request->filled('search')) {
            $searchTerm = trim($request->query('search'));
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('technologies', 'like', "%{$searchTerm}%")
                  ->orWhere('short_description', 'like', "%{$searchTerm}%");
            });
        }

        // Featured highlight projects (when no specific filter or for top banner)
        $featuredProjects = Project::with('category')
            ->published()
            ->featured()
            ->orderBy('display_order')
            ->take(3)
            ->get();

        $projects = $query->orderBy('display_order')->paginate(9)->withQueryString();

        return view('frontend.portfolio', compact(
            'projects',
            'categories',
            'activeCategory',
            'featuredProjects'
        ));
    }

    public function show($slug)
    {
        $project = Project::with(['category', 'images'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment views count safely
        $project->increment('views_count');

        $previous = $project->previousProject();
        $next = $project->nextProject();
        $relatedProjects = $project->relatedProjects(3);

        return view('frontend.portfolio-detail', compact(
            'project',
            'previous',
            'next',
            'relatedProjects'
        ));
    }
}
