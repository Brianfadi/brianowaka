@extends('layouts.admin')

@section('page-title', 'Transactions')
@section('page-subtitle', 'View all financial transactions')

@section('content')

{{-- Stats Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4 mb-6">
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stats['total'] }}</p>
                <p class="text-xs text-gray-400">Total Transactions</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stats['completed'] }}</p>
                <p class="text-xs text-gray-400">Completed</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">{{ $stats['pending'] }}</p>
                <p class="text-xs text-gray-400">Pending</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                </svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">KES {{ number_format($stats['revenue'], 0) }}</p>
                <p class="text-xs text-gray-400">Total Revenue</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-rose-600 flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"/>
                </svg>
            </div>
            <div>
                <p class="text-2xl font-bold text-white">KES {{ number_format($stats['refunds'], 0) }}</p>
                <p class="text-xs text-gray-400">Total Refunds</p>
            </div>
        </div>
    </div>
</div>

{{-- Actions Bar --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl p-4 mb-6 flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-3">
        <h2 class="text-sm font-semibold text-white">All Transactions</h2>
        <span class="text-xs text-gray-500">{{ $transactions->total() }} total</span>
    </div>
</div>

{{-- Transactions Table --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-800/50 border-b border-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Transaction ID</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Method</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($transactions as $transaction)
                <tr class="hover:bg-gray-800/30 transition-colors">
                    <td class="px-6 py-4">
                        <span class="text-sm font-mono text-blue-400">{{ $transaction->transaction_id }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($transaction->order)
                        <a href="{{ route('admin.orders.show', $transaction->order) }}" class="text-sm text-emerald-400 hover:text-emerald-300 font-mono">
                            {{ $transaction->order->order_number }}
                        </a>
                        @else
                        <span class="text-sm text-gray-500">N/A</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 bg-{{ $transaction->type_color }}-900/60 text-{{ $transaction->type_color }}-400 text-xs font-semibold rounded-full capitalize">
                            {{ $transaction->type }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm font-semibold {{ $transaction->type === 'refund' ? 'text-red-400' : 'text-emerald-400' }}">
                            {{ $transaction->type === 'refund' ? '-' : '+' }}KES {{ number_format($transaction->amount, 0) }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 bg-{{ $transaction->status_color }}-900/60 text-{{ $transaction->status_color }}-400 text-xs font-semibold rounded-full capitalize">
                            {{ $transaction->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-300">{{ $transaction->payment_method ?? 'N/A' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm text-gray-400">{{ $transaction->created_at->format('M j, Y g:i A') }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.transactions.show', $transaction) }}" class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors">
                            View Details
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 rounded-full bg-gray-800 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-400 font-medium">No transactions yet</p>
                                <p class="text-gray-600 text-sm mt-1">Transactions will appear here when orders are processed</p>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($transactions->hasPages())
    <div class="px-6 py-4 border-t border-gray-800">
        {{ $transactions->links() }}
    </div>
    @endif
</div>

@endsection
