@extends('layouts.admin')

@section('title', 'View Advertisement')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.advertisements.index') }}" 
               class="text-gray-400 hover:text-white transition-colors duration-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-white">{{ $advertisement->title }}</h1>
                <p class="text-gray-400 text-sm mt-1">Advertisement Details</p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <form action="{{ route('admin.advertisements.toggle', $advertisement) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200
                    {{ $advertisement->is_active ? 'bg-green-600 hover:bg-green-700 text-white' : 'bg-red-600 hover:bg-red-700 text-white' }}">
                    {{ $advertisement->is_active ? 'Active' : 'Inactive' }}
                </button>
            </form>
            
            <a href="{{ route('admin.advertisements.edit', $advertisement) }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Preview Card --}}
        <div class="lg:col-span-2">
            <div class="bg-gray-800 rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-white mb-4">Live Preview</h3>
                
                {{-- Advertisement Card Preview --}}
                <div class="relative rounded-2xl overflow-hidden shadow-xl border-2 {{ $advertisement->theme_config['border'] }} p-6 bg-gradient-to-br {{ $advertisement->theme_config['gradient'] }} max-w-md mx-auto">
                    <div class="relative z-10">
                        {{-- Header --}}
                        <div class="text-center mb-4">
                            @if($advertisement->badge_text)
                                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold mb-3 bg-gradient-to-r {{ $advertisement->theme_config['badge'] }} text-white shadow-lg">
                                    @if($advertisement->badge_icon)
                                        <span>{{ $advertisement->badge_icon }}</span>
                                    @endif
                                    {{ $advertisement->badge_text }}
                                </div>
                            @endif
                            
                            <h2 class="text-xl font-extrabold text-white mb-1 leading-tight">
                                <span class="bg-gradient-to-r {{ $advertisement->theme_config['text'] }} bg-clip-text text-transparent">
                                    {{ $advertisement->title }}
                                </span>
                            </h2>
                            
                            @if($advertisement->subtitle)
                                <p class="text-gray-200 text-sm">{{ $advertisement->subtitle }}</p>
                            @endif
                        </div>

                        {{-- Visual Section --}}
                        @if($advertisement->visual_type === 'grid' && $advertisement->showcase_items)
                            <div class="relative mb-4 group">
                                <div class="relative bg-gradient-to-br from-slate-800 to-slate-900 rounded-xl p-4 border border-opacity-30">
                                    <div class="grid grid-cols-2 gap-2 mb-3">
                                        @foreach(array_slice($advertisement->showcase_items, 0, 4) as $item)
                                            @if(!empty($item['title']))
                                                <div class="bg-gradient-to-r {{ $advertisement->theme_config['button'] }} rounded-lg p-2 text-center">
                                                    @if(!empty($item['icon']))
                                                        <div class="text-white font-bold text-sm">{{ $item['icon'] }}</div>
                                                    @endif
                                                    <div class="text-white text-xs font-semibold">{{ $item['title'] }}</div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @elseif($advertisement->visual_type === 'custom' && $advertisement->custom_visual_html)
                            <div class="mb-4">
                                {!! $advertisement->custom_visual_html !!}
                            </div>
                        @endif

                        {{-- Features --}}
                        @if($advertisement->features && count($advertisement->features) > 0)
                            <div class="space-y-2 mb-4">
                                @foreach(array_slice($advertisement->features, 0, 3) as $feature)
                                    <div class="flex items-center gap-2 text-white">
                                        <div class="w-4 h-4 bg-gradient-to-r {{ $advertisement->theme_config['button'] }} rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs font-medium">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Pricing --}}
                        @if($advertisement->sale_price || $advertisement->original_price)
                            <div class="text-center mb-4">
                                @if($advertisement->original_price && $advertisement->sale_price)
                                    <div class="text-gray-400 text-xs line-through">{{ $advertisement->formatted_original_price }}</div>
                                @endif
                                
                                @if($advertisement->sale_price)
                                    <div class="text-xl font-extrabold text-white mb-1">
                                        <span class="bg-gradient-to-r {{ $advertisement->theme_config['text'] }} bg-clip-text text-transparent">
                                            {{ $advertisement->formatted_sale_price }}
                                        </span>
                                    </div>
                                @elseif($advertisement->original_price)
                                    <div class="text-xl font-extrabold text-white mb-1">
                                        <span class="bg-gradient-to-r {{ $advertisement->theme_config['text'] }} bg-clip-text text-transparent">
                                            {{ $advertisement->formatted_original_price }}
                                        </span>
                                    </div>
                                @endif
                                
                                @if($advertisement->price_label)
                                    <div class="text-gray-200 text-xs">{{ $advertisement->price_label }}</div>
                                @endif
                            </div>
                        @endif

                        {{-- Buttons --}}
                        <div class="space-y-2">
                            <a href="{{ $advertisement->primary_button_url }}" 
                               class="block w-full py-2 px-4 bg-gradient-to-r {{ $advertisement->theme_config['button'] }} text-white font-bold rounded-lg shadow-lg text-xs text-center">
                                {{ $advertisement->primary_button_text }}
                            </a>
                            
                            @if($advertisement->secondary_button_text)
                                <a href="{{ $advertisement->secondary_button_url }}" 
                                   class="block w-full py-2 px-4 border-2 {{ $advertisement->theme_config['border'] }} text-gray-200 hover:text-white font-semibold rounded-lg text-xs text-center">
                                    {{ $advertisement->secondary_button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Details Sidebar --}}
        <div class="space-y-6">
            {{-- Basic Information --}}
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Basic Information</h3>
                
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Status:</span>
                        <span class="{{ $advertisement->is_active ? 'text-green-400' : 'text-red-400' }}">
                            {{ $advertisement->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-400">Theme:</span>
                        <span class="text-white capitalize">{{ $advertisement->theme_color }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-400">Sort Order:</span>
                        <span class="text-white">{{ $advertisement->sort_order ?: 'Default' }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-400">Visual Type:</span>
                        <span class="text-white capitalize">{{ str_replace('_', ' ', $advertisement->visual_type) }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-400">Created:</span>
                        <span class="text-white">{{ $advertisement->created_at->format('M j, Y') }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-400">Updated:</span>
                        <span class="text-white">{{ $advertisement->updated_at->format('M j, Y') }}</span>
                    </div>
                </div>
            </div>

            {{-- Pricing Details --}}
            @if($advertisement->original_price || $advertisement->sale_price)
                <div class="bg-gray-800 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Pricing Details</h3>
                    
                    <div class="space-y-3 text-sm">
                        @if($advertisement->original_price)
                            <div class="flex justify-between">
                                <span class="text-gray-400">Original Price:</span>
                                <span class="text-white">{{ $advertisement->formatted_original_price }}</span>
                            </div>
                        @endif
                        
                        @if($advertisement->sale_price)
                            <div class="flex justify-between">
                                <span class="text-gray-400">Sale Price:</span>
                                <span class="text-green-400 font-semibold">{{ $advertisement->formatted_sale_price }}</span>
                            </div>
                        @endif
                        
                        @if($advertisement->savings > 0)
                            <div class="flex justify-between">
                                <span class="text-gray-400">Savings:</span>
                                <span class="text-green-400 font-semibold">{{ $advertisement->formatted_savings }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Features List --}}
            @if($advertisement->features && count($advertisement->features) > 0)
                <div class="bg-gray-800 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Features</h3>
                    
                    <div class="space-y-2">
                        @foreach($advertisement->features as $feature)
                            <div class="flex items-center gap-2 text-sm">
                                <div class="w-4 h-4 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-2 h-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-gray-300">{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Actions --}}
            <div class="bg-gray-800 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-white mb-4">Actions</h3>
                
                <div class="space-y-3">
                    <a href="{{ route('admin.advertisements.edit', $advertisement) }}" 
                       class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                        Edit Advertisement
                    </a>
                    
                    <form action="{{ route('admin.advertisements.destroy', $advertisement) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this advertisement?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="block w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                            Delete Advertisement
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection