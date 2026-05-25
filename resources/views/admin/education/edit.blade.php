@extends('layouts.admin')

@section('page-title', 'Edit Education')
@section('page-subtitle', 'Update education record')

@section('content')

<div class="max-w-3xl">
    <form action="{{ route('admin.education.update', $education) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Basic Information</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Institution *</label>
                    <input type="text" name="institution" value="{{ old('institution', $education->institution) }}" required
                           placeholder="e.g., Harvard University"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('institution')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Degree *</label>
                        <input type="text" name="degree" value="{{ old('degree', $education->degree) }}" required
                               placeholder="e.g., Bachelor of Science"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('degree')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Field of Study *</label>
                        <input type="text" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}" required
                               placeholder="e.g., Computer Science"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('field_of_study')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location', $education->location) }}"
                               placeholder="e.g., Cambridge, MA"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('location')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Grade / GPA</label>
                        <input type="text" name="grade" value="{{ old('grade', $education->grade) }}"
                               placeholder="e.g., 3.8 GPA, First Class"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('grade')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Start Date *</label>
                        <input type="date" name="start_date" value="{{ old('start_date', $education->start_date->format('Y-m-d')) }}" required
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">End Date</label>
                        <input type="date" name="end_date" value="{{ old('end_date', $education->end_date?->format('Y-m-d')) }}" id="end_date"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Leave empty if currently studying</p>
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_current" id="is_current" value="1" {{ old('is_current', $education->is_current) ? 'checked' : '' }}
                           onchange="document.getElementById('end_date').disabled = this.checked"
                           class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="is_current" class="text-sm font-medium text-gray-300">
                        Currently studying here
                    </label>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              placeholder="Brief description of your studies, coursework, or experience..."
                              class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $education->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Institution Logo</label>
                    @if($education->logo)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ Storage::url($education->logo) }}" alt="{{ $education->institution }}" class="w-16 h-16 rounded-lg object-cover">
                        <span class="text-sm text-gray-400">Current logo</span>
                    </div>
                    @endif
                    <input type="file" name="logo" accept="image/*"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Leave empty to keep current logo. Recommended: Square image, at least 200x200px</p>
                    @error('logo')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Achievements --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Achievements & Honors</h3>
            
            <div id="achievements-container" class="space-y-3">
                @if($education->achievements && count($education->achievements) > 0)
                    @foreach($education->achievements as $index => $achievement)
                    <div class="achievement-item flex gap-2">
                        <input type="text" name="achievements[]" value="{{ old('achievements.'.$index, $achievement) }}"
                               placeholder="e.g., Dean's List, Scholarship recipient"
                               class="flex-1 px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                @else
                <div class="achievement-item flex gap-2">
                    <input type="text" name="achievements[]" value="{{ old('achievements.0') }}"
                           placeholder="e.g., Dean's List, Scholarship recipient"
                           class="flex-1 px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                @endif
            </div>
            
            <button type="button" onclick="addAchievement()" class="mt-3 inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Achievement
            </button>
        </div>

        {{-- Settings --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Display Settings</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', $education->order) }}" min="0"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $education->is_active) ? 'checked' : '' }}
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
                Update Education Record
            </button>
            <a href="{{ route('admin.education.index') }}"
               class="px-6 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
function addAchievement() {
    const container = document.getElementById('achievements-container');
    const div = document.createElement('div');
    div.className = 'achievement-item flex gap-2';
    div.innerHTML = `
        <input type="text" name="achievements[]"
               placeholder="e.g., Dean's List, Scholarship recipient"
               class="flex-1 px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        <button type="button" onclick="this.parentElement.remove()" class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    `;
    container.appendChild(div);
}
</script>

@endsection
