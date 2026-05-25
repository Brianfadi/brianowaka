@extends('layouts.admin')
@section('page-title', 'Settings')
@section('page-subtitle', 'Manage your site configuration')

@section('content')

{{-- Flash --}}
@if(session('success'))
    <div class="mb-5 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg flex items-center gap-2">
        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ session('success') }}
    </div>
@endif

<div class="flex flex-col lg:flex-row gap-6">

    {{-- Sidebar tabs --}}
    <nav class="lg:w-52 flex-shrink-0">
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
            @foreach($schema as $groupKey => $group)
            <a href="{{ route('admin.settings.index', ['tab' => $groupKey]) }}"
               class="flex items-center gap-3 px-4 py-3 text-sm transition-colors border-b border-gray-800 last:border-0
                      {{ $activeTab === $groupKey
                          ? 'bg-blue-600/20 text-blue-400 border-l-2 border-l-blue-500'
                          : 'text-gray-400 hover:text-white hover:bg-gray-800/50' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $group['icon'] }}"/>
                </svg>
                {{ $group['label'] }}
            </a>
            @endforeach
        </div>
    </nav>

    {{-- Form panel --}}
    <div class="flex-1 min-w-0">
        @foreach($schema as $groupKey => $group)
        @if(in_array($groupKey, ['stats', 'about'])) @continue @endif
        @if($activeTab === $groupKey)
        <form action="{{ route('admin.settings.update', $groupKey) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-800 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $group['icon'] }}"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-white font-semibold text-sm">{{ $group['label'] }} Settings</h2>
                        <p class="text-xs text-gray-500 mt-0.5">
                            @switch($groupKey)
                                @case('general') Basic site identity and branding @break
                                @case('contact') How visitors can reach you @break
                                @case('social')  Your social media profiles @break
                                @case('seo')     Search engine optimisation @break
                            @endswitch
                        </p>
                    </div>
                </div>

                <div class="p-6 space-y-5">
                    @foreach($group['fields'] as $field)
                    @php $current = $settings->get($field['key'])?->value ?? '' @endphp
                    <div>
                        <label for="{{ $field['key'] }}"
                               class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-1.5">
                            {{ $field['label'] }}
                        </label>

                        @if($field['type'] === 'textarea')
                            <textarea id="{{ $field['key'] }}" name="{{ $field['key'] }}" rows="3"
                                      placeholder="{{ $field['placeholder'] ?? '' }}"
                                      class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors resize-none">{{ old($field['key'], $current) }}</textarea>
                        @elseif($field['type'] === 'file')
                            @php
                                $isImage = str_contains($field['accept'] ?? '', 'image');
                                $isPdf   = !$isImage;
                            @endphp
                            <div class="flex items-start gap-4">
                                {{-- Preview --}}
                                @if($current)
                                    <div class="flex-shrink-0">
                                        @if($isImage)
                                            <img src="{{ $current }}" alt="{{ $field['label'] }}"
                                                 class="h-14 w-14 object-contain rounded-lg border border-gray-700 bg-gray-800 p-1"
                                                 id="preview_{{ $field['key'] }}">
                                        @else
                                            <a href="{{ $current }}" target="_blank"
                                               class="flex items-center gap-1.5 text-xs text-blue-400 hover:text-blue-300 bg-gray-800 border border-gray-700 rounded-lg px-3 py-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Current file
                                            </a>
                                        @endif
                                    </div>
                                @elseif($isImage)
                                    <div class="flex-shrink-0 h-14 w-14 rounded-lg border border-dashed border-gray-700 bg-gray-800 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif

                                <div class="flex-1">
                                    <label for="{{ $field['key'] }}"
                                           class="flex items-center gap-2 cursor-pointer w-full bg-gray-800 border border-gray-700 hover:border-blue-500 text-gray-400 hover:text-white text-sm rounded-lg px-3 py-2.5 transition-colors">
                                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        <span id="label_{{ $field['key'] }}">
                                            {{ $current ? 'Replace file' : 'Choose file' }}
                                        </span>
                                    </label>
                                    <input type="file"
                                           id="{{ $field['key'] }}" name="{{ $field['key'] }}"
                                           accept="{{ $field['accept'] ?? '' }}"
                                           class="sr-only"
                                           data-preview="{{ $isImage ? 'preview_'.$field['key'] : '' }}"
                                           data-label="label_{{ $field['key'] }}">
                                    @if($current)
                                        <p class="text-xs text-gray-600 mt-1 truncate">Current: {{ basename($current) }}</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <input type="{{ $field['type'] }}"
                                   id="{{ $field['key'] }}" name="{{ $field['key'] }}"
                                   value="{{ old($field['key'], $current) }}"
                                   placeholder="{{ $field['placeholder'] ?? '' }}"
                                   class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
                        @endif

                        @if($field['type'] === 'textarea' && isset($field['placeholder']) && str_contains($field['placeholder'], '160'))
                            <p class="text-xs text-gray-600 mt-1" id="{{ $field['key'] }}_count">
                                <span id="{{ $field['key'] }}_len">{{ strlen(old($field['key'], $current)) }}</span> / 160 characters
                            </p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-3 mt-5">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save {{ $group['label'] }} Settings
                </button>
            </div>
        </form>
        @endif
        @endforeach

        {{-- ── STATS TAB ── --}}
        @if($activeTab === 'stats')
        <form action="{{ route('admin.settings.stats') }}" method="POST" id="stats-form">
            @csrf

            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-800 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-white font-semibold text-sm">Hero Stats</h2>
                            <p class="text-xs text-gray-500 mt-0.5">Stats shown in the dashboard card on the homepage</p>
                        </div>
                    </div>
                    <button type="button" id="add-stat"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 text-xs font-medium rounded-lg border border-blue-600/30 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Add Stat
                    </button>
                </div>

                <div class="p-6 space-y-3" id="stats-list">
                    @foreach($heroStats as $i => $stat)
                    <div class="stat-row flex items-center gap-3 bg-gray-800/50 border border-gray-700 rounded-lg p-3">
                        <div class="flex-1 grid grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Label</label>
                                <input type="text" name="stat_label[]" value="{{ $stat['label'] }}"
                                       placeholder="e.g. Projects Completed"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Value</label>
                                <input type="text" name="stat_value[]" value="{{ $stat['value'] }}"
                                       placeholder="e.g. +127"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Bar % (0–100)</label>
                                <input type="number" name="stat_percent[]" value="{{ $stat['percent'] }}"
                                       min="0" max="100" placeholder="85"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                        </div>
                        <button type="button" onclick="this.closest('.stat-row').remove()"
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                    @endforeach
                </div>

                @if(count($heroStats) === 0)
                <p class="px-6 pb-6 text-sm text-gray-500">No stats yet. Click "Add Stat" to get started.</p>
                @endif
            </div>

            <div class="flex items-center gap-3 mt-5">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Stats
                </button>
            </div>
        </form>
        @endif

        {{-- ── ABOUT TAB ── --}}
        @if($activeTab === 'about')
        <form action="{{ route('admin.settings.about') }}" method="POST">
            @csrf

            {{-- Basic text fields from schema --}}
            @foreach($schema['about']['fields'] as $field)
            @php $current = $settings->get($field['key'])?->value ?? '' @endphp
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden mb-4">
                <div class="px-6 py-4 border-b border-gray-800">
                    <label for="{{ $field['key'] }}" class="block text-xs font-medium text-gray-400 uppercase tracking-wider">{{ $field['label'] }}</label>
                </div>
                <div class="p-4">
                    @if($field['type'] === 'textarea')
                        <textarea id="{{ $field['key'] }}" name="{{ $field['key'] }}" rows="3"
                                  placeholder="{{ $field['placeholder'] ?? '' }}"
                                  class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors resize-none">{{ old($field['key'], $current) }}</textarea>
                    @else
                        <input type="text" id="{{ $field['key'] }}" name="{{ $field['key'] }}"
                               value="{{ old($field['key'], $current) }}"
                               placeholder="{{ $field['placeholder'] ?? '' }}"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
                    @endif
                </div>
            </div>
            @endforeach

            {{-- Tags --}}
            @php $currentTags = implode(', ', $aboutTags) @endphp
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden mb-4">
                <div class="px-6 py-4 border-b border-gray-800">
                    <label for="about_tags" class="block text-xs font-medium text-gray-400 uppercase tracking-wider">Quick Fact Tags</label>
                    <p class="text-xs text-gray-600 mt-0.5">Comma-separated tags shown under the profile photo</p>
                </div>
                <div class="p-4">
                    <input type="text" id="about_tags" name="about_tags"
                           value="{{ old('about_tags', $currentTags) }}"
                           placeholder="Laravel Expert, Full Stack, API Builder"
                           class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2.5 focus:outline-none focus:border-blue-500 transition-colors">
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden mb-4">
                <div class="px-6 py-4 border-b border-gray-800 flex items-center justify-between">
                    <div>
                        <h3 class="text-white font-semibold text-sm">Stat Cards</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Highlight numbers shown in the about section</p>
                    </div>
                    <button type="button" id="add-stat-card"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 text-xs font-medium rounded-lg border border-blue-600/30 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add Card
                    </button>
                </div>
                <div class="p-4 space-y-3" id="stat-cards-list">
                    @foreach($aboutStatCards as $card)
                    <div class="stat-card-row flex items-center gap-3 bg-gray-800/50 border border-gray-700 rounded-lg p-3">
                        <div class="flex-1 grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Number / Value</label>
                                <input type="text" name="about_stat_num[]" value="{{ $card['num'] }}"
                                       placeholder="e.g. 5+"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Label</label>
                                <input type="text" name="about_stat_label[]" value="{{ $card['label'] }}"
                                       placeholder="e.g. Years Experience"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                        </div>
                        <button type="button" onclick="this.closest('.stat-card-row').remove()"
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- What I Do --}}
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden mb-4">
                <div class="px-6 py-4 border-b border-gray-800 flex items-center justify-between">
                    <div>
                        <h3 class="text-white font-semibold text-sm">What I Do</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Service items listed in the about section</p>
                    </div>
                    <button type="button" id="add-service-item"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 text-xs font-medium rounded-lg border border-blue-600/30 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Add Item
                    </button>
                </div>
                <div class="p-4 space-y-3" id="services-list">
                    @foreach($aboutServices as $svc)
                    <div class="svc-row flex items-center gap-3 bg-gray-800/50 border border-gray-700 rounded-lg p-3">
                        <div class="flex-1 grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Title</label>
                                <input type="text" name="about_svc_title[]" value="{{ $svc['title'] }}"
                                       placeholder="e.g. Web Development"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 mb-1">Description</label>
                                <input type="text" name="about_svc_desc[]" value="{{ $svc['desc'] }}"
                                       placeholder="Short description"
                                       class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                            </div>
                        </div>
                        <button type="button" onclick="this.closest('.svc-row').remove()"
                                class="flex-shrink-0 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-3 mt-2">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    Save About Me Settings
                </button>
            </div>
        </form>
        @endif

    </div>

</div>

{{-- Character counter for textareas + file input preview --}}
<script>
    document.querySelectorAll('textarea').forEach(function(ta) {
        const counter = document.getElementById(ta.id + '_len');
        if (!counter) return;
        ta.addEventListener('input', function() {
            counter.textContent = ta.value.length;
        });
    });

    document.querySelectorAll('input[type="file"]').forEach(function(input) {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (!file) return;

            // Update label text
            const labelEl = document.getElementById(this.dataset.label);
            if (labelEl) labelEl.textContent = file.name;

            // Update image preview if applicable
            const previewId = this.dataset.preview;
            if (previewId) {
                const preview = document.getElementById(previewId);
                if (preview) {
                    const reader = new FileReader();
                    reader.onload = e => preview.src = e.target.result;
                    reader.readAsDataURL(file);
                }
            }
        });
    });

    // Add stat card row
    const addStatCardBtn = document.getElementById('add-stat-card');
    if (addStatCardBtn) {
        addStatCardBtn.addEventListener('click', function () {
            const list = document.getElementById('stat-cards-list');
            const row = document.createElement('div');
            row.className = 'stat-card-row flex items-center gap-3 bg-gray-800/50 border border-gray-700 rounded-lg p-3';
            row.innerHTML = `
                <div class="flex-1 grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Number / Value</label>
                        <input type="text" name="about_stat_num[]" placeholder="e.g. 5+"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Label</label>
                        <input type="text" name="about_stat_label[]" placeholder="e.g. Years Experience"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                </div>
                <button type="button" onclick="this.closest('.stat-card-row').remove()"
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>`;
            list.appendChild(row);
        });
    }

    // Add service item row
    const addSvcBtn = document.getElementById('add-service-item');
    if (addSvcBtn) {
        addSvcBtn.addEventListener('click', function () {
            const list = document.getElementById('services-list');
            const row = document.createElement('div');
            row.className = 'svc-row flex items-center gap-3 bg-gray-800/50 border border-gray-700 rounded-lg p-3';
            row.innerHTML = `
                <div class="flex-1 grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Title</label>
                        <input type="text" name="about_svc_title[]" placeholder="e.g. Web Development"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Description</label>
                        <input type="text" name="about_svc_desc[]" placeholder="Short description"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                </div>
                <button type="button" onclick="this.closest('.svc-row').remove()"
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>`;
            list.appendChild(row);
        });
    }
    const addStatBtn = document.getElementById('add-stat');
    if (addStatBtn) {
        addStatBtn.addEventListener('click', function () {
            const list = document.getElementById('stats-list');
            const row = document.createElement('div');
            row.className = 'stat-row flex items-center gap-3 bg-gray-800/50 border border-gray-700 rounded-lg p-3';
            row.innerHTML = `
                <div class="flex-1 grid grid-cols-3 gap-3">
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Label</label>
                        <input type="text" name="stat_label[]" placeholder="e.g. Projects Completed"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Value</label>
                        <input type="text" name="stat_value[]" placeholder="e.g. +127"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Bar % (0–100)</label>
                        <input type="number" name="stat_percent[]" min="0" max="100" placeholder="85"
                               class="w-full bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 transition-colors">
                    </div>
                </div>
                <button type="button" onclick="this.closest('.stat-row').remove()"
                        class="flex-shrink-0 w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>`;
            list.appendChild(row);
        });
    }
</script>

@endsection
