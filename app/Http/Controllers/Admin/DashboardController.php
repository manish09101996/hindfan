<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_projects' => Project::count(),
            'published_projects' => Project::where('status', 'published')->count(),
            'draft_projects' => Project::where('status', 'draft')->count(),
            'featured_projects' => Project::where('is_featured', true)->count(),
            'categories' => Category::count(),
            'total_inquiries' => Inquiry::count(),
            'unread_inquiries' => Inquiry::where('is_read', false)->count(),
            'total_views' => Project::sum('views_count'),
        ];

        $recentProjects = Project::with('category')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $recentInquiries = Inquiry::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentInquiries'));
    }
}
