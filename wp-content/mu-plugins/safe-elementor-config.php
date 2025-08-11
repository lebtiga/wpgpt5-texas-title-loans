<?php
/**
 * Safe Elementor configuration
 * Only configures settings, doesn't force activation
 */

// Only run configuration if Elementor is active
add_action('init', function() {
    // Check if Elementor is in active plugins
    $active_plugins = get_option('active_plugins', array());
    
    if (in_array('elementor/elementor.php', $active_plugins)) {
        // Configure Elementor for performance (run once)
        if (!get_option('wpgpt_elementor_configured_v2')) {
            // Elementor performance settings
            update_option('elementor_disable_color_schemes', 'yes');
            update_option('elementor_disable_typography_schemes', 'yes');
            update_option('elementor_experiment-container', 'active');
            update_option('elementor_experiment-e_optimized_assets_loading', 'active');
            update_option('elementor_experiment-e_optimized_css_loading', 'active');
            update_option('elementor_google_font', ''); // Disable Google fonts
            update_option('elementor_font_display', 'swap');
            
            // Disable unnecessary features
            update_option('elementor_enable_inspector', '');
            update_option('elementor_editor_break_lines', '1');
            
            // Set default content width
            update_option('elementor_container_width', '1140');
            update_option('elementor_space_between_widgets', '20');
            
            // Mark as configured
            update_option('wpgpt_elementor_configured_v2', true);
        }
    }
});