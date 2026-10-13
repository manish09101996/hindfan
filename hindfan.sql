-- Hindson Industries MySQL Database Dump
-- Generated: 2026-10-13 08:43:21
-- Compatible with MySQL 5.7+ / MariaDB 10.3+

SET FOREIGN_KEY_CHECKS = 0;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';

-- --------------------------------------------------------
-- Table structure for table `migrations`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_10_10_020513_create_portfolio_tables', 2),
(6, '2026_10_10_030000_create_settings_table', 3);

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Hindfan Administrator', 'admin@hindfan.com', '2026-10-10 02:07:26', '$2y$10$erWEWaQQVVzlbPWqdDdsQ.xs8qEenX/qtNtapMIzZ.WKv2Bw2x0ni', NULL, '2026-10-10 02:07:26', '2026-10-10 02:07:26', 1);

-- --------------------------------------------------------
-- Table structure for table `password_reset_tokens`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `failed_jobs`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `personal_access_tokens`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `settings`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_public` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `settings`
INSERT INTO `settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'contact_address', 'Custom Industrial Area, Phase 2, Punjab', 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:51'),
(2, 'contact_phone_1', '+91-99887-11223', 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:51'),
(3, 'contact_phone_1_label', 'Chief Operations', 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:51'),
(4, 'contact_phone_2', NULL, 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:51'),
(5, 'contact_phone_2_label', NULL, 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:51'),
(6, 'contact_email', 'custom-desk@hindfan.com', 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(7, 'working_hours', 'Mon - Fri: 09:00 - 18:00', 'contact', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(8, 'social_facebook', 'https://facebook.com/customhindfanofficial', 'social', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(9, 'social_youtube', NULL, 'social', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(10, 'social_instagram', NULL, 'social', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(11, 'social_linkedin', NULL, 'social', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(12, 'social_twitter', NULL, 'social', '2026-10-10 10:50:45', '2026-10-10 10:56:52'),
(13, 'social_whatsapp', NULL, 'social', '2026-10-10 10:50:45', '2026-10-10 10:56:52');

-- --------------------------------------------------------
-- Table structure for table `categories`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `categories`
INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pedestal Fans', 'pedestal-fans', 'Heavy-duty industrial and residential pedestal fans engineered for ultra-high velocity air throw and continuous endurance.', 1, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(2, 'Madhani & Churners', 'madhani-churners', 'India\'s pioneer electrical milk and curd churners (Madhani) ranging from 3kg household to 80kg commercial dairy sizes.', 2, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(3, 'Tent & Event Fans', 'tent-event-fans', 'High-velocity clump and pole-mounted fans designed for large marriage functions, pandals, gatherings, and poultry sheds.', 3, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(4, 'Wall Mounting Fans', 'wall-mounting-fans', 'Space-saving industrial wall and bracket fans with wide oscillation angles and sturdy wall-mounting clamps.', 4, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(5, 'Water Mist Fans', 'water-mist-fans', 'High-pressure mist cooling fans with 45L water storage capacity for outdoor events, restaurants, and summer venues.', 5, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(6, 'Cooler Motors', 'cooler-motors', 'Precision-wound 110 Dia copper cooler motors crafted with supreme grade laminations and double ball bearings.', 6, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(7, 'Ceiling & Exhaust Fans', 'ceiling-exhaust-fans', 'Aero-dynamically balanced industrial ceiling fans and exhaust solutions for warehouses, workshops, and halls.', 7, 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26');

-- --------------------------------------------------------
-- Table structure for table `projects`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `external_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technologies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `display_order` int(11) NOT NULL DEFAULT '0',
  `views_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_slug_unique` (`slug`),
  KEY `projects_category_id_foreign` (`category_id`),
  CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `projects`
INSERT INTO `projects` (`id`, `category_id`, `title`, `slug`, `short_description`, `description`, `thumbnail`, `alt_text`, `client_name`, `completion_date`, `external_url`, `technologies`, `meta_title`, `meta_description`, `is_featured`, `status`, `display_order`, `views_count`, `created_at`, `updated_at`) VALUES
(1, 1, 'CHIDHI 21\" Heavy Duty Industrial Pedestal Fan', 'chidhi-21-heavy-duty-industrial-pedestal-fan', 'High-performance 21-inch industrial pedestal fan with 100% pure copper winding and precision aluminium aerodynamic blades.', '<p>The flagship <strong>CHIDHI 21\" Pedestal Fan</strong> is engineered by Hindson Industries for environments requiring relentless air delivery. Manufactured since the 1980s and continuously refined, this model pairs high air velocity with low operating wattage.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 21 inches (530 mm)</li><li><strong>Power Consumption:</strong> 160 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Electrolytic Copper, Dual Heavy-Duty Bearings</li><li><strong>Blade:</strong> Dynamically Balanced Aero-grade Aluminium</li><li><strong>Guard:</strong> Heavy-gauge safety wire grill with anti-rust coating</li></ul><p>Approved by Punjab Govt. quality benchmarks and ISO 9001:2015 certified production processes, CHIDHI stands as the gold standard in Punjab and across North India.</p>', 'assets/images/products/pedestal_fan_chidhi.jpg', 'Hindfan CHIDHI 21 inch Pedestal Fan', 'Standard Production & OEM Distribution', '2025-06-15 00:00:00', 'http://hindfan.com', '21 Inch Sweep, 160W, 1400 RPM, Copper Motor, Double Bearings, Aluminium Blade', 'CHIDHI 21\" Heavy Duty Pedestal Fan | Hindfan Manufacturer', 'Buy Hindson Industries CHIDHI 21 inch heavy duty pedestal fan. 100% copper double ball bearing motor, 1400 RPM, ISO certified quality.', 1, 'published', 1, 1436, '2026-10-10 02:07:26', '2026-10-13 06:40:38'),
(2, 1, 'CHIDHI 21\" Special High-Speed Edition', 'chidhi-21-special-high-speed-edition', 'Custom optimized 150W energy-saver edition designed for extended operating shifts in factories and event halls.', '<p>The <strong>CHIDHI 21\" Special</strong> edition integrates high-efficiency copper stator windings that lower energy draw to only 150 Watts while preserving strong airflow throw.</p><p>Equipped with dual precision bearings, noise dampening mounts, and balanced aluminium blades, this fan operates with whisper smoothness even at full 1400 RPM.</p>', 'assets/images/products/pedestal_fan_chidhi_special.jpg', 'CHIDHI 21 Special High Speed Pedestal Fan', 'Industrial Workshops & Event Organizers', '2025-08-10 00:00:00', NULL, '21 Inch, 150W Energy Efficient, 1400 RPM, Copper Stator, Heavy Base', 'CHIDHI 21 Special Edition Pedestal Fan | Hindson Industries', 'Explore the CHIDHI 21 Special Pedestal Fan with 150W low power draw and superior air delivery.', 1, 'published', 2, 980, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(3, 1, 'DABBI 21\" Compact Heavy-Duty Fan', 'dabbi-21-compact-heavy-duty-fan', 'Compact square-grill industrial fan built for rugged applications in dairy farms, workshops, and warehouses.', '<p>The DABBI 21\" variant features an ultra-reinforced cage designed for intense farm and workshop conditions. Resists corrosion, vibrations, and continuous duty cycles.</p><ul><li>Sweep: 21 inches</li><li>Motor: Copper, Double Bearings</li><li>Speed: 1400 RPM</li><li>Power: 160 Watts</li></ul>', 'assets/images/products/pedestal_fan_dabbi.jpg', 'DABBI 21 Pedestal Fan', 'Agricultural & Dairy Farm Facilities', '2025-05-20 00:00:00', NULL, '21 Inch, 160W, 1400 RPM, Anti-Vibration Base', 'DABBI 21 Compact Fan | Hindson Industries', 'DABBI 21 inch compact heavy duty fan by Hindson Industries Rampura Phul.', 0, 'published', 3, 740, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(4, 1, 'Hindfan 26\" Commercial Air Circulator', 'hindfan-26-commercial-air-circulator', 'Extra-large 26-inch sweep industrial fan pushing powerful airflow across large industrial spaces and marriage halls.', '<p>When maximum coverage is needed, the Hindfan 26\" Commercial Air Circulator provides unmatched power. Operating with a robust 240 Watt motor and heavy-cast stability base, this fan covers large halls with consistent high-velocity air movement.</p>', 'assets/images/products/pedestal_fan_26.jpg', 'Hindfan 26 inch Air Circulator', 'Marriage Palaces & Industrial Plants', '2025-09-01 00:00:00', NULL, '26 Inch Sweep, 240W, 1400 RPM, Cast Iron Base, Pure Copper Winding', '26\" Industrial Air Circulator Pedestal Fan | Hindfan', 'Heavy duty 26-inch commercial pedestal fan by Hindfan. High CFM air circulation for large events and factories.', 1, 'published', 4, 1891, '2026-10-10 02:07:26', '2026-10-10 03:06:05'),
(5, 4, 'Industrial Heavy-Duty Wall Fan (21\" - 30\")', 'industrial-heavy-duty-wall-fan', 'Space-saving heavy duty wall fan available in 21\", 23\", 26\", and 30\" sweep sizes with wide oscillation.', '<p>Mounted securely on masonry or steel pillars, the Hindfan Industrial Wall Fan preserves valuable floor space while delivering high-output air throw across work zones and commercial dining areas.</p><ul><li>Sizes: 21\", 23\", 26\", 30\"</li><li>Motor: Copper, Double Bearings</li><li>Speed: 1400 RPM</li><li>Blades: High-tensile aluminium</li></ul>', 'assets/images/products/pedestal_fan_wall.jpg', 'Industrial Heavy Wall Fan', 'Industrial Warehouses & Commercial Kitchens', '2025-04-12 00:00:00', NULL, 'Multi-Size 21-30 Inch, Wall Mount Clamps, 1400 RPM, Copper Winding', 'Industrial Wall Mounting Fan Series | Hindson Industries', 'Commercial wall mounting fans in 21, 23, 26, 30 inch sizes. Double bearing copper motor by Hindfan.', 1, 'published', 5, 1120, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(6, 4, 'Adjustable Industrial Bracket Fan Series', 'adjustable-industrial-bracket-fan-series', 'Multi-directional adjustable bracket fan engineered for pinpoint airflow direction in production lines and workshops.', '<p>Featuring a heavy-gauge articulated bracket, this fan allows operators to lock the angle precisely where thermal relief is most crucial. Offered in sizes 21\" to 30\" with copper double bearing construction.</p>', 'assets/images/products/pedestal_fan_bracket.jpg', 'Adjustable Bracket Fan', 'Assembly Lines & Fabrication Plants', '2025-03-18 00:00:00', NULL, 'Pivot Bracket, 21-30 Inch, 1400 RPM, Copper Motor', 'Industrial Bracket Fan Series | Hindfan', 'Adjustable angle bracket fans for manufacturing lines and workshops.', 0, 'published', 6, 630, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(7, 2, 'ELEGANT Domestic Madhani Churner (3-5 KG)', 'elegant-domestic-madhani-churner', 'The beloved household electric milk & curd churner engineered with 70W copper motor and 6\" food-safe spinor.', '<p>Hindson Industries started in 1980 pioneering the <strong>HIND Madhani</strong>. The ELEGANT model represents four decades of refinement for households and small dairies, effortlessly churning butter and lassi in minutes.</p><ul><li>Capacity: 3 - 5 kg</li><li>Power Consumption: 70 Watts</li><li>Motor: 100% Pure Copper</li><li>Spinor: 6 inches Food-Grade</li></ul>', 'assets/images/products/madhani_elegant.jpg', 'ELEGANT Madhani Milk Churner', 'Household & Small Dairy Kitchens', '2025-01-10 00:00:00', NULL, '3-5 KG Capacity, 70W, Pure Copper, 6 Inch Food-Safe Spinor', 'ELEGANT Domestic Madhani Churner | Hindfan HIND', 'Original HIND Elegant Madhani for home use. 70W low power copper motor, 3-5 kg capacity.', 1, 'published', 7, 2450, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(8, 2, 'HEAVY Dairy Madhani Churner (15-20 KG)', 'heavy-dairy-madhani-churner', 'Intermediate commercial curd and butter churner with 90W motor and 8\" spinor for dairy farms and sweets makers.', '<p>Engineered for medium dairy operations and confectionery artisans. Features high-torque copper windings that easily handle thick curds without stalling.</p><ul><li>Capacity: 15-20 kg</li><li>Power Consumption: 90 Watts</li><li>Motor: Copper Winding</li><li>Spinor: 8 inches</li></ul>', 'assets/images/products/madhani_heavy.jpg', 'HEAVY Dairy Madhani', 'Sweets Artisans & Dairy Farms', '2025-02-22 00:00:00', NULL, '15-20 KG, 90W, Copper Motor, 8 Inch Spinor', 'HEAVY Dairy Madhani Churner 15-20 KG | Hindson Industries', 'Heavy duty commercial madhani 15-20 kg capacity with 90W copper motor by Hindfan.', 0, 'published', 8, 1340, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(9, 2, 'SUPREME Commercial Madhani (25-30 KG)', 'supreme-commercial-madhani', 'Heavy commercial churner for milk collection centers and commercial dairies, handling 25-30 kg with 100W copper drive.', '<p>Designed for daily heavy churning cycles in village milk cooperative societies and restaurants. Solid stainless drive shaft with balanced 9-inch spinor.</p>', 'assets/images/products/madhani_supreme.jpg', 'SUPREME Commercial Madhani', 'Milk Societies & Restaurants', '2025-04-05 00:00:00', NULL, '25-30 KG, 100W, Pure Copper, 9 Inch Spinor', 'SUPREME 25-30 KG Commercial Madhani | Hindfan', 'Supreme commercial madhani churner for milk cooperatives and dairies.', 1, 'published', 9, 1650, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(10, 2, 'SAMRAT Mega Dairy Madhani (40-50 KG)', 'samrat-mega-dairy-madhani', 'Industrial milk processing churner with 125W heavy copper motor and 10\" stainless spinor.', '<p>Built to handle big churning vessels in high-volume dairy farms. Delivers clean, smooth separation of pure butter and buttermilk with minimal effort.</p>', 'assets/images/products/madhani_samrat.jpg', 'SAMRAT Mega Dairy Madhani', 'Large Dairy Cooperatives', '2025-06-30 00:00:00', NULL, '40-50 KG, 125W, Heavy Copper, 10 Inch Spinor', 'SAMRAT 40-50 KG Industrial Madhani | Hindson Industries', 'High capacity 40-50 KG Samrat Madhani churner by Hindson Industries.', 0, 'published', 10, 1190, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(11, 2, 'MAJESTIC Mega Industrial Madhani (70-80 KG)', 'majestic-mega-industrial-madhani', 'Largest capacity churner in the Hindfan catalog. 160W continuous-duty motor with 12\" high-capacity spinor.', '<p>The ultimate industrial churner engineered by Hindson Industries. Handles 70 to 80 kg of curd in single runs for milk chilling centers, dairy plants, and religious community kitchens.</p><ul><li>Capacity: 70 - 80 kg</li><li>Power Consumption: 160 Watts</li><li>Motor: Heavy Industrial Copper</li><li>Spinor: 12 inches Industrial-Grade</li></ul>', 'assets/images/products/madhani_majestic.jpg', 'MAJESTIC Mega Industrial Madhani', 'Commercial Processing Plants & Community Kitchens', '2025-07-25 00:00:00', NULL, '70-80 KG, 160W Heavy Motor, 12 Inch Spinor, Continuous Duty', 'MAJESTIC 70-80 KG Mega Madhani Churner | Hindfan', 'Largest 70-80 kg commercial madhani churner in India by Hindfan Rampura Phul.', 1, 'published', 11, 3120, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(12, 3, 'Event & Tent Heavy Clump Fan 21\"', 'event-tent-heavy-clump-fan-21', 'Heavy duty 21\" tent fan with specialized mounting clamps for marriage pandals, event poles, and poultry sheds.', '<p>Known throughout Punjab as the quintessential \"Tent Fan\" or \"Fratta\", this fan mounts rapidly to steel pipes and bamboo poles with customizable clamps. Includes a reinforced 4 kg protective guard.</p><ul><li>Sweep: 21 inches</li><li>Power: 160 Watts</li><li>Speed: 1400 RPM</li><li>Guard: Heavy Duty (4 kg)</li><li>Motor: Copper, Double Bearings</li></ul>', 'assets/images/products/tent_fan_clump.jpg', 'Event Tent Clump Fan 21 inch', 'Tent Decorators & Event Rental Companies', '2025-08-14 00:00:00', NULL, '21 Inch, 160W, 4kg Guard, Rapid Clump Mount, Copper Motor', 'Event Tent Clump Fan 21\" | Hindson Industries', 'Heavy duty 21-inch tent clump fan with custom clamps for marriage functions and outdoor events.', 1, 'published', 12, 2800, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(13, 3, 'Tent & Pavilion High-Rise Pedestal Fan 26\"', 'tent-pavilion-high-rise-pedestal-fan-26', 'Tall 60-inch height industrial pedestal fan providing over-crowd air ventilation for summer gatherings.', '<p>Designed to rise above standing crowds, the 60-inch pedestal delivers uninterrupted cool breezes across dense wedding receptions and exhibitions. Heavy base prevents tipping in busy environments.</p>', 'assets/images/products/tent_fan_26.jpg', 'Tent Pavilion High Rise Pedestal Fan 26 inch', 'Exhibition Halls & Wedding Venues', '2025-05-11 00:00:00', NULL, '26 Inch, 240W, 60 Inch Height, 1400 RPM, Anti-Topple Base', '26\" High-Rise Pavilion Tent Fan | Hindfan', '26 inch tall pedestal fan for tents, pandals, and exhibitions by Hindson Industries.', 0, 'published', 13, 1410, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(14, 5, 'Outdoor High-Pressure Water Mist Fan 26\"', 'outdoor-high-pressure-water-mist-fan-26', 'Ultra-fine droplet mist cooling system with 45 Liter water tank, reducing ambient temperature by up to 8°C.', '<p>The Hindfan 26\" Water Mist Fan provides instant relief from extreme summer temperatures. Equipped with a centrifugal atomizing nozzle that prevents nozzle clogging and delivers ultra-fine mist without wetting clothes.</p><ul><li>Sweep: 26 inches</li><li>Power Consumption: 300 Watts</li><li>Speed: 1400 RPM</li><li>Height: 60 inches</li><li>Water Storage Capacity: 45 Liters</li><li>Motor: Copper, Double Bearings</li></ul>', 'assets/images/products/water_mist_fan.jpg', 'Outdoor High Pressure Water Mist Fan 26 inch', 'Open-Air Restaurants, Resorts & Summer Events', '2025-06-01 00:00:00', NULL, '26 Inch, 300W, 45L Tank, Centrifugal Atomizer, 1400 RPM', '26\" Commercial Water Mist Fan 45L | Hindson Industries', 'High pressure 26-inch outdoor water mist cooling fan with 45 liter tank by Hindfan.', 1, 'published', 14, 4200, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(15, 6, 'Hind Precision 110 Dia Cooler Motor Series', 'hind-precision-110-dia-cooler-motor-series', 'Heavy duty evaporative cooler motors available in 1\", 1-1/4\", 1-1/2\", and 1-3/4\" stack heights.', '<p>Crafted with premium CRNO silicon electrical steel laminations and pure copper magnet wire. Built for continuous summer cooling without overheating or performance degradation.</p>', 'assets/images/products/coller_motors.jpg', 'Hind Precision Cooler Motors 110 Dia', 'Cooler Manufacturers & Wholesale Parts Dealers', '2025-03-30 00:00:00', NULL, '110 Dia, Multiple Stack Heights, Pure Copper Magnet Wire, CRNO Steel', '110 Dia Evaporative Cooler Motors | Hindson Industries', 'Precision 110 Dia cooler motor series in 1 to 1.75 inch sizes. Hindfan Rampura Phul.', 0, 'published', 15, 1870, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(16, 1, 'Next-Gen Solar DC Pedestal Prototype (In Development)', 'next-gen-solar-dc-pedestal-prototype', 'Upcoming 24V brushless DC solar-compatible fan engineered for agricultural poultry farms and rural regions.', '<p>Prototype project currently undergoing endurance testing in our Rampura Phul testing laboratory. Features brushless DC motor technology powered directly by 100W solar panels or 24V battery systems.</p>', 'assets/images/products/pedestal_fan_23.jpg', 'Solar DC Pedestal Prototype', 'R&D Department - Hindson Industries', NULL, NULL, 'BLDC Motor, 24V Solar Ready, Microprocessor Controller', 'Solar DC Pedestal Fan Prototype | Hindfan R&D', 'Upcoming solar DC pedestal fan prototype by Hindson Industries.', 0, 'draft', 16, 85, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(30, 1, 'AIRKING 500 mm (20\") High-Velocity Pedestal Fan', 'airking-500-mm-high-velocity-pedestal-fan', 'Engineered 500 mm (20-inch) high-velocity pedestal fan with 100% pure copper motor and close-mesh safety grill.', '<p>The <strong>AIRKING 500 mm (20\") Pedestal Fan</strong> is engineered by Hindson Industries for demanding industrial and commercial airflow requirements. Designed with a high-torque 100% copper winding motor, this model delivers superior velocity and extended air throw while maintaining energy efficiency.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 500 mm / 20 inches</li><li><strong>Power Consumption:</strong> 140 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Copper Winding with Heavy-Duty Bearings</li><li><strong>Blade:</strong> Dynamically Balanced 500 mm Aerodynamic Aluminium Blade</li><li><strong>Guard:</strong> Heavy-gauge safety wire grill with anti-rust coating</li><li><strong>Base:</strong> Heavy cast iron circular base for vibration-free stability</li><li><strong>Height:</strong> Telescopic height adjustment</li></ul>', 'assets/images/products/pedestal_fan_airking_500mm.jpg', 'Hindfan AIRKING 500 mm 20 Inch Pedestal Fan', 'Industrial Sheds, Workshops & Commercial Spaces', '2026-01-01 00:00:00', 'http://hindfan.com', '500 mm (20\"), 140W, 1400 RPM, 100% Copper, Double Bearings, Cast Iron Base', 'AIRKING 500 mm (20\") Pedestal Fan | Hindfan Manufacturer', 'Buy Hindson Industries AIRKING 500 mm 20 inch heavy-duty pedestal fan. 100% copper double ball bearing motor, 1400 RPM, cast iron base.', 1, 'published', 17, 621, '2026-10-13 06:36:04', '2026-10-13 06:40:39'),
(31, 1, 'SILVERLINE 21\" Heavy Duty Industrial Pedestal Fan', 'silverline-21-heavy-duty-industrial-pedestal-fan', 'Heavy-duty 21-inch industrial pedestal fan with premium silverline finish, 160W copper motor, and high-velocity airflow.', '<p>The <strong>SILVERLINE 21\" Pedestal Fan</strong> is a cornerstone industrial circulator from Hindson Industries. Built with high-grade components, double ball bearings, and a robust motor assembly, it delivers continuous heavy airflow across large industrial spaces and outdoor venues.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 21 inches (530 mm)</li><li><strong>Power Consumption:</strong> 160 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Electrolytic Copper, Dual Ball Bearings</li><li><strong>Blade:</strong> Precision Aerodynamic Aluminium 3-Leaf Blades</li><li><strong>Guard:</strong> Heavy-duty close-mesh safety grill with corrosion-resistant finish</li><li><strong>Base:</strong> Heavy round base for maximum stability</li></ul>', 'assets/images/products/pedestal_fan_silverline_21.jpg', 'Hindfan SILVERLINE 21 inch Pedestal Fan', 'Factories, Banquet Halls & Commercial Venues', '2026-01-01 00:00:00', 'http://hindfan.com', '21 Inch Sweep, 160W, 1400 RPM, Pure Copper Motor, Double Ball Bearings, Aluminium Blades', 'SILVERLINE 21\" Heavy Duty Pedestal Fan | Hindson Industries', 'Hindfan SILVERLINE 21 inch industrial pedestal fan. 160W pure copper motor, 1400 RPM, double ball bearings.', 1, 'published', 18, 581, '2026-10-13 06:36:04', '2026-10-13 06:40:39'),
(32, 1, 'SILVERLINE 23\" Industrial Air Circulator Pedestal Fan', 'silverline-23-industrial-air-circulator-pedestal-fan', 'Industrial-grade 23-inch pedestal fan delivering expansive air sweep with an 180W double-bearing copper motor.', '<p>The <strong>SILVERLINE 23\" Pedestal Fan</strong> expands coverage for wide workshops, banquet pandals, and assembly floors. Engineered for non-stop endurance with thermal-resistant copper winding and heavy-duty steel construction.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 23 inches (585 mm)</li><li><strong>Power Consumption:</strong> 180 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Copper Winding, Double Heavy-Duty Bearings</li><li><strong>Blade:</strong> Dynamically Balanced High-Tensile Aluminium Blades</li><li><strong>Base:</strong> Heavy cast iron round base</li><li><strong>Height:</strong> Adjustable telescopic stand with positive locking collar</li></ul>', 'assets/images/products/pedestal_fan_silverline_23.jpg', 'Hindfan SILVERLINE 23 inch Pedestal Fan', 'Assembly Plants & Event Organizers', '2026-01-01 00:00:00', 'http://hindfan.com', '23 Inch Sweep, 180W, 1400 RPM, 100% Copper, Cast Iron Base, Telescopic Stand', 'SILVERLINE 23\" Pedestal Fan | Hindson Industries', 'Hindfan SILVERLINE 23 inch commercial air circulator. 180W copper motor, 1400 RPM, cast iron base.', 0, 'published', 19, 490, '2026-10-13 06:36:04', '2026-10-13 06:36:04'),
(33, 1, 'ECONOMY 21\" Cost-Effective Industrial Pedestal Fan', 'economy-21-cost-effective-industrial-pedestal-fan', 'High-value 21-inch commercial pedestal fan offering dependable air throw at low operational wattage.', '<p>The <strong>ECONOMY 21\" Pedestal Fan</strong> provides industrial cooling performance at an accessible price point for small businesses, shops, and budget installations without sacrificing Hindfan build quality.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 21 inches (530 mm)</li><li><strong>Power Consumption:</strong> 150 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> High-efficiency motor with dual ball bearings</li><li><strong>Blade:</strong> Balanced aluminium blades</li><li><strong>Base:</strong> Heavy-gauge stable base</li></ul>', 'assets/images/products/pedestal_fan_economy_21.jpg', 'Hindfan ECONOMY 21 inch Pedestal Fan', 'Shops, Small Workshops & Agricultural Units', '2026-01-01 00:00:00', 'http://hindfan.com', '21 Inch Sweep, 150W, 1400 RPM, Dual Bearings, Balanced Blades', 'ECONOMY 21\" Pedestal Fan | Hindson Industries', 'ECONOMY 21 inch pedestal fan by Hindfan. Low power consumption, 1400 RPM, high-value industrial cooling.', 0, 'published', 20, 430, '2026-10-13 06:36:04', '2026-10-13 06:36:04'),
(34, 1, 'ECONOMY 23\" Heavy-Duty Commercial Pedestal Fan', 'economy-23-heavy-duty-commercial-pedestal-fan', 'Dependable 23-inch commercial pedestal fan designed for expansive air spread in warehouses and event venues.', '<p>The <strong>ECONOMY 23\" Pedestal Fan</strong> offers broad air circulation for budget-conscious commercial installations, event spaces, and community halls with Hindfan reliability.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 23 inches (585 mm)</li><li><strong>Power Consumption:</strong> 170 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> Heavy duty motor with ball bearings</li><li><strong>Blade:</strong> Aerodynamic aluminium blades</li><li><strong>Guard:</strong> Rigid protective wire grill</li></ul>', 'assets/images/products/pedestal_fan_economy_23.jpg', 'Hindfan ECONOMY 23 inch Pedestal Fan', 'Warehouses & Community Halls', '2026-01-01 00:00:00', 'http://hindfan.com', '23 Inch Sweep, 170W, 1400 RPM, Rigid Wire Grill, Aerodynamic Blades', 'ECONOMY 23\" Pedestal Fan | Hindson Industries', 'Hindfan ECONOMY 23 inch commercial pedestal fan. 170W motor, 1400 RPM, large air sweep.', 0, 'published', 21, 380, '2026-10-13 06:36:04', '2026-10-13 06:36:04'),
(35, 1, 'ECONOMY 26\" High-Capacity Industrial Pedestal Fan', 'economy-26-high-capacity-industrial-pedestal-fan', 'Massive 26-inch commercial fan designed to move large air volumes across large open areas and factories.', '<p>The <strong>ECONOMY 26\" Pedestal Fan</strong> delivers maximum air displacement for large factory shop floors, manufacturing sheds, and outdoor gathering spaces.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 26 inches (660 mm)</li><li><strong>Power Consumption:</strong> 190 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> Heavy-duty motor with continuous rating</li><li><strong>Blade:</strong> 26\" wide-chord balanced aluminium blades</li><li><strong>Base:</strong> Weighted stable floor base</li></ul>', 'assets/images/products/pedestal_fan_economy_26.jpg', 'Hindfan ECONOMY 26 inch Pedestal Fan', 'Large Factories & Open Marquees', '2026-01-01 00:00:00', 'http://hindfan.com', '26 Inch Sweep, 190W, 1400 RPM, 26\" Blades, Continuous Duty', 'ECONOMY 26\" Pedestal Fan | Hindson Industries', 'ECONOMY 26 inch industrial air circulator pedestal fan by Hindfan. 190W, 1400 RPM, massive air volume.', 0, 'published', 22, 360, '2026-10-13 06:36:04', '2026-10-13 06:36:04'),
(36, 3, '30\" Heavy Duty Industrial Tent Cooler', '30-heavy-duty-industrial-tent-cooler', 'High-capacity 30-inch industrial air cooler engineered for tent houses, banquet lawns, and large event gatherings.', '<p>The <strong>30\" Industrial Tent Cooler</strong> by Hindson Industries is specifically developed for event organizers, tent suppliers, catering firms, and large industrial sheds. Designed to handle severe summer heat, it combines a high-velocity 30-inch fan with a heavy-duty steel body and high air throw.</p><h3>Technical Specifications</h3><ul><li><strong>Fan Sweep:</strong> 30 inches (750 mm)</li><li><strong>Body Construction:</strong> Heavy-gauge galvanized sheet with anti-corrosive powder coating</li><li><strong>Motor:</strong> 100% Pure Copper Winding High-Torque Motor</li><li><strong>Air Throw:</strong> Powerful extended air throw for large pandals and halls</li><li><strong>Application:</strong> Marquee tents, banquet halls, industrial plants, open lawns</li><li><strong>Mobility:</strong> Heavy castor wheels for effortless positioning</li></ul>', 'assets/images/products/tent_cooler_30.jpg', 'Hindfan 30 inch Industrial Tent Cooler', 'Tent Houses, Banquet Lawns & Caterers', '2026-01-01 00:00:00', 'http://hindfan.com', '30 Inch Fan Sweep, Heavy Steel Body, Pure Copper Motor, Castor Wheels, High Air Throw', '30\" Heavy Duty Industrial Tent Cooler | Hindfan', 'Hindson Industries 30 inch industrial tent cooler. Heavy-duty metal body, copper motor, designed for tents and banquets.', 1, 'published', 23, 741, '2026-10-13 06:36:04', '2026-10-13 06:40:39'),
(37, 7, 'FRESHAIR Domestic Ventilation Fan (9\" & 12\")', 'freshair-domestic-ventilation-fan-9-12-inch', 'Quiet domestic and commercial fresh air exhaust fan available in 9-inch and 12-inch sizes with pure copper winding.', '<p>The <strong>FRESHAIR Domestic Fan</strong> by Hindson Industries delivers rapid air exchange for kitchens, bathrooms, commercial cabins, and small storage rooms. Built with precision copper winding for silent, vibration-free, continuous operation.</p><h3>Technical Specifications</h3><ul><li><strong>Available Sizes:</strong> 9 inches (225 mm) and 12 inches (300 mm)</li><li><strong>Power Consumption:</strong> 55 Watts - 75 Watts</li><li><strong>Operating Speed:</strong> 1350 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Copper Winding</li><li><strong>Blades:</strong> High-efficiency steel/metal blades</li><li><strong>Frame:</strong> Rust-resistant epoxy powder coated housing</li><li><strong>Application:</strong> Domestic kitchens, restrooms, office cabins, pantry rooms</li></ul>', 'assets/images/products/freshair_fan_domestic.jpg', 'Hindfan FRESHAIR Domestic Ventilation Fan', 'Domestic Kitchens, Commercial Cabins & Bathrooms', '2026-01-01 00:00:00', 'http://hindfan.com', '9\" & 12\" Sizes, 55W-75W, 1350 RPM, 100% Copper Motor, Silent Operation', 'FRESHAIR Domestic Exhaust Fan (9\" & 12\") | Hindfan', 'Buy Hindfan FRESHAIR domestic ventilation fan in 9 and 12 inch sizes. 100% copper motor, 1350 RPM, whisper quiet.', 1, 'published', 24, 511, '2026-10-13 06:36:04', '2026-10-13 06:40:39'),
(38, 7, 'TRANSAIR 12\" Heavy Duty Industrial Exhaust Fan', 'transair-12-heavy-duty-industrial-exhaust-fan', 'Rugged 12-inch industrial exhaust fan with double ball bearing copper motor for commercial kitchens and factories.', '<p>The <strong>TRANSAIR Heavy Duty Industrial Exhaust Fan</strong> is built to rapidly extract smoke, fumes, heat, and airborne particulate from commercial kitchens, restaurant ovens, welding shops, and factory floors.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep / Size:</strong> 12 inches (300 mm)</li><li><strong>Power Consumption:</strong> 90W - 120W</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor:</strong> 100% Electrolytic Copper Winding, Dual Heavy Ball Bearings</li><li><strong>Frame & Guard:</strong> Heavy-gauge welded steel frame with wire safety guard</li><li><strong>Blades:</strong> Heavy-duty aerodynamic steel impeller blades</li><li><strong>Application:</strong> Commercial kitchens, bakeries, factories, workshops, boiler rooms</li></ul>', 'assets/images/products/exhaust_fan_transair.jpg', 'Hindfan TRANSAIR 12 inch Industrial Exhaust Fan', 'Commercial Kitchens, Factories & Welding Shops', '2026-01-01 00:00:00', 'http://hindfan.com', '12 Inch Sweep, 90W-120W, 1400 RPM, Heavy Steel Frame, Double Ball Bearings', 'TRANSAIR 12\" Heavy Duty Industrial Exhaust Fan | Hindfan', 'Hindfan TRANSAIR 12 inch heavy duty industrial exhaust fan. Copper motor, double ball bearings, 1400 RPM.', 1, 'published', 25, 671, '2026-10-13 06:36:04', '2026-10-13 06:40:39'),
(39, 2, 'SANJIVNI Domestic Madhani Milk Churner (3-5 KG)', 'sanjivni-domestic-madhani-milk-churner-3-5-kg', 'Reliable household electric madhani churner featuring a 70W copper motor and food-grade stainless spinor.', '<p>The <strong>SANJIVNI Madhani</strong> is an authentic Punjab household favorite engineered by Hindson Industries. Designed for daily churning of curd to yield pure butter (makhan) and buttermilk (lassi) effortlessly in minutes.</p><h3>Technical Specifications</h3><ul><li><strong>Batch Capacity:</strong> 3 to 5 KG</li><li><strong>Power Consumption:</strong> 70 Watts</li><li><strong>Motor Winding:</strong> 100% Pure Copper Magnet Wire</li><li><strong>Spinor:</strong> Food-grade stainless steel & aluminium spinor</li><li><strong>Body & Pillar:</strong> Heavy chrome-plated stand with secure pot clamp</li><li><strong>Operation:</strong> Smooth reversible two-way rotary churn mechanism</li></ul>', 'assets/images/products/madhani_sanjivni.jpg', 'Hindfan SANJIVNI Domestic Madhani Churner', 'Households & Rural Dairy Kitchens', '2026-01-01 00:00:00', 'http://hindfan.com', '3-5 KG Capacity, 70W, 100% Copper Motor, Food-Grade Spinor, Chrome Plated', 'SANJIVNI Domestic Madhani Churner (3-5 KG) | Hindfan', 'Original HIND SANJIVNI Madhani milk churner 3-5 kg. 70W copper motor, food-grade spinor, authentic butter churning.', 1, 'published', 26, 891, '2026-10-13 06:36:04', '2026-10-13 06:40:39'),
(40, 2, 'SUKHMANI Dairy Madhani Churner (10-15 KG)', 'sukhmani-dairy-madhani-churner-10-15-kg', 'Medium-scale dairy madhani churner with 110W heavy-duty copper motor for 10-15 KG milk/curd churning.', '<p>The <strong>SUKHMANI Madhani</strong> bridges the gap between home churners and heavy industrial units, ideal for sweet makers (Halwai), small dairy cooperatives, and rural farmsteads processing 10 to 15 kg batches.</p><h3>Technical Specifications</h3><ul><li><strong>Batch Capacity:</strong> 10 to 15 KG</li><li><strong>Power Consumption:</strong> 110 Watts</li><li><strong>Motor Construction:</strong> Heavy-duty pure copper winding with thermal protection</li><li><strong>Spinor:</strong> Heavy-gauge food-grade churning spinor</li><li><strong>Base & Clamping:</strong> Sturdy cast iron base with vibration dampers</li><li><strong>Application:</strong> Halwai shops, dairy milk collection centers, rural farms</li></ul>', 'assets/images/products/madhani_sukhmani.jpg', 'Hindfan SUKHMANI Dairy Madhani Churner', 'Halwai Shops & Small Dairy Cooperatives', '2026-01-01 00:00:00', 'http://hindfan.com', '10-15 KG Capacity, 110W, Pure Copper Winding, Heavy Food Spinor, Cast Iron Stand', 'SUKHMANI Dairy Madhani Churner (10-15 KG) | Hindfan', 'Buy Hindfan SUKHMANI 10-15 KG dairy madhani churner. 110W pure copper motor for halwai shops and small dairies.', 1, 'published', 27, 760, '2026-10-13 06:36:04', '2026-10-13 06:36:04'),
(41, 1, '30\" MOVEABLE Heavy Duty Industrial Pedestal Fan', '30-moveable-heavy-duty-industrial-pedestal-fan', 'Flagship 30-inch industrial air circulator on a moveable wheel trolley base with 250W high-torque copper motor.', '<p>The <strong>30\" MOVEABLE Heavy Duty Pedestal Fan</strong> is Hindson Industries\' most powerful mobile ventilation unit. Built on a heavy wheeled trolley frame, it allows one operator to effortlessly roll massive cooling power across shop floors, shipping bays, aircraft hangars, or outdoor exhibitions.</p><h3>Technical Specifications</h3><ul><li><strong>Sweep:</strong> 30 inches (750 mm)</li><li><strong>Power Consumption:</strong> 250 Watts</li><li><strong>Operating Speed:</strong> 1400 RPM</li><li><strong>Motor Construction:</strong> 100% Pure Copper Winding, Dual Heavy-Duty Sealed Ball Bearings</li><li><strong>Blades:</strong> 3-Leaf Heavy-Duty Aerodynamic Aluminium Blades</li><li><strong>Base:</strong> Heavy-duty trolley base equipped with industrial castor wheels</li><li><strong>Safety:</strong> High-gauge close-mesh steel finger guard</li><li><strong>Application:</strong> Heavy industrial plants, steel fabrication yards, railway depots, large event pandals</li></ul>', 'assets/images/products/pedestal_fan_moveable_30.jpg', 'Hindfan 30 inch Moveable Heavy Duty Pedestal Fan', 'Heavy Industrial Plants, Marquees & Warehouses', '2026-01-01 00:00:00', 'http://hindfan.com', '30 Inch Sweep, 250W, 1400 RPM, Moveable Trolley Base, Castor Wheels, 100% Copper', '30\" MOVEABLE Heavy Duty Pedestal Fan | Hindson Industries', 'Hindfan 30 inch MOVEABLE heavy duty industrial pedestal fan with wheel trolley base. 250W copper motor, 1400 RPM.', 1, 'published', 28, 831, '2026-10-13 06:36:04', '2026-10-13 06:40:39');

-- --------------------------------------------------------
-- Table structure for table `project_images`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `project_images`;
CREATE TABLE IF NOT EXISTS `project_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_images_project_id_foreign` (`project_id`),
  CONSTRAINT `project_images_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `project_images`
INSERT INTO `project_images` (`id`, `project_id`, `image_path`, `alt_text`, `caption`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/images/products/pedestal_fan_chidhi.jpg', 'CHIDHI 21\" Heavy Duty Industrial Pedestal Fan - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(2, 2, 'assets/images/products/pedestal_fan_chidhi_special.jpg', 'CHIDHI 21\" Special High-Speed Edition - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(3, 2, 'assets/images/banner-1.jpg', 'CHIDHI 21\" Special High-Speed Edition - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(4, 3, 'assets/images/products/pedestal_fan_dabbi.jpg', 'DABBI 21\" Compact Heavy-Duty Fan - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(5, 4, 'assets/images/products/pedestal_fan_26.jpg', 'Hindfan 26\" Commercial Air Circulator - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(6, 4, 'assets/images/banner-1.jpg', 'Hindfan 26\" Commercial Air Circulator - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(7, 5, 'assets/images/products/pedestal_fan_wall.jpg', 'Industrial Heavy-Duty Wall Fan (21\" - 30\") - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(8, 6, 'assets/images/products/pedestal_fan_bracket.jpg', 'Adjustable Industrial Bracket Fan Series - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(9, 6, 'assets/images/banner-1.jpg', 'Adjustable Industrial Bracket Fan Series - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(10, 7, 'assets/images/products/madhani_elegant.jpg', 'ELEGANT Domestic Madhani Churner (3-5 KG) - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(11, 8, 'assets/images/products/madhani_heavy.jpg', 'HEAVY Dairy Madhani Churner (15-20 KG) - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(12, 8, 'assets/images/banner-1.jpg', 'HEAVY Dairy Madhani Churner (15-20 KG) - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(13, 9, 'assets/images/products/madhani_supreme.jpg', 'SUPREME Commercial Madhani (25-30 KG) - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(14, 10, 'assets/images/products/madhani_samrat.jpg', 'SAMRAT Mega Dairy Madhani (40-50 KG) - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(15, 10, 'assets/images/banner-1.jpg', 'SAMRAT Mega Dairy Madhani (40-50 KG) - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(16, 11, 'assets/images/products/madhani_majestic.jpg', 'MAJESTIC Mega Industrial Madhani (70-80 KG) - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(17, 12, 'assets/images/products/tent_fan_clump.jpg', 'Event & Tent Heavy Clump Fan 21\" - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(18, 12, 'assets/images/banner-1.jpg', 'Event & Tent Heavy Clump Fan 21\" - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(19, 13, 'assets/images/products/tent_fan_26.jpg', 'Tent & Pavilion High-Rise Pedestal Fan 26\" - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(20, 14, 'assets/images/products/water_mist_fan.jpg', 'Outdoor High-Pressure Water Mist Fan 26\" - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(21, 14, 'assets/images/banner-1.jpg', 'Outdoor High-Pressure Water Mist Fan 26\" - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(22, 15, 'assets/images/products/coller_motors.jpg', 'Hind Precision 110 Dia Cooler Motor Series - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(23, 16, 'assets/images/products/pedestal_fan_23.jpg', 'Next-Gen Solar DC Pedestal Prototype (In Development) - Primary View', 'Engineered for maximum endurance and performance', 1, '2026-10-10 02:07:26', '2026-10-10 02:07:26'),
(24, 16, 'assets/images/banner-1.jpg', 'Next-Gen Solar DC Pedestal Prototype (In Development) - Manufacturing Floor', 'Precision manufacturing in our Bathinda facility', 2, '2026-10-10 02:07:26', '2026-10-10 02:07:26');

-- --------------------------------------------------------
-- Table structure for table `inquiries`
-- --------------------------------------------------------

DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_needed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table `inquiries`
INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `subject`, `service_needed`, `message`, `is_read`, `ip_address`, `created_at`, `updated_at`) VALUES
(12, 'Automated Test User', 'testuser@example.com', '+91-9876543210', 'Inquiry for Industrial Fans', 'Pedestal Fans', 'This is a test inquiry message with more than 10 characters to test backend validation.', 0, '127.0.0.1', '2026-10-10 03:05:10', '2026-10-10 03:05:10'),
(13, 'Automated Test User', 'testuser@example.com', '+91-9876543210', 'Inquiry for Industrial Fans', 'Pedestal Fans', 'This is a test inquiry message with more than 10 characters to test backend validation.', 0, '127.0.0.1', '2026-10-10 04:43:11', '2026-10-10 04:43:11'),
(14, 'Automated Test User', 'testuser@example.com', '+91-9876543210', 'Inquiry for Industrial Fans', 'Pedestal Fans', 'This is a test inquiry message with more than 10 characters to test backend validation.', 0, '127.0.0.1', '2026-10-10 10:56:50', '2026-10-10 10:56:50'),
(15, 'Automated Test User', 'testuser@example.com', '+91-9876543210', 'Inquiry for Industrial Fans', 'Pedestal Fans', 'This is a test inquiry message with more than 10 characters to test backend validation.', 0, '127.0.0.1', '2026-10-12 09:02:34', '2026-10-12 09:02:34');

SET FOREIGN_KEY_CHECKS = 1;
