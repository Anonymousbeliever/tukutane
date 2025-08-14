<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payment Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        Payment Status
                    </h3>

                    {{-- Display success/error messages --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="space-y-4">
                        <div>
                            <span class="font-semibold">Payment ID:</span> 
                            <span class="text-gray-600">#{{ $payment->id }}</span>
                        </div>

                        <div>
                            <span class="font-semibold">Amount:</span> 
                            <span class="text-gray-600">KSh {{ number_format($payment->amount, 2) }}</span>
                        </div>

                        <div>
                            <span class="font-semibold">Type:</span> 
                            <span class="text-gray-600 capitalize">{{ $payment->type }}</span>
                        </div>

                        <div>
                            <span class="font-semibold">Status:</span> 
                            <span class="px-2 py-1 text-xs font-semibold rounded-full
                                @if($payment->status === 'completed') bg-green-100 text-green-800
                                @elseif($payment->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($payment->status === 'failed') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800
                                @endif">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </div>

                        @if($payment->event)
                            <div>
                                <span class="font-semibold">Event:</span> 
                                <span class="text-gray-600">{{ $payment->event->title }}</span>
                            </div>
                        @endif

                        @if($payment->mpesaTransaction)
                            <div>
                                <span class="font-semibold">M-Pesa Receipt:</span> 
                                <span class="text-gray-600">{{ $payment->mpesaTransaction->mpesa_receipt_number ?? 'N/A' }}</span>
                            </div>

                            <div>
                                <span class="font-semibold">Transaction Date:</span> 
                                <span class="text-gray-600">{{ $payment->mpesaTransaction->transaction_date ?? 'N/A' }}</span>
                            </div>
                        @endif

                        <div class="pt-4">
                            @if($payment->status === 'pending')
                                <p class="text-sm text-gray-600 mb-4">
                                    Please complete the payment on your phone. This page will automatically refresh.
                                </p>
                                <script>
                                    // Auto-refresh every 5 seconds for pending payments
                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 5000);
                                </script>
                            @endif

                            <a href="{{ route('dashboard') }}" 
                               class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Back to Dashboard
                            </a>

                            @if($payment->event)
                                <a href="{{ route('events.show', $payment->event) }}" 
                                   class="inline-block ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Back to Event
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>