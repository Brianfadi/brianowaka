@extends('layouts.admin')

@section('title', 'Create Advertisement')

@section('content')
<div class="p-6">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.advertisements.index') }}" 
           class="text-gray-400 hover:text-white transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-white">Create Advertisement</h1>
            <p class="text-gray-400 text-sm mt-1">Create a new hero section advertisement card</p>
        </div>
    </div>

    @if($errors->any())
        <div class="bg-red-600 text-white p-4 rounded-lg mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.advertisements.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Basic Information --}}
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Basic Information</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" value="{{ old('title') }}" 
                               class="form-input" placeholder="e.g., Premium Web Solutions" required>
                    </div>

                    <div>
                        <label class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle') }}" 
                               class="form-input" placeholder="e.g., Transform your business with cutting-edge technology">
                    </div>

                    <div>
                        <label class="form-label">Description *</label>
                        <textarea name="description" rows="3" class="form-input" 
                                  placeholder="Brief description of the service or offer" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Badge Text</label>
                            <input type="text" name="badge_text" value="{{ old('badge_text') }}" 
                                   class="form-input" placeholder="e.g., LIMITED TIME OFFER">
                        </div>

                        <div>
                            <label class="form-label">Badge Icon</label>
                            <input type="text" name="badge_icon" value="{{ old('badge_icon') }}" 
                                   class="form-input" placeholder="e.g., 🔥">
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Theme Color *</label>
                        <select name="theme_color" class="form-input" required>
                            <option value="blue" {{ old('theme_color') === 'blue' ? 'selected' : '' }}>Blue (Default)</option>
                            <option value="emerald" {{ old('theme_color') === 'emerald' ? 'selected' : '' }}>Emerald (E-Commerce)</option>
                            <option value="pink" {{ old('theme_color') === 'pink' ? 'selected' : '' }}>Pink (Mobile)</option>
                            <option value="indigo" {{ old('theme_color') === 'indigo' ? 'selected' : '' }}>Indigo (AI/Tech)</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" 
                                   class="form-input" min="0" placeholder="0">
                            <p class="text-xs text-gray-400 mt-1">Lower numbers appear first</p>
                        </div>

                        <div class="flex items-center">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" 
                                       {{ old('is_active', true) ? 'checked' : '' }}
                                       class="rounded border-gray-600 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-300">Active</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pricing Information --}}
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Pricing Information</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="form-label">Original Price</label>
                        <input type="number" name="original_price" value="{{ old('original_price') }}" 
                               class="form-input" step="0.01" min="0" placeholder="2999.00">
                    </div>

                    <div>
                        <label class="form-label">Sale Price</label>
                        <input type="number" name="sale_price" value="{{ old('sale_price') }}" 
                               class="form-input" step="0.01" min="0" placeholder="1999.00">
                    </div>

                    <div>
                        <label class="form-label">Price Label</label>
                        <input type="text" name="price_label" value="{{ old('price_label') }}" 
                               class="form-input" placeholder="e.g., Complete Package, Starting at">
                    </div>
                </div>
            </div>
        </div>

        {{-- Call-to-Action Buttons --}}
        <div class="bg-gray-800 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Call-to-Action Buttons</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <h4 class="text-md font-medium text-gray-300">Primary Button</h4>
                    <div>
                        <label class="form-label">Button Text *</label>
                        <input type="text" name="primary_button_text" value="{{ old('primary_button_text', 'Get Started') }}" 
                               class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Button URL *</label>
                        <input type="text" name="primary_button_url" value="{{ old('primary_button_url', '#contact') }}" 
                               class="form-input" required>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="text-md font-medium text-gray-300">Secondary Button (Optional)</h4>
                    <div>
                        <label class="form-label">Button Text</label>
                        <input type="text" name="secondary_button_text" value="{{ old('secondary_button_text') }}" 
                               class="form-input" placeholder="e.g., View Portfolio">
                    </div>
                    <div>
                        <label class="form-label">Button URL</label>
                        <input type="text" name="secondary_button_url" value="{{ old('secondary_button_url') }}" 
                               class="form-input" placeholder="e.g., /portfolio">
                    </div>
                </div>
            </div>
        </div>

        {{-- Features List --}}
        <div class="bg-gray-800 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Features List</h3>
            <p class="text-gray-400 text-sm mb-4">Add up to 5 key features or benefits</p>
            
            <div id="features-container" class="space-y-3">
                @for($i = 0; $i < 5; $i++)
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <input type="text" name="features[]" value="{{ old('features.' . $i) }}" 
                               class="form-input flex-1" placeholder="Feature {{ $i + 1 }}">
                    </div>
                @endfor
            </div>
        </div>

        {{-- Visual Configuration --}}
        <div class="bg-gray-800 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Visual Configuration</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="form-label">Visual Type *</label>
                    <select name="visual_type" class="form-input" required id="visual-type-select">
                        <option value="grid" {{ old('visual_type', 'grid') === 'grid' ? 'selected' : '' }}>Grid Layout</option>
                        <option value="mockup" {{ old('visual_type') === 'mockup' ? 'selected' : '' }}>Mobile Mockup</option>
                        <option value="icon" {{ old('visual_type') === 'icon' ? 'selected' : '' }}>Large Icon</option>
                        <option value="custom" {{ old('visual_type') === 'custom' ? 'selected' : '' }}>Custom HTML</option>
                    </select>
                </div>

                <div id="showcase-items-section" class="{{ old('visual_type', 'grid') === 'grid' ? '' : 'hidden' }}">
                    <label class="form-label">Showcase Items (for Grid Layout)</label>
                    <p class="text-gray-400 text-sm mb-3">Add up to 4 items for the grid showcase</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @for($i = 0; $i < 4; $i++)
                            <div class="border border-gray-600 rounded-lg p-4">
                                <div class="space-y-3">
                                    <div>
                                        <label class="form-label">Icon {{ $i + 1 }}</label>
                                        <input type="text" name="showcase_items[{{ $i }}][icon]" 
                                               value="{{ old('showcase_items.' . $i . '.icon') }}" 
                                               class="form-input" placeholder="e.g., 🚀">
                                    </div>
                                    <div>
                                        <label class="form-label">Title {{ $i + 1 }}</label>
                                        <input type="text" name="showcase_items[{{ $i }}][title]" 
                                               value="{{ old('showcase_items.' . $i . '.title') }}" 
                                               class="form-input" placeholder="e.g., Fast Deploy">
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                <div id="custom-html-section" class="{{ old('visual_type') === 'custom' ? '' : 'hidden' }}">
                    <label class="form-label">Custom HTML</label>
                    <textarea name="custom_visual_html" rows="6" class="form-input font-mono text-sm" 
                              placeholder="Enter custom HTML for the visual section">{{ old('custom_visual_html') }}</textarea>
                    <p class="text-xs text-gray-400 mt-1">Use Tailwind CSS classes for styling</p>
                </div>
            </div>
        </div>

        {{-- Submit Buttons --}}
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.advertisements.index') }}" 
               class="px-6 py-2 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                Create Advertisement
            </button>
        </div>
    </form>
</div>

<style>
.form-label { 
    display: block; 
    font-size: 0.75rem; 
    font-weight: 500; 
    color: #9ca3af; 
    margin-bottom: 0.375rem; 
}
.form-input { 
    width: 100%; 
    background: #1f2937; 
    border: 1px solid #374151; 
    color: #fff; 
    border-radius: 0.5rem; 
    padding: 0.625rem 0.75rem; 
    font-size: 0.875rem; 
}
.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const visualTypeSelect = document.getElementById('visual-type-select');
    const showcaseItemsSection = document.getElementById('showcase-items-section');
    const customHtmlSection = document.getElementById('custom-html-section');

    function toggleVisualSections() {
        const selectedType = visualTypeSelect.value;
        
        showcaseItemsSection.classList.toggle('hidden', selectedType !== 'grid');
        customHtmlSection.classList.toggle('hidden', selectedType !== 'custom');
    }

    visualTypeSelect.addEventListener('change', toggleVisualSections);
    toggleVisualSections(); // Initial call
});
</script>
@endsection