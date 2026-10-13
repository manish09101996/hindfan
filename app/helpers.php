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

if (!function_exists('whatsapp_url')) {
    /**
     * Generate an official WhatsApp click-to-chat URL using verified company settings.
     *
     * @param string|null $message
     * @return string
     */
    function whatsapp_url(?string $message = null): string
    {
        $rawNumber = site_setting('social_whatsapp', '+919216207097');
        $cleanNumber = preg_replace('/[^0-9]/', '', (string)$rawNumber);

        // Prepend India country code 91 if 10-digit format
        if (strlen($cleanNumber) === 10) {
            $cleanNumber = '91' . $cleanNumber;
        }

        $defaultMessage = 'Hello Hindson Industries, I would like to enquire about your products.';
        $text = $message ?: $defaultMessage;

        return 'https://wa.me/' . $cleanNumber . '?text=' . rawurlencode($text);
    }
}

