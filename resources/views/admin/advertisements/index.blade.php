@extends('layouts.admin')

@section('title', 'Advertisement Management')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Advertisement Management</h1>
            <p class="text-gray-400 text-sm mt-1">Manage hero section advertisement cards</p>
        </div>
        <a href="{{ route('admin.advertisements.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Create Advertisement
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Theme</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Pricing</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse($advertisements as $ad)
                        <tr class="hover:bg-gray-700 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-600 text-white text-sm font-medium rounded-full">
                                    {{ $ad->sort_order ?: $loop->iteration }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-lg bg-gradient-to-br {{ $ad->theme_config['gradient'] }} flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">{{ substr($ad->title, 0, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-white">{{ $ad->title }}</div>
                                        @if($ad->subtitle)
                                            <div class="text-sm text-gray-400">{{ $ad->subtitle }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($ad->theme_color === 'blue') bg-blue-100 text-blue-800
                                    @elseif($ad->theme_color === 'emerald') bg-emerald-100 text-emerald-800
                                    @elseif($ad->theme_color === 'pink') bg-pink-100 text-pink-800
                                    @elseif($ad->theme_color === 'indigo') bg-indigo-100 text-indigo-800
                                    @endif">
                                    {{ ucfirst($ad->theme_color) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                @if($ad->sale_price)
                                    <div class="flex flex-col">
                                        <span class="text-green-400 font-semibold">{{ $ad->formatted_sale_price }}</span>
                                        @if($ad->original_price)
                                            <span class="text-gray-500 line-through text-xs">{{ $ad->formatted_original_price }}</span>
                                        @endif
                                    </div>
                                @elseif($ad->original_price)
                                    <span class="text-gray-300">{{ $ad->formatted_original_price }}</span>
                                @else
                                    <span class="text-gray-500">No pricing</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('admin.advertisements.toggle', $ad) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium transition-colors duration-200
                                        {{ $ad->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                        {{ $ad->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.advertisements.show', $ad) }}" 
                                       class="text-blue-400 hover:text-blue-300 transition-colors duration-200" title="View">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.advertisements.edit', $ad) }}" 
                                       class="text-yellow-400 hover:text-yellow-300 transition-colors duration-200" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.advertisements.destroy', $ad) }}" method="POST" class="inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this advertisement?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 transition-colors duration-200" title="Delete">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-300 mb-2">No advertisements found</h3>
                                    <p class="text-gray-400 mb-4">Get started by creating your first advertisement card.</p>
                                    <a href="{{ route('admin.advertisements.create') }}" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200">
                                        Create Advertisement
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($advertisements->hasPages())
            <div class="bg-gray-700 px-6 py-3">
                {{ $advertisements->links() }}
            </div>
        @endif
    </div>

    <div class="mt-6 bg-gray-800 rounded-lg p-6">
        <h3 class="text-lg font-semibold text-white mb-3">Quick Tips</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-300">
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center mt-0.5">
                    <span class="text-white text-xs font-bold">1</span>
                </div>
                <div>
                    <strong class="text-white">Sort Order:</strong> Lower numbers appear first in the rotation. Use 0 for default ordering.
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-6 h-6 bg-emerald-600 rounded-full flex items-center justify-center mt-0.5">
                    <span class="text-white text-xs font-bold">2</span>
                </div>
                <div>
                    <strong class="text-white">Theme Colors:</strong> Each theme has unique gradients and animations for visual variety.
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-6 h-6 bg-pink-600 rounded-full flex items-center justify-center mt-0.5">
                    <span class="text-white text-xs font-bold">3</span>
                </div>
                <div>
                    <strong class="text-white">Active Status:</strong> Only active advertisements will appear in the hero section rotation.
                </div>
            </div>
            <div class="flex items-start gap-3">
                <div class="flex-shrink-0 w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center mt-0.5">
                    <span class="text-white text-xs font-bold">4</span>
                </div>
                <div>
                    <strong class="text-white">Visual Types:</strong> Choose from grid layouts, mobile mockups, icons, or custom HTML.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection