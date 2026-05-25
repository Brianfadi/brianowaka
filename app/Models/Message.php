<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'subject',
        'status',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'status' => 'string'
    ];

    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    public function markAsRead()
    {
        $this->update(['status' => 'read']);
    }

    public function markAsReplied()
    {
        $this->update(['status' => 'replied']);
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'unread' => 'danger',
            'read' => 'warning',
            'replied' => 'success',
            default => 'secondary'
        };
    }
}
