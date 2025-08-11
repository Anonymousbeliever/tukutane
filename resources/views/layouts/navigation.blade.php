<nav class="navbar">
   {{-- Mobile Sidebar Toggle Button (inside header for mobile) --}}
   <button id="sidebar-toggle-open" class="md-hidden navbar-icon-button mr-4">
       <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
       </svg>
       <span class="sr-only">Open sidebar</span>
   </button>

   {{-- Search Box --}}
   <div class="relative flex-1 max-w-md mr-4 hidden navbar-search-md-block">
       <input type="text" placeholder="Search..." class="navbar-search-input">
       <div class="navbar-search-icon">
           <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
       </div>
   </div>

   {{-- Right side: Notifications and User Dropdown --}}
   <div class="flex-center ml-auto">
       {{-- Notifications Icon --}}
       <button class="navbar-icon-button mr-4">
           <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
           <span class="sr-only">Notifications</span>
       </button>

       {{-- User Profile Dropdown --}}
       <div class="dropdown" x-data="{ open: false }" @click.outside="open = false">
           <button @click="open = ! open" class="dropdown-trigger-button">
               <div>{{ Auth::user()->name }}</div>
               <div class="ml-2">
                   <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                       <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                   </svg>
               </div>
           </button>

           <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="dropdown-content" style="display: none;">
               <a href="{{ route('profile.edit') }}" class="dropdown-link">
                   {{ __('Profile') }}
               </a>
               <a href="{{ route('settings.index') }}" class="dropdown-link">
                   {{ __('Settings') }}
               </a>

               {{-- Authentication --}}
               <form method="POST" action="{{ route('logout') }}">
                   @csrf
                   <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                       this.closest('form').submit();" class="dropdown-link">
                       {{ __('Log Out') }}
                   </a>
               </form>
           </div>
       </div>
   </div>
</nav>
