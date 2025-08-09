<div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-tukutane-red text-white p-4 z-30
            transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Tukutane</h1>
        <button id="sidebar-toggle" class="md:hidden text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <nav>
        <ul class="space-y-2">
            @if (Auth::user()->isAdmin())
                <li>
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 00-1 1h-3m-6-9v9a1 1 0 001 1h2a1 1 0 001-1v-9m-6 0h6"></path></svg>
                            Admin Dashboard
                        </div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('admin.alumni.index')" :active="request()->routeIs('admin.alumni.*')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-10a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2zM12 10v4m-2-2h4"></path></svg>
                            Manage Alumni
                        </div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Manage Events
                        </div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('admin.payments.index')" :active="request()->routeIs('admin.payments.*')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            View Payments
                        </div>
                    </x-nav-link>
                </li>
            @else {{-- Alumnus --}}
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l-7 7m7-7v10a1 1 0 00-1 1h-3m-6-9v9a1 1 0 001 1h2a1 1 0 001-1v-9m-6 0h6"></path></svg>
                            Dashboard
                        </div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Profile
                        </div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.*')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Events
                        </div>
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('payments.pay')" :active="request()->routeIs('payments.pay')" class="block py-2 px-3 rounded-md hover:bg-white hover:text-tukutane-red transition-colors duration-200">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Make Payment
                        </div>
                    </x-nav-link>
                </li>
            @endif
        </ul>
    </nav>
</div>

 Mobile Sidebar Toggle Button (outside sidebar for accessibility) 
<button id="sidebar-toggle" class="fixed top-4 left-4 z-40 md:hidden bg-tukutane-red text-white p-2 rounded-md shadow-lg">
    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
</button>
