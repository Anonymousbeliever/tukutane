<div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-tukutane-teal text-tukutane-white p-4 z-40
            transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out shadow-lg">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold">Tukutane</h1>
        {{-- Close button for mobile sidebar --}}
        <button id="sidebar-toggle-close" class="md:hidden text-tukutane-white hover:text-gray-200 focus:outline-none transition-colors duration-200">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
            <span class="sr-only">Close sidebar</span>
        </button>
    </div>

    <nav class="space-y-2">
        @if (Auth::user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('admin.dashboard') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 00-1 1h-3m-6-9v9a1 1 0 001 1h2a1 1 0 001-1v-9m-6 0h6"></path></svg>
                Admin Dashboard
            </a>
            <a href="{{ route('admin.alumni.index') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('admin.alumni.*') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-10a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2zM12 10v4m-2-2h4"></path></svg>
                Manage Alumni
            </a>
            <a href="{{ route('admin.events.index') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('admin.events.*') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Manage Events
            </a>
            <a href="{{ route('admin.payments.index') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('admin.payments.*') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                View Payments
            </a>
        @else {{-- Alumnus --}}
            <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('dashboard') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 00-1 1h-3m-6-9v9a1 1 0 001 1h2a1 1 0 001-1v-9m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('profile.edit') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Profile
            </a>
            <a href="{{ route('events.index') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('events.*') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Events
            </a>
            <a href="{{ route('payments.pay') }}" class="flex items-center py-3 px-4 rounded-lg text-lg font-medium
                       hover:bg-tukutane-white hover:text-tukutane-teal transition-all duration-200 ease-in-out
                       {{ request()->routeIs('payments.pay') ? 'bg-tukutane-white text-tukutane-teal shadow-md' : '' }}">
                <svg class="h-6 w-6 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Make Payment
            </a>
        @endif
    </nav>
</div>
