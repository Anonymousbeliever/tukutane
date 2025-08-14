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

        {{-- Scripts & Styles --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        {{-- Check if this is the welcome page for full width, otherwise use auth layout --}}
        @if(request()->routeIs('welcome') || request()->is('/'))
            {{-- Full width for welcome page --}}
            <div class="welcome-page min-h-screen w-full">
                {{ $slot }}
            </div>
        @else
            {{-- Centered layout for auth pages (login, register, etc.) --}}
            <div class="min-h-screen flex flex-col justify-center py-6 sm:py-12" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full px-4">
                    <div class="auth-form">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @endif
    </body>
</html>