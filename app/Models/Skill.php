<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'percentage',
        'category',
        'icon',
        'is_active',
        'order'
    ];

    protected $casts = [
        'percentage' => 'integer',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getLevelColorAttribute()
    {
        return match($this->level) {
            'beginner' => 'warning',
            'intermediate' => 'info',
            'advanced' => 'primary',
            'expert' => 'success',
            default => 'secondary'
        };
    }
}
