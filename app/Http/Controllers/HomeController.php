<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::with('category')
            ->published()
            ->featured()
            ->orderBy('display_order')
            ->take(6)
            ->get();

        // If fewer than 6 featured, backfill with published projects
        if ($featuredProjects->count() < 6) {
            $existingIds = $featuredProjects->pluck('id');
            $additional = Project::with('category')
                ->published()
                ->whereNotIn('id', $existingIds)
                ->orderBy('display_order')
                ->take(6 - $featuredProjects->count())
                ->get();
            $featuredProjects = $featuredProjects->concat($additional);
        }

        $categories = Category::active()
            ->withCount(['publishedProjects'])
            ->get();

        $totalProjectsCount = Project::published()->count();

        return view('frontend.home', compact('featuredProjects', 'categories', 'totalProjectsCount'));
    }
}
