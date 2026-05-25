@extends('layouts.admin')
@section('page-title', 'Messages')
@section('page-subtitle', 'Contact form submissions from your visitors')

@section('content')

{{-- Stats --}}
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
    @php
        $tabs = [
            ['label' => 'All',     'value' => $counts['all'],     'status' => '',        'color' => 'from-gray-500 to-gray-600'],
            ['label' => 'Unread',  'value' => $counts['unread'],  'status' => 'unread',  'color' => 'from-red-500 to-rose-600'],
            ['label' => 'Read',    'value' => $counts['read'],    'status' => 'read',    'color' => 'from-yellow-500 to-orange-500'],
            ['label' => 'Replied', 'value' => $counts['replied'], 'status' => 'replied', 'color' => 'from-green-500 to-emerald-600'],
        ];
    @endphp
    @foreach($tabs as $tab)
    <a href="{{ route('admin.messages.index', array_merge(request()->except('status','page'), $tab['status'] ? ['status' => $tab['status']] : [])) }}"
       class="bg-gray-900 border rounded-xl p-4 flex items-center gap-3 transition-all hover:border-gray-600
              {{ request('status') === $tab['status'] || (request('status') === null && $tab['status'] === '') ? 'border-gray-500 ring-1 ring-gray-500' : 'border-gray-800' }}">
        <div class="w-10 h-10 rounded-lg bg-gradient-to-br {{ $tab['color'] }} flex items-center justify-center flex-shrink-0">
            <span class="text-white font-bold text-sm">{{ $tab['value'] }}</span>
        </div>
        <span class="text-sm font-medium text-gray-300">{{ $tab['label'] }}</span>
    </a>
    @endforeach
</div>

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
    <form method="GET" action="{{ route('admin.messages.index') }}" class="flex flex-wrap gap-2">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search name, email, subject..."
               class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 w-56 focus:outline-none focus:border-blue-500">
        <button type="submit"
                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm rounded-lg transition-colors">Search</button>
        @if(request()->hasAny(['search','status']))
            <a href="{{ route('admin.messages.index') }}"
               class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-400 text-sm rounded-lg transition-colors">Clear</a>
        @endif
    </form>
    <p class="text-xs text-gray-600 flex-shrink-0">
        {{ $messages->total() }} message{{ $messages->total() !== 1 ? 's' : '' }}
    </p>
</div>

{{-- Flash --}}
@if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg">
        {{ session('success') }}
    </div>
@endif

{{-- Messages List --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    @forelse($messages as $message)
    <div class="flex items-start gap-4 px-5 py-4 border-b border-gray-800 last:border-0 hover:bg-gray-800/30 transition-colors
                {{ $message->status === 'unread' ? 'bg-gray-800/20' : '' }}">

        {{-- Avatar --}}
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center text-white text-sm font-bold flex-shrink-0 mt-0.5">
            {{ strtoupper(substr($message->name, 0, 1)) }}
        </div>

        {{-- Content --}}
        <div class="flex-1 min-w-0">
            <div class="flex flex-wrap items-center gap-2 mb-1">
                <span class="font-semibold text-white text-sm {{ $message->status === 'unread' ? 'font-bold' : '' }}">
                    {{ $message->name }}
                </span>
                @if($message->subject)
                    <span class="text-gray-400 text-sm">— {{ $message->subject }}</span>
                @endif
                {{-- Status badge --}}
                @php
                    $badgeClass = match($message->status) {
                        'unread'  => 'bg-red-900/60 text-red-400 border border-red-800/50',
                        'read'    => 'bg-yellow-900/60 text-yellow-400 border border-yellow-800/50',
                        'replied' => 'bg-green-900/60 text-green-400 border border-green-800/50',
                        default   => 'bg-gray-800 text-gray-400',
                    };
                @endphp
                <span class="px-2 py-0.5 text-xs rounded-full {{ $badgeClass }}">{{ ucfirst($message->status) }}</span>
                @if($message->status === 'unread')
                    <span class="w-2 h-2 rounded-full bg-red-500 flex-shrink-0"></span>
                @endif
            </div>
            <p class="text-xs text-gray-500 mb-1">
                {{ $message->email }}
                @if($message->phone) · {{ $message->phone }} @endif
            </p>
            <p class="text-sm text-gray-400 line-clamp-2">{{ $message->message }}</p>
        </div>

        {{-- Right side --}}
        <div class="flex flex-col items-end gap-2 flex-shrink-0">
            <span class="text-xs text-gray-600">{{ $message->created_at->diffForHumans() }}</span>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.messages.show', $message) }}"
                   class="inline-flex items-center gap-1 px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white text-xs rounded-lg transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    View
                </a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this message?')"
                            class="p-1.5 text-gray-600 hover:text-red-400 transition-colors rounded-lg hover:bg-red-900/20" title="Delete">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="px-5 py-16 text-center">
        <div class="flex flex-col items-center gap-3 text-gray-600">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <p class="text-sm">No messages found.</p>
            @if(request()->hasAny(['search','status']))
                <a href="{{ route('admin.messages.index') }}" class="text-blue-400 hover:text-blue-300 text-sm">Clear filters →</a>
            @endif
        </div>
    </div>
    @endforelse
</div>

{{-- Pagination --}}
@if($messages->hasPages())
<div class="mt-4">
    {{ $messages->links() }}
</div>
@endif

@endsection
