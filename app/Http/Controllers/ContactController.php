<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        return view('frontend.contact', compact('categories'));
    }

    public function store(Request $request)
    {
        // Anti-spam honeypot
        if ($request->filled('website_hp')) {
            return redirect()->route('contact')->with('success', 'Thank you! Your inquiry has been sent successfully.');
        }

        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:25',
            'subject' => 'nullable|string|max:200',
            'service_needed' => 'nullable|string|max:100',
            'message' => 'required|string|min:10|max:3000',
        ]);

        $validated['ip_address'] = $request->ip();

        Inquiry::create($validated);

        return redirect()->route('contact')->with('success', 'Thank you for reaching out to Hindson Industries! We have received your message and our team will get back to you shortly.');
    }
}
