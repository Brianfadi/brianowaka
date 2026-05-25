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
     * Load all settings into cache as a plain array keyed by setting key.
     * Using arrays avoids any class deserialization issues across deploys.
     */
    protected static function allCached(): array
    {
        $data = Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return static::all()->mapWithKeys(function ($setting) {
                return [$setting->key => [
                    'value' => $setting->value,
                    'type'  => $setting->type,
                ]];
            })->all(); // plain PHP array, no Eloquent/Collection serialization
        });

        // If cache returned something that isn't an array (stale serialized object), bust it
        if (!is_array($data)) {
            Cache::forget(self::CACHE_KEY);
            return static::all()->mapWithKeys(function ($setting) {
                return [$setting->key => [
                    'value' => $setting->value,
                    'type'  => $setting->type,
                ]];
            })->all();
        }

        return $data;
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
        $data = static::allCached();
        
        if (!isset($data[$key])) {
            return $default;
        }

        $value = $data[$key]['value'];
        $type  = $data[$key]['type'] ?? 'text';

        return match($type) {
            'json'    => json_decode($value, true),
            'boolean' => filter_var($value, FILTER_VALIDATE_BOOLEAN),
            'integer' => (int) $value,
            'float'   => (float) $value,
            default   => $value,
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
