@extends('admin.layout')

@section('content')

<h2 class="text-2xl font-bold text-gray-800 mb-6">Admin Dashboard</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- Tables Summary Card --}}
    <div class="bg-white rounded shadow p-6">
        <div class="text-4xl mb-2">🪑</div>
        <h3 class="text-lg font-semibold text-gray-700">Restaurant Tables</h3>
        <p class="text-gray-500 text-sm mt-1">Manage your dining tables</p>
        <a href="{{ route('admin.tables.index') }}"
           class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm font-semibold">
            View Tables
        </a>
    </div>

    {{-- Menu Card (coming soon) --}}
    <div class="bg-white rounded shadow p-6">
        <div class="text-4xl mb-2">🍕</div>
        <h3 class="text-lg font-semibold text-gray-700">Menu Items</h3>
        <p class="text-gray-500 text-sm mt-1">Manage categories and items</p>
        <span class="inline-block mt-4 bg-gray-200 text-gray-500 px-4 py-2 rounded text-sm font-semibold">
            Coming Soon
        </span>
    </div>

    {{-- Reservations Card (coming soon) --}}
    <div class="bg-white rounded shadow p-6">
        <div class="text-4xl mb-2">📅</div>
        <h3 class="text-lg font-semibold text-gray-700">Reservations</h3>
        <p class="text-gray-500 text-sm mt-1">View and manage bookings</p>
        <span class="inline-block mt-4 bg-gray-200 text-gray-500 px-4 py-2 rounded text-sm font-semibold">
            Coming Soon
        </span>
    </div>

</div>

@endsection