<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
            🍽️ Restaurant
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                Logout
            </button>
        </form>
    </nav>

    <main class="max-w-lg mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">My Profile</h2>

        <div class="bg-white rounded shadow p-6">
            <p class="text-gray-600 mb-2">
                <span class="font-semibold">Name:</span> {{ Auth::user()->name }}
            </p>
            <p class="text-gray-600 mb-2">
                <span class="font-semibold">Email:</span> {{ Auth::user()->email }}
            </p>
            <p class="text-gray-600">
                <span class="font-semibold">Role:</span> {{ ucfirst(Auth::user()->role) }}
            </p>
        </div>

        <div class="mt-4">
            <a href="{{ url('/') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm font-semibold">
                Back to Dashboard
            </a>
        </div>
    </main>

</body>
</html>