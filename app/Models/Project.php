<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'features',
        'tech_stack',
        'price',
        'category_id',
        'images',
        'is_featured',
        'is_for_sale',
        'demo_link',
        'github_link',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'tech_stack' => 'array',
        'images' => 'array',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_for_sale' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute()
    {
        return $this->price ? 'KES ' . number_format($this->price, 2) : 'Contact for pricing';
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function getIsPublishedAttribute(): bool
    {
        return $this->status === 'published';
    }

    public function scopeForSale($query)
    {
        return $query->where('is_for_sale', true);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
