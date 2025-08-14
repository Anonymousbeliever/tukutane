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

       {{-- Fixed user profile dropdown with proper Alpine.js syntax and profile photo --}}
       <div class="relative dropdown" x-data="{ open: false }" @click.outside="open = false">
           <button @click="open = !open" class="dropdown-trigger-button">
               {{-- Fixed profile photo display --}}
               @if(Auth::user()->alumniProfile && Auth::user()->alumniProfile->hasProfilePhoto())
                   <img src="{{ Auth::user()->alumniProfile->profile_photo_url }}" 
                        alt="{{ Auth::user()->name }}" 
                        class="w-8 h-8 rounded-full object-cover mr-2 border-2 border-gray-200">
               @else
                   <div class="w-8 h-8 rounded-full bg-primary-red text-white-color flex-center mr-2 text-sm font-semibold border-2 border-gray-200">
                       {{ substr(Auth::user()->name, 0, 1) }}
                   </div>
               @endif
               <div class="hidden sm:block">{{ Auth::user()->name }}</div>
               <div class="ml-2">
                   <svg class="fill-current h-5 w-5 transition-transform duration-200" 
                        :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                       <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                   </svg>
               </div>
           </button>

           {{-- Fixed dropdown content with proper positioning and z-index --}}
           <div x-show="open" 
                x-transition:enter="transition ease-out duration-200" 
                x-transition:enter-start="opacity-0 scale-95" 
                x-transition:enter-end="opacity-100 scale-100" 
                x-transition:leave="transition ease-in duration-75" 
                x-transition:leave-start="opacity-100 scale-100" 
                x-transition:leave-end="opacity-0 scale-95" 
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5 focus:outline-none"
                x-cloak>
               <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                   <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                   </svg>
                   {{ __('Profile') }}
               </a>
               <a href="{{ route('settings.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                   <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                   </svg>
                   {{ __('Settings') }}
               </a>

               {{-- Fixed logout form with proper styling --}}
               <form method="POST" action="{{ route('logout') }}">
                   @csrf
                   <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left">
                       <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                       </svg>
                       {{ __('Log Out') }}
                   </button>
               </form>
           </div>
       </div>
   </div>
</nav>