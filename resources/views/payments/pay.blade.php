<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make a Payment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        @if ($payment->type === 'event' && $event)
                            Payment for: {{ $event->title }}
                        @else
                            Make a Donation
                        @endif
                    </h3>

                    <form method="POST" action="{{ route('mpesa.stk_push') }}">
                        @csrf

                        <input type="hidden" name="payment_id" value="{{ $payment->id }}">

                        <div>
                            <x-input-label for="amount" :value="__('Amount (Ksh)')" />
                            <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $payment->amount > 0 ? $payment->amount : '')" required autofocus />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('M-Pesa Phone Number (e.g., 2547XXXXXXXX)')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number', Auth::user()->alumniProfile->phone_number ?? '')" required />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4 bg-tukutane-red hover:bg-red-700">
                                {{ __('Pay with M-Pesa') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
