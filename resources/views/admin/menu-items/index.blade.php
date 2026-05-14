@extends('admin.layout')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Menu Items</h2>
    <a href="{{ route('admin.menu-items.create') }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded">
        + Add New Item
    </a>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Category</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Available</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menuItems as $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-semibold">{{ $item->name }}</td>
                <td class="px-6 py-4">
                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm">
                        {{ $item->category->name }}
                    </span>
                </td>
                <td class="px-6 py-4">${{ number_format($item->price, 2) }}</td>
                <td class="px-6 py-4">
                    @if($item->is_available)
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">
                            Yes
                        </span>
                    @else
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm">
                            No
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 flex gap-3">
                    <a href="{{ route('admin.menu-items.edit', $item) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>
                    <form method="POST"
                          action="{{ route('admin.menu-items.destroy', $item) }}"
                          onsubmit="return confirm('Delete this menu item?')">
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
                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                    No menu items found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $menuItems->links() }}
</div>

@endsection