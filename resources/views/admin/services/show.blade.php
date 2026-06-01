@extends('layouts.admin')
@section('page-title', $service->title)
@section('page-subtitle', 'Service Preview')

@section('content')

<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Services</a>
    <a href="{{ route('admin.services.edit', $service) }}"
       class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
        </svg>
        Edit Service
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Main --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- Banner --}}
        @if($service->image)
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
            <div class="h-48 bg-gray-800">
                <img src="{{ $service->image }}" alt="{{ $service->title }}" class="w-full h-full object-cover" loading="lazy">
            </div>
        </div>
        @endif

        {{-- Header card --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center flex-shrink-0">
                    @if($service->icon)
                        <i class="{{ $service->icon }} text-white text-xl"></i>
                    @else
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    @endif
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">{{ $service->title }}</h1>
                    @if($service->short_description)
                        <p class="text-gray-400 mt-1">{{ $service->short_description }}</p>
                    @endif
                    <p class="text-2xl font-bold text-purple-400 mt-2">{{ $service->formatted_price }}</p>
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Description</h2>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $service->description }}</p>
        </div>

        {{-- Features --}}
        @if($service->features && count($service->features) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">What's Included</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                @foreach($service->features as $feature)
                <li class="flex items-start gap-2 text-sm text-gray-400">
                    <svg class="w-4 h-4 text-purple-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- CTA preview --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Call to Action (Frontend)</h2>
            <div class="flex gap-3">
                <a href="{{ route('contact') }}" target="_blank"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Request This Service
                </a>
                <a href="{{ route('contact') }}" target="_blank"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                    Get a Quote
                </a>
            </div>
            <p class="text-xs text-gray-600 mt-2">These buttons link to your contact page on the frontend.</p>
        </div>

    </div>

    {{-- Sidebar --}}
    <div class="space-y-4">

        {{-- Status --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Status</h2>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                    {{ $service->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                    {{ ucfirst($service->status) }}
                </span>
                @if($service->is_featured)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-900/50 text-purple-400">Featured</span>
                @endif
                @if($service->is_active)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-900/50 text-blue-400">Active</span>
                @else
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-900/50 text-red-400">Inactive</span>
                @endif
            </div>
        </div>

        {{-- Details --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Details</h2>
            <dl class="space-y-3 text-sm">
                <div>
                    <dt class="text-xs text-gray-500">Pricing Type</dt>
                    <dd class="text-gray-300 mt-0.5">{{ ucfirst($service->pricing_type) }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Price</dt>
                    <dd class="text-gray-300 mt-0.5 font-medium">{{ $service->formatted_price }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Display Order</dt>
                    <dd class="text-gray-300 mt-0.5">#{{ $service->order }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Features</dt>
                    <dd class="text-gray-300 mt-0.5">{{ count($service->features ?? []) }} items</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Slug</dt>
                    <dd class="text-gray-500 mt-0.5 font-mono text-xs">{{ $service->slug }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Created</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $service->created_at->format('M d, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Last Updated</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $service->updated_at->diffForHumans() }}</dd>
                </div>
            </dl>
        </div>

        {{-- Actions --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 space-y-2">
            <a href="{{ route('services') }}" target="_blank"
               class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Services Page
            </a>
            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                  onsubmit="return confirm('Permanently delete this service?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-900/30 hover:bg-red-900/60 text-red-400 text-sm font-medium rounded-lg transition-colors">
                    Delete Service
                </button>
            </form>
        </div>

    </div>
</div>

@endsection
