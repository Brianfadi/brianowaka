<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->latest()->paginate(20);
        
        $stats = [
            'total' => Order::count(),
            'pending' => Order::pending()->count(),
            'completed' => Order::completed()->count(),
            'revenue' => Order::completed()->sum('total'),
        ];
        
        return view('admin.orders.index', compact('orders', 'stats'));
    }

    public function create()
    {
        $products = Product::active()->get();
        return view('admin.orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string|max:50',
            'payment_status' => 'required|in:unpaid,paid,partially_paid,refunded',
            'status' => 'required|in:pending,processing,completed,cancelled,refunded',
            'notes' => 'nullable|string',
        ]);

        $validated['total'] = $validated['amount'] - ($validated['discount'] ?? 0);
        
        if ($validated['status'] === 'completed' && !isset($validated['completed_at'])) {
            $validated['completed_at'] = now();
        }

        Order::create($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('product', 'transactions');
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = Product::active()->get();
        return view('admin.orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'payment_method' => 'nullable|string|max:50',
            'payment_status' => 'required|in:unpaid,paid,partially_paid,refunded',
            'status' => 'required|in:pending,processing,completed,cancelled,refunded',
            'notes' => 'nullable|string',
        ]);

        $validated['total'] = $validated['amount'] - ($validated['discount'] ?? 0);
        
        if ($validated['status'] === 'completed' && !$order->completed_at) {
            $validated['completed_at'] = now();
        }

        $order->update($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
