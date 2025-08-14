<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.events.update', $event) }}">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group">
                            <label for="title" class="form-label">{{ __('Event Title') }}</label>
                            <input id="title" class="form-input @error('title') border-red-500 @enderror" 
                                   type="text" name="title" value="{{ old('title', $event->title) }}" 
                                   required autofocus autocomplete="title">
                            @error('title')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea id="description" name="description" rows="4" 
                                      class="form-textarea @error('description') border-red-500 @enderror" 
                                      required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Date and Time -->
                        <div class="form-group">
                            <label for="date" class="form-label">{{ __('Date and Time') }}</label>
                            <input id="date" class="form-input @error('date') border-red-500 @enderror" 
                                   type="datetime-local" name="date" 
                                   value="{{ old('date', $event->date->format('Y-m-d\TH:i')) }}" required>
                            @error('date')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Location -->
                        <div class="form-group">
                            <label for="location" class="form-label">{{ __('Location') }}</label>
                            <input id="location" class="form-input @error('location') border-red-500 @enderror" 
                                   type="text" name="location" value="{{ old('location', $event->location) }}" 
                                   required autocomplete="location">
                            @error('location')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price" class="form-label">{{ __('Price (KSh)') }}</label>
                            <input id="price" class="form-input @error('price') border-red-500 @enderror" 
                                   type="number" name="price" value="{{ old('price', $event->price) }}" 
                                   min="0" step="0.01" required>
                            @error('price')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Event') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>