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
                        @if ($payment->type === 'event' && $event)
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

                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">

                        <div>
                            <x-input-label for="amount" :value="__('Amount (KSh)')" />
                            <x-text-input 
                                id="amount" 
                                class="block mt-1 w-full" 
                                type="number" 
                                name="amount" 
                                :value="old('amount', $payment->amount > 0 ? $payment->amount : '')" 
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

                            {{-- Demo test button --}}
                            @if (app()->environment('local'))
                            <form method="POST" action="{{ route('payments.test_success', $payment) }}" class="inline">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-sm">
                                    Test Success (Demo)
                                </button>
                            </form>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>