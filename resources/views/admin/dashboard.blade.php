<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Added welcome section with better styling -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600">Here's what's happening with your Tukutane community today.</p>
            </div>

            <!-- Added statistics cards with actual data -->
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
                <!-- Total Alumni Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-primary-red">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-primary-red rounded-lg flex-center">
                                    <svg class="w-6 h-6 text-white-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Total Alumni</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($totalAlumni) }}</p>
                                @if($recentAlumni > 0)
                                    <p class="text-sm text-green-600">+{{ $recentAlumni }} this month</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Events Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-blue-500 rounded-lg flex-center">
                                    <svg class="w-6 h-6 text-white-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Total Events</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($totalEvents) }}</p>
                                <p class="text-sm text-blue-600">{{ $upcomingEvents->count() }} upcoming</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Payments Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-green-500 rounded-lg flex-center">
                                    <svg class="w-6 h-6 text-white-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Completed Payments</p>
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($totalPayments) }}</p>
                                <p class="text-sm text-green-600">{{ $recentPayments->count() }} this week</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg border-l-4 border-yellow-500">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-yellow-500 rounded-lg flex-center">
                                    <svg class="w-6 h-6 text-white-color" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 truncate">Total Revenue</p>
                                <p class="text-2xl font-bold text-gray-900">KSh {{ number_format($totalRevenue) }}</p>
                                <p class="text-sm text-yellow-600">All time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Added two-column layout for recent activity and quick actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Alumni Registrations -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Alumni</h3>
                        <p class="text-sm text-gray-600">Latest registered members</p>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($recentAlumniList as $alumnus)
                            <div class="px-6 py-4 flex items-center">
                                @if($alumnus->alumniProfile && $alumnus->alumniProfile->hasProfilePhoto())
                                    <img src="{{ $alumnus->alumniProfile->profile_photo_url }}" 
                                         alt="{{ $alumnus->name }}" 
                                         class="w-10 h-10 rounded-full object-cover mr-4 border border-gray-200">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-primary-red text-white-color flex-center mr-4 text-sm font-semibold border border-gray-200">
                                        {{ substr($alumnus->name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $alumnus->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $alumnus->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-8 text-center">
                                <p class="text-gray-500">No recent alumni registrations</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="px-6 py-3 bg-gray-50">
                        <a href="{{ route('admin.alumni.index') }}" class="text-sm text-primary-red hover:text-red-700 font-medium">
                            View all alumni →
                        </a>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Upcoming Events</h3>
                        <p class="text-sm text-gray-600">Next scheduled events</p>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($upcomingEvents as $event)
                            <div class="px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ $event->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $event->location }}</p>
                                        <p class="text-xs text-blue-600">{{ \Carbon\Carbon::parse($event->date)->format('M j, Y g:i A') }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-semibold text-gray-900">KSh {{ number_format($event->price) }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-8 text-center">
                                <p class="text-gray-500">No upcoming events</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="px-6 py-3 bg-gray-50">
                        <a href="{{ route('admin.events.index') }}" class="text-sm text-primary-red hover:text-red-700 font-medium">
                            Manage events →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Added quick action buttons section -->
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary text-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Create New Event
                    </a>
                    <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary text-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Manage Alumni
                    </a>
                    <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary text-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        View Payments
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
