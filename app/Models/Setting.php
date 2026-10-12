<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * Cache array for current request lifecycle.
     */
    protected static array $runtimeCache = [];

    /**
     * Retrieve setting value.
     * Returns $default if setting does not exist, is null, or is empty string/spaces.
     */
    public static function get(string $key, $default = null)
    {
        if (array_key_exists($key, static::$runtimeCache)) {
            $val = static::$runtimeCache[$key];
            return ($val !== null && trim((string)$val) !== '') ? $val : $default;
        }

        try {
            $record = static::where('key', $key)->first();
            $val = $record ? $record->value : null;
            static::$runtimeCache[$key] = $val;

            return ($val !== null && trim((string)$val) !== '') ? $val : $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }

    /**
     * Set or update setting value.
     */
    public static function set(string $key, ?string $value, string $group = 'general'): self
    {
        $trimmed = ($value !== null) ? trim($value) : null;
        if ($trimmed === '') {
            $trimmed = null;
        }

        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $trimmed,
                'group' => $group,
            ]
        );

        static::$runtimeCache[$key] = $trimmed;

        return $setting;
    }

    /**
     * Return all settings as key => value array.
     */
    public static function allKeyValue(): array
    {
        try {
            return static::pluck('value', 'key')->map(function ($val) {
                return ($val !== null && trim((string)$val) !== '') ? $val : null;
            })->toArray();
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Clear runtime cache.
     */
    public static function clearCache(): void
    {
        static::$runtimeCache = [];
    }
}
