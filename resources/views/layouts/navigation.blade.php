<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side — Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                    🍽️ Restaurant
                </a>
            </div>

            <!-- Right side — User menu -->
            <div class="flex items-center gap-4">

                {{-- Show admin link if user is admin --}}
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-sm text-gray-600 hover:text-gray-900">
                        Admin Panel
                    </a>
                @endif

                {{-- Show staff link if user is staff --}}
                @if(Auth::user()->role === 'staff')
                    <a href="{{ route('staff.dashboard') }}"
                       class="text-sm text-gray-600 hover:text-gray-900">
                        Staff Panel
                    </a>
                @endif

                {{-- Logged in user name --}}
                <span class="text-sm text-gray-600">
                    {{ Auth::user()->name }}
                </span>

                {{-- Logout button --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="text-sm text-red-500 hover:text-red-700">
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </div>

</nav>