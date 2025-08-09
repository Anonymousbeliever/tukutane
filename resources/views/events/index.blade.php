<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upcoming Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($events as $event)
                        <div class="mb-6 p-4 border-b border-gray-200 last:border-b-0">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $event->title }}</h3>
                            <p class="text-gray-600 text-sm mt-1">
                                <span class="font-medium">{{ $event->date->format('F d, Y H:i A') }}</span> at {{ $event->location }}
                            </p>
                            <p class="text-gray-700 mt-2">{{ Str::limit($event->description, 150) }}</p>
                            <div class="mt-3 flex items-center justify-between">
                                <span class="text-lg font-bold text-tukutane-red">Ksh {{ number_format($event->price, 2) }}</span>
                                <a href="{{ route('events.show', $event) }}" class="inline-flex items-center px-4 py-2 bg-tukutane-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    View Details & RSVP
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">No upcoming events found.</p>
                    @endforelse

                    <div class="mt-6">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
