<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Alumni Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Welcome, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-700 mb-8">This is your alumni dashboard. Here you can manage your profile, view upcoming events, and make payments.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    {{-- Card 1: Your Profile --}}
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h4 class="text-2xl font-bold text-gray-800 mb-3">Your Profile</h4>
                        <p class="text-gray-600 mb-6">Keep your profile updated to connect with other alumni and showcase your journey.</p>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-6 py-3 bg-tukutane-teal border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-tukutane-teal focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-md">
                            Edit Profile
                            <svg class="ml-2 -mr-0.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>

                    {{-- Card 2: Upcoming Events --}}
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h4 class="text-2xl font-bold text-gray-800 mb-3">Upcoming Events</h4>
                        <p class="text-gray-600 mb-6">Discover and RSVP to exciting alumni events, workshops, and gatherings.</p>
                        <a href="{{ route('events.index') }}" class="inline-flex items-center px-6 py-3 bg-tukutane-teal border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-tukutane-teal focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-md">
                            View Events
                            <svg class="ml-2 -mr-0.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>

                    {{-- Card 3: Make a Payment --}}
                    <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-200 hover:shadow-xl transition-all duration-300 ease-in-out">
                        <h4 class="text-2xl font-bold text-gray-800 mb-3">Make a Payment</h4>
                        <p class="text-gray-600 mb-6">Easily pay for events or contribute to the alumni fund via M-Pesa.</p>
                        <a href="{{ route('payments.pay') }}" class="inline-flex items-center px-6 py-3 bg-tukutane-teal border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-tukutane-teal focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-md">
                            Pay Now
                            <svg class="ml-2 -mr-0.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
