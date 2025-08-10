<nav class="bg-white border-b border-gray-100 shadow-sm py-3 px-6 flex items-center justify-between">
    {{-- Mobile Sidebar Toggle Button (inside header for mobile) --}}
    <button id="sidebar-toggle-open" class="md:hidden text-gray-600 hover:text-tukutane-red focus:outline-none transition-colors duration-200 mr-4">
        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span class="sr-only">Open sidebar</span>
    </button>

    {{-- Search Box --}}
    <div class="relative flex-1 max-w-md mr-4 hidden md:block">
        <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 shadow-sm focus:border-tukutane-red focus:ring-tukutane-red transition-all duration-200 ease-in-out">
        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
    </div>

    {{-- Right side: Notifications and User Dropdown --}}
    <div class="flex items-center ml-auto">
        {{-- Notifications Icon --}}
        <button class="p-2 rounded-full text-gray-600 hover:bg-gray-100 hover:text-tukutane-red focus:outline-none transition-all duration-200 ease-in-out mr-4">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            <span class="sr-only">Notifications</span>
        </button>

        {{-- User Profile Dropdown --}}
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-lg font-medium text-gray-700 hover:text-tukutane-red hover:border-gray-300 focus:outline-none focus:text-tukutane-red focus:border-gray-300 transition-all duration-200 ease-in-out">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ml-2">
                        <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('settings.index')">
                    {{ __('Settings') }}
                </x-dropdown-link>

                {{-- Authentication --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>
