<x-guest-layout>
    <div class="min-h-screen bg-white text-gray-900 flex-col flex">
        {{-- Header/Navigation for Landing Page --}}
        <header class="absolute top-0 left-0 right-0 z-10 p-4 sm:p-6 lg:p-8 bg-transparent">
            <nav class="flex items-center justify-between max-w-7xl mx-auto">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-2xl sm:text-3xl font-extrabold text-primary-red">Tukutane</a>
                </div>
                <!-- Improved mobile navigation with responsive design -->
                <div class="hidden md:flex items-center gap-4 lg:gap-6">
                    <a href="#about" class="text-gray-700 hover:text-primary-red transition-colors duration-200 text-base lg:text-lg font-medium">About</a>
                    <a href="#events" class="text-gray-700 hover:text-primary-red transition-colors duration-200 text-base lg:text-lg font-medium">Events</a>
                    <a href="#contact" class="text-gray-700 hover:text-primary-red transition-colors duration-200 text-base lg:text-lg font-medium">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary px-4 py-2 lg:px-6 lg:py-3 text-sm shadow-md">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2 lg:px-6 lg:py-3 text-sm shadow-md">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-2 lg:ml-4 text-gray-700 hover:text-primary-red transition-colors duration-200 text-base lg:text-lg font-medium">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary-red p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>
            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg rounded-lg mt-2 p-4">
                <div class="flex flex-col space-y-3">
                    <a href="#about" class="text-gray-700 hover:text-primary-red transition-colors duration-200 font-medium">About</a>
                    <a href="#events" class="text-gray-700 hover:text-primary-red transition-colors duration-200 font-medium">Events</a>
                    <a href="#contact" class="text-gray-700 hover:text-primary-red transition-colors duration-200 font-medium">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary text-center text-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary text-center text-sm">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-700 hover:text-primary-red transition-colors duration-200 font-medium text-center">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        {{-- Hero Section --}}
        <!-- Improved hero section with better responsive design and spacing -->
        <section class="relative flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
            <div class="absolute inset-0">
                <img src="/placeholder.svg?height=1080&width=1920" alt="Alumni Network" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-r from-white/30 to-transparent"></div>
            </div>
            <div class="relative z-10 text-center max-w-5xl px-4 sm:px-6 lg:px-8">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-gray-900 leading-tight mb-4 sm:mb-6 drop-shadow-lg">
                    Your Network, <br class="hidden sm:block">Your Power
                </h1>
                <p class="text-base sm:text-lg lg:text-xl text-gray-700 mb-6 sm:mb-8 max-w-3xl mx-auto drop-shadow-md leading-relaxed">
                    Connect with fellow graduates, discover exciting events, and empower your professional journey with Tukutane.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4">
                    <a href="{{ route('login') }}" class="btn btn-primary px-6 sm:px-8 py-3 sm:py-4 text-base lg:text-lg rounded-full shadow-lg w-full sm:w-auto">
                        Get Started
                    </a>
                    <a href="#events-highlight" class="btn btn-secondary px-6 sm:px-8 py-3 sm:py-4 text-base lg:text-lg rounded-full shadow-lg w-full sm:w-auto">
                        Explore Events
                    </a>
                </div>
            </div>
        </section>

        {{-- About Tukutane Section --}}
        <!-- Enhanced about section with better grid layout and spacing -->
        <section id="about" class="py-12 sm:py-16 lg:py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3 sm:mb-4">About Tukutane</h2>
                <p class="text-lg sm:text-xl text-gray-700 max-w-4xl mx-auto mb-8 sm:mb-12 leading-relaxed">
                    Tukutane is the premier alumni management system for the Institute of Software Technologies (IST), designed to foster lasting connections and professional growth among graduates.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <div class="bg-gray-50 p-6 lg:p-8 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                        <svg class="h-10 w-10 sm:h-12 sm:w-12 text-primary-red mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2">Alumni Profiles</h3>
                        <p class="text-gray-700 leading-relaxed">Create and manage your professional profile, showcasing your achievements and connecting with peers.</p>
                    </div>
                    <div class="bg-gray-50 p-6 lg:p-8 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                        <svg class="h-10 w-10 sm:h-12 sm:w-12 text-primary-red mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2">Events & Networking</h3>
                        <p class="text-gray-700 leading-relaxed">Stay updated on exclusive alumni events, workshops, and networking opportunities.</p>
                    </div>
                    <div class="bg-gray-50 p-6 lg:p-8 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out md:col-span-2 lg:col-span-1">
                        <svg class="h-10 w-10 sm:h-12 sm:w-12 text-primary-red mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h10m-9 4h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2">Secure Payments</h3>
                        <p class="text-gray-700 leading-relaxed">Easily make payments for events or donations through integrated M-Pesa Daraja.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Upcoming Events Highlight Section --}}
        <!-- Improved events section with better card design and responsive layout -->
        <section id="events-highlight" class="py-12 sm:py-16 lg:py-20 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 text-center mb-8 sm:mb-12">Featured Events</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                        <div class="flex items-center mb-3">
                            <div class="w-3 h-3 bg-primary-red rounded-full mr-3"></div>
                            <span class="text-sm text-gray-500 font-medium">December 15, 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Annual Alumni Gala</h3>
                        <p class="text-gray-600 text-sm mb-3">Grand Hyatt Nairobi</p>
                        <p class="text-gray-700 mb-4 leading-relaxed">Join us for an evening of celebration, networking, and fine dining. Reconnect with old friends and make new connections.</p>
                        <a href="{{ route('login') }}" class="inline-flex items-center text-primary-red hover:text-red-700 font-medium transition-colors duration-200">
                            Learn More & RSVP 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out">
                        <div class="flex items-center mb-3">
                            <div class="w-3 h-3 bg-primary-red rounded-full mr-3"></div>
                            <span class="text-sm text-gray-500 font-medium">November 20, 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Tech Innovation Summit</h3>
                        <p class="text-gray-600 text-sm mb-3">IST Auditorium</p>
                        <p class="text-gray-700 mb-4 leading-relaxed">A day of insightful talks and workshops on the latest trends in software technology. Featuring industry leaders and alumni experts.</p>
                        <a href="{{ route('login') }}" class="inline-flex items-center text-primary-red hover:text-red-700 font-medium transition-colors duration-200">
                            Learn More & RSVP 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200 hover:shadow-xl hover:scale-105 transition-all duration-300 ease-in-out md:col-span-2 lg:col-span-1">
                        <div class="flex items-center mb-3">
                            <div class="w-3 h-3 bg-primary-red rounded-full mr-3"></div>
                            <span class="text-sm text-gray-500 font-medium">October 28, 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Career Mentorship Session</h3>
                        <p class="text-gray-600 text-sm mb-3">Online Event</p>
                        <p class="text-gray-700 mb-4 leading-relaxed">Get personalized career advice from experienced alumni in various fields. A great opportunity for recent graduates.</p>
                        <a href="{{ route('login') }}" class="inline-flex items-center text-primary-red hover:text-red-700 font-medium transition-colors duration-200">
                            Learn More & RSVP 
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-8 sm:mt-12">
                    <a href="{{ route('login') }}" class="btn btn-primary px-6 sm:px-8 py-3 sm:py-4 text-base shadow-md rounded-full">
                        View All Events
                    </a>
                </div>
            </div>
        </section>

        {{-- Call to Action / Join Section --}}
        <!-- Enhanced CTA section with better spacing and responsive design -->
        <section class="py-12 sm:py-16 lg:py-20 bg-primary-red text-white text-center">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl sm:text-4xl font-bold mb-3 sm:mb-4">Ready to Connect?</h2>
                <p class="text-lg sm:text-xl mb-6 sm:mb-8 leading-relaxed">Join the Tukutane alumni network today and unlock a world of opportunities.</p>
                <a href="{{ route('register') }}" class="btn btn-secondary px-6 sm:px-8 py-3 sm:py-4 text-base lg:text-lg rounded-full shadow-lg inline-block">
                    Register Now
                </a>
            </div>
        </section>

        {{-- Footer --}}
        <!-- Improved footer with better responsive grid and spacing -->
        <footer id="contact" class="bg-gray-900 text-gray-300 py-8 sm:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <div class="md:col-span-2 lg:col-span-1">
                        <h3 class="text-xl font-bold text-white mb-3 sm:mb-4">Tukutane</h3>
                        <p class="text-gray-400 leading-relaxed">Connecting IST graduates, empowering futures through professional networking and continuous learning.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-3 sm:mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#about" class="hover:text-primary-red transition-colors duration-200">About Us</a></li>
                            <li><a href="#events-highlight" class="hover:text-primary-red transition-colors duration-200">Events</a></li>
                            <li><a href="{{ route('login') }}" class="hover:text-primary-red transition-colors duration-200">Login</a></li>
                            <li><a href="{{ route('register') }}" class="hover:text-primary-red transition-colors duration-200">Register</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-3 sm:mb-4">Contact Us</h3>
                        <div class="space-y-2 text-gray-400">
                            <p>Email: info@tukutane.com</p>
                            <p>Phone: +254 7XX XXX XXX</p>
                            <p>Address: Institute of Software Technologies, Nairobi, Kenya</p>
                        </div>
                    </div>
                </div>
                <div class="text-center text-gray-500 mt-6 sm:mt-8 pt-6 sm:pt-8 border-t border-gray-700">
                    &copy; {{ date('Y') }} Tukutane. All rights reserved.
                </div>
            </div>
        </footer>
    </div>

    <!-- Added JavaScript for mobile menu functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-guest-layout>
