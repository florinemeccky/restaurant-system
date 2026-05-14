@extends('admin.layout')

@section('content')

<div class="max-w-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Edit Item — {{ $menuItem->name }}
    </h2>

    <div class="bg-white rounded shadow p-6">
        <form method="POST" action="{{ route('admin.menu-items.update', $menuItem) }}">
            @csrf
            @method('PUT')

            {{-- Category Dropdown --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Category</label>
                <select name="category_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
                    <option value="">-- Select a category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Item Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $menuItem->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">
                    Description <span class="text-gray-400 font-normal">(optional)</span>
                </label>
                <textarea name="description"
                          rows="3"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">{{ old('description', $menuItem->description) }}</textarea>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Price ($)</label>
                <input type="number"
                       name="price"
                       value="{{ old('price', $menuItem->price) }}"
                       step="0.01"
                       min="0"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
            </div>

            {{-- Available Checkbox --}}
            <div class="mb-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox"
                           name="is_available"
                           value="1"
                           {{ old('is_available', $menuItem->is_available) ? 'checked' : '' }}
                           class="w-4 h-4">
                    <span class="text-gray-700 font-semibold">Available for ordering</span>
                </label>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded">
                    Update Item
                </button>
                <a href="{{ route('admin.menu-items.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection