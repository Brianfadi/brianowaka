@extends('layouts.admin')
@section('page-title', 'Products')
@section('page-subtitle', 'Manage your systems and products for sale')

@section('content')

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search products..."
               class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 w-48 focus:outline-none focus:border-blue-500">

        <select name="category"
                class="bg-gray-800 border border-gray-700 text-gray-300 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>

        <select name="status"
                class="bg-gray-800 border border-gray-700 text-gray-300 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            <option value="">All Status</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft"     {{ request('status') === 'draft'     ? 'selected' : '' }}>Draft</option>
        </select>

        <button type="submit" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm rounded-lg transition-colors">Filter</button>

        @if(request()->hasAny(['search','category','status']))
            <a href="{{ route('admin.products.index') }}"
               class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-400 text-sm rounded-lg transition-colors">Clear</a>
        @endif
    </form>

    <a href="{{ route('admin.products.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Product
    </a>
</div>

{{-- Table --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-5 py-3 text-left">Product</th>
                    <th class="px-5 py-3 text-left">Category</th>
                    <th class="px-5 py-3 text-left">Price</th>
                    <th class="px-5 py-3 text-left">Files</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-left">Downloads</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($products as $product)
                <tr class="hover:bg-gray-800/40 transition-colors">

                    {{-- Product --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($product->images && count($product->images) > 0)
                                <img src="{{ $product->images[0] }}" alt="{{ $product->name }}"
                                     class="w-10 h-10 rounded-lg object-cover flex-shrink-0 bg-gray-800">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                    {{ strtoupper(substr($product->name, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-white">{{ $product->name }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($product->short_description ?? $product->description, 45) }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- Category --}}
                    <td class="px-5 py-4">
                        @if($product->category)
                            <span class="px-2 py-1 text-xs rounded-full bg-green-900/50 text-green-400">{{ $product->category->name }}</span>
                        @else
                            <span class="text-gray-600 text-xs">—</span>
                        @endif
                    </td>

                    {{-- Price --}}
                    <td class="px-5 py-4">
                        @if($product->pricing_type === 'contact')
                            <span class="text-xs text-gray-400">Contact</span>
                        @else
                            <div>
                                <p class="text-white text-xs font-medium">
                                    KES {{ number_format($product->discount_price ?? $product->price, 2) }}
                                </p>
                                @if($product->discount_price)
                                    <p class="text-gray-600 text-xs line-through">KES {{ number_format($product->price, 2) }}</p>
                                @endif
                            </div>
                        @endif
                    </td>

                    {{-- Files --}}
                    <td class="px-5 py-4">
                        <div class="flex gap-1.5">
                            @if($product->file_path)
                                <span class="px-1.5 py-0.5 text-xs rounded bg-blue-900/50 text-blue-400" title="System ZIP">ZIP</span>
                            @endif
                            @if($product->documentation_path)
                                <span class="px-1.5 py-0.5 text-xs rounded bg-orange-900/50 text-orange-400" title="Documentation">PDF</span>
                            @endif
                            @if(!$product->file_path && !$product->documentation_path)
                                <span class="text-gray-600 text-xs">—</span>
                            @endif
                        </div>
                    </td>

                    {{-- Status --}}
                    <td class="px-5 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full
                                {{ $product->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                            @if($product->is_featured)
                                <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full bg-purple-900/50 text-purple-400">Featured</span>
                            @endif
                        </div>
                    </td>

                    {{-- Downloads --}}
                    <td class="px-5 py-4 text-gray-400 text-xs">{{ number_format($product->downloads) }}</td>

                    {{-- Actions --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.products.show', $product) }}"
                               class="text-gray-400 hover:text-white transition-colors" title="Preview">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="text-blue-400 hover:text-blue-300 transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete \'{{ addslashes($product->name) }}\'?')"
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
                    <td colspan="7" class="px-5 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-gray-600">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <p class="text-sm">No products found.</p>
                            <a href="{{ route('admin.products.create') }}" class="text-green-400 hover:text-green-300 text-sm">Add your first product →</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
    <div class="px-5 py-4 border-t border-gray-800">
        {{ $products->links() }}
    </div>
    @endif
</div>

@if($products->total())
<p class="text-xs text-gray-600 mt-3">Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} products</p>
@endif

@endsection
