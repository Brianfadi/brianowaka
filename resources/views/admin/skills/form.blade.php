{{-- Name & Icon --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Skill Name <span class="text-red-400">*</span></label>
        <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}" required
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors"
               placeholder="e.g. Laravel">
        @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Icon <span class="text-gray-600 font-normal normal-case">(emoji or text)</span></label>
        <input type="text" name="icon" value="{{ old('icon', $skill->icon ?? '') }}"
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors"
               placeholder="e.g. 🐘 or PHP">
    </div>
</div>

{{-- Category & Order --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Category</label>
        <input type="text" name="category" value="{{ old('category', $skill->category ?? '') }}"
               list="category-suggestions"
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors"
               placeholder="e.g. Backend, Frontend, DevOps">
        <datalist id="category-suggestions">
            @foreach($categories as $cat)
                <option value="{{ $cat }}">
            @endforeach
        </datalist>
    </div>
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Display Order</label>
        <input type="number" name="order" value="{{ old('order', $skill->order ?? 0) }}" min="0"
               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
    </div>
</div>

{{-- Level & Percentage --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">Level <span class="text-red-400">*</span></label>
        <select name="level" required
                class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
            @foreach(['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced', 'expert' => 'Expert'] as $val => $label)
                <option value="{{ $val }}" {{ old('level', $skill->level ?? '') === $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('level') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">
            Proficiency — <span id="pct-label" class="text-blue-400">{{ old('percentage', $skill->percentage ?? 50) }}%</span>
        </label>
        <input type="range" name="percentage" id="pct-range"
               value="{{ old('percentage', $skill->percentage ?? 50) }}" min="0" max="100" step="5"
               class="w-full accent-blue-500 cursor-pointer">
        @error('percentage') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
</div>

{{-- Active toggle --}}
<div>
    <label class="flex items-center gap-3 cursor-pointer w-fit">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1"
               {{ old('is_active', isset($skill) ? $skill->is_active : true) ? 'checked' : '' }}
               class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-blue-500 focus:ring-blue-500 focus:ring-offset-gray-900">
        <span class="text-sm text-gray-300">Active (visible on site)</span>
    </label>
</div>

<script>
    const range = document.getElementById('pct-range');
    const label = document.getElementById('pct-label');
    range.addEventListener('input', () => label.textContent = range.value + '%');
</script>
