<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    // SHOW all categories
    public function index()
    {
        $categories = MenuCategory::withCount('menuItems')
                                  ->orderBy('name')
                                  ->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    // SHOW create form
    public function create()
    {
        return view('admin.categories.create');
    }

    // SAVE new category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:menu_categories,name',
            'description' => 'nullable|string|max:500',
        ]);

        MenuCategory::create($validated);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully.');
    }

    // SHOW edit form
    public function edit(MenuCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // UPDATE category
    public function update(Request $request, MenuCategory $category)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:menu_categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    // DELETE category
    public function destroy(MenuCategory $category)
    {
        // Check if category has menu items before deleting
        if ($category->menuItems()->count() > 0) {
            return redirect()->route('admin.categories.index')
                             ->with('error', 'Cannot delete category that has menu items.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}