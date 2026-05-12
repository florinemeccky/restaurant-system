<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome — Restaurant System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navigation --}}
    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">🍽️ Our Restaurant</h1>
        <div class="flex gap-4 items-center">
            <span class="text-gray-600">Hello, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="max-w-4xl mx-auto px-6 py-12 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">
            Welcome back, {{ auth()->user()->name }}! 👋
        </h2>
        <p class="text-gray-500 mb-10">What would you like to do today?</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white rounded shadow p-8">
                <div class="text-5xl mb-4">📅</div>
                <h3 class="text-xl font-semibold mb-2">Make a Reservation</h3>
                <p class="text-gray-500 text-sm mb-4">Book a table for your visit</p>
                <span class="bg-gray-200 text-gray-500 px-6 py-2 rounded font-semibold text-sm">
                    Coming Soon
                </span>
            </div>

            <div class="bg-white rounded shadow p-8">
                <div class="text-5xl mb-4">🍔</div>
                <h3 class="text-xl font-semibold mb-2">View Menu</h3>
                <p class="text-gray-500 text-sm mb-4">Browse our delicious dishes</p>
                <span class="bg-gray-200 text-gray-500 px-6 py-2 rounded font-semibold text-sm">
                    Coming Soon
                </span>
            </div>

        </div>
    </main>

</body>
</html>