<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'institution',
        'degree',
        'field_of_study',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'achievements',
        'grade',
        'logo',
        'is_active',
        'order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'is_active' => 'boolean',
        'achievements' => 'array',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('start_date', 'desc');
    }

    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }

    public function getDurationAttribute(): string
    {
        if (!$this->start_date) {
            return 'N/A';
        }
        
        $start = $this->start_date->format('M Y');
        $end = $this->is_current ? 'Present' : ($this->end_date ? $this->end_date->format('M Y') : 'N/A');
        
        return "{$start} - {$end}";
    }

    public function getYearsAttribute(): string
    {
        if (!$this->start_date) {
            return 'N/A';
        }
        
        $start = $this->start_date;
        $end = $this->is_current ? Carbon::now() : $this->end_date;
        
        if (!$end) {
            return 'N/A';
        }
        
        $years = $start->diffInYears($end);
        $months = $start->copy()->addYears($years)->diffInMonths($end);
        
        if ($years > 0 && $months > 0) {
            return "{$years} year" . ($years > 1 ? 's' : '') . ", {$months} month" . ($months > 1 ? 's' : '');
        } elseif ($years > 0) {
            return "{$years} year" . ($years > 1 ? 's' : '');
        } else {
            return "{$months} month" . ($months > 1 ? 's' : '');
        }
    }
}
