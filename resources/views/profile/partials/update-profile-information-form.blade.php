<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Profile Photo --}}
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            @if ($user->alumniProfile && $user->alumniProfile->profile_photo_path)
                <div class="mt-2">
                    <img src="{{ Storage::url($user->alumniProfile->profile_photo_path) }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover border border-gray-200 shadow-sm">
                </div>
            @endif
            <input id="profile_photo" name="profile_photo" type="file" class="mt-1 block w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-tukutane-red file:text-white hover:file:bg-tukutane-red-light transition-all duration-200 ease-in-out" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Alumni Profile Fields --}}
        <h3 class="text-lg font-medium text-gray-900 mt-6">{{ __('Alumni Details') }}</h3>
        <p class="mt-1 text-sm text-gray-600">{{ __("Update your specific alumni profile information.") }}</p>

        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $profile->phone_number ?? '')" autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" class="border-gray-300 focus:border-tukutane-red focus:ring-tukutane-red rounded-md shadow-sm mt-1 block w-full" rows="5">{{ old('bio', $profile->bio ?? '') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="linkedin_url" :value="__('LinkedIn URL')" />
            <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full" :value="old('linkedin_url', $profile->linkedin_url ?? '')" autocomplete="url" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
        </div>

        <div>
            <x-input-label for="github_url" :value="__('GitHub URL')" />
            <x-text-input id="github_url" name="github_url" type="url" class="mt-1 block w-full" :value="old('github_url', $profile->github_url ?? '')" autocomplete="url" />
            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
        </div>

        <div>
            <x-input-label for="current_company" :value="__('Current Company')" />
            <x-text-input id="current_company" name="current_company" type="text" class="mt-1 block w-full" :value="old('current_company', $profile->current_company ?? '')" autocomplete="organization" />
            <x-input-error class="mt-2" :messages="$errors->get('current_company')" />
        </div>

        <div>
            <x-input-label for="job_title" :value="__('Job Title')" />
            <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title', $profile->job_title ?? '')" autocomplete="organization-title" />
            <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="bg-tukutane-red hover:bg-tukutane-red-light">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
