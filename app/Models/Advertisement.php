<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'badge_text',
        'badge_icon',
        'theme_color',
        'original_price',
        'sale_price',
        'price_label',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'features',
        'showcase_items',
        'visual_type',
        'custom_visual_html',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'showcase_items' => 'array',
        'original_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get formatted original price
     */
    public function getFormattedOriginalPriceAttribute()
    {
        return $this->original_price ? '$' . number_format($this->original_price, 0) : null;
    }

    /**
     * Get formatted sale price
     */
    public function getFormattedSalePriceAttribute()
    {
        return $this->sale_price ? '$' . number_format($this->sale_price, 0) : null;
    }

    /**
     * Get savings amount
     */
    public function getSavingsAttribute()
    {
        if ($this->original_price && $this->sale_price) {
            return $this->original_price - $this->sale_price;
        }
        return 0;
    }

    /**
     * Get formatted savings
     */
    public function getFormattedSavingsAttribute()
    {
        return $this->savings > 0 ? '$' . number_format($this->savings, 0) : null;
    }

    /**
     * Get theme configuration
     */
    public function getThemeConfigAttribute()
    {
        $themes = [
            'blue' => [
                'gradient' => 'from-blue-900 via-indigo-900 to-purple-900',
                'border' => 'border-blue-500',
                'badge' => 'from-blue-400 to-indigo-500',
                'text' => 'from-blue-300 via-indigo-300 to-purple-300',
                'button' => 'from-blue-400 via-indigo-500 to-purple-500',
                'animation_speed' => '3s'
            ],
            'emerald' => [
                'gradient' => 'from-emerald-900 via-teal-900 to-cyan-900',
                'border' => 'border-emerald-500',
                'badge' => 'from-emerald-400 to-cyan-500',
                'text' => 'from-emerald-300 via-cyan-300 to-teal-300',
                'button' => 'from-emerald-400 via-cyan-500 to-teal-500',
                'animation_speed' => '4s'
            ],
            'pink' => [
                'gradient' => 'from-pink-900 via-rose-900 to-red-900',
                'border' => 'border-pink-500',
                'badge' => 'from-pink-400 to-rose-500',
                'text' => 'from-pink-300 via-rose-300 to-red-300',
                'button' => 'from-pink-400 via-rose-500 to-red-500',
                'animation_speed' => '3.5s'
            ],
            'indigo' => [
                'gradient' => 'from-indigo-900 via-purple-900 to-violet-900',
                'border' => 'border-indigo-500',
                'badge' => 'from-indigo-400 to-purple-500',
                'text' => 'from-indigo-300 via-purple-300 to-violet-300',
                'button' => 'from-indigo-400 via-purple-500 to-violet-500',
                'animation_speed' => '2.5s'
            ],
        ];

        return $themes[$this->theme_color] ?? $themes['blue'];
    }

    /**
     * Get theme classes for frontend display
     */
    public function getThemeClasses()
    {
        $themes = [
            'blue' => [
                'background' => 'bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900',
                'border' => 'border-blue-500',
                'badge' => 'bg-gradient-to-r from-blue-400 to-indigo-500',
                'title' => 'bg-gradient-to-r from-blue-300 via-indigo-300 to-purple-300 bg-clip-text text-transparent',
                'subtitle' => 'text-blue-200',
                'glow' => 'bg-gradient-to-r from-blue-500 to-indigo-500',
                'visualBorder' => 'border border-blue-500/30',
                'showcaseItem' => 'bg-gradient-to-r from-blue-500 to-indigo-500',
                'mockup' => 'bg-gradient-to-b from-blue-600 to-indigo-700',
                'featureIcon' => 'bg-gradient-to-r from-blue-400 to-indigo-500',
                'price' => 'bg-gradient-to-r from-blue-300 to-indigo-400 bg-clip-text text-transparent',
                'primaryButton' => 'bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500 hover:from-blue-300 hover:via-indigo-400 hover:to-purple-400',
                'secondaryButton' => 'border-blue-400 hover:border-blue-300 text-blue-200 hover:text-white'
            ],
            'emerald' => [
                'background' => 'bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-900',
                'border' => 'border-emerald-500',
                'badge' => 'bg-gradient-to-r from-emerald-400 to-cyan-500',
                'title' => 'bg-gradient-to-r from-emerald-300 via-cyan-300 to-teal-300 bg-clip-text text-transparent',
                'subtitle' => 'text-emerald-200',
                'glow' => 'bg-gradient-to-r from-emerald-500 to-cyan-500',
                'visualBorder' => 'border border-emerald-500/30',
                'showcaseItem' => 'bg-gradient-to-r from-emerald-500 to-cyan-500',
                'mockup' => 'bg-gradient-to-b from-emerald-600 to-teal-700',
                'featureIcon' => 'bg-gradient-to-r from-emerald-400 to-cyan-500',
                'price' => 'bg-gradient-to-r from-emerald-300 to-cyan-400 bg-clip-text text-transparent',
                'primaryButton' => 'bg-gradient-to-r from-emerald-400 via-cyan-500 to-teal-500 hover:from-emerald-300 hover:via-cyan-400 hover:to-teal-400',
                'secondaryButton' => 'border-emerald-400 hover:border-emerald-300 text-emerald-200 hover:text-white'
            ],
            'pink' => [
                'background' => 'bg-gradient-to-br from-pink-900 via-rose-900 to-red-900',
                'border' => 'border-pink-500',
                'badge' => 'bg-gradient-to-r from-pink-400 to-rose-500',
                'title' => 'bg-gradient-to-r from-pink-300 via-rose-300 to-red-300 bg-clip-text text-transparent',
                'subtitle' => 'text-pink-200',
                'glow' => 'bg-gradient-to-r from-pink-500 to-rose-500',
                'visualBorder' => 'border border-pink-500/30',
                'showcaseItem' => 'bg-gradient-to-r from-pink-500 to-rose-500',
                'mockup' => 'bg-gradient-to-b from-pink-600 to-rose-700',
                'featureIcon' => 'bg-gradient-to-r from-pink-400 to-rose-500',
                'price' => 'bg-gradient-to-r from-pink-300 to-rose-400 bg-clip-text text-transparent',
                'primaryButton' => 'bg-gradient-to-r from-pink-400 via-rose-500 to-red-500 hover:from-pink-300 hover:via-rose-400 hover:to-red-400',
                'secondaryButton' => 'border-pink-400 hover:border-pink-300 text-pink-200 hover:text-white'
            ],
            'indigo' => [
                'background' => 'bg-gradient-to-br from-indigo-900 via-purple-900 to-violet-900',
                'border' => 'border-indigo-500',
                'badge' => 'bg-gradient-to-r from-indigo-400 to-purple-500',
                'title' => 'bg-gradient-to-r from-indigo-300 via-purple-300 to-violet-300 bg-clip-text text-transparent',
                'subtitle' => 'text-indigo-200',
                'glow' => 'bg-gradient-to-r from-indigo-500 to-purple-500',
                'visualBorder' => 'border border-indigo-500/30',
                'showcaseItem' => 'bg-gradient-to-r from-indigo-500 to-purple-500',
                'mockup' => 'bg-gradient-to-b from-indigo-600 to-purple-700',
                'featureIcon' => 'bg-gradient-to-r from-indigo-400 to-purple-500',
                'price' => 'bg-gradient-to-r from-indigo-300 to-purple-400 bg-clip-text text-transparent',
                'primaryButton' => 'bg-gradient-to-r from-indigo-400 via-purple-500 to-violet-500 hover:from-indigo-300 hover:via-purple-400 hover:to-violet-400',
                'secondaryButton' => 'border-indigo-400 hover:border-indigo-300 text-indigo-200 hover:text-white'
            ],
        ];

        return $themes[$this->theme_color] ?? $themes['blue'];
    }

    /**
     * Scope for active advertisements
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered advertisements
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }
}
