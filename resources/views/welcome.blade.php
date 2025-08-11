<x-guest-layout>
    <div class="min-h-screen bg-white text-gray-900 flex-col flex">
        {{-- Header/Navigation for Landing Page --}}
        <header class="absolute top-0 left-0 right-0 z-10 p-6 md:p-8 bg-transparent">
            <nav class="flex-between max-w-7xl mx-auto">
                <div class="flex-center">
                    <a href="{{ url('/') }}" class="text-3xl font-extrabold text-primary-red">Tukutane</a>
                    {{-- You can replace this with an actual logo image --}}
                    {{-- <img src="/path/to/your/logo.png" alt="Tukutane Logo" class="h-10 mr-2"> --}}
                </div>
                <div class="flex-center gap-6">
                    <a href="#about" class="text-gray-700 hover:text-primary-red transition-colors duration-200 text-lg font-medium">About</a>
                    <a href="#events" class="text-gray-700 hover:text-primary-red transition-colors duration-200 text-lg font-medium">Events</a>
                    <a href="#contact" class="text-gray-700 hover:text-primary-red transition-colors duration-200 text-lg font-medium">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary px-6 py-3 text-sm shadow-md">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary px-6 py-3 text-sm shadow-md">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-gray-700 hover:text-primary-red transition-colors duration-200 text-lg font-medium">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </header>

        {{-- Hero Section --}}
        <section class="relative flex-center h-screen bg-gray-50 overflow-hidden">
            <div class="absolute inset-0">
                {{-- Placeholder image inspired by your design --}}
                <img src="/placeholder.svg?height=1080&width=1920" alt="Alumni Network" class="w-full h-full object-cover opacity-70">
            </div>
            <div class="relative z-10 text-center max-w-4xl px-4">
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-tight mb-6 drop-shadow-lg">
                    Your Network, Your Power
                </h1>
                <p class="text-lg md:text-xl text-gray-700 mb-8 drop-shadow-md">
                    Connect with fellow graduates, discover exciting events, and empower your professional journey with Tukutane.
                </p>
                <div class="flex-center gap-4">
                    <a href="{{ route('login') }}" class="btn btn-primary px-8 py-4 text-lg rounded-full shadow-lg">
                        Get Started
                    </a>
                    <a href="#events-highlight" class="btn btn-secondary px-8 py-4 text-lg rounded-full shadow-lg">
                        Explore Events
                    </a>
                </div>
            </div>
        </section>

        {{-- About Tukutane Section --}}
        <section id="about" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">About Tukutane</h2>
                <p class="text-xl text-gray-700 max-w-3xl mx-auto mb-12">
                    Tukutane is the premier alumni management system for the Institute of Software Technologies (IST), designed to foster lasting connections and professional growth among graduates.
                </p>
                <div class="grid-cols-1 grid-cols-md-3 gap-8">
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <svg class="h-12 w-12 text-primary-red mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h-10a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v12a2 2 0 01-2 2zM12 10v4m-2-2h4"></path></svg>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Alumni Profiles</h3>
                        <p class="text-gray-700">Create and manage your professional profile, showcasing your achievements and connecting with peers.</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <svg class="h-12 w-12 text-primary-red mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Events & Networking</h3>
                        <p class="text-gray-700">Stay updated on exclusive alumni events, workshops, and networking opportunities.</p>
                    </div>
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <svg class="h-12 w-12 text-primary-red mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-2">Secure Payments</h3>
                        <p class="text-gray-700">Easily make payments for events or donations through integrated M-Pesa Daraja.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Upcoming Events Highlight Section --}}
        <section id="events-highlight" class="py-20 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-gray-900 text-center mb-12">Featured Events</h2>
                <div class="grid-cols-1 grid-cols-md-2 grid-cols-lg-3 gap-8">
                    {{-- Placeholder Event 1 --}}
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Annual Alumni Gala</h3>
                        <p class="text-gray-600 text-sm mb-4">December 15, 2025 at Grand Hyatt Nairobi</p>
                        <p class="text-gray-700 mb-4">Join us for an evening of celebration, networking, and fine dining. Reconnect with old friends and make new connections.</p>
                        <a href="{{ route('login') }}" class="text-primary-red hover:text-primary-red-light font-medium">Learn More & RSVP &rarr;</a>
                    </div>
                    {{-- Placeholder Event 2 --}}
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Tech Innovation Summit</h3>
                        <p class="text-gray-600 text-sm mb-4">November 20, 2025 at IST Auditorium</p>
                        <p class="text-gray-700 mb-4">A day of insightful talks and workshops on the latest trends in software technology. Featuring industry leaders and alumni experts.</p>
                        <a href="{{ route('login') }}" class="text-primary-red hover:text-primary-red-light font-medium">Learn More & RSVP &rarr;</a>
                    </div>
                    {{-- Placeholder Event 3 --}}
                    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Career Mentorship Session</h3>
                        <p class="text-gray-600 text-sm mb-4">October 28, 2025 (Online)</p>
                        <p class="text-gray-700 mb-4">Get personalized career advice from experienced alumni in various fields. A great opportunity for recent graduates.</p>
                        <a href="{{ route('login') }}" class="text-primary-red hover:text-primary-red-light font-medium">Learn More & RSVP &rarr;</a>
                    </div>
                </div>
                <div class="text-center mt-12">
                    <a href="{{ route('login') }}" class="btn btn-primary px-6 py-3 text-base shadow-md">
                        View All Events
                    </a>
                </div>
            </div>
        </section>

        {{-- Call to Action / Join Section --}}
        <section class="py-20 bg-primary-red text-white-color text-center">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold mb-4">Ready to Connect?</h2>
                <p class="text-xl mb-8">Join the Tukutane alumni network today and unlock a world of opportunities.</p>
                <a href="{{ route('register') }}" class="btn btn-secondary px-8 py-4 text-lg rounded-full shadow-lg">
                    Register Now
                </a>
            </div>
        </section>

        {{-- Footer --}}
        <footer id="contact" class="bg-gray-900 text-gray-300 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid-cols-1 grid-cols-md-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-white-color mb-4">Tukutane</h3>
                    <p class="text-gray-400">Connecting IST graduates, empowering futures.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white-color mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#about" class="hover:text-primary-red transition-colors duration-200">About Us</a></li>
                        <li><a href="#events-highlight" class="hover:text-primary-red transition-colors duration-200">Events</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-primary-red transition-colors duration-200">Login</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-primary-red transition-colors duration-200">Register</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white-color mb-4">Contact Us</h3>
                    <p class="text-gray-400">Email: info@tukutane.com</p>
                    <p class="text-gray-400">Phone: +254 7XX XXX XXX</p>
                    <p class="text-gray-400">Address: Institute of Software Technologies, Nairobi, Kenya</p>
                </div>
            </div>
            <div class="text-center text-gray-500 mt-8 border-t border-gray-700 pt-8">
                &copy; {{ date('Y') }} Tukutane. All rights reserved.
            </div>
        </footer>
    </div>
</x-guest-layout>
