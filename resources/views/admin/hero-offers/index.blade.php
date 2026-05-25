@extends('layouts.admin')
@section('page-title', 'Hero Offers')
@section('page-subtitle', 'Manage the Premium Web Solutions card on the homepage hero section')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div class="text-sm text-gray-400">
        Controls the "Premium Web Solutions" card displayed in the homepage hero section
    </div>
    <a href="{{ route('admin.hero-offers.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Hero Offer
    </a>
</div>

@if(session('success'))
<div class="mb-4 px-4 py-3 bg-green-900/40 border border-green-500/30 text-green-400 rounded-lg text-sm">
    {{ session('success') }}
</div>
@endif

<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-5 py-3 text-left">Offer</th>
                    <th class="px-5 py-3 text-left">Pricing</th>
                    <th class="px-5 py-3 text-left">Features</th>
                    <th class="px-5 py-3 text-left">Order</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($heroOffers as $offer)
                <tr class="hover:bg-gray-800/40 transition-colors">

                    {{-- Offer --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center flex-shrink-0 text-lg">
                                🔥
                            </div>
                            <div>
                                <p class="font-medium text-white">{{ $offer->title }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($offer->subtitle, 50) }}</p>
                                <span class="inline-flex items-center gap-1 text-xs text-yellow-400 mt-0.5">
                                    <span class="w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
                                    {{ $offer->badge_text }}
                                </span>
                            </div>
                        </div>
                    </td>

                    {{-- Pricing --}}
                    <td class="px-5 py-4">
                        @if($offer->regular_price)
                        <p class="text-gray-500 text-xs line-through">{{ $offer->regular_price }}</p>
                        @endif
                        <p class="text-yellow-400 font-bold">{{ $offer->offer_price }}</p>
                        @if($offer->savings_text)
                        <p class="text-gray-500 text-xs mt-0.5">{{ Str::limit($offer->savings_text, 30) }}</p>
                        @endif
                    </td>

                    {{-- Features count --}}
                    <td class="px-5 py-4">
                        <span class="text-xs text-gray-400">
                            {{ count($offer->features ?? []) }} feature{{ count($offer->features ?? []) !== 1 ? 's' : '' }}
                        </span>
                        <br>
                        <span class="text-xs text-gray-500">
                            {{ count($offer->benefits ?? []) }} benefit{{ count($offer->benefits ?? []) !== 1 ? 's' : '' }}
                        </span>
                    </td>

                    {{-- Order --}}
                    <td class="px-5 py-4 text-gray-500 text-xs">#{{ $offer->order }}</td>

                    {{-- Status --}}
                    <td class="px-5 py-4">
                        <span class="inline-flex px-2 py-0.5 text-xs rounded-full
                            {{ $offer->is_active ? 'bg-green-900/50 text-green-400' : 'bg-red-900/50 text-red-400' }}">
                            {{ $offer->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.hero-offers.edit', $offer) }}"
                               class="text-purple-400 hover:text-purple-300 transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.hero-offers.destroy', $offer) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete \'{{ addslashes($offer->title) }}\'?')"
                                        class="text-red-500 hover:text-red-400 transition-colors" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-gray-600">
                            <span class="text-4xl">🔥</span>
                            <p class="text-sm">No hero offers found.</p>
                            <a href="{{ route('admin.hero-offers.create') }}" class="text-purple-400 hover:text-purple-300 text-sm">Add your first hero offer →</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($heroOffers->count())
<p class="text-xs text-gray-600 mt-3">Total: {{ $heroOffers->count() }} hero offer{{ $heroOffers->count() !== 1 ? 's' : '' }} — only the first active one is shown on the homepage</p>
@endif

@endsection
