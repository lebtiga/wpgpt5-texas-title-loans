<?php
/**
 * Texas Title Loans Auto-Setup
 * Automatically creates 50 SEO-optimized pages on deployment
 * 
 * This must-use plugin runs automatically and creates:
 * - 10 City pages
 * - 5 Service pages  
 * - 35 City-Service combination pages
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include dependencies
require_once __DIR__ . '/includes/page-content-generator.php';
require_once __DIR__ . '/includes/content-templates.php';

class Texas_Loans_Auto_Setup {
    
    private $cities = [
        'houston' => 'Houston',
        'san-antonio' => 'San Antonio',
        'dallas' => 'Dallas',
        'austin' => 'Austin',
        'fort-worth' => 'Fort Worth',
        'el-paso' => 'El Paso',
        'arlington' => 'Arlington',
        'plano' => 'Plano',
        'corpus-christi' => 'Corpus Christi',
        'lubbock' => 'Lubbock'
    ];
    
    private $services = [
        'title-loans' => [
            'name' => 'Title Loans',
            'description' => 'Fast cash using your vehicle title as collateral'
        ],
        'online-title-loans' => [
            'name' => 'Online Title Loans',
            'description' => 'Apply online and get approved in minutes'
        ],
        'no-credit-check-title-loans' => [
            'name' => 'No Credit Check Title Loans',
            'description' => 'Get approved regardless of credit history'
        ],
        'emergency-title-loans' => [
            'name' => 'Emergency Title Loans',
            'description' => 'Same-day funding for urgent financial needs'
        ],
        'vehicle-title-loans' => [
            'name' => 'Vehicle Title Loans',
            'description' => 'Loans for cars, trucks, motorcycles, and RVs'
        ]
    ];
    
    public function __construct() {
        add_action('init', [$this, 'run_setup'], 20);
        add_action('init', [$this, 'ensure_elementor_active'], 10);
    }
    
    /**
     * Main setup function
     */
    public function run_setup() {
        // Check if setup already ran
        if (get_option('texas_loans_pages_created_v2') === 'yes') {
            return;
        }
        
        // Only run in admin or during deployment
        if (!is_admin() && !wp_doing_ajax() && !defined('WP_CLI')) {
            return;
        }
        
        // Create all pages
        $this->create_city_pages();
        $this->create_service_pages();
        $this->create_combination_pages();
        
        // Mark setup as complete
        update_option('texas_loans_pages_created_v2', 'yes');
        
        // Log success
        error_log('Texas Loans Auto-Setup: Successfully created 50 pages');
    }
    
    /**
     * Create city hub pages (10 pages)
     */
    private function create_city_pages() {
        $generator = new Page_Content_Generator();
        
        foreach ($this->cities as $slug => $name) {
            // Check if page exists
            $existing = get_page_by_path($slug . '-title-loans');
            if ($existing) {
                continue;
            }
            
            // Generate content
            $content = $generator->generate_city_page_content($slug, $name);
            
            // Create page
            $page_id = wp_insert_post([
                'post_title'    => $name . ' Title Loans - Fast Cash, Keep Your Car',
                'post_name'     => $slug . '-title-loans',
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'post_author'   => 1,
                'meta_input'    => [
                    '_elementor_edit_mode' => 'builder',
                    '_wp_page_template' => 'elementor_header_footer',
                    '_yoast_wpseo_title' => $name . ' Title Loans | Same Day Cash | No Credit Check',
                    '_yoast_wpseo_metadesc' => 'Get ' . $name . ' title loans with same-day approval. Keep driving your car. No credit check required. Apply online or call 888-224-8177.'
                ]
            ]);
            
            if ($page_id) {
                error_log('Created city page: ' . $name);
            }
        }
    }
    
    /**
     * Create service hub pages (5 pages)
     */
    private function create_service_pages() {
        $generator = new Page_Content_Generator();
        
        foreach ($this->services as $slug => $service) {
            // Skip if page exists
            $existing = get_page_by_path($slug);
            if ($existing) {
                continue;
            }
            
            // Generate content
            $content = $generator->generate_service_page_content($slug, $service['name'], $service['description']);
            
            // Create page
            $page_id = wp_insert_post([
                'post_title'    => $service['name'] . ' in Texas - All Major Cities',
                'post_name'     => $slug,
                'post_content'  => $content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'post_author'   => 1,
                'meta_input'    => [
                    '_elementor_edit_mode' => 'builder',
                    '_wp_page_template' => 'elementor_header_footer',
                    '_yoast_wpseo_title' => $service['name'] . ' Texas | 10 Major Cities | Fast Approval',
                    '_yoast_wpseo_metadesc' => $service['description'] . ' Available in Houston, Dallas, San Antonio, and all major Texas cities.'
                ]
            ]);
            
            if ($page_id) {
                error_log('Created service page: ' . $service['name']);
            }
        }
    }
    
    /**
     * Create city-service combination pages (35 pages)
     */
    private function create_combination_pages() {
        $generator = new Page_Content_Generator();
        
        foreach ($this->cities as $city_slug => $city_name) {
            foreach ($this->services as $service_slug => $service) {
                // Skip main title loans (already created as city pages)
                if ($service_slug === 'title-loans') {
                    continue;
                }
                
                // Check if page exists
                $page_slug = $city_slug . '-' . $service_slug;
                $existing = get_page_by_path($page_slug);
                if ($existing) {
                    continue;
                }
                
                // Generate content
                $content = $generator->generate_combination_page_content(
                    $city_slug, 
                    $city_name, 
                    $service_slug, 
                    $service['name']
                );
                
                // Create page
                $page_id = wp_insert_post([
                    'post_title'    => $service['name'] . ' in ' . $city_name . ', TX',
                    'post_name'     => $page_slug,
                    'post_content'  => $content,
                    'post_status'   => 'publish',
                    'post_type'     => 'page',
                    'post_author'   => 1,
                    'meta_input'    => [
                        '_elementor_edit_mode' => 'builder',
                        '_wp_page_template' => 'elementor_header_footer',
                        '_yoast_wpseo_title' => $service['name'] . ' ' . $city_name . ' TX | Same Day Approval',
                        '_yoast_wpseo_metadesc' => 'Get ' . strtolower($service['name']) . ' in ' . $city_name . ', Texas. ' . $service['description']
                    ]
                ]);
                
                if ($page_id) {
                    error_log('Created combination page: ' . $service['name'] . ' in ' . $city_name);
                }
            }
        }
    }
    
    /**
     * Ensure Elementor is active
     */
    public function ensure_elementor_active() {
        // Check if Elementor is installed and activate if not active
        if (!is_plugin_active('elementor/elementor.php')) {
            $plugin_path = WP_PLUGIN_DIR . '/elementor/elementor.php';
            if (file_exists($plugin_path)) {
                activate_plugin('elementor/elementor.php');
                error_log('Elementor activated');
            }
        }
    }
    
    /**
     * Reset function (for testing)
     */
    public static function reset() {
        delete_option('texas_loans_pages_created_v2');
        error_log('Texas Loans Auto-Setup: Reset complete');
    }
}

// Initialize
new Texas_Loans_Auto_Setup();

// Add WP-CLI command for reset (optional)
if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('texas-loans reset', function() {
        Texas_Loans_Auto_Setup::reset();
        WP_CLI::success('Texas Loans pages reset. They will be recreated on next page load.');
    });
}