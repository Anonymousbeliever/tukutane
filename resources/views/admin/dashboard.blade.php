<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Welcome, Admin!</h3>
                    <p class="mb-4">This is your administrative control panel. Manage alumni, events, and payments from here.</p>

                    <div class="grid-cols-1 grid-cols-md-2 grid-cols-lg-3 gap-6">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Alumni Management</h4>
                            <p class="text-gray-600 mb-4">View and manage all registered alumni profiles.</p>
                            <a href="{{ route('admin.alumni.index') }}" class="btn btn-primary px-4 py-2 text-xs">
                                Manage Alumni
                            </a>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Event Management</h4>
                            <p class="text-gray-600 mb-4">Create, edit, and delete events for alumni.</p>
                            <a href="{{ route('admin.events.index') }}" class="btn btn-primary px-4 py-2 text-xs">
                                Manage Events
                            </a>
                        </div>

                        <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                            <h4 class="text-md font-semibold text-gray-800 mb-2">Payment Records</h4>
                            <p class="text-gray-600 mb-4">View all payment transactions made on the platform.</p>
                            <a href="{{ route('admin.payments.index') }}" class="btn btn-primary px-4 py-2 text-xs">
                                View Payments
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
