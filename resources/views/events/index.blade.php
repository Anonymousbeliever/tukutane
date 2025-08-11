<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Upcoming Events') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm-rounded-lg p-6">
                @forelse ($events as $event)
                    <div class="mb-8 p-6 border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 ease-in-out">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-md mb-3">
                            <span class="font-medium">{{ $event->date->format('F d, Y H:i A') }}</span> at <span class="font-semibold">{{ $event->location }}</span>
                        </p>
                        <p class="text-gray-700 leading-relaxed mb-4">{{ Str::limit($event->description, 200) }}</p>
                        <div class="flex-between">
                            <span class="text-xl font-bold text-primary-red">Ksh {{ number_format($event->price, 2) }}</span>
                            <a href="{{ route('events.show', $event) }}" class="btn btn-primary px-6 py-3 text-sm shadow-md">
                                View Details & RSVP
                                <svg class="ml-2 -mr-0.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-6 text-center text-gray-600">
                        <p class="text-lg">No upcoming events found at the moment.</p>
                        <p class="mt-2">Check back later for new exciting events!</p>
                    </div>
                @endforelse

                <div class="mt-8 pagination-links">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
