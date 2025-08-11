<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Alumni Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.alumni.update', $user) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        {{-- Profile Photo --}}
                        <div>
                            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
                            @if ($user->alumniProfile && $user->alumniProfile->profile_photo_path)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($user->alumniProfile->profile_photo_path) }}" alt="Profile Photo" class="profile-photo-preview">
                                </div>
                            @endif
                            <input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full form-file-input" />
                            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full form-input" type="text" name="name" :value="old('name', $user->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full form-input" type="email" name="email" :value="old('email', $user->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full form-input" type="text" name="phone_number" :value="old('phone_number', $user->alumniProfile->phone_number ?? '')" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="bio" :value="__('Bio')" />
                            <textarea id="bio" name="bio" class="form-textarea mt-1 block w-full" rows="5">{{ old('bio', $user->alumniProfile->bio ?? '') }}</textarea>
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="linkedin_url" :value="__('LinkedIn URL')" />
                            <x-text-input id="linkedin_url" class="block mt-1 w-full form-input" type="url" name="linkedin_url" :value="old('linkedin_url', $user->alumniProfile->linkedin_url ?? '')" />
                            <x-input-error :messages="$errors->get('linkedin_url')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="github_url" :value="__('GitHub URL')" />
                            <x-text-input id="github_url" class="block mt-1 w-full form-input" type="url" name="github_url" :value="old('github_url', $user->alumniProfile->github_url ?? '')" />
                            <x-input-error :messages="$errors->get('github_url')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="current_company" :value="__('Current Company')" />
                            <x-text-input id="current_company" class="block mt-1 w-full form-input" type="text" name="current_company" :value="old('current_company', $user->alumniProfile->current_company ?? '')" />
                            <x-input-error :messages="$errors->get('current_company')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="job_title" :value="__('Job Title')" />
                            <x-text-input id="job_title" class="block mt-1 w-full form-input" type="text" name="job_title" :value="old('job_title', $user->alumniProfile->job_title ?? '')" />
                            <x-input-error :messages="$errors->get('job_title')" class="mt-2" />
                        </div>

                        <div class="flex-center justify-end mt-4">
                            <x-primary-button class="ms-4 btn btn-primary">
                                {{ __('Update Profile') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
