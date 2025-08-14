<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Alumni Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="mb-4">
                    <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back to Alumni List
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.alumni.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Profile Photo --}}
                    <div class="space-y-4">
                        <div>
                            <label for="profile_photo" class="form-label">
                                {{ __('Profile Photo') }}
                            </label>
                            @if ($user->alumniProfile && $user->alumniProfile->profile_photo_path)
                                <div class="mt-2 mb-3">
                                    <img src="{{ Storage::url($user->alumniProfile->profile_photo_path) }}" 
                                         alt="Profile Photo" 
                                         class="profile-photo-preview">
                                </div>
                            @endif
                            <input id="profile_photo" 
                                   name="profile_photo" 
                                   type="file" 
                                   class="form-file-input"
                                   accept="image/*" />
                            @error('profile_photo')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="name" class="form-label">
                                {{ __('Full Name') }} <span class="text-red-500">*</span>
                            </label>
                            <input id="name" 
                                   class="form-input" 
                                   type="text" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   required 
                                   autofocus />
                            @error('name')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="form-label">
                                {{ __('Email Address') }} <span class="text-red-500">*</span>
                            </label>
                            <input id="email" 
                                   class="form-input" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   required />
                            @error('email')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="form-label">
                                {{ __('Phone Number') }}
                            </label>
                            <input id="phone_number" 
                                   class="form-input" 
                                   type="text" 
                                   name="phone_number" 
                                   value="{{ old('phone_number', $user->alumniProfile->phone_number ?? '') }}" 
                                   placeholder="e.g., +254712345678" />
                            @error('phone_number')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="bio" class="form-label">
                                {{ __('Bio') }}
                            </label>
                            <textarea id="bio" 
                                      name="bio" 
                                      class="form-textarea" 
                                      rows="4"
                                      placeholder="Tell us about yourself...">{{ old('bio', $user->alumniProfile->bio ?? '') }}</textarea>
                            @error('bio')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="linkedin_url" class="form-label">
                                {{ __('LinkedIn URL') }}
                            </label>
                            <input id="linkedin_url" 
                                   class="form-input" 
                                   type="url" 
                                   name="linkedin_url" 
                                   value="{{ old('linkedin_url', $user->alumniProfile->linkedin_url ?? '') }}"
                                   placeholder="https://linkedin.com/in/your-profile" />
                            @error('linkedin_url')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="github_url" class="form-label">
                                {{ __('GitHub URL') }}
                            </label>
                            <input id="github_url" 
                                   class="form-input" 
                                   type="url" 
                                   name="github_url" 
                                   value="{{ old('github_url', $user->alumniProfile->github_url ?? '') }}"
                                   placeholder="https://github.com/your-username" />
                            @error('github_url')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="current_company" class="form-label">
                                {{ __('Current Company') }}
                            </label>
                            <input id="current_company" 
                                   class="form-input" 
                                   type="text" 
                                   name="current_company" 
                                   value="{{ old('current_company', $user->alumniProfile->current_company ?? '') }}"
                                   placeholder="e.g., Google, Microsoft, Startup Inc." />
                            @error('current_company')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="job_title" class="form-label">
                                {{ __('Job Title') }}
                            </label>
                            <input id="job_title" 
                                   class="form-input" 
                                   type="text" 
                                   name="job_title" 
                                   value="{{ old('job_title', $user->alumniProfile->job_title ?? '') }}"
                                   placeholder="e.g., Software Engineer, Product Manager" />
                            @error('job_title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between space-x-4 pt-4">
                            <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>