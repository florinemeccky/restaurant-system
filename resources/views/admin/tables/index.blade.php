@extends('admin.layout')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Restaurant Tables</h2>
    <a href="{{ route('admin.tables.create') }}"
       class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-2 rounded">
        + Add New Table
    </a>
</div>

<div class="bg-white rounded shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3">Table Number</th>
                <th class="px-6 py-3">Capacity</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tables as $table)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-semibold">{{ $table->table_number }}</td>
                <td class="px-6 py-4">{{ $table->capacity }} people</td>
                <td class="px-6 py-4">
                    {{-- Color-coded status badge --}}
                    @if($table->status === 'available')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">Available</span>
                    @elseif($table->status === 'reserved')
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-sm">Reserved</span>
                    @else
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm">Occupied</span>
                    @endif
                </td>
                <td class="px-6 py-4 flex gap-3">
                    {{-- Edit Button --}}
                    <a href="{{ route('admin.tables.edit', $table) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                        Edit
                    </a>

                    {{-- Delete Button --}}
                    <form method="POST" action="{{ route('admin.tables.destroy', $table) }}"
                          onsubmit="return confirm('Are you sure you want to delete this table?')">
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
                    No tables found. Add your first table!
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination Links --}}
<div class="mt-4">
    {{ $tables->links() }}
</div>

@endsection