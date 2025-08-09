<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <p class="text-gray-600 text-sm">
                            <span class="font-medium">{{ $event->date->format('F d, Y H:i A') }}</span>
                        </p>
                        <p class="text-gray-600 text-sm">
                            Location: {{ $event->location }}
                        </p>
                        <p class="text-gray-600 text-sm">
                            Price: <span class="font-bold text-tukutane-red">Ksh {{ number_format($event->price, 2) }}</span>
                        </p>
                    </div>

                    <div class="prose max-w-none mb-6">
                        <p>{{ $event->description }}</p>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">RSVP & Payment</h3>
                    <p class="mb-4">To confirm your attendance, please make the payment for this event.</p>

                    <a href="{{ route('payments.pay', $event) }}" class="inline-flex items-center px-6 py-3 bg-tukutane-red border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pay for Event (Ksh {{ number_format($event->price, 2) }})
                    </a>

                    <div class="mt-6">
                        <a href="{{ route('events.index') }}" class="text-tukutane-red hover:text-red-700 text-sm font-medium">
                            &larr; Back to Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
