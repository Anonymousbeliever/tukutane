<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Welcome, Admin!</h3>
                    <p class="mb-4">This is your administrative control panel. Manage alumni, events, and payments from here.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Alumni Management</h4>
                            <p class="text-gray-600 mb-4">View and manage all registered alumni profiles.</p>
                            <a href="{{ route('admin.alumni.index') }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-tukutane-red-light focus:bg-tukutane-red-light active:bg-tukutane-red focus:outline-none focus:ring-2 focus:ring-tukutane-red focus:ring-offset-2 transition ease-in-out duration-150">
                                Manage Alumni
                            </a>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Event Management</h4>
                            <p class="text-gray-600 mb-4">Create, edit, and delete events for alumni.</p>
                            <a href="{{ route('admin.events.index') }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-tukutane-red-light focus:bg-tukutane-red-light active:bg-tukutane-red focus:outline-none focus:ring-2 focus:ring-tukutane-red focus:ring-offset-2 transition ease-in-out duration-150">
                                Manage Events
                            </a>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Payment Records</h4>
                            <p class="text-gray-600 mb-4">View all payment transactions made on the platform.</p>
                            <a href="{{ route('admin.payments.index') }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-tukutane-red-light focus:bg-tukutane-red-light active:bg-tukutane-red focus:outline-none focus:ring-2 focus:ring-tukutane-red focus:ring-offset-2 transition ease-in-out duration-150">
                                View Payments
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
