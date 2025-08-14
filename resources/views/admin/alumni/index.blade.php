<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Manage Alumni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    <!-- Enhanced search section -->
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between mb-6">
                        <div class="w-full sm:flex-1 sm:max-w-md">
                            <form method="GET" action="{{ route('admin.alumni.index') }}" class="flex">
                                <input type="text" 
                                       name="search" 
                                       placeholder="Search alumni..." 
                                       value="{{ request('search') }}" 
                                       class="form-input rounded-r-none border-r-0 text-sm">
                                <button type="submit" class="btn btn-primary rounded-l-none px-3 sm:px-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="text-sm font-medium text-gray-600">
                            Total Alumni: {{ $alumni->total() }}
                        </div>
                    </div>

                    <!-- Enhanced responsive table -->
                    <div class="overflow-x-auto">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th class="w-16">Profile</th>
                                        <th class="w-1/4">Name</th>
                                        <th class="hidden sm:table-cell w-1/4">Email</th>
                                        <th class="hidden md:table-cell w-1/6">Phone</th>
                                        <th class="hidden lg:table-cell w-1/6">Company</th>
                                        <th class="hidden xl:table-cell w-1/6">Job Title</th>
                                        <th class="hidden md:table-cell w-1/8">Joined</th>
                                        <th class="w-1/6">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($alumni as $user)
                                        <tr>
                                            <td>
                                                @if($user->alumniProfile && $user->alumniProfile->hasProfilePhoto())
                                                    <img src="{{ $user->alumniProfile->profile_photo_url }}" 
                                                         alt="{{ $user->name }}" 
                                                         class="w-10 h-10 rounded-full object-cover border border-gray-200">
                                                @else
                                                    <div class="w-10 h-10 rounded-full bg-primary text-white flex-center text-sm font-semibold border border-gray-200">
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
                                                    <a href="{{ route('admin.alumni.edit', $user->id) }}" 
                                                       class="btn btn-secondary text-xs px-2 sm:px-3 py-1">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('admin.alumni.destroy', $user->id) }}" 
                                                          method="POST" 
                                                          class="inline-block" 
                                                          onsubmit="return confirm('Are you sure you want to delete this alumni? This action cannot be undone.');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger text-xs px-2 sm:px-3 py-1">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- Show additional info on mobile -->
                                                <div class="mt-2 text-xs text-gray-500 md:hidden space-y-1">
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

                    <!-- Pagination -->
                    <div class="mt-6 pagination-links">
                        {{ $alumni->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>