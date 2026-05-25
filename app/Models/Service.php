<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'short_description', 'description',
        'price', 'starting_price', 'pricing_type',
        'features', 'icon', 'image',
        'is_active', 'is_featured', 'status', 'order',
    ];

    protected $casts = [
        'features'    => 'array',
        'price'       => 'decimal:2',
        'is_active'   => 'boolean',
        'is_featured' => 'boolean',
        'order'       => 'integer',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return match($this->pricing_type) {
            'custom'  => 'Custom Pricing',
            'contact' => 'Contact for Price',
            'from'    => $this->starting_price ?? 'Starting from —',
            'hourly'  => $this->price ? 'KES ' . number_format($this->price, 2) . '/hr' : 'Hourly',
            default   => $this->price ? 'KES ' . number_format($this->price, 2) : '—',
        };
    }

    public function scopeActive($query)    { return $query->where('is_active', true); }
    public function scopeFeatured($query)  { return $query->where('is_featured', true); }
    public function scopePublished($query) { return $query->where('status', 'published'); }
    public function scopeOrdered($query)   { return $query->orderBy('order'); }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($s) {
            if (empty($s->slug)) $s->slug = Str::slug($s->title);
        });
        static::updating(function ($s) {
            if ($s->isDirty('title')) $s->slug = Str::slug($s->title);
        });
    }
}
