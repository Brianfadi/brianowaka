<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'short_description', 'description',
        'category_id', 'price', 'discount_price', 'pricing_type',
        'demo_link', 'demo_credentials',
        'file_path', 'documentation_path',
        'features', 'technologies', 'images',
        'is_active', 'is_featured', 'status', 'downloads',
    ];

    protected $casts = [
        'features'      => 'array',
        'technologies'  => 'array',
        'images'        => 'array',
        'price'         => 'decimal:2',
        'discount_price'=> 'decimal:2',
        'is_active'     => 'boolean',
        'is_featured'   => 'boolean',
        'downloads'     => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->pricing_type === 'contact') return 'Contact for Price';
        if ($this->discount_price) {
            return 'KES ' . number_format($this->discount_price, 2)
                 . ' <s class="text-gray-500 text-xs">KES ' . number_format($this->price, 2) . '</s>';
        }
        return $this->price ? 'KES ' . number_format($this->price, 2) : 'Free';
    }

    public function scopeActive($query)    { return $query->where('is_active', true); }
    public function scopeFeatured($query)  { return $query->where('is_featured', true); }
    public function scopePublished($query) { return $query->where('status', 'published'); }

    public function incrementDownloads()
    {
        $this->increment('downloads');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
