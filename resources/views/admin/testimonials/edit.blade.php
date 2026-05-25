@extends('layouts.admin')

@section('page-title', 'Edit Testimonial')
@section('page-subtitle', 'Update testimonial information')

@section('content')

<div class="max-w-3xl">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Basic Info Card --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Basic Information</h3>
            
            <div class="space-y-4">
                {{-- Name --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Customer Name *</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Role / Position *</label>
                    <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" required
                           placeholder="e.g., CEO, Product Manager"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('role')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Company --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Company (Optional)</label>
                    <input type="text" name="company" value="{{ old('company', $testimonial->company) }}"
                           placeholder="e.g., TechCorp Inc"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('company')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Content --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Testimonial Content *</label>
                    <textarea name="content" rows="5" required
                              placeholder="Enter the customer's testimonial..."
                              class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('content', $testimonial->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Rating --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Rating *</label>
                    <select name="rating" required
                            class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select rating</option>
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                            </option>
                        @endfor
                    </select>
                    @error('rating')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Avatar --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Avatar Image</label>
                    @if($testimonial->avatar)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ Storage::url($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-16 h-16 rounded-full object-cover">
                        <span class="text-sm text-gray-400">Current avatar</span>
                    </div>
                    @endif
                    <input type="file" name="avatar" accept="image/*"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Leave empty to keep current avatar. Recommended: Square image, at least 200x200px</p>
                    @error('avatar')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Settings Card --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Display Settings</h3>
            
            <div class="space-y-4">
                {{-- Order --}}
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $testimonial->order) }}" min="0"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Active Status --}}
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="is_active" class="text-sm font-medium text-gray-300">
                        Active (Show on website)
                    </label>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                Update Testimonial
            </button>
            <a href="{{ route('admin.testimonials.index') }}"
               class="px-6 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
