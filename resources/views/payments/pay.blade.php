<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        @if(isset($event))
                            Payment for {{ $event->title }}
                        @else
                            Make a Donation
                        @endif
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

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="paymentForm" action="{{ route('mpesa.stk_push') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">
                                Phone Number
                            </label>
                            <input type="text" 
                                   id="phone_number"
                                   name="phone_number" 
                                   value="{{ old('phone_number', '254706128329') }}" 
                                   placeholder="254XXXXXXXXX"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700">
                                Amount (KSh)
                            </label>
                            <input type="number" 
                                   id="amount"
                                   name="amount" 
                                   value="{{ old('amount', $payment->amount ?? 1000) }}" 
                                   min="1"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                   required>
                        </div>

                        <!-- Hidden fields -->
                        <input type="hidden" name="payment_id" value="{{ $payment->id ?? '' }}">
                        
                        @if(isset($event))
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="type" value="event">
                            
                            <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded">
                                <p class="text-sm text-blue-700">
                                    <strong>Event:</strong> {{ $event->title }}<br>
                                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}<br>
                                    <strong>Location:</strong> {{ $event->location }}<br>
                                    <strong>Price:</strong> KSh {{ number_format($event->price, 2) }}
                                </p>
                            </div>
                        @else
                            <input type="hidden" name="type" value="donation">
                        @endif

                        <button type="submit" 
                                id="payButton"
                                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline disabled:opacity-50">
                            Pay Now
                        </button>
                    </form>

                    <div id="response" class="mt-4"></div>

                    <div class="mt-4 pt-4 border-t">
                        <a href="{{ route('dashboard') }}" 
                           class="text-blue-600 hover:text-blue-800">
                            ← Back to Dashboard
                        </a>
                        
                        @if(isset($event))
                            <a href="{{ route('events.show', $event) }}" 
                               class="ml-4 text-blue-600 hover:text-blue-800">
                                ← Back to Event
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const payButton = document.getElementById('payButton');
        const responseDiv = document.getElementById('response');
        
        // Disable button and show loading
        payButton.disabled = true;
        payButton.textContent = 'Processing...';
        responseDiv.innerHTML = '<div class="text-blue-600">Initiating payment...</div>';

        let formData = new FormData(this);

        fetch("{{ route('mpesa.stk_push') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.message || 'Network response was not ok');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                responseDiv.innerHTML = `
                    <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        ${data.message}
                    </div>
                `;
                
                // Redirect to payment status page after a short delay
                setTimeout(() => {
                    window.location.href = "{{ route('payment.status', $payment->id ?? 1) }}";
                }, 2000);
            } else {
                responseDiv.innerHTML = `
                    <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        ${data.message}
                    </div>
                `;
            }
        })
        .catch(err => {
            console.error('Error:', err);
            responseDiv.innerHTML = `
                <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    Error: ${err.message}
                </div>
            `;
        })
        .finally(() => {
            // Re-enable button
            payButton.disabled = false;
            payButton.textContent = 'Pay Now';
        });
    });
    </script>
</x-app-layout>