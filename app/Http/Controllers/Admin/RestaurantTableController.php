<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantTable;
use Illuminate\Http\Request;

class RestaurantTableController extends Controller
{
    // SHOW all tables
    public function index()
    {
        // Get all tables, newest first, 10 per page
        $tables = RestaurantTable::orderBy('table_number')->paginate(10);

        return view('admin.tables.index', compact('tables'));
    }

    // SHOW the create form
    public function create()
    {
        return view('admin.tables.create');
    }

    // SAVE a new table
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'table_number' => 'required|string|max:10|unique:restaurant_tables,table_number',
            'capacity'     => 'required|integer|min:1|max:20',
            'status'       => 'required|in:available,reserved,occupied',
        ]);

        RestaurantTable::create($validated);

        // Redirect back to list with a success message
        return redirect()->route('admin.tables.index')
                         ->with('success', 'Table created successfully.');
    }

    // SHOW the edit form
    public function edit(RestaurantTable $restaurantTable)
    {
        return view('admin.tables.edit', compact('restaurantTable'));
    }

    // UPDATE an existing table
    public function update(Request $request, RestaurantTable $restaurantTable)
    {
        $validated = $request->validate([
            'table_number' => 'required|string|max:10|unique:restaurant_tables,table_number,' . $restaurantTable->id,
            'capacity'     => 'required|integer|min:1|max:20',
            'status'       => 'required|in:available,reserved,occupied',
        ]);

        $restaurantTable->update($validated);

        return redirect()->route('admin.tables.index')
                         ->with('success', 'Table updated successfully.');
    }

    // DELETE a table
    public function destroy(RestaurantTable $restaurantTable)
    {
        $restaurantTable->delete();

        return redirect()->route('admin.tables.index')
                         ->with('success', 'Table deleted successfully.');
    }
}