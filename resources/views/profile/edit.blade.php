<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-6 bg-white shadow-lg sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 bg-white shadow-lg sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 bg-white shadow-lg sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- You'll need to modify the default Breeze partials to include alumni profile fields and new styling --}}
{{-- Example modification for resources/views/profile/partials/update-profile-information-form.blade.php --}}
{{-- Apply these styles to your existing Breeze form elements: --}}
{{--
<x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium mb-1" />
<x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-tukutane-teal focus:ring-tukutane-teal transition-all duration-200 ease-in-out" :value="old('name', $user->name)" required autofocus autocomplete="name" />

<textarea id="bio" name="bio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-tukutane-teal focus:ring-tukutane-teal transition-all duration-200 ease-in-out" rows="5">{{ old('bio', $profile->bio ?? '') }}</textarea>

<input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-tukutane-teal file:text-white hover:file:bg-teal-700 transition-all duration-200 ease-in-out" />

<x-primary-button class="inline-flex items-center px-6 py-3 bg-tukutane-teal border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:outline-none focus:ring-2 focus:ring-tukutane-teal focus:ring-offset-2 transition-all duration-200 ease-in-out shadow-md">
    {{ __('Save') }}
</x-primary-button>
--}}
