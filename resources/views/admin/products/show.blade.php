@extends('layouts.admin')
@section('page-title', $product->name)
@section('page-subtitle', 'Product Preview')

@section('content')

{{-- Top bar --}}
<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Products</a>
    <div class="flex items-center gap-3">
        @if($product->demo_link)
        <a href="{{ $product->demo_link }}" target="_blank"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            Live Demo
        </a>
        @endif
        <a href="{{ route('admin.products.edit', $product) }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Product
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Main --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- Image Gallery --}}
        @if($product->images && count($product->images) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
            <div class="aspect-video bg-gray-800">
                <img src="{{ $product->images[0] }}" alt="{{ $product->name }}" class="w-full h-full object-cover" id="featured-img" loading="eager">
            </div>
            @if(count($product->images) > 1)
            <div class="flex gap-2 p-3 overflow-x-auto">
                @foreach($product->images as $i => $img)
                <img src="{{ $img }}" alt="" loading="lazy"
                     onclick="document.getElementById('featured-img').src='{{ $img }}'"
                     class="w-16 h-12 object-cover rounded-lg cursor-pointer flex-shrink-0 opacity-70 hover:opacity-100 transition-opacity {{ $i === 0 ? 'ring-2 ring-green-500 opacity-100' : '' }}">
                @endforeach
            </div>
            @endif
        </div>
        @endif

        {{-- Description --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Description</h2>
            @if($product->short_description)
                <p class="text-gray-300 font-medium mb-3">{{ $product->short_description }}</p>
            @endif
            <p class="text-gray-400 text-sm leading-relaxed">{{ $product->description }}</p>
        </div>

        {{-- Features --}}
        @if($product->features && count($product->features) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Key Features</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                @foreach($product->features as $feature)
                <li class="flex items-start gap-2 text-sm text-gray-400">
                    <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Technologies --}}
        @if($product->technologies && count($product->technologies) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Technologies</h2>
            <div class="flex flex-wrap gap-2">
                @foreach($product->technologies as $tech)
                <span class="px-3 py-1.5 bg-green-900/40 text-green-400 border border-green-800/50 rounded-full text-xs font-medium">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- Sidebar --}}
    <div class="space-y-4">

        {{-- Pricing card --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Pricing</h2>
            @if($product->pricing_type === 'contact')
                <p class="text-lg font-bold text-white">Contact for Price</p>
            @else
                @if($product->discount_price)
                    <p class="text-2xl font-bold text-white">KES {{ number_format($product->discount_price, 2) }}</p>
                    <p class="text-sm text-gray-500 line-through mt-0.5">KES {{ number_format($product->price, 2) }}</p>
                    <span class="inline-block mt-1 px-2 py-0.5 text-xs bg-red-900/50 text-red-400 rounded-full">
                        {{ round((1 - $product->discount_price / $product->price) * 100) }}% off
                    </span>
                @else
                    <p class="text-2xl font-bold text-white">KES {{ number_format($product->price, 2) }}</p>
                @endif
            @endif
            @if($product->demo_link)
            <a href="{{ $product->demo_link }}" target="_blank"
               class="mt-4 flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                View Demo
            </a>
            @endif
        </div>

        {{-- Status --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Status</h2>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                    {{ $product->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                    {{ ucfirst($product->status) }}
                </span>
                @if($product->is_featured)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-900/50 text-purple-400">Featured</span>
                @endif
                @if($product->is_active)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-900/50 text-blue-400">Active</span>
                @endif
            </div>
        </div>

        {{-- Details --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Details</h2>
            <dl class="space-y-3 text-sm">
                <div>
                    <dt class="text-xs text-gray-500">Category</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $product->category?->name ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Downloads</dt>
                    <dd class="text-gray-300 mt-0.5 font-medium">{{ number_format($product->downloads) }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">System File</dt>
                    <dd class="mt-0.5">
                        @if($product->file_path)
                            <span class="text-xs text-blue-400">ZIP uploaded</span>
                        @else
                            <span class="text-xs text-gray-600">Not uploaded</span>
                        @endif
                    </dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Documentation</dt>
                    <dd class="mt-0.5">
                        @if($product->documentation_path)
                            <span class="text-xs text-orange-400">PDF uploaded</span>
                        @else
                            <span class="text-xs text-gray-600">Not uploaded</span>
                        @endif
                    </dd>
                </div>
                @if($product->demo_credentials)
                <div>
                    <dt class="text-xs text-gray-500">Demo Credentials</dt>
                    <dd class="text-gray-300 mt-0.5 font-mono text-xs">{{ $product->demo_credentials }}</dd>
                </div>
                @endif
                <div>
                    <dt class="text-xs text-gray-500">Created</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $product->created_at->format('M d, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Last Updated</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $product->updated_at->diffForHumans() }}</dd>
                </div>
            </dl>
        </div>

        {{-- Actions --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 space-y-2">
            <a href="{{ route('store.show', $product) }}" target="_blank"
               class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View in Store
            </a>
            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                  onsubmit="return confirm('Permanently delete this product?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-900/30 hover:bg-red-900/60 text-red-400 text-sm font-medium rounded-lg transition-colors">
                    Delete Product
                </button>
            </form>
        </div>

    </div>
</div>

@endsection
