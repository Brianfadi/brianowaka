@extends('layouts.admin')

@section('page-title', 'Advertisement Card Details')
@section('page-subtitle', 'View advertisement card information')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-gray-900 rounded-xl border border-gray-800 shadow-xl">
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-white">{{ $advertisementCard->title }}</h1>
                    <p class="text-gray-400 text-sm mt-1">Advertisement Card Details</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $advertisementCard->is_active ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                        {{ $advertisementCard->is_active ? 'Active' : 'Inactive' }}
                    </span>
                    <a href="{{ route('admin.advertisement-cards.edit', $advertisementCard) }}" 
                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 text-sm">
                        Edit Card
                    </a>
                    <a href="{{ route('admin.advertisement-cards.index') }}" 
                       class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg transition-colors duration-200 text-sm">
                        ← Back to Cards
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6 space-y-8">
            {{-- Basic Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Basic Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Title</label>
                            <p class="text-white">{{ $advertisementCard->title }}</p>
                        </div>
                        @if($advertisementCard->subtitle)
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Subtitle</label>
                            <p class="text-white">{{ $advertisementCard->subtitle }}</p>
                        </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                            <p class="text-white">{{ $advertisementCard->description }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-white mb-4">Display Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Theme Color</label>
                            <div class="flex items-center gap-2">
                                <div class="w-4 h-4 rounded-full {{ $advertisementCard->getThemeColorClass() }}"></div>
                                <span class="text-white capitalize">{{ $advertisementCard->theme_color }}</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Visual Type</label>
                            <p class="text-white capitalize">{{ str_replace('_', ' ', $advertisementCard->visual_type) }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Sort Order</label>
                            <p class="text-white">{{ $advertisementCard->sort_order ?? 'Default' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Status</label>
                            <span class="px-2 py-1 text-xs font-medium rounded {{ $advertisementCard->is_active ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                                {{ $advertisementCard->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Badge Information --}}
            @if($advertisementCard->badge_text || $advertisementCard->badge_icon)
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Badge Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @if($advertisementCard->badge_text)
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Badge Text</label>
                        <p class="text-white">{{ $advertisementCard->badge_text }}</p>
                    </div>
                    @endif
                    @if($advertisementCard->badge_icon)
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Badge Icon</label>
                        <p class="text-white text-lg">{{ $advertisementCard->badge_icon }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- Pricing Information --}}
            @if($advertisementCard->original_price || $advertisementCard->sale_price || $advertisementCard->price_label)
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Pricing Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @if($advertisementCard->original_price)
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Original Price</label>
                        <p class="text-white">${{ number_format($advertisementCard->original_price, 2) }}</p>
                    </div>
                    @endif
                    @if($advertisementCard->sale_price)
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Sale Price</label>
                        <p class="text-white">${{ number_format($advertisementCard->sale_price, 2) }}</p>
                    </div>
                    @endif
                    @if($advertisementCard->price_label)
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Price Label</label>
                        <p class="text-white">{{ $advertisementCard->price_label }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- Button Information --}}
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Button Configuration</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Primary Button</label>
                        <div class="bg-gray-800 rounded-lg p-4">
                            <p class="text-white font-medium">{{ $advertisementCard->primary_button_text }}</p>
                            <p class="text-gray-400 text-sm mt-1">{{ $advertisementCard->primary_button_url }}</p>
                        </div>
                    </div>
                    @if($advertisementCard->secondary_button_text)
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Secondary Button</label>
                        <div class="bg-gray-800 rounded-lg p-4">
                            <p class="text-white font-medium">{{ $advertisementCard->secondary_button_text }}</p>
                            <p class="text-gray-400 text-sm mt-1">{{ $advertisementCard->secondary_button_url }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Features --}}
            @if($advertisementCard->features && count($advertisementCard->features) > 0)
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Features</h3>
                <div class="bg-gray-800 rounded-lg p-4">
                    <ul class="space-y-2">
                        @foreach($advertisementCard->features as $feature)
                        <li class="flex items-center gap-2 text-white">
                            <svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            {{-- Showcase Items --}}
            @if($advertisementCard->showcase_items && count($advertisementCard->showcase_items) > 0)
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Showcase Items</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($advertisementCard->showcase_items as $item)
                    <div class="bg-gray-800 rounded-lg p-4 text-center">
                        @if(isset($item['icon']))
                        <div class="text-2xl mb-2">{{ $item['icon'] }}</div>
                        @endif
                        <p class="text-white text-sm font-medium">{{ $item['title'] ?? 'Untitled' }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Custom Visual HTML --}}
            @if($advertisementCard->visual_type === 'custom' && $advertisementCard->custom_visual_html)
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Custom Visual HTML</h3>
                <div class="bg-gray-800 rounded-lg p-4">
                    <pre class="text-gray-300 text-sm overflow-x-auto"><code>{{ $advertisementCard->custom_visual_html }}</code></pre>
                </div>
            </div>
            @endif

            {{-- Timestamps --}}
            <div>
                <h3 class="text-lg font-semibold text-white mb-4">Timestamps</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Created</label>
                        <p class="text-white">{{ $advertisementCard->created_at->format('M j, Y \a\t g:i A') }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Last Updated</label>
                        <p class="text-white">{{ $advertisementCard->updated_at->format('M j, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-between pt-6 border-t border-gray-800">
                <div class="flex items-center gap-3">
                    <form action="{{ route('admin.advertisement-cards.toggle-status', $advertisementCard) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" 
                                class="px-4 py-2 {{ $advertisementCard->is_active ? 'bg-yellow-600 hover:bg-yellow-700' : 'bg-green-600 hover:bg-green-700' }} text-white rounded-lg transition-colors duration-200 text-sm">
                            {{ $advertisementCard->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
                
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.advertisement-cards.edit', $advertisementCard) }}" 
                       class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 text-sm">
                        Edit Card
                    </a>
                    <form action="{{ route('admin.advertisement-cards.destroy', $advertisementCard) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this advertisement card?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 text-sm">
                            Delete Card
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection