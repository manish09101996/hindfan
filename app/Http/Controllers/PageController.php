<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $categories = Category::active()->withCount('publishedProjects')->get();
        $totalProjectsCount = Project::published()->count();

        return view('frontend.about', compact('categories', 'totalProjectsCount'));
    }

    public function services()
    {
        $categories = Category::active()->with(['publishedProjects' => function ($q) {
            $q->take(4);
        }])->get();

        return view('frontend.services', compact('categories'));
    }

    public function brochure()
    {
        $categories = Category::active()->get();

        return view('frontend.brochure', compact('categories'));
    }
}
