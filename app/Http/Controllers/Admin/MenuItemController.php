<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    // SHOW all menu items
    public function index()
    {
        // Load items with their category, newest first
        $menuItems = MenuItem::with('category')
                             ->orderBy('name')
                             ->paginate(10);

        return view('admin.menu-items.index', compact('menuItems'));
    }

    // SHOW create form
    public function create()
    {
        // Pass all categories to the form for the dropdown
        $categories = MenuCategory::orderBy('name')->get();

        return view('admin.menu-items.create', compact('categories'));
    }

    // SAVE new menu item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'  => 'required|exists:menu_categories,id',
            'name'         => 'required|string|max:200',
            'description'  => 'nullable|string|max:1000',
            'price'        => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        // Checkboxes are not sent when unchecked
        // so we default is_available to false if not in request
        $validated['is_available'] = $request->has('is_available');

        MenuItem::create($validated);

        return redirect()->route('admin.menu-items.index')
                         ->with('success', 'Menu item created successfully.');
    }

    // SHOW edit form
    public function edit(MenuItem $menuItem)
    {
        $categories = MenuCategory::orderBy('name')->get();

        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    // UPDATE menu item
    public function update(Request $request, MenuItem $menuItem)
    {
        $validated = $request->validate([
            'category_id'  => 'required|exists:menu_categories,id',
            'name'         => 'required|string|max:200',
            'description'  => 'nullable|string|max:1000',
            'price'        => 'required|numeric|min:0',
            'is_available' => 'boolean',
        ]);

        $validated['is_available'] = $request->has('is_available');

        $menuItem->update($validated);

        return redirect()->route('admin.menu-items.index')
                         ->with('success', 'Menu item updated successfully.');
    }

    // DELETE menu item
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();

        return redirect()->route('admin.menu-items.index')
                         ->with('success', 'Menu item deleted successfully.');
    }
}