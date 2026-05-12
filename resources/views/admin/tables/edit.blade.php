@extends('admin.layout')

@section('content')

<div class="max-w-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Table {{ $restaurantTable->table_number }}</h2>

    <div class="bg-white rounded shadow p-6">
        <form method="POST" action="{{ route('admin.tables.update', $restaurantTable) }}">
            @csrf
            @method('PUT')

            {{-- Table Number --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Table Number</label>
                <input type="text"
                       name="table_number"
                       value="{{ old('table_number', $restaurantTable->table_number) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
            </div>

            {{-- Capacity --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Capacity (people)</label>
                <input type="number"
                       name="capacity"
                       value="{{ old('capacity', $restaurantTable->capacity) }}"
                       min="1"
                       max="20"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
            </div>

            {{-- Status --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-1">Status</label>
                <select name="status"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-yellow-500">
                    <option value="available" {{ old('status', $restaurantTable->status) == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="reserved"  {{ old('status', $restaurantTable->status) == 'reserved'  ? 'selected' : '' }}>Reserved</option>
                    <option value="occupied"  {{ old('status', $restaurantTable->status) == 'occupied'  ? 'selected' : '' }}>Occupied</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded">
                    Update Table
                </button>
                <a href="{{ route('admin.tables.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-2 rounded">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection