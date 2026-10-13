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
            'google_maps_link' => [
                'value' => 'https://www.google.com/maps?cid=557396234949805422',
                'group' => 'contact',
            ],
            'google_maps_embed_url' => [
                'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.441!2d75.23584!3d30.2814947!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3910c50132330e43%3A0x7bc44ec2752c56e!2sHind%20Fan%20(Hindson%20Industries)!5e0!3m2!1sen!2sin!4v1728800000000!5m2!1sen!2sin',
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
