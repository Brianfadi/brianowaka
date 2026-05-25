<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'role',
        'duration',
        'description',
        'start_date',
        'end_date',
        'is_current',
        'location',
        'achievements',
        'order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'achievements' => 'array',
        'order' => 'integer'
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }

    public function getFormattedDurationAttribute()
    {
        if ($this->is_current) {
            return $this->start_date->format('M Y') . ' - Present';
        }
        
        return $this->start_date->format('M Y') . ' - ' . $this->end_date->format('M Y');
    }
}
