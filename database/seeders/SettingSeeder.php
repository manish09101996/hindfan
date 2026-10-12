<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Contact & Office Information
            'contact_address' => [
                'value' => 'Near Gaushala, Phul Road, Rampura Phul, Distt. Bathinda, Punjab - 151103',
                'group' => 'contact',
            ],
            'contact_phone_1' => [
                'value' => '+91-92162-07097',
                'group' => 'contact',
            ],
            'contact_phone_1_label' => [
                'value' => 'Vishal Bansal',
                'group' => 'contact',
            ],
            'contact_phone_2' => [
                'value' => '+91-92162-01187',
                'group' => 'contact',
            ],
            'contact_phone_2_label' => [
                'value' => 'Ashok Bansal',
                'group' => 'contact',
            ],
            'contact_email' => [
                'value' => 'info@hindfan.com',
                'group' => 'contact',
            ],
            'working_hours' => [
                'value' => 'Mon - Sat: 08:00 - 19:00',
                'group' => 'contact',
            ],

            // Social Media Profiles
            'social_facebook' => [
                'value' => 'https://facebook.com/hindfan7',
                'group' => 'social',
            ],
            'social_youtube' => [
                'value' => 'https://youtube.com',
                'group' => 'social',
            ],
            'social_instagram' => [
                'value' => 'https://instagram.com',
                'group' => 'social',
            ],
            'social_linkedin' => [
                'value' => 'https://linkedin.com',
                'group' => 'social',
            ],
            'social_twitter' => [
                'value' => 'https://twitter.com/hindfan7',
                'group' => 'social',
            ],
            'social_whatsapp' => [
                'value' => '+919216207097',
                'group' => 'social',
            ],
        ];

        foreach ($settings as $key => $data) {
            Setting::firstOrCreate(
                ['key' => $key],
                [
                    'value' => $data['value'],
                    'group' => $data['group'],
                ]
            );
        }
    }
}
