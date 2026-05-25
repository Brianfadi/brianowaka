<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroOffer extends Model
{
    protected $fillable = [
        'badge_text',
        'title',
        'subtitle',
        'features',
        'benefits',
        'regular_price',
        'offer_price',
        'savings_text',
        'cta_text',
        'cta_link',
        'secondary_cta_text',
        'secondary_cta_link',
        'is_active',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'benefits' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get only active offers
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
