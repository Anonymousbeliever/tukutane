<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Payments') }}
        </h2>
    </x-slot>

    <div class="py-6 lg:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-4 sm:p-6 text-gray-900">
                    <!-- Added search and filter functionality for payments -->
                    <div class="mb-6 flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
                        <div class="w-full sm:flex-1 sm:max-w-md">
                            <form method="GET" action="{{ route('admin.payments.index') }}" class="flex">
                                <input type="text" name="search" placeholder="Search payments..." 
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
                            Total Payments: {{ $payments->total() }}
                        </div>
                    </div>

                    <!-- Enhanced responsive payments table -->
                    <div class="overflow-x-auto">
                        <div class="table-container">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th class="min-w-0 w-16 hidden sm:table-cell">ID</th>
                                        <th class="min-w-0 w-1/4">User</th>
                                        <th class="min-w-0 w-1/4 hidden md:table-cell">Event</th>
                                        <th class="min-w-0 w-1/8 text-right">Amount</th>
                                        <th class="min-w-0 w-1/8 hidden lg:table-cell">Type</th>
                                        <th class="min-w-0 w-1/8">Status</th>
                                        <th class="min-w-0 w-1/6 hidden xl:table-cell">M-Pesa Receipt</th>
                                        <th class="min-w-0 w-1/6 hidden sm:table-cell">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($payments as $payment)
                                        <tr>
                                            <td class="hidden sm:table-cell text-sm font-mono">
                                                #{{ $payment->id }}
                                            </td>
                                            <td class="font-medium">
                                                <div class="truncate max-w-xs" title="{{ $payment->user->name }}">
                                                    {{ $payment->user->name }}
                                                </div>
                                                <!-- Show event on mobile when hidden in separate column -->
                                                <div class="text-xs text-gray-500 mt-1 md:hidden">
                                                    {{ Str::limit($payment->event->title ?? 'Donation', 25) }}
                                                </div>
                                            </td>
                                            <td class="hidden md:table-cell">
                                                <div class="truncate max-w-xs" title="{{ $payment->event->title ?? 'N/A (Donation)' }}">
                                                    {{ $payment->event->title ?? 'N/A (Donation)' }}
                                                </div>
                                            </td>
                                            <td class="text-right font-medium">
                                                KSh {{ number_format($payment->amount, 0) }}
                                            </td>
                                            <td class="hidden lg:table-cell text-sm">
                                                {{ ucfirst($payment->type) }}
                                            </td>
                                            <td>
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                    @if($payment->status === 'completed') bg-green-100 text-green-800
                                                    @elseif($payment->status === 'pending') bg-yellow-100 text-yellow-800
                                                    @else bg-red-100 text-red-800 @endif">
                                                    {{ ucfirst($payment->status) }}
                                                </span>
                                            </td>
                                            <td class="hidden xl:table-cell text-sm font-mono">
                                                {{ $payment->mpesaTransaction->mpesa_receipt_number ?? 'N/A' }}
                                            </td>
                                            <td class="hidden sm:table-cell text-sm">
                                                <div>{{ $payment->created_at->format('M j, Y') }}</div>
                                                <div class="text-xs text-gray-500">{{ $payment->created_at->format('H:i') }}</div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-gray-500 py-8">
                                                @if(request('search'))
                                                    No payments found matching "{{ request('search') }}".
                                                @else
                                                    No payments found.
                                                @endif
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-6 pagination-links">
                        {{ $payments->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
