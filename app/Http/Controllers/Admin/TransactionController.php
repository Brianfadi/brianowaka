<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('order')->latest()->paginate(30);
        
        $stats = [
            'total' => Transaction::count(),
            'completed' => Transaction::completed()->count(),
            'pending' => Transaction::pending()->count(),
            'revenue' => Transaction::completed()->sales()->sum('amount'),
            'refunds' => Transaction::completed()->refunds()->sum('amount'),
        ];
        
        return view('admin.transactions.index', compact('transactions', 'stats'));
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('order.product');
        return view('admin.transactions.show', compact('transaction'));
    }
}
