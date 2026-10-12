<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('projects')
            ->orderBy('display_order')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
            'slug' => 'nullable|string|max:100|unique:categories,slug',
            'description' => 'nullable|string|max:500',
            'display_order' => 'nullable|integer|min:0',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        } else {
            $validated['slug'] = Str::slug($validated['slug']);
        }

        $validated['display_order'] = $request->input('display_order', 0);
        $validated['is_active'] = true;

        Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category "' . $validated['name'] . '" created successfully.');
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:100|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string|max:500',
            'display_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['display_order'] = $request->input('display_order', 0);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category "' . $category->name . '" updated successfully.');
    }

    public function destroy(Category $category)
    {
        $name = $category->name;
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category "' . $name . '" deleted successfully.');
    }
}
