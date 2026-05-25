@extends('layouts.admin')
@section('page-title', 'Pricing Tiers')
@section('page-subtitle', 'Manage pricing tiers for the services page')

@section('content')

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div class="text-sm text-gray-400">
        Manage the Investment section on the services page
    </div>

    <a href="{{ route('admin.pricing-tiers.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Pricing Tier
    </a>
</div>

{{-- Table --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-5 py-3 text-left">Tier Name</th>
                    <th class="px-5 py-3 text-left">Price</th>
                    <th class="px-5 py-3 text-left">Description</th>
                    <th class="px-5 py-3 text-left">Order</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($pricingTiers as $tier)
                <tr class="hover:bg-gray-800/40 transition-colors">

                    {{-- Tier Name --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-white">{{ $tier->name }}</p>
                                @if($tier->is_featured)
                                    <span class="inline-flex items-center gap-1 text-xs text-yellow-400 mt-0.5">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        Featured
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>

                    {{-- Price --}}
                    <td class="px-5 py-4">
                        <p class="text-blue-400 font-semibold">{{ $tier->price }}</p>
                    </td>

                    {{-- Description --}}
                    <td class="px-5 py-4">
                        <p class="text-gray-400 text-xs">{{ Str::limit($tier->description, 60) }}</p>
                    </td>

                    {{-- Order --}}
                    <td class="px-5 py-4 text-gray-500 text-xs">#{{ $tier->order }}</td>

                    {{-- Status --}}
                    <td class="px-5 py-4">
                        <span class="inline-flex px-2 py-0.5 text-xs rounded-full
                            {{ $tier->is_active ? 'bg-green-900/50 text-green-400' : 'bg-red-900/50 text-red-400' }}">
                            {{ $tier->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>

                    {{-- Actions --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.pricing-tiers.edit', $tier) }}"
                               class="text-purple-400 hover:text-purple-300 transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.pricing-tiers.destroy', $tier) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete \'{{ addslashes($tier->name) }}\' pricing tier?')"
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
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-sm">No pricing tiers found.</p>
                            <a href="{{ route('admin.pricing-tiers.create') }}" class="text-purple-400 hover:text-purple-300 text-sm">Add your first pricing tier →</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($pricingTiers->count())
<p class="text-xs text-gray-600 mt-3">Total: {{ $pricingTiers->count() }} pricing tier{{ $pricingTiers->count() !== 1 ? 's' : '' }}</p>
@endif

@endsection
