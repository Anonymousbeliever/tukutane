<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Theme & Appearance Settings -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                        Theme & Appearance
                    </h3>
                    <p class="text-gray-700 mb-6">Customize how Tukutane looks and feels for you.</p>

                    <form method="POST" action="{{ route('settings.update') }}" class="mt-6 space-y-6" id="theme-form">
                        @csrf
                        @method('patch')

                        <!-- Added real-time theme switching and improved form structure -->
                        <!-- Theme Selection with Visual Preview -->
                        <div>
                            <x-input-label for="theme_preference" :value="__('Theme Preference')" />
                            <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <!-- Light Theme Option -->
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="theme_preference" value="light" 
                                           class="sr-only peer theme-radio" 
                                           {{ ($user->theme_preference ?? 'light') === 'light' ? 'checked' : '' }}>
                                    <div class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-primary-red peer-checked:bg-red-50 transition-all">
                                        <div class="bg-white rounded border shadow-sm p-3 mb-2">
                                            <div class="h-2 bg-gray-200 rounded mb-1"></div>
                                            <div class="h-1 bg-gray-100 rounded"></div>
                                        </div>
                                        <div class="text-center">
                                            <span class="font-medium text-gray-900">Light</span>
                                            <p class="text-xs text-gray-500">Clean and bright</p>
                                        </div>
                                    </div>
                                </label>

                                <!-- Dark Theme Option -->
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="theme_preference" value="dark" 
                                           class="sr-only peer theme-radio"
                                           {{ ($user->theme_preference ?? 'light') === 'dark' ? 'checked' : '' }}>
                                    <div class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-primary-red peer-checked:bg-red-50 transition-all">
                                        <div class="bg-gray-800 rounded border shadow-sm p-3 mb-2">
                                            <div class="h-2 bg-gray-600 rounded mb-1"></div>
                                            <div class="h-1 bg-gray-700 rounded"></div>
                                        </div>
                                        <div class="text-center">
                                            <span class="font-medium text-gray-900">Dark</span>
                                            <p class="text-xs text-gray-500">Easy on the eyes</p>
                                        </div>
                                    </div>
                                </label>

                                <!-- Auto Theme Option -->
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="theme_preference" value="auto" 
                                           class="sr-only peer theme-radio"
                                           {{ ($user->theme_preference ?? 'light') === 'auto' ? 'checked' : '' }}>
                                    <div class="border-2 border-gray-200 rounded-lg p-4 peer-checked:border-primary-red peer-checked:bg-red-50 transition-all">
                                        <div class="flex rounded border shadow-sm mb-2">
                                            <div class="bg-white p-2 rounded-l flex-1">
                                                <div class="h-1 bg-gray-200 rounded"></div>
                                            </div>
                                            <div class="bg-gray-800 p-2 rounded-r flex-1">
                                                <div class="h-1 bg-gray-600 rounded"></div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="font-medium text-gray-900">Auto</span>
                                            <p class="text-xs text-gray-500">Follows system</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('theme_preference')" class="mt-2" />
                        </div>

                        <!-- Language Preference -->
                        <div>
                            <x-input-label for="language_preference" :value="__('Language')" />
                            <select id="language_preference" name="language_preference" class="mt-1 block w-full form-input">
                                <option value="en" {{ ($user->language_preference ?? 'en') === 'en' ? 'selected' : '' }}>English</option>
                                <option value="sw" {{ ($user->language_preference ?? 'en') === 'sw' ? 'selected' : '' }}>Kiswahili</option>
                            </select>
                            <x-input-error :messages="$errors->get('language_preference')" class="mt-2" />
                        </div>

                        <!-- Added hidden fields for notification settings to maintain them -->
                        <input type="hidden" name="notification_preference" value="{{ $user->notification_preference ?? 'all' }}">
                        <input type="hidden" name="email_notifications" value="{{ $user->email_notifications ? '1' : '0' }}">
                        <input type="hidden" name="push_notifications" value="{{ $user->push_notifications ? '1' : '0' }}">

                        <div class="flex items-center gap-4">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Save Appearance Settings') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        Notifications
                    </h3>
                    <p class="text-gray-700 mb-6">Control how and when you receive notifications.</p>

                    <form method="POST" action="{{ route('settings.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')
                        
                        <!-- Fixed hidden fields to maintain theme settings -->
                        <input type="hidden" name="theme_preference" value="{{ $user->theme_preference ?? 'light' }}">
                        <input type="hidden" name="language_preference" value="{{ $user->language_preference ?? 'en' }}">

                        <div>
                            <x-input-label for="notification_preference" :value="__('Notification Level')" />
                            <select id="notification_preference" name="notification_preference" class="mt-1 block w-full form-input">
                                <option value="all" {{ ($user->notification_preference ?? 'all') === 'all' ? 'selected' : '' }}>All Notifications</option>
                                <option value="important" {{ ($user->notification_preference ?? 'all') === 'important' ? 'selected' : '' }}>Important Only</option>
                                <option value="none" {{ ($user->notification_preference ?? 'all') === 'none' ? 'selected' : '' }}>None</option>
                            </select>
                            <x-input-error :messages="$errors->get('notification_preference')" class="mt-2" />
                        </div>

                        <!-- Email Notifications Toggle -->
                        <div class="flex items-center justify-between">
                            <div>
                                <label for="email_notifications" class="text-sm font-medium text-gray-700">Email Notifications</label>
                                <p class="text-xs text-gray-500">Receive notifications via email</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="email_notifications" id="email_notifications" 
                                       class="sr-only peer" value="1" {{ ($user->email_notifications ?? true) ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-red"></div>
                            </label>
                        </div>

                        <!-- Push Notifications Toggle -->
                        <div class="flex items-center justify-between">
                            <div>
                                <label for="push_notifications" class="text-sm font-medium text-gray-700">Push Notifications</label>
                                <p class="text-xs text-gray-500">Receive browser push notifications</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="push_notifications" id="push_notifications" 
                                       class="sr-only peer" value="1" {{ ($user->push_notifications ?? true) ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-red"></div>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Save Notification Settings') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Account Security -->
            <div class="p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">
                        <svg class="w-6 h-6 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Account Security
                    </h3>
                    <p class="text-gray-700 mb-6">Manage your account security and privacy.</p>
                    
                    <div class="space-y-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-secondary w-full text-center block">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            Update Profile & Password
                        </a>
                        
                        <div class="text-center">
                            <p class="text-sm text-gray-500">More security options coming soon!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced success message with better positioning and Alpine.js -->
    @if (session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50" 
             x-data="{ show: true }" 
             x-show="show" 
             x-transition
             x-init="setTimeout(() => show = false, 4000)">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Added JavaScript for real-time theme switching -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeRadios = document.querySelectorAll('.theme-radio');
            const body = document.body;
            
            // Function to apply theme immediately
            function applyTheme(theme) {
                body.classList.remove('theme-light', 'theme-dark');
                body.setAttribute('data-theme', theme);
                
                if (theme === 'auto') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    body.classList.add(prefersDark ? 'theme-dark' : 'theme-light');
                } else {
                    body.classList.add(`theme-${theme}`);
                }
            }
            
            // Listen for theme changes
            themeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        applyTheme(this.value);
                    }
                });
            });
            
            // Listen for system theme changes when auto is selected
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function(e) {
                const currentTheme = body.getAttribute('data-theme');
                if (currentTheme === 'auto') {
                    applyTheme('auto');
                }
            });
        });
    </script>
</x-app-layout>
