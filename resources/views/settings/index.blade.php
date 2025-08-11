<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="p-6 bg-white shadow-lg sm-rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">General Settings</h3>
                    <p class="text-gray-700 mb-6">Manage your application preferences here.</p>

                    <form method="POST" action="{{ route('settings.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="notification_preference" :value="__('Notification Preference')" />
                            <select id="notification_preference" name="notification_preference" class="mt-1 block w-full form-input">
                                <option value="all">All Notifications</option>
                                <option value="important">Important Only</option>
                                <option value="none">None</option>
                            </select>
                            <x-input-error :messages="$errors->get('notification_preference')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="theme_preference" :value="__('Theme Preference')" />
                            <select id="theme_preference" name="theme_preference" class="mt-1 block w-full form-input">
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                            <x-input-error :messages="$errors->get('theme_preference')" class="mt-2" />
                        </div>

                        <div class="flex-center gap-4">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Save Settings') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- You can add more settings sections here --}}
            <div class="p-6 bg-white shadow-lg sm-rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Privacy Settings</h3>
                    <p class="text-gray-700 mb-6">Control your data and privacy options.</p>
                    <p class="text-gray-500">More privacy settings coming soon!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
