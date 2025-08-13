<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Events') }}
        </h2>
    </x-slot>

    <div class="py-6 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    <!-- Enhanced header with better mobile responsiveness -->
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between mb-6">
                        <div class="w-full sm:flex-1 sm:max-w-md">
                            <form method="GET" action="{{ route('admin.events.index') }}" class="flex">
                                <input type="text" name="search" placeholder="Search events..." 
                                       value="{{ request('search') }}" 
                                       class="form-input rounded-r-none border-r-0 text-sm">
                                <button type="submit" class="btn btn-primary rounded-l-none px-3 sm:px-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary w-full sm:w-auto">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="hidden sm:inline">Add New Event</span>
                            <span class="sm:hidden">Add Event</span>
                        </a>
                    </div>

                    <!-- Improved responsive table with better mobile layout -->
                    <div class="overflow-x-auto">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th class="min-w-0 w-1/4">Title</th>
                                        <th class="min-w-0 w-1/6">Date</th>
                                        <th class="min-w-0 w-1/4 hidden sm:table-cell">Location</th>
                                        <th class="min-w-0 w-1/8 text-right">Price</th>
                                        <th class="min-w-0 w-1/8 hidden md:table-cell">Status</th>
                                        <th class="min-w-0 w-1/6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($events as $event)
                                        <tr>
                                            <td class="font-medium">
                                                <div class="truncate max-w-xs" title="{{ $event->title }}">
                                                    {{ $event->title }}
                                                </div>
                                                <!-- Show location on mobile when hidden in separate column -->
                                                <div class="text-xs text-gray-500 mt-1 sm:hidden">
                                                    {{ Str::limit($event->location, 30) }}
                                                </div>
                                            </td>
                                            <td class="text-sm">
                                                <div class="whitespace-nowrap">
                                                    {{ $event->date->format('M j, Y') }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    {{ $event->date->format('g:i A') }}
                                                </div>
                                            </td>
                                            <td class="hidden sm:table-cell">
                                                <div class="truncate max-w-xs" title="{{ $event->location }}">
                                                    {{ $event->location }}
                                                </div>
                                            </td>
                                            <td class="text-right font-medium">
                                                KSh {{ number_format($event->price, 0) }}
                                            </td>
                                            <!-- Status column hidden on mobile, shown as badge on title cell -->
                                            <td class="hidden md:table-cell">
                                                @if($event->date->isFuture())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Upcoming
                                                    </span>
                                                @elseif($event->date->isToday())
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        Today
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        Past
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="flex items-center space-x-1 sm:space-x-2">
                                                    <a href="{{ route('admin.events.edit', $event) }}" 
                                                       class="btn btn-secondary text-xs px-2 sm:px-3 py-1">
                                                        <span class="hidden sm:inline">Edit</span>
                                                        <svg class="w-3 h-3 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline-block" 
                                                          onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger text-xs px-2 sm:px-3 py-1">
                                                            <span class="hidden sm:inline">Delete</span>
                                                            <svg class="w-3 h-3 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- Show status badge on mobile -->
                                                <div class="mt-1 md:hidden">
                                                    @if($event->date->isFuture())
                                                        <span class="px-1 inline-flex text-xs leading-4 font-semibold rounded bg-green-100 text-green-800">
                                                            Upcoming
                                                        </span>
                                                    @elseif($event->date->isToday())
                                                        <span class="px-1 inline-flex text-xs leading-4 font-semibold rounded bg-blue-100 text-blue-800">
                                                            Today
                                                        </span>
                                                    @else
                                                        <span class="px-1 inline-flex text-xs leading-4 font-semibold rounded bg-gray-100 text-gray-800">
                                                            Past
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-gray-500 py-8">
                                                @if(request('search'))
                                                    No events found matching "{{ request('search') }}".
                                                @else
                                                    No events found. <a href="{{ route('admin.events.create') }}" class="text-primary-red hover:underline">Create your first event</a>.
                                                @endif
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 pagination-links">
                        {{ $events->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
