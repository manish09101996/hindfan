<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@hindfan.com'],
            [
                'name' => 'Hindfan Administrator',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Categories
        $categoriesData = [
            [
                'name' => 'Pedestal Fans',
                'slug' => 'pedestal-fans',
                'description' => 'Heavy-duty industrial and residential pedestal fans engineered for ultra-high velocity air throw and continuous endurance.',
                'display_order' => 1,
            ],
            [
                'name' => 'Madhani & Churners',
                'slug' => 'madhani-churners',
                'description' => 'India\'s pioneer electrical milk and curd churners (Madhani) ranging from 3kg household to 80kg commercial dairy sizes.',
                'display_order' => 2,
            ],
            [
                'name' => 'Tent & Event Fans',
                'slug' => 'tent-event-fans',
                'description' => 'High-velocity clump and pole-mounted fans designed for large marriage functions, pandals, gatherings, and poultry sheds.',
                'display_order' => 3,
            ],
            [
                'name' => 'Wall Mounting Fans',
                'slug' => 'wall-mounting-fans',
                'description' => 'Space-saving industrial wall and bracket fans with wide oscillation angles and sturdy wall-mounting clamps.',
                'display_order' => 4,
            ],
            [
                'name' => 'Water Mist Fans',
                'slug' => 'water-mist-fans',
                'description' => 'High-pressure mist cooling fans with 45L water storage capacity for outdoor events, restaurants, and summer venues.',
                'display_order' => 5,
            ],
            [
                'name' => 'Cooler Motors',
                'slug' => 'cooler-motors',
                'description' => 'Precision-wound 110 Dia copper cooler motors crafted with supreme grade laminations and double ball bearings.',
                'display_order' => 6,
            ],
            [
                'name' => 'Ceiling & Exhaust Fans',
                'slug' => 'ceiling-exhaust-fans',
                'description' => 'Aero-dynamically balanced industrial ceiling fans and exhaust solutions for warehouses, workshops, and halls.',
                'display_order' => 7,
            ],
        ];

        $categories = [];
        foreach ($categoriesData as $cData) {
            $categories[$cData['slug']] = Category::firstOrCreate(['slug' => $cData['slug']], $cData);
        }

        // 3. Seed Projects / Products
        $projectsData = [
            [
                'title' => 'CHIDHI 21" Heavy Duty Industrial Pedestal Fan',
                'slug' => 'chidhi-21-heavy-duty-industrial-pedestal-fan',
                'category_slug' => 'pedestal-fans',
                'short_description' => 'High-performance 21-inch industrial pedestal fan with 100% pure copper winding and precision aluminium aerodynamic blades.',
                'description' => '<p>The flagship <strong>CHIDHI 21" Pedestal Fan</strong> is engineered by Hindson Industries for environments requiring relentless air delivery. Manufactured since the 1980s and continuously refined, this model pairs high air velocity with low operating wattage.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 21 inches (530 mm)</li><li><strong>Power Consumption:</strong> 160 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Electrolytic Copper, Dual Heavy-Duty Bearings</li><li><strong>Blade:</strong> Dynamically Balanced Aero-grade Aluminium</li><li><strong>Guard:</strong> Heavy-gauge safety wire grill with anti-rust coating</li></ul><p>Approved by Punjab Govt. quality benchmarks and ISO 9001:2015 certified production processes, CHIDHI stands as the gold standard in Punjab and across North India.</p>',
                'thumbnail' => 'assets/images/products/pedestal_fan_chidhi.jpg',
                'alt_text' => 'Hindfan CHIDHI 21 inch Pedestal Fan',
                'client_name' => 'Standard Production & OEM Distribution',
                'completion_date' => '2025-06-15',
                'external_url' => 'http://hindfan.com',
                'technologies' => '21 Inch Sweep, 160W, 1400 RPM, Copper Motor, Double Bearings, Aluminium Blade',
                'meta_title' => 'CHIDHI 21" Heavy Duty Pedestal Fan | Hindfan Manufacturer',
                'meta_description' => 'Buy Hindson Industries CHIDHI 21 inch heavy duty pedestal fan. 100% copper double ball bearing motor, 1400 RPM, ISO certified quality.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 1,
                'views_count' => 1420,
            ],
            [
                'title' => 'CHIDHI 21" Special High-Speed Edition',
                'slug' => 'chidhi-21-special-high-speed-edition',
                'category_slug' => 'pedestal-fans',
                'short_description' => 'Custom optimized 150W energy-saver edition designed for extended operating shifts in factories and event halls.',
                'description' => '<p>The <strong>CHIDHI 21" Special</strong> edition integrates high-efficiency copper stator windings that lower energy draw to only 150 Watts while preserving strong airflow throw.</p><p>Equipped with dual precision bearings, noise dampening mounts, and balanced aluminium blades, this fan operates with whisper smoothness even at full 1400 RPM.</p>',
                'thumbnail' => 'assets/images/products/pedestal_fan_chidhi_special.jpg',
                'alt_text' => 'CHIDHI 21 Special High Speed Pedestal Fan',
                'client_name' => 'Industrial Workshops & Event Organizers',
                'completion_date' => '2025-08-10',
                'external_url' => null,
                'technologies' => '21 Inch, 150W Energy Efficient, 1400 RPM, Copper Stator, Heavy Base',
                'meta_title' => 'CHIDHI 21 Special Edition Pedestal Fan | Hindson Industries',
                'meta_description' => 'Explore the CHIDHI 21 Special Pedestal Fan with 150W low power draw and superior air delivery.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 2,
                'views_count' => 980,
            ],
            [
                'title' => 'DABBI 21" Compact Heavy-Duty Fan',
                'slug' => 'dabbi-21-compact-heavy-duty-fan',
                'category_slug' => 'pedestal-fans',
                'short_description' => 'Compact square-grill industrial fan built for rugged applications in dairy farms, workshops, and warehouses.',
                'description' => '<p>The DABBI 21" variant features an ultra-reinforced cage designed for intense farm and workshop conditions. Resists corrosion, vibrations, and continuous duty cycles.</p><ul><li>Sweep: 21 inches</li><li>Motor: Copper, Double Bearings</li><li>Speed: 1400 RPM</li><li>Power: 160 Watts</li></ul>',
                'thumbnail' => 'assets/images/products/pedestal_fan_dabbi.jpg',
                'alt_text' => 'DABBI 21 Pedestal Fan',
                'client_name' => 'Agricultural & Dairy Farm Facilities',
                'completion_date' => '2025-05-20',
                'external_url' => null,
                'technologies' => '21 Inch, 160W, 1400 RPM, Anti-Vibration Base',
                'meta_title' => 'DABBI 21 Compact Fan | Hindson Industries',
                'meta_description' => 'DABBI 21 inch compact heavy duty fan by Hindson Industries Rampura Phul.',
                'is_featured' => false,
                'status' => 'published',
                'display_order' => 3,
                'views_count' => 740,
            ],
            [
                'title' => 'Hindfan 26" Commercial Air Circulator',
                'slug' => 'hindfan-26-commercial-air-circulator',
                'category_slug' => 'pedestal-fans',
                'short_description' => 'Extra-large 26-inch sweep industrial fan pushing powerful airflow across large industrial spaces and marriage halls.',
                'description' => '<p>When maximum coverage is needed, the Hindfan 26" Commercial Air Circulator provides unmatched power. Operating with a robust 240 Watt motor and heavy-cast stability base, this fan covers large halls with consistent high-velocity air movement.</p>',
                'thumbnail' => 'assets/images/products/pedestal_fan_26.jpg',
                'alt_text' => 'Hindfan 26 inch Air Circulator',
                'client_name' => 'Marriage Palaces & Industrial Plants',
                'completion_date' => '2025-09-01',
                'external_url' => null,
                'technologies' => '26 Inch Sweep, 240W, 1400 RPM, Cast Iron Base, Pure Copper Winding',
                'meta_title' => '26" Industrial Air Circulator Pedestal Fan | Hindfan',
                'meta_description' => 'Heavy duty 26-inch commercial pedestal fan by Hindfan. High CFM air circulation for large events and factories.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 4,
                'views_count' => 1890,
            ],
            [
                'title' => 'Industrial Heavy-Duty Wall Fan (21" - 30")',
                'slug' => 'industrial-heavy-duty-wall-fan',
                'category_slug' => 'wall-mounting-fans',
                'short_description' => 'Space-saving heavy duty wall fan available in 21", 23", 26", and 30" sweep sizes with wide oscillation.',
                'description' => '<p>Mounted securely on masonry or steel pillars, the Hindfan Industrial Wall Fan preserves valuable floor space while delivering high-output air throw across work zones and commercial dining areas.</p><ul><li>Sizes: 21", 23", 26", 30"</li><li>Motor: Copper, Double Bearings</li><li>Speed: 1400 RPM</li><li>Blades: High-tensile aluminium</li></ul>',
                'thumbnail' => 'assets/images/products/pedestal_fan_wall.jpg',
                'alt_text' => 'Industrial Heavy Wall Fan',
                'client_name' => 'Industrial Warehouses & Commercial Kitchens',
                'completion_date' => '2025-04-12',
                'external_url' => null,
                'technologies' => 'Multi-Size 21-30 Inch, Wall Mount Clamps, 1400 RPM, Copper Winding',
                'meta_title' => 'Industrial Wall Mounting Fan Series | Hindson Industries',
                'meta_description' => 'Commercial wall mounting fans in 21, 23, 26, 30 inch sizes. Double bearing copper motor by Hindfan.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 5,
                'views_count' => 1120,
            ],
            [
                'title' => 'Adjustable Industrial Bracket Fan Series',
                'slug' => 'adjustable-industrial-bracket-fan-series',
                'category_slug' => 'wall-mounting-fans',
                'short_description' => 'Multi-directional adjustable bracket fan engineered for pinpoint airflow direction in production lines and workshops.',
                'description' => '<p>Featuring a heavy-gauge articulated bracket, this fan allows operators to lock the angle precisely where thermal relief is most crucial. Offered in sizes 21" to 30" with copper double bearing construction.</p>',
                'thumbnail' => 'assets/images/products/pedestal_fan_bracket.jpg',
                'alt_text' => 'Adjustable Bracket Fan',
                'client_name' => 'Assembly Lines & Fabrication Plants',
                'completion_date' => '2025-03-18',
                'external_url' => null,
                'technologies' => 'Pivot Bracket, 21-30 Inch, 1400 RPM, Copper Motor',
                'meta_title' => 'Industrial Bracket Fan Series | Hindfan',
                'meta_description' => 'Adjustable angle bracket fans for manufacturing lines and workshops.',
                'is_featured' => false,
                'status' => 'published',
                'display_order' => 6,
                'views_count' => 630,
            ],
            [
                'title' => 'ELEGANT Domestic Madhani Churner (3-5 KG)',
                'slug' => 'elegant-domestic-madhani-churner',
                'category_slug' => 'madhani-churners',
                'short_description' => 'The beloved household electric milk & curd churner engineered with 70W copper motor and 6" food-safe spinor.',
                'description' => '<p>Hindson Industries started in 1980 pioneering the <strong>HIND Madhani</strong>. The ELEGANT model represents four decades of refinement for households and small dairies, effortlessly churning butter and lassi in minutes.</p><ul><li>Capacity: 3 - 5 kg</li><li>Power Consumption: 70 Watts</li><li>Motor: 100% Pure Copper</li><li>Spinor: 6 inches Food-Grade</li></ul>',
                'thumbnail' => 'assets/images/products/madhani_elegant.jpg',
                'alt_text' => 'ELEGANT Madhani Milk Churner',
                'client_name' => 'Household & Small Dairy Kitchens',
                'completion_date' => '2025-01-10',
                'external_url' => null,
                'technologies' => '3-5 KG Capacity, 70W, Pure Copper, 6 Inch Food-Safe Spinor',
                'meta_title' => 'ELEGANT Domestic Madhani Churner | Hindfan HIND',
                'meta_description' => 'Original HIND Elegant Madhani for home use. 70W low power copper motor, 3-5 kg capacity.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 7,
                'views_count' => 2450,
            ],
            [
                'title' => 'HEAVY Dairy Madhani Churner (15-20 KG)',
                'slug' => 'heavy-dairy-madhani-churner',
                'category_slug' => 'madhani-churners',
                'short_description' => 'Intermediate commercial curd and butter churner with 90W motor and 8" spinor for dairy farms and sweets makers.',
                'description' => '<p>Engineered for medium dairy operations and confectionery artisans. Features high-torque copper windings that easily handle thick curds without stalling.</p><ul><li>Capacity: 15-20 kg</li><li>Power Consumption: 90 Watts</li><li>Motor: Copper Winding</li><li>Spinor: 8 inches</li></ul>',
                'thumbnail' => 'assets/images/products/madhani_heavy.jpg',
                'alt_text' => 'HEAVY Dairy Madhani',
                'client_name' => 'Sweets Artisans & Dairy Farms',
                'completion_date' => '2025-02-22',
                'external_url' => null,
                'technologies' => '15-20 KG, 90W, Copper Motor, 8 Inch Spinor',
                'meta_title' => 'HEAVY Dairy Madhani Churner 15-20 KG | Hindson Industries',
                'meta_description' => 'Heavy duty commercial madhani 15-20 kg capacity with 90W copper motor by Hindfan.',
                'is_featured' => false,
                'status' => 'published',
                'display_order' => 8,
                'views_count' => 1340,
            ],
            [
                'title' => 'SUPREME Commercial Madhani (25-30 KG)',
                'slug' => 'supreme-commercial-madhani',
                'category_slug' => 'madhani-churners',
                'short_description' => 'Heavy commercial churner for milk collection centers and commercial dairies, handling 25-30 kg with 100W copper drive.',
                'description' => '<p>Designed for daily heavy churning cycles in village milk cooperative societies and restaurants. Solid stainless drive shaft with balanced 9-inch spinor.</p>',
                'thumbnail' => 'assets/images/products/madhani_supreme.jpg',
                'alt_text' => 'SUPREME Commercial Madhani',
                'client_name' => 'Milk Societies & Restaurants',
                'completion_date' => '2025-04-05',
                'external_url' => null,
                'technologies' => '25-30 KG, 100W, Pure Copper, 9 Inch Spinor',
                'meta_title' => 'SUPREME 25-30 KG Commercial Madhani | Hindfan',
                'meta_description' => 'Supreme commercial madhani churner for milk cooperatives and dairies.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 9,
                'views_count' => 1650,
            ],
            [
                'title' => 'SAMRAT Mega Dairy Madhani (40-50 KG)',
                'slug' => 'samrat-mega-dairy-madhani',
                'category_slug' => 'madhani-churners',
                'short_description' => 'Industrial milk processing churner with 125W heavy copper motor and 10" stainless spinor.',
                'description' => '<p>Built to handle big churning vessels in high-volume dairy farms. Delivers clean, smooth separation of pure butter and buttermilk with minimal effort.</p>',
                'thumbnail' => 'assets/images/products/madhani_samrat.jpg',
                'alt_text' => 'SAMRAT Mega Dairy Madhani',
                'client_name' => 'Large Dairy Cooperatives',
                'completion_date' => '2025-06-30',
                'external_url' => null,
                'technologies' => '40-50 KG, 125W, Heavy Copper, 10 Inch Spinor',
                'meta_title' => 'SAMRAT 40-50 KG Industrial Madhani | Hindson Industries',
                'meta_description' => 'High capacity 40-50 KG Samrat Madhani churner by Hindson Industries.',
                'is_featured' => false,
                'status' => 'published',
                'display_order' => 10,
                'views_count' => 1190,
            ],
            [
                'title' => 'MAJESTIC Mega Industrial Madhani (70-80 KG)',
                'slug' => 'majestic-mega-industrial-madhani',
                'category_slug' => 'madhani-churners',
                'short_description' => 'Largest capacity churner in the Hindfan catalog. 160W continuous-duty motor with 12" high-capacity spinor.',
                'description' => '<p>The ultimate industrial churner engineered by Hindson Industries. Handles 70 to 80 kg of curd in single runs for milk chilling centers, dairy plants, and religious community kitchens.</p><ul><li>Capacity: 70 - 80 kg</li><li>Power Consumption: 160 Watts</li><li>Motor: Heavy Industrial Copper</li><li>Spinor: 12 inches Industrial-Grade</li></ul>',
                'thumbnail' => 'assets/images/products/madhani_majestic.jpg',
                'alt_text' => 'MAJESTIC Mega Industrial Madhani',
                'client_name' => 'Commercial Processing Plants & Community Kitchens',
                'completion_date' => '2025-07-25',
                'external_url' => null,
                'technologies' => '70-80 KG, 160W Heavy Motor, 12 Inch Spinor, Continuous Duty',
                'meta_title' => 'MAJESTIC 70-80 KG Mega Madhani Churner | Hindfan',
                'meta_description' => 'Largest 70-80 kg commercial madhani churner in India by Hindfan Rampura Phul.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 11,
                'views_count' => 3120,
            ],
            [
                'title' => 'Event & Tent Heavy Clump Fan 21"',
                'slug' => 'event-tent-heavy-clump-fan-21',
                'category_slug' => 'tent-event-fans',
                'short_description' => 'Heavy duty 21" tent fan with specialized mounting clamps for marriage pandals, event poles, and poultry sheds.',
                'description' => '<p>Known throughout Punjab as the quintessential "Tent Fan" or "Fratta", this fan mounts rapidly to steel pipes and bamboo poles with customizable clamps. Includes a reinforced 4 kg protective guard.</p><ul><li>Sweep: 21 inches</li><li>Power: 160 Watts</li><li>Speed: 1400 RPM</li><li>Guard: Heavy Duty (4 kg)</li><li>Motor: Copper, Double Bearings</li></ul>',
                'thumbnail' => 'assets/images/products/tent_fan_clump.jpg',
                'alt_text' => 'Event Tent Clump Fan 21 inch',
                'client_name' => 'Tent Decorators & Event Rental Companies',
                'completion_date' => '2025-08-14',
                'external_url' => null,
                'technologies' => '21 Inch, 160W, 4kg Guard, Rapid Clump Mount, Copper Motor',
                'meta_title' => 'Event Tent Clump Fan 21" | Hindson Industries',
                'meta_description' => 'Heavy duty 21-inch tent clump fan with custom clamps for marriage functions and outdoor events.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 12,
                'views_count' => 2800,
            ],
            [
                'title' => 'Tent & Pavilion High-Rise Pedestal Fan 26"',
                'slug' => 'tent-pavilion-high-rise-pedestal-fan-26',
                'category_slug' => 'tent-event-fans',
                'short_description' => 'Tall 60-inch height industrial pedestal fan providing over-crowd air ventilation for summer gatherings.',
                'description' => '<p>Designed to rise above standing crowds, the 60-inch pedestal delivers uninterrupted cool breezes across dense wedding receptions and exhibitions. Heavy base prevents tipping in busy environments.</p>',
                'thumbnail' => 'assets/images/products/tent_fan_26.jpg',
                'alt_text' => 'Tent Pavilion High Rise Pedestal Fan 26 inch',
                'client_name' => 'Exhibition Halls & Wedding Venues',
                'completion_date' => '2025-05-11',
                'external_url' => null,
                'technologies' => '26 Inch, 240W, 60 Inch Height, 1400 RPM, Anti-Topple Base',
                'meta_title' => '26" High-Rise Pavilion Tent Fan | Hindfan',
                'meta_description' => '26 inch tall pedestal fan for tents, pandals, and exhibitions by Hindson Industries.',
                'is_featured' => false,
                'status' => 'published',
                'display_order' => 13,
                'views_count' => 1410,
            ],
            [
                'title' => 'Outdoor High-Pressure Water Mist Fan 26"',
                'slug' => 'outdoor-high-pressure-water-mist-fan-26',
                'category_slug' => 'water-mist-fans',
                'short_description' => 'Ultra-fine droplet mist cooling system with 45 Liter water tank, reducing ambient temperature by up to 8°C.',
                'description' => '<p>The Hindfan 26" Water Mist Fan provides instant relief from extreme summer temperatures. Equipped with a centrifugal atomizing nozzle that prevents nozzle clogging and delivers ultra-fine mist without wetting clothes.</p><ul><li>Sweep: 26 inches</li><li>Power Consumption: 300 Watts</li><li>Speed: 1400 RPM</li><li>Height: 60 inches</li><li>Water Storage Capacity: 45 Liters</li><li>Motor: Copper, Double Bearings</li></ul>',
                'thumbnail' => 'assets/images/products/water_mist_fan.jpg',
                'alt_text' => 'Outdoor High Pressure Water Mist Fan 26 inch',
                'client_name' => 'Open-Air Restaurants, Resorts & Summer Events',
                'completion_date' => '2025-06-01',
                'external_url' => null,
                'technologies' => '26 Inch, 300W, 45L Tank, Centrifugal Atomizer, 1400 RPM',
                'meta_title' => '26" Commercial Water Mist Fan 45L | Hindson Industries',
                'meta_description' => 'High pressure 26-inch outdoor water mist cooling fan with 45 liter tank by Hindfan.',
                'is_featured' => true,
                'status' => 'published',
                'display_order' => 14,
                'views_count' => 4200,
            ],
            [
                'title' => 'Hind Precision 110 Dia Cooler Motor Series',
                'slug' => 'hind-precision-110-dia-cooler-motor-series',
                'category_slug' => 'cooler-motors',
                'short_description' => 'Heavy duty evaporative cooler motors available in 1", 1-1/4", 1-1/2", and 1-3/4" stack heights.',
                'description' => '<p>Crafted with premium CRNO silicon electrical steel laminations and pure copper magnet wire. Built for continuous summer cooling without overheating or performance degradation.</p>',
                'thumbnail' => 'assets/images/products/coller_motors.jpg',
                'alt_text' => 'Hind Precision Cooler Motors 110 Dia',
                'client_name' => 'Cooler Manufacturers & Wholesale Parts Dealers',
                'completion_date' => '2025-03-30',
                'external_url' => null,
                'technologies' => '110 Dia, Multiple Stack Heights, Pure Copper Magnet Wire, CRNO Steel',
                'meta_title' => '110 Dia Evaporative Cooler Motors | Hindson Industries',
                'meta_description' => 'Precision 110 Dia cooler motor series in 1 to 1.75 inch sizes. Hindfan Rampura Phul.',
                'is_featured' => false,
                'status' => 'published',
                'display_order' => 15,
                'views_count' => 1870,
            ],
            [
                'title' => 'Next-Gen Solar DC Pedestal Prototype (In Development)',
                'slug' => 'next-gen-solar-dc-pedestal-prototype',
                'category_slug' => 'pedestal-fans',
                'short_description' => 'Upcoming 24V brushless DC solar-compatible fan engineered for agricultural poultry farms and rural regions.',
                'description' => '<p>Prototype project currently undergoing endurance testing in our Rampura Phul testing laboratory. Features brushless DC motor technology powered directly by 100W solar panels or 24V battery systems.</p>',
                'thumbnail' => 'assets/images/products/pedestal_fan_23.jpg',
                'alt_text' => 'Solar DC Pedestal Prototype',
                'client_name' => 'R&D Department - Hindson Industries',
                'completion_date' => null,
                'external_url' => null,
                'technologies' => 'BLDC Motor, 24V Solar Ready, Microprocessor Controller',
                'meta_title' => 'Solar DC Pedestal Fan Prototype | Hindfan R&D',
                'meta_description' => 'Upcoming solar DC pedestal fan prototype by Hindson Industries.',
                'is_featured' => false,
                'status' => 'draft', // DRAFT to verify draft functionality!
                'display_order' => 16,
                'views_count' => 85,
            ],
        ];

        foreach ($projectsData as $pData) {
            $catSlug = $pData['category_slug'];
            unset($pData['category_slug']);
            $pData['category_id'] = $categories[$catSlug]->id ?? null;

            $project = Project::firstOrCreate(
                ['slug' => $pData['slug']],
                $pData
            );

            // Seed gallery images for projects
            ProjectImage::firstOrCreate(
                ['project_id' => $project->id, 'image_path' => $project->thumbnail],
                [
                    'alt_text' => $project->title . ' - Primary View',
                    'caption' => 'Engineered for maximum endurance and performance',
                    'display_order' => 1,
                ]
            );

            if ($project->id % 2 == 0) {
                ProjectImage::firstOrCreate(
                    ['project_id' => $project->id, 'image_path' => 'assets/images/banner-1.jpg'],
                    [
                        'alt_text' => $project->title . ' - Manufacturing Floor',
                        'caption' => 'Precision manufacturing in our Bathinda facility',
                        'display_order' => 2,
                    ]
                );
            }
        }

        // 4. Seed initial sample inquiries
        Inquiry::firstOrCreate(
            ['email' => 'rajesh.sharma@example.com'],
            [
                'name' => 'Rajesh Sharma',
                'phone' => '+91-98765-43210',
                'subject' => 'Bulk inquiry for 50 Chidhi Pedestal Fans',
                'service_needed' => 'Pedestal Fans Wholesale',
                'message' => 'Hello Hindfan Team, we run an event management agency in Ludhiana. We need 50 units of CHIDHI 21" Pedestal Fans for upcoming wedding season. Please share wholesale price and dispatch timeline.',
                'is_read' => false,
                'ip_address' => '127.0.0.1',
            ]
        );

        Inquiry::firstOrCreate(
            ['email' => 'kuldeep.singh@example.com'],
            [
                'name' => 'Sardar Kuldeep Singh',
                'phone' => '+91-94172-88219',
                'subject' => 'Dairy Farm Madhani 70-80 KG requirement',
                'service_needed' => 'Madhani & Churners',
                'message' => 'Sat Sri Akal ji, we have a dairy farm near Barnala and require 2 units of Majestic 70-80 KG Madhani. Please advise on warranty and delivery to Barnala.',
                'is_read' => true,
                'ip_address' => '127.0.0.1',
            ]
        );

        // 5. Seed Site Settings
        $this->call(SettingSeeder::class);
    }
}
