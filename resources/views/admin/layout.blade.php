<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — Restaurant System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Top Navigation Bar --}}
    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold">🍽️ Restaurant Admin</h1>
    <div class="flex gap-6">
        <a href="{{ route('admin.dashboard') }}"
           class="hover:text-yellow-400">Dashboard</a>
        <a href="{{ route('admin.tables.index') }}"
           class="hover:text-yellow-400">Tables</a>
        <a href="{{ route('admin.categories.index') }}"
           class="hover:text-yellow-400">Categories</a>
        <a href="{{ route('admin.menu-items.index') }}"
            class="hover:text-yellow-400">Menu Items</a>
           
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="hover:text-red-400">Logout</button>
        </form>
    </div>
</nav>

    {{-- Page Content --}}
    <main class="max-w-6xl mx-auto px-6 py-8">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Child page content goes here --}}
        @yield('content')

    </main>

</body>
</html>