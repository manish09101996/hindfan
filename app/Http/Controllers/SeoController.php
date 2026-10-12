<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $projects = Project::published()->orderBy('updated_at', 'desc')->get();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Static routes
        $staticPages = [
            ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('about'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('services'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('portfolio'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => route('brochure'), 'priority' => '0.6', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($page['loc']) . '</loc>';
            $xml .= '<lastmod>' . date('Y-m-d') . '</lastmod>';
            $xml .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $page['priority'] . '</priority>';
            $xml .= '</url>';
        }

        // Project detail URLs
        foreach ($projects as $project) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(route('portfolio.show', $project->slug)) . '</loc>';
            $xml .= '<lastmod>' . $project->updated_at->format('Y-m-d') . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>' . ($project->is_featured ? '0.9' : '0.7') . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = "User-agent: *\n";
        $content .= "Disallow: /admin\n";
        $content .= "Disallow: /admin/*\n";
        $content .= "Allow: /\n\n";
        $content .= "Sitemap: " . route('sitemap') . "\n";

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
