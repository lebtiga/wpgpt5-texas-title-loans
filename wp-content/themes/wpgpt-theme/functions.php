<?php

if (!defined('ABSPATH')) {
    exit;
}

function wpgpt_enqueue_assets(): void {
    $theme_version = wp_get_theme()->get('Version') ?: '0.1.0';

    // Main stylesheet - in root assets folder
    wp_enqueue_style(
        'wpgpt-main',
        get_template_directory_uri() . '/../../assets/css/main.css',
        [],
        $theme_version
    );
    
    // Sales page CSS for homepage
    if (is_front_page()) {
        wp_enqueue_style(
            'sales-page',
            get_template_directory_uri() . '/../../assets/css/sales-page.css',
            ['wpgpt-main'],
            '1.0.0'
        );
    }

    // Main script - in root assets folder
    wp_enqueue_script(
        'wpgpt-main',
        get_template_directory_uri() . '/../../assets/js/main.js',
        [],
        $theme_version,
        true
    );
    
    // Sales page JavaScript for homepage
    if (is_front_page()) {
        wp_enqueue_script(
            'sales-page',
            get_template_directory_uri() . '/../../assets/js/sales-page.js',
            ['wpgpt-main'],
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'wpgpt_enqueue_assets');

function wpgpt_theme_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height'      => 40,
        'width'       => 160,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    
    // Elementor support
    add_theme_support('elementor');

    register_nav_menus([
        'primary' => __('Primary Menu', 'wpgpt'),
        'footer'  => __('Footer Menu', 'wpgpt'),
    ]);
}
add_action('after_setup_theme', 'wpgpt_theme_setup');

function wpgpt_register_assets_paths(): void {
    // Preload fonts or other assets here later
}
add_action('init', 'wpgpt_register_assets_paths');

/**
 * Theme Customizer: basic business settings
 */
function wpgpt_customize_register(WP_Customize_Manager $wp_customize): void {
    $wp_customize->add_section('wpgpt_business', [
        'title'       => __('Business Settings', 'wpgpt'),
        'description' => __('Phone number, primary CTA, and hero image.', 'wpgpt'),
        'priority'    => 30,
    ]);

    $wp_customize->add_setting('wpgpt_phone', [
        'default'           => '888-224-8177',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('wpgpt_phone', [
        'type'    => 'text',
        'section' => 'wpgpt_business',
        'label'   => __('Phone number', 'wpgpt'),
    ]);

    $wp_customize->add_setting('wpgpt_cta_label', [
        'default'           => 'Get Started',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('wpgpt_cta_label', [
        'type'    => 'text',
        'section' => 'wpgpt_business',
        'label'   => __('Primary CTA label', 'wpgpt'),
    ]);

    $wp_customize->add_setting('wpgpt_cta_link', [
        'default'           => '#apply',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('wpgpt_cta_link', [
        'type'    => 'url',
        'section' => 'wpgpt_business',
        'label'   => __('Primary CTA link', 'wpgpt'),
    ]);

    $wp_customize->add_setting('wpgpt_hero_image_url', [
        'default'           => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?q=80&w=1200&auto=format&fit=crop',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('wpgpt_hero_image_url', [
        'type'    => 'url',
        'section' => 'wpgpt_business',
        'label'   => __('Hero image URL', 'wpgpt'),
    ]);
}
add_action('customize_register', 'wpgpt_customize_register');

// Add logo URL as a simple setting for convenience (in addition to WP custom logo)
function wpgpt_customize_register_logo(WP_Customize_Manager $wp_customize): void {
    $wp_customize->add_setting('wpgpt_logo_url', [
        'default'           => 'https://ezcar.blckpanda.com/wp-content/uploads/2020/07/eztitleloans-logoAT2x.webp',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('wpgpt_logo_url', [
        'type'    => 'url',
        'section' => 'title_tagline',
        'label'   => __('Logo image URL (optional)', 'wpgpt'),
    ]);
}
add_action('customize_register', 'wpgpt_customize_register_logo');

// Texas SEO Cluster tool has been removed - clean theme functions only

/**
 * Get city-specific data for templates
 */
if (!function_exists('get_city_data')) {
    function get_city_data($city_slug) {
        $cities_data = [
            'houston' => [
                'name' => 'Houston',
                'nickname' => 'Space City',
                'county' => 'Harris',
                'zip' => '77002',
                'latitude' => '29.7604',
                'longitude' => '-95.3698',
                'image' => 'https://images.unsplash.com/photo-1583153663683-8b30c813c746?w=640&h=420&fit=crop',
                'description' => 'Texas\'s largest city and energy capital of the world',
                'economic_info' => 'Houston\'s economy is driven by energy, healthcare, aerospace, and the Port of Houston.',
                'vehicle_culture' => 'Houston\'s truck and SUV culture means higher average loan amounts.',
                'economic_factors' => 'The energy sector volatility and hurricane season create unique financial needs for Houston residents.',
                'areas' => [
                    ['name' => 'Downtown Houston', 'description' => 'Financial district and theater district'],
                    ['name' => 'Galleria/Uptown', 'description' => 'Shopping and business district'],
                    ['name' => 'The Heights', 'description' => 'Historic neighborhood with Victorian homes'],
                    ['name' => 'Katy', 'description' => 'Fast-growing suburban community'],
                    ['name' => 'Sugar Land', 'description' => 'Master-planned communities'],
                    ['name' => 'The Woodlands', 'description' => 'Master-planned forest community']
                ],
                'nearby_cities' => ['San Antonio', 'Austin', 'Dallas', 'Corpus Christi']
            ],
            'san-antonio' => [
                'name' => 'San Antonio',
                'nickname' => 'Alamo City',
                'county' => 'Bexar',
                'zip' => '78205',
                'latitude' => '29.4241',
                'longitude' => '-98.4936',
                'image' => 'https://images.unsplash.com/photo-1518709594023-6eab9bab7b23?w=640&h=420&fit=crop',
                'description' => 'home to the Alamo and rich military heritage',
                'economic_info' => 'San Antonio\'s economy is anchored by military bases, tourism, and healthcare.',
                'vehicle_culture' => 'Mix of trucks for ranching areas and compact cars for city driving.',
                'economic_factors' => 'Military presence and tourism industry create steady employment but variable income patterns.',
                'areas' => [
                    ['name' => 'Downtown', 'description' => 'River Walk and business district'],
                    ['name' => 'Alamo Heights', 'description' => 'Upscale residential area'],
                    ['name' => 'Stone Oak', 'description' => 'Suburban master-planned community'],
                    ['name' => 'Medical Center', 'description' => 'Healthcare employment hub'],
                    ['name' => 'Southtown', 'description' => 'Arts district'],
                    ['name' => 'Northwest Side', 'description' => 'Growing suburban area']
                ],
                'nearby_cities' => ['Austin', 'Houston', 'Corpus Christi', 'Laredo']
            ],
            'dallas' => [
                'name' => 'Dallas',
                'nickname' => 'Big D',
                'county' => 'Dallas',
                'zip' => '75201',
                'latitude' => '32.7767',
                'longitude' => '-96.7970',
                'image' => 'https://images.unsplash.com/photo-1545194445-dddb8f4487c6?w=640&h=420&fit=crop',
                'description' => 'a major business and cultural hub in North Texas',
                'economic_info' => 'Dallas has a diverse economy with banking, commerce, telecommunications, and technology.',
                'vehicle_culture' => 'Mix of luxury vehicles in uptown and practical trucks in suburbs.',
                'economic_factors' => 'Corporate headquarters and tech industry provide stable employment with higher average incomes.',
                'areas' => [
                    ['name' => 'Downtown Dallas', 'description' => 'Business and arts district'],
                    ['name' => 'Uptown', 'description' => 'Upscale residential and nightlife'],
                    ['name' => 'Deep Ellum', 'description' => 'Entertainment district'],
                    ['name' => 'Highland Park', 'description' => 'Affluent residential area'],
                    ['name' => 'Oak Cliff', 'description' => 'Historic diverse neighborhood'],
                    ['name' => 'North Dallas', 'description' => 'Business corridor']
                ],
                'nearby_cities' => ['Fort Worth', 'Arlington', 'Plano', 'Houston']
            ],
            'austin' => [
                'name' => 'Austin',
                'nickname' => 'Live Music Capital',
                'county' => 'Travis',
                'zip' => '78701',
                'latitude' => '30.2672',
                'longitude' => '-97.7431',
                'image' => 'https://images.unsplash.com/photo-1531218150217-54595bc2b934?w=640&h=420&fit=crop',
                'description' => 'the state capital and technology hub',
                'economic_info' => 'Austin\'s economy is driven by technology, government, and education.',
                'vehicle_culture' => 'Eco-friendly vehicles popular alongside traditional Texas trucks.',
                'economic_factors' => 'Tech industry growth and startup culture create variable income patterns.',
                'areas' => [
                    ['name' => 'Downtown Austin', 'description' => '6th Street and business district'],
                    ['name' => 'South Congress', 'description' => 'Trendy shopping and dining'],
                    ['name' => 'East Austin', 'description' => 'Rapidly developing area'],
                    ['name' => 'Westlake', 'description' => 'Affluent suburban area'],
                    ['name' => 'Round Rock', 'description' => 'Tech industry suburb'],
                    ['name' => 'Cedar Park', 'description' => 'Family-friendly suburb']
                ],
                'nearby_cities' => ['San Antonio', 'Houston', 'Dallas', 'Fort Worth']
            ],
            'fort-worth' => [
                'name' => 'Fort Worth',
                'nickname' => 'Cowtown',
                'county' => 'Tarrant',
                'zip' => '76102',
                'latitude' => '32.7555',
                'longitude' => '-97.3308',
                'image' => 'https://images.unsplash.com/photo-1566996675874-afec32a6e5f3?w=640&h=420&fit=crop',
                'description' => 'where the West begins with rich cowboy heritage',
                'economic_info' => 'Fort Worth\'s economy includes aerospace, oil and gas, and healthcare.',
                'vehicle_culture' => 'Trucks dominate due to ranching heritage and blue-collar workforce.',
                'economic_factors' => 'Defense contractors and energy sector provide stable employment.',
                'areas' => [
                    ['name' => 'Downtown', 'description' => 'Sundance Square entertainment'],
                    ['name' => 'Cultural District', 'description' => 'Museums and arts'],
                    ['name' => 'Stockyards', 'description' => 'Historic cattle district'],
                    ['name' => 'West 7th', 'description' => 'Shopping and dining'],
                    ['name' => 'TCU Area', 'description' => 'University neighborhood'],
                    ['name' => 'Alliance', 'description' => 'Business corridor']
                ],
                'nearby_cities' => ['Dallas', 'Arlington', 'Plano', 'Austin']
            ],
            'el-paso' => [
                'name' => 'El Paso',
                'nickname' => 'Sun City',
                'county' => 'El Paso',
                'zip' => '79901',
                'latitude' => '31.7619',
                'longitude' => '-106.4850',
                'image' => 'https://images.unsplash.com/photo-1570125909517-53cb950c7e2f?w=640&h=420&fit=crop',
                'description' => 'a major border city with unique bicultural character',
                'economic_info' => 'El Paso\'s economy is driven by military, trade, and manufacturing.',
                'vehicle_culture' => 'Practical vehicles suited for desert climate and cross-border travel.',
                'economic_factors' => 'Fort Bliss military base and border trade create unique economic conditions.',
                'areas' => [
                    ['name' => 'Downtown', 'description' => 'Historic business district'],
                    ['name' => 'West El Paso', 'description' => 'Affluent residential area'],
                    ['name' => 'East El Paso', 'description' => 'Military families area'],
                    ['name' => 'Northeast', 'description' => 'Growing suburban area'],
                    ['name' => 'Mission Valley', 'description' => 'Historic area'],
                    ['name' => 'Upper Valley', 'description' => 'Agricultural area']
                ],
                'nearby_cities' => ['Las Cruces, NM', 'Juárez, Mexico', 'Lubbock', 'San Antonio']
            ],
            'arlington' => [
                'name' => 'Arlington',
                'nickname' => 'Entertainment Capital of Texas',
                'county' => 'Tarrant',
                'zip' => '76010',
                'latitude' => '32.7357',
                'longitude' => '-97.1081',
                'image' => 'https://images.unsplash.com/photo-1584464529071-4ced42e87879?w=640&h=420&fit=crop',
                'description' => 'home to major sports teams and theme parks',
                'economic_info' => 'Arlington\'s economy benefits from entertainment, education, and manufacturing.',
                'vehicle_culture' => 'Family vehicles and trucks popular for suburban lifestyle.',
                'economic_factors' => 'Entertainment industry and UTA provide diverse employment opportunities.',
                'areas' => [
                    ['name' => 'Entertainment District', 'description' => 'Cowboys and Rangers stadiums'],
                    ['name' => 'Downtown Arlington', 'description' => 'Historic city center'],
                    ['name' => 'UTA Area', 'description' => 'University district'],
                    ['name' => 'North Arlington', 'description' => 'Residential neighborhoods'],
                    ['name' => 'South Arlington', 'description' => 'Diverse communities'],
                    ['name' => 'Viridian', 'description' => 'Master-planned community']
                ],
                'nearby_cities' => ['Dallas', 'Fort Worth', 'Grand Prairie', 'Irving']
            ],
            'plano' => [
                'name' => 'Plano',
                'nickname' => 'Corporate Capital',
                'county' => 'Collin',
                'zip' => '75074',
                'latitude' => '33.0198',
                'longitude' => '-96.6989',
                'image' => 'https://images.unsplash.com/photo-1609343965906-cf6b600e56cf?w=640&h=420&fit=crop',
                'description' => 'an affluent suburb with major corporate headquarters',
                'economic_info' => 'Plano hosts numerous corporate headquarters and tech companies.',
                'vehicle_culture' => 'Luxury vehicles and SUVs reflect higher income demographics.',
                'economic_factors' => 'Corporate relocations and tech industry provide high-paying jobs.',
                'areas' => [
                    ['name' => 'Legacy West', 'description' => 'Corporate and shopping district'],
                    ['name' => 'Downtown Plano', 'description' => 'Historic arts district'],
                    ['name' => 'Willow Bend', 'description' => 'Upscale residential area'],
                    ['name' => 'West Plano', 'description' => 'New development area'],
                    ['name' => 'East Plano', 'description' => 'Established neighborhoods'],
                    ['name' => 'Shops at Legacy', 'description' => 'Entertainment district']
                ],
                'nearby_cities' => ['Dallas', 'Richardson', 'Frisco', 'Allen']
            ],
            'corpus-christi' => [
                'name' => 'Corpus Christi',
                'nickname' => 'Sparkling City by the Sea',
                'county' => 'Nueces',
                'zip' => '78401',
                'latitude' => '27.8006',
                'longitude' => '-97.3964',
                'image' => 'https://images.unsplash.com/photo-1571747219227-67ab10e24d38?w=640&h=420&fit=crop',
                'description' => 'a coastal city with beaches and port industry',
                'economic_info' => 'Corpus Christi\'s economy relies on oil refining, petrochemicals, and tourism.',
                'vehicle_culture' => 'Trucks and SUVs popular for beach access and outdoor activities.',
                'economic_factors' => 'Oil industry and tourism create seasonal employment patterns.',
                'areas' => [
                    ['name' => 'Downtown', 'description' => 'Marina and business district'],
                    ['name' => 'Southside', 'description' => 'Residential neighborhoods'],
                    ['name' => 'Padre Island', 'description' => 'Beach communities'],
                    ['name' => 'Flour Bluff', 'description' => 'Naval air station area'],
                    ['name' => 'Calallen', 'description' => 'Northwest community'],
                    ['name' => 'Bay Area', 'description' => 'Waterfront properties']
                ],
                'nearby_cities' => ['San Antonio', 'Houston', 'Laredo', 'Victoria']
            ],
            'lubbock' => [
                'name' => 'Lubbock',
                'nickname' => 'Hub City',
                'county' => 'Lubbock',
                'zip' => '79401',
                'latitude' => '33.5779',
                'longitude' => '-101.8552',
                'image' => 'https://images.unsplash.com/photo-1566401303406-e3e2c7c0f3d9?w=640&h=420&fit=crop',
                'description' => 'a major agricultural and education center in West Texas',
                'economic_info' => 'Lubbock\'s economy is based on agriculture, education, and healthcare.',
                'vehicle_culture' => 'Trucks essential for agricultural work and rural lifestyle.',
                'economic_factors' => 'Texas Tech University and cotton industry provide economic stability.',
                'areas' => [
                    ['name' => 'Downtown', 'description' => 'Historic district'],
                    ['name' => 'Tech Terrace', 'description' => 'University area'],
                    ['name' => 'South Lubbock', 'description' => 'New development'],
                    ['name' => 'North Lubbock', 'description' => 'Established neighborhoods'],
                    ['name' => 'West Lubbock', 'description' => 'Suburban growth'],
                    ['name' => 'Depot District', 'description' => 'Entertainment area']
                ],
                'nearby_cities' => ['Amarillo', 'Midland', 'Odessa', 'El Paso']
            ]
        ];
        
        return isset($cities_data[$city_slug]) ? $cities_data[$city_slug] : $cities_data['houston'];
    }
}
