<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- You'll need to modify the default Breeze partials to include alumni profile fields --}}
{{-- Example modification for update-profile-information-form.blade.php --}}
{{-- resources/views/profile/partials/update-profile-information-form.blade.php --}}
{{-- Add these fields inside the form: --}}
{{--
<div class="mt-4">
    <x-input-label for="phone_number" :value="__('Phone Number')" />
    <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $profile->phone_number ?? '')" autofocus autocomplete="phone_number" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mt-4">
    <x-input-label for="bio" :value="__('Bio')" />
    <textarea id="bio" name="bio" class="border-gray-300 focus:border-tukutane-red focus:ring-tukutane-red rounded-md shadow-sm mt-1 block w-full">{{ old('bio', $profile->bio ?? '') }}</textarea>
    <x-input-error class="mt-2" :messages="$errors->get('bio')" />
</div>

<div class="mt-4">
    <x-input-label for="profile_photo" :value="__('Profile Photo')" />
    <input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full" />
    @if ($profile && $profile->profile_photo_path)
        <img src="{{ Storage::url($profile->profile_photo_path) }}" alt="Profile Photo" class="mt-2 w-20 h-20 object-cover rounded-full">
    @endif
    <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
</div>

<div class="mt-4">
    <x-input-label for="linkedin_url" :value="__('LinkedIn URL')" />
    <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full" :value="old('linkedin_url', $profile->linkedin_url ?? '')" autocomplete="linkedin_url" />
    <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
</div>

<div class="mt-4">
    <x-input-label for="github_url" :value="__('GitHub URL')" />
    <x-text-input id="github_url" name="github_url" type="url" class="mt-1 block w-full" :value="old('github_url', $profile->github_url ?? '')" autocomplete="github_url" />
    <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
</div>

<div class="mt-4">
    <x-input-label for="current_company" :value="__('Current Company')" />
    <x-text-input id="current_company" name="current_company" type="text" class="mt-1 block w-full" :value="old('current_company', $profile->current_company ?? '')" autocomplete="current_company" />
    <x-input-error class="mt-2" :messages="$errors->get('current_company')" />
</div>

<div class="mt-4">
    <x-input-label for="job_title" :value="__('Job Title')" />
    <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title', $profile->job_title ?? '')" autocomplete="job_title" />
    <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
</div>
--}}
