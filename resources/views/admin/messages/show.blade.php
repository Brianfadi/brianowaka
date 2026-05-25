@extends('layouts.admin')
@section('page-title', 'Message')
@section('page-subtitle', 'From ' . $message->name)

@section('content')

{{-- Flash --}}
@if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="max-w-2xl">

    {{-- Back --}}
    <a href="{{ route('admin.messages.index') }}"
       class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-white mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Messages
    </a>

    {{-- Card --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-gray-800 flex items-start justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center text-white text-lg font-bold flex-shrink-0">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-white font-semibold text-lg">{{ $message->name }}</h2>
                    <div class="flex flex-wrap items-center gap-3 mt-1">
                        <a href="mailto:{{ $message->email }}" class="text-blue-400 hover:text-blue-300 text-sm transition-colors">
                            {{ $message->email }}
                        </a>
                        @if($message->phone)
                            <span class="text-gray-600">·</span>
                            <a href="tel:{{ $message->phone }}" class="text-gray-400 hover:text-white text-sm transition-colors">
                                {{ $message->phone }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Status badge --}}
            @php
                $badgeClass = match($message->status) {
                    'unread'  => 'bg-red-900/60 text-red-400 border border-red-800/50',
                    'read'    => 'bg-yellow-900/60 text-yellow-400 border border-yellow-800/50',
                    'replied' => 'bg-green-900/60 text-green-400 border border-green-800/50',
                    default   => 'bg-gray-800 text-gray-400',
                };
            @endphp
            <span class="px-3 py-1 text-xs rounded-full {{ $badgeClass }} flex-shrink-0">{{ ucfirst($message->status) }}</span>
        </div>

        {{-- Meta --}}
        @if($message->subject)
        <div class="px-6 py-3 border-b border-gray-800 bg-gray-800/30">
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-0.5">Subject</p>
            <p class="text-sm text-gray-200 font-medium">{{ $message->subject }}</p>
        </div>
        @endif

        {{-- Message body --}}
        <div class="px-6 py-5">
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-3">Message</p>
            <div class="text-gray-300 text-sm leading-relaxed whitespace-pre-wrap bg-gray-800/40 rounded-lg px-4 py-4 border border-gray-700/50">{{ $message->message }}</div>
        </div>

        {{-- Footer meta --}}
        <div class="px-6 py-4 border-t border-gray-800 bg-gray-800/20 flex flex-wrap gap-x-6 gap-y-2">
            <div>
                <p class="text-xs text-gray-600">Received</p>
                <p class="text-xs text-gray-400">{{ $message->created_at->format('M j, Y \a\t g:i A') }}</p>
            </div>
            @if($message->ip_address)
            <div>
                <p class="text-xs text-gray-600">IP Address</p>
                <p class="text-xs text-gray-400">{{ $message->ip_address }}</p>
            </div>
            @endif
        </div>
    </div>

    {{-- Actions --}}
    <div class="flex flex-wrap items-center gap-3 mt-5">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? 'Your message' }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
            </svg>
            Reply via Email
        </a>

        @if($message->status !== 'replied')
        <form action="{{ route('admin.messages.mark-replied', $message) }}" method="POST">
            @csrf @method('PATCH')
            <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-green-700 hover:bg-green-600 text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Mark as Replied
            </button>
        </form>
        @endif

        @if($message->status === 'unread')
        <form action="{{ route('admin.messages.mark-read', $message) }}" method="POST">
            @csrf @method('PATCH')
            <button type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/>
                </svg>
                Mark as Read
            </button>
        </form>
        @endif

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="ml-auto">
            @csrf @method('DELETE')
            <button type="submit" onclick="return confirm('Delete this message permanently?')"
                    class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-900/40 hover:bg-red-900/70 text-red-400 hover:text-red-300 text-sm font-medium rounded-lg border border-red-800/50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Delete
            </button>
        </form>
    </div>

</div>

@endsection
