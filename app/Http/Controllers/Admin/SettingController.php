<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display settings management page.
     */
    public function index()
    {
        $settings = Setting::allKeyValue();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'contact_address' => 'nullable|string|max:500',
            'contact_phone_1' => 'nullable|string|max:100',
            'contact_phone_1_label' => 'nullable|string|max:100',
            'contact_phone_2' => 'nullable|string|max:100',
            'contact_phone_2_label' => 'nullable|string|max:100',
            'contact_email' => 'nullable|email|max:150',
            'working_hours' => 'nullable|string|max:200',
            'google_maps_link' => 'nullable|url|max:500',
            'google_maps_embed_url' => 'nullable|url|max:1000',

            'social_facebook' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_whatsapp' => 'nullable|string|max:100',
        ]);

        $fields = [
            'contact' => [
                'contact_address',
                'contact_phone_1',
                'contact_phone_1_label',
                'contact_phone_2',
                'contact_phone_2_label',
                'contact_email',
                'working_hours',
                'google_maps_link',
                'google_maps_embed_url',
            ],
            'social' => [
                'social_facebook',
                'social_youtube',
                'social_instagram',
                'social_linkedin',
                'social_twitter',
                'social_whatsapp',
            ],
        ];

        foreach ($fields as $group => $keys) {
            foreach ($keys as $key) {
                $value = $request->input($key);
                Setting::set($key, $value, $group);
            }
        }

        Setting::clearCache();

        return redirect()->route('admin.settings.index')->with('success', 'Website settings have been saved successfully! Any fields left empty will not be shown on the website.');
    }
}
