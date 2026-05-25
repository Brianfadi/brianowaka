@extends('layouts.admin')
@section('page-title', 'Services')
@section('page-subtitle', 'Manage the services you offer')

@section('content')

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <form method="GET" action="{{ route('admin.services.index') }}" class="flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search services..."
               class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 w-48 focus:outline-none focus:border-blue-500">

        <select name="status"
                class="bg-gray-800 border border-gray-700 text-gray-300 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            <option value="">All Status</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft"     {{ request('status') === 'draft'     ? 'selected' : '' }}>Draft</option>
        </select>

        <button type="submit" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm rounded-lg transition-colors">Filter</button>

        @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.services.index') }}"
               class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-400 text-sm rounded-lg transition-colors">Clear</a>
        @endif
    </form>

    <a href="{{ route('admin.services.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Service
    </a>
</div>

{{-- Table --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-5 py-3 text-left">Service</th>
                    <th class="px-5 py-3 text-left">Pricing</th>
                    <th class="px-5 py-3 text-left">Features</th>
                    <th class="px-5 py-3 text-left">Order</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($services as $service)
                <tr class="hover:bg-gray-800/40 transition-colors">

                    {{-- Service --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500 to-violet-600 flex items-center justify-center flex-shrink-0">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-white text-sm"></i>
                                @else
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-white">{{ $service->title }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($service->short_description ?? $service->description, 50) }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- Pricing --}}
                    <td class="px-5 py-4">
                        <p class="text-gray-300 text-xs font-medium">{{ $service->formatted_price }}</p>
                        <p class="text-gray-600 text-xs mt-0.5">{{ ucfirst($service->pricing_type) }}</p>
                    </td>

                    {{-- Features count --}}
                    <td class="px-5 py-4">
                        <span class="text-xs text-gray-400">
                            {{ count($service->features ?? []) }} feature{{ count($service->features ?? []) !== 1 ? 's' : '' }}
                        </span>
                    </td>

                    {{-- Order --}}
                    <td class="px-5 py-4 text-gray-500 text-xs">#{{ $service->order }}</td>

                    {{-- Status --}}
                    <td class="px-5 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full
                                {{ $service->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                                {{ ucfirst($service->status) }}
                            </span>
                            @if($service->is_featured)
                                <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full bg-purple-900/50 text-purple-400">Featured</span>
                            @endif
                            @if(!$service->is_active)
                                <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full bg-red-900/50 text-red-400">Inactive</span>
                            @endif
                        </div>
                    </td>

                    {{-- Actions --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.services.show', $service) }}"
                               class="text-gray-400 hover:text-white transition-colors" title="Preview">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.services.edit', $service) }}"
                               class="text-purple-400 hover:text-purple-300 transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete \'{{ addslashes($service->title) }}\'?')"
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            <p class="text-sm">No services found.</p>
                            <a href="{{ route('admin.services.create') }}" class="text-purple-400 hover:text-purple-300 text-sm">Add your first service →</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
    <div class="px-5 py-4 border-t border-gray-800">
        {{ $services->links() }}
    </div>
    @endif
</div>

@if($services->total())
<p class="text-xs text-gray-600 mt-3">Showing {{ $services->firstItem() }}–{{ $services->lastItem() }} of {{ $services->total() }} services</p>
@endif

@endsection
