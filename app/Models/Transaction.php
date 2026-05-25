<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'order_id',
        'type',
        'amount',
        'status',
        'payment_method',
        'payment_gateway',
        'gateway_transaction_id',
        'description',
        'metadata',
        'completed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'metadata' => 'array',
        'completed_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeSales($query)
    {
        return $query->where('type', 'sale');
    }

    public function scopeRefunds($query)
    {
        return $query->where('type', 'refund');
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'completed' => 'green',
            'pending' => 'yellow',
            'failed' => 'red',
            'cancelled' => 'gray',
            default => 'gray',
        };
    }

    public function getTypeColorAttribute(): string
    {
        return match($this->type) {
            'sale' => 'green',
            'refund' => 'red',
            'payment' => 'blue',
            'withdrawal' => 'orange',
            'deposit' => 'purple',
            default => 'gray',
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            if (empty($transaction->transaction_id)) {
                $transaction->transaction_id = 'TXN-' . strtoupper(uniqid());
            }
        });
    }
}
