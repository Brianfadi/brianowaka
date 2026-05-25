{{-- Company & Role --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Company <span class="text-red-400">*</span></label>
        <input type="text" name="company" value="{{ old('company', $experience->company ?? '') }}" required
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors"
               placeholder="e.g. Acme Corp">
        @error('company') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Role / Title <span class="text-red-400">*</span></label>
        <input type="text" name="role" value="{{ old('role', $experience->role ?? '') }}" required
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors"
               placeholder="e.g. Senior Developer">
        @error('role') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

{{-- Location & Order --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Location</label>
        <input type="text" name="location" value="{{ old('location', $experience->location ?? '') }}"
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors"
               placeholder="e.g. Nairobi, Kenya">
    </div>
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Display Order</label>
        <input type="number" name="order" value="{{ old('order', $experience->order ?? 0) }}" min="0"
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
    </div>
</div>

{{-- Dates --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Start Date <span class="text-red-400">*</span></label>
        <input type="date" name="start_date" value="{{ old('start_date', isset($experience) ? $experience->start_date?->format('Y-m-d') : '') }}" required
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
        @error('start_date') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div id="end-date-wrapper" class="{{ old('is_current', isset($experience) && $experience->is_current ? '1' : '0') == '1' ? 'opacity-40 pointer-events-none' : '' }}">
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">End Date</label>
        <input type="date" name="end_date" id="end_date"
               value="{{ old('end_date', isset($experience) ? $experience->end_date?->format('Y-m-d') : '') }}"
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
        @error('end_date') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

{{-- Current role toggle --}}
<div class="mb-5">
    <label class="flex items-center gap-3 cursor-pointer w-fit">
        <input type="hidden" name="is_current" value="0">
        <input type="checkbox" name="is_current" id="is_current" value="1"
               {{ old('is_current', isset($experience) && $experience->is_current ? '1' : '0') == '1' ? 'checked' : '' }}
               class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-blue-500 focus:ring-blue-500 focus:ring-offset-gray-900">
        <span class="text-sm text-gray-300">This is my current role</span>
    </label>
</div>

{{-- Description --}}
<div class="mb-5">
    <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Description</label>
    <textarea name="description" rows="3"
              class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors resize-none"
              placeholder="Brief overview of your role and responsibilities...">{{ old('description', $experience->description ?? '') }}</textarea>
</div>

{{-- Achievements --}}
<div class="mb-5">
    <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Key Achievements</label>
    <p class="text-xs text-gray-600 mb-2">One achievement per line</p>
    <textarea name="achievements" rows="4"
              class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors font-mono"
              placeholder="Built a microservices architecture that reduced latency by 40%&#10;Led a team of 5 engineers&#10;Shipped 3 major product features">{{ old('achievements', isset($experience) && $experience->achievements ? implode("\n", $experience->achievements) : '') }}</textarea>
</div>

<script>
    const checkbox = document.getElementById('is_current');
    const wrapper  = document.getElementById('end-date-wrapper');
    const endInput = document.getElementById('end_date');

    function toggleEndDate() {
        if (checkbox.checked) {
            wrapper.classList.add('opacity-40', 'pointer-events-none');
            endInput.value = '';
        } else {
            wrapper.classList.remove('opacity-40', 'pointer-events-none');
        }
    }
    checkbox.addEventListener('change', toggleEndDate);
</script>
