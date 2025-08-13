<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tukutane') }}</title>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Added Alpine.js for dropdown functionality --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        {{-- Scripts & Styles --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 {{ Auth::check() ? Auth::user()->getThemeClass() : 'theme-light' }}" 
          data-theme="{{ Auth::check() ? Auth::user()->theme_preference : 'light' }}">
        <div class="app-layout-container">
            {{-- Sidebar --}}
            @auth
                @include('layouts.sidebar')
            @endauth

            {{-- Main Content Area --}}
            <div id="main-content" class="main-content-area">
                {{-- Header/Navigation Bar --}}
                @include('layouts.navigation')

                {{-- Page Heading --}}
                @if (isset($header))
                    <header class="bg-white shadow-sm py-3 sm:py-4 px-4 sm:px-6 border-b border-gray-200">
                        <div class="max-w-7xl mx-auto">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                {{-- Improved main content padding and responsiveness --}}
                <main class="flex-1 p-3 sm:p-4 lg:p-6 xl:p-8">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4 transition-all duration-300 ease-in-out" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4 transition-all duration-300 ease-in-out" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    {{ $slot }}
                </main>
            </div>
        </div>

        {{-- Theme switching JavaScript --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const body = document.body;
                const themePreference = body.getAttribute('data-theme');
                
                function applyTheme(theme) {
                    body.classList.remove('theme-light', 'theme-dark');
                    
                    if (theme === 'auto') {
                        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                        body.classList.add(prefersDark ? 'theme-dark' : 'theme-light');
                    } else {
                        body.classList.add(`theme-${theme}`);
                    }
                }
                
                // Apply initial theme
                applyTheme(themePreference);
                
                // Listen for system theme changes when auto is selected
                if (themePreference === 'auto') {
                    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
                        applyTheme('auto');
                    });
                }
            });
        </script>
    </body>
</html>
