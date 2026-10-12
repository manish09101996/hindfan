<?php

use App\Models\Setting;

if (!function_exists('site_setting')) {
    /**
     * Get a site setting by key.
     * Automatically returns null (or $default) if empty or blank.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function site_setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}
