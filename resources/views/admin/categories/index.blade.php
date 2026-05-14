@extends('admin.layout')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Menu Categories</h2>
    <a href="{{ route('admin.categories.create') }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded">
        + Add New Category
    </a>
</div>

{{-- Error message (e.g. cannot delete) --}}
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-6">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Description</th>
                <th class="px-6 py-3">Menu Items</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-semibold">{{ $category->name }}</td>
                <td class="px-6 py-4 text-gray-500">
                    {{ $category->description ?? '—' }}
                </td>
                <td class="px-6 py-4">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">
                        {{ $category->menu_items_count }} items
                    </span>
                </td>
                <td class="px-6 py-4 flex gap-3">
                    <a href="{{ route('admin.categories.edit', $category) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>
                    <form method="POST"
                          action="{{ route('admin.categories.destroy', $category) }}"
                          onsubmit="return confirm('Delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                    No categories found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $categories->links() }}
</div>

@endsection