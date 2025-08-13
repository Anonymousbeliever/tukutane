<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Manage Alumni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg p-4 sm:p-6">
                <!-- Improved search section with better responsive design -->
                <div class="mb-6 flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
                    <div class="w-full sm:flex-1 sm:max-w-md">
                        <form method="GET" action="{{ route('admin.alumni.index') }}" class="flex">
                            <input type="text" name="search" placeholder="Search alumni..." 
                                   value="{{ request('search') }}" 
                                   class="form-input rounded-r-none border-r-0 text-sm">
                            <button type="submit" class="btn btn-primary rounded-l-none px-3 sm:px-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="text-sm text-gray-600 font-medium">
                        Total Alumni: {{ $alumni->total() }}
                    </div>
                </div>

                <!-- Enhanced responsive table with better column management -->
                <div class="overflow-x-auto">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th class="min-w-0 w-16">Profile</th>
                                    <th class="min-w-0 w-1/4">Name</th>
                                    <th class="min-w-0 w-1/4 hidden sm:table-cell">Email</th>
                                    <th class="min-w-0 w-1/6 hidden md:table-cell">Phone</th>
                                    <th class="min-w-0 w-1/6 hidden lg:table-cell">Company</th>
                                    <th class="min-w-0 w-1/6 hidden xl:table-cell">Job Title</th>
                                    <th class="min-w-0 w-1/8 hidden md:table-cell">Joined</th>
                                    <th class="min-w-0 w-1/6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($alumni as $user)
                                    <tr>
                                        <td>
                                            @if($user->alumniProfile && $user->alumniProfile->hasProfilePhoto())
                                                <img src="{{ $user->alumniProfile->profile_photo_url }}" 
                                                     alt="{{ $user->name }}" 
                                                     class="w-8 h-8 sm:w-10 sm:h-10 rounded-full object-cover">
                                            @else
                                                <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-primary-red text-white flex-center text-xs sm:text-sm font-semibold">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td class="font-medium">
                                            <div class="truncate max-w-xs" title="{{ $user->name }}">
                                                {{ $user->name }}
                                            </div>
                                            <!-- Show email on mobile when hidden in separate column -->
                                            <div class="text-xs text-gray-500 mt-1 sm:hidden truncate">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="hidden sm:table-cell">
                                            <div class="truncate max-w-xs" title="{{ $user->email }}">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell text-sm">
                                            {{ $user->alumniProfile->phone_number ?? 'N/A' }}
                                        </td>
                                        <td class="hidden lg:table-cell">
                                            <div class="truncate max-w-xs" title="{{ $user->alumniProfile->current_company ?? 'N/A' }}">
                                                {{ $user->alumniProfile->current_company ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td class="hidden xl:table-cell">
                                            <div class="truncate max-w-xs" title="{{ $user->alumniProfile->job_title ?? 'N/A' }}">
                                                {{ $user->alumniProfile->job_title ?? 'N/A' }}
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell text-sm">
                                            {{ $user->created_at->format('M j, Y') }}
                                        </td>
                                        <td>
                                            <div class="flex items-center space-x-1 sm:space-x-2">
                                                <a href="{{ route('admin.alumni.edit', $user) }}" 
                                                   class="btn btn-secondary text-xs px-2 sm:px-3 py-1">
                                                    <span class="hidden sm:inline">Edit</span>
                                                    <svg class="w-3 h-3 sm:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('admin.alumni.destroy', $user) }}" method="POST" class="inline-block" 
                                                      onsubmit="return confirm('Are you sure you want to delete this alumni? This action cannot be undone.');">
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
                                            <!-- Show additional info on mobile -->
                                            <div class="mt-1 text-xs text-gray-500 md:hidden">
                                                <div>{{ $user->alumniProfile->current_company ?? 'No company' }}</div>
                                                <div>Joined: {{ $user->created_at->format('M j, Y') }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-gray-500 py-8">
                                            @if(request('search'))
                                                No alumni found matching "{{ request('search') }}".
                                            @else
                                                No alumni found.
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-6 pagination-links">
                    {{ $alumni->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
