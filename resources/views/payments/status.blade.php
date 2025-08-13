<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-center">
                        @if($payment->status === 'completed')
                            <div class="text-green-600 mb-4">
                                <svg class="mx-auto h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="text-lg font-medium">Payment Successful!</h3>
                                @if($payment->mpesaTransaction)
                                    <p class="text-sm text-gray-600 mt-2">
                                        Receipt: {{ $payment->mpesaTransaction->mpesa_receipt_number }}
                                    </p>
                                @endif
                            </div>
                        @elseif($payment->status === 'failed')
                            <div class="text-red-600 mb-4">
                                <svg class="mx-auto h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="text-lg font-medium">Payment Failed</h3>
                                <p class="text-sm text-gray-600 mt-2">Please try again or contact support.</p>
                            </div>
                        @else
                            <div class="text-yellow-600 mb-4">
                                <svg class="mx-auto h-16 w-16 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="text-lg font-medium">Payment Pending</h3>
                                <p class="text-sm text-gray-600 mt-2">Please complete the payment on your phone.</p>
                                <button onclick="window.location.reload()" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    Refresh Status
                                </button>
                            </div>
                        @endif

                        <div class="mt-6 border-t pt-4">
                            <div class="text-sm text-gray-600 space-y-1">
                                <p><strong>Amount:</strong> KSh {{ number_format($payment->amount, 2) }}</p>
                                <p><strong>Type:</strong> {{ ucfirst($payment->type) }}</p>
                                <p><strong>Status:</strong> {{ ucfirst($payment->status) }}</p>
                                <p><strong>Date:</strong> {{ $payment->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                                Back to Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($payment->status === 'pending')
    <script>
        // Auto-refresh every 5 seconds for pending payments
        setTimeout(() => {
            window.location.reload();
        }, 5000);
    </script>
    @endif
</x-app-layout>