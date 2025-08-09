<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alumni Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">This is your alumni dashboard. Here you can manage your profile, view upcoming events, and make payments.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Your Profile</h4>
                            <p class="text-gray-600 mb-4">Keep your profile updated to connect with other alumni.</p>
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit Profile
                            </a>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Upcoming Events</h4>
                            <p class="text-gray-600 mb-4">Discover and RSVP to exciting alumni events.</p>
                            <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                View Events
                            </a>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Make a Payment</h4>
                            <p class="text-gray-600 mb-4">Pay for events or make a donation via M-Pesa.</p>
                            <a href="{{ route('payments.pay') }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Pay Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
