<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    const CACHE_KEY = 'app_settings_all';
    const CACHE_TTL = 3600; // 1 hour

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description'
    ];

    protected $casts = [
        'value' => 'string'
    ];

    /**
     * Load all settings into cache as a keyed array (plain data, not Eloquent objects).
     */
    protected static function allCached(): \Illuminate\Support\Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return static::all()->keyBy('key')->map(function ($setting) {
                return (object) $setting->toArray();
            });
        });
    }

    /**
     * Flush the settings cache (call after any set/update).
     */
    public static function flushCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    public static function get(string $key, $default = null)
    {
        $setting = static::allCached()->get($key);

        if (!$setting) {
            return $default;
        }

        return match($setting->type) {
            'json' => json_decode($setting->value, true),
            'boolean' => filter_var($setting->value, FILTER_VALIDATE_BOOLEAN),
            'integer' => (int) $setting->value,
            'float' => (float) $setting->value,
            default => $setting->value
        };
    }

    public static function set(string $key, $value, string $type = 'text', string $group = 'general')
    {
        $result = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value) : $value,
                'type' => $type,
                'group' => $group
            ]
        );

        static::flushCache();

        return $result;
    }

    public function scopeByGroup($query, string $group)
    {
        return $query->where('group', $group);
    }
}
