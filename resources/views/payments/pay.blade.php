<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make a Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        @if ($event)
                            Payment for: {{ $event->title }}
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

                    <form method="POST" action="{{ route('mpesa.stk_push') }}">
                        @csrf

                        @if($event)
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            <input type="hidden" name="type" value="event">
                        @else
                            <input type="hidden" name="type" value="donation">
                        @endif

                        <div>
                            <x-input-label for="amount" :value="__('Amount (KSh)')" />
                            <x-text-input 
                                id="amount" 
                                class="block mt-1 w-full" 
                                type="number" 
                                name="amount" 
                                :value="old('amount', $event && $event->price > 0 ? $event->price : '')" 
                                required 
                                autofocus 
                                min="1"
                                step="0.01" />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('M-Pesa Phone Number')" />
                            <x-text-input 
                                id="phone_number" 
                                class="block mt-1 w-full" 
                                type="text" 
                                name="phone_number" 
                                :value="old('phone_number', '0700000000')" 
                                required 
                                placeholder="0700000000 or 254700000000" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            <p class="text-sm text-gray-600 mt-1">
                                Use sandbox test number: 0700000000 for demo
                            </p>
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <button 
                                type="submit" 
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Pay with M-Pesa
                            </button>

                            {{-- Demo test button for local environment --}}
                            @if (app()->environment('local'))
                                <button 
                                    type="button"
                                    onclick="simulatePayment()" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-sm">
                                    Test Success (Demo)
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if (app()->environment('local'))
    <script>
        function simulatePayment() {
            // Get form data
            const form = document.querySelector('form[action="{{ route('mpesa.stk_push') }}"]');
            const formData = new FormData(form);
            
            // Add demo flag
            formData.append('demo_success', '1');
            
            // Submit the form with demo flag
            fetch('{{ route('mpesa.stk_push') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            }).then(response => {
                if (response.ok) {
                    return response.text();
                }
                throw new Error('Network response was not ok');
            }).then(data => {
                // Redirect to success page or reload
                window.location.reload();
            }).catch(error => {
                console.error('Error:', error);
                alert('Demo payment failed');
            });
        }
    </script>
    @endif
</x-app-layout>