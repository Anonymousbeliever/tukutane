<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Manage Alumni') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm-rounded-lg p-6">
                <div class="flex justify-end mb-6">
                    {{-- No "Add Alumni" button as alumni are created via registration --}}
                </div>

                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Job Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alumni as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->alumniProfile->phone_number ?? 'N/A' }}</td>
                                    <td>{{ $user->alumniProfile->current_company ?? 'N/A' }}</td>
                                    <td>{{ $user->alumniProfile->job_title ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('admin.alumni.edit', $user) }}" class="text-primary-red hover:text-primary-red-light mr-4 transition-colors duration-200">Edit</a>
                                        <form action="{{ route('admin.alumni.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this alumni? This action cannot be undone.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-200">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-500">No alumni found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 pagination-links">
                    {{ $alumni->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
