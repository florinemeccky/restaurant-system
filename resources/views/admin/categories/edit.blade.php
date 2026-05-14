@extends('admin.layout')

@section('content')

<div class="max-w-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">
        Edit Category — {{ $category->name }}
    </h2>

    <div class="bg-white rounded shadow p-6">
        <form method="POST" action="{{ route('admin.categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">
                    Category Name
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-1">
                    Description <span class="text-gray-400 font-normal">(optional)</span>
                </label>
                <textarea name="description"
                          rows="3"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">{{ old('description', $category->description) }}</textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded">
                    Update Category
                </button>
                <a href="{{ route('admin.categories.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection