<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-800 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">🍽️ Staff Panel</h1>
        <div class="flex gap-4 items-center">
            <span class="text-gray-300">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-400 hover:text-red-300">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Staff Dashboard</h2>
        <p class="text-gray-500 mb-8">Welcome back, {{ Auth::user()->name }}!</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white rounded shadow p-6">
                <div class="text-4xl mb-3">📅</div>
                <h3 class="text-lg font-semibold">Reservations</h3>
                <p class="text-gray-500 text-sm mt-1">View and manage bookings</p>
                <span class="inline-block mt-4 bg-gray-200 text-gray-500 px-4 py-2 rounded text-sm">
                    Coming Soon
                </span>
            </div>

            <div class="bg-white rounded shadow p-6">
                <div class="text-4xl mb-3">🍔</div>
                <h3 class="text-lg font-semibold">Orders</h3>
                <p class="text-gray-500 text-sm mt-1">View and update order statuses</p>
                <span class="inline-block mt-4 bg-gray-200 text-gray-500 px-4 py-2 rounded text-sm">
                    Coming Soon
                </span>
            </div>

        </div>
    </main>

</body>
</html>