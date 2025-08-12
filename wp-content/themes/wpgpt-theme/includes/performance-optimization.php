<?php
/**
 * Performance Optimization for Texas Title Loans
 * Addresses PageSpeed Insights issues
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Replace broken Unsplash images with optimized local alternatives
 * Using placeholder images or solid colors to avoid 404 errors
 */
function wpgpt_replace_broken_images() {
    // Use data URLs for small decorative images to avoid external requests
    define('TEXAS_HERO_BG', 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1080"%3E%3Cdefs%3E%3ClinearGradient id="g" x1="0%25" y1="0%25" x2="100%25" y2="100%25"%3E%3Cstop offset="0%25" style="stop-color:%230d4c85;stop-opacity:0.95" /%3E%3Cstop offset="100%25" style="stop-color:%230b2f53;stop-opacity:0.98" /%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width="1920" height="1080" fill="url(%23g)" /%3E%3C/svg%3E');
}

/**
 * 2. Optimize images and implement lazy loading
 */
add_filter('wp_get_attachment_image_attributes', function($attr, $attachment, $size) {
    // Add lazy loading to all images except those in viewport
    if (!isset($attr['loading'])) {
        $attr['loading'] = 'lazy';
    }
    
    // Add decoding async for better performance
    $attr['decoding'] = 'async';
    
    return $attr;
}, 10, 3);

/**
 * 3. Add browser caching headers and security headers
 */
add_action('send_headers', function() {
    if (!is_admin()) {
        header('Cache-Control: public, max-age=31536000');
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
        
        // Add CSP headers to allow iframe content
        header("Content-Security-Policy: frame-src https://ezcar.blckpanda.com https://ajax.googleapis.com; script-src 'self' 'unsafe-inline' https://ajax.googleapis.com https://fonts.googleapis.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;");
    }
});

/**
 * 4. Remove render-blocking CSS and optimize loading
 */
add_action('wp_print_styles', function() {
    // Get the sales page CSS URL
    $sales_css_url = get_template_directory_uri() . '/assets/css/sales-page-fixed.css';
    
    // Remove the sales-page style from normal enqueue
    wp_dequeue_style('sales-page');
    
    // Add it as preload with proper loading
    if (is_front_page()) {
        echo '<link rel="preload" href="' . esc_url($sales_css_url) . '?ver=1.0.4" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        echo '<noscript><link rel="stylesheet" href="' . esc_url($sales_css_url) . '?ver=1.0.4"></noscript>';
    }
}, 999);

/**
 * 5. Inline critical CSS for above-the-fold content
 */
add_action('wp_head', function() {
    if (is_front_page()) {
        ?>
        <style id="critical-css">
            /* Critical above-the-fold CSS - Enhanced for LCP */
            body{margin:0;font-family:system-ui,-apple-system,sans-serif}
            .urgency-banner{background:linear-gradient(90deg,#bf0a30,#002868);color:#fff;padding:10px;text-align:center;font-size:14px;font-weight:600;position:sticky;top:0;z-index:100;display:flex;justify-content:center;align-items:center;gap:20px;border-bottom:2px solid #ffd700}
            .hero-sales{background:linear-gradient(rgba(13,76,133,.88),rgba(11,47,83,.92)),linear-gradient(135deg,#0d4c85 0%,#0b2f53 100%);color:#fff;padding:40px 20px;text-align:center;position:relative;background-size:cover;background-position:center}
            .hero-sales__content{max-width:1200px;margin:0 auto}
            .hero-sales__headline{font-size:32px;line-height:1.2;margin-bottom:20px;font-weight:800}
            .hero-sales__headline .highlight{color:#ffeb3b;font-size:38px;display:block;text-shadow:2px 2px 4px rgba(0,0,0,.3);margin:10px 0}
            .hero-sales__benefits{display:flex;flex-wrap:wrap;justify-content:center;gap:15px;margin-bottom:30px}
            .hero-sales__benefits span{background:rgba(255,255,255,.2);padding:8px 16px;border-radius:20px;font-size:14px}
            .iphone-container-responsive{position:relative!important;width:340px!important;height:636px!important;transition:all .3s ease!important;max-width:100%}
            .mobile-center-wrapper{display:flex!important;justify-content:center!important;align-items:center!important;width:100%!important;padding:20px!important;box-sizing:border-box!important}
            .iframe-container-responsive{position:absolute!important;top:56px!important;left:19px!important;width:309px!important;height:524px!important;overflow:hidden!important;border-radius:22px!important;transition:all .3s ease!important}
            .form-iframe-responsive{width:100%!important;height:100%!important;border:none!important}
            .btn-primary{padding:16px 30px;border:none;border-radius:10px;font-size:16px;font-weight:700;background:linear-gradient(135deg,#bf0a30,#002868);color:#fff}
        </style>
        <script>
        // Polyfill for rel=preload CSS
        !function(e){"use strict";e.loadCSS||(e.loadCSS=function(){});var t=loadCSS.relpreload={};if(t.support=function(){var t;try{t=e.document.createElement("link").relList.supports("preload")}catch(e){t=!1}return function(){return t}}(),t.bindMediaToggle=function(e){function t(){e.media=a}var a=e.media||"all";e.addEventListener?e.addEventListener("load",t):e.attachEvent&&e.attachEvent("onload",t),setTimeout(function(){e.rel="stylesheet",e.media="only x"}),setTimeout(t,3e3)},!t.support()){var a=e.document.getElementsByTagName("link");for(var n in a)if("preload"===a[n].rel&&"style"===a[n].getAttribute("as")&&!a[n].getAttribute("data-loadcss")){a[n].setAttribute("data-loadcss",!0),t.bindMediaToggle(a[n])}}}(window);
        </script>
        <?php
    }
}, 5);

/**
 * 6. Add meta description for SEO
 */
add_action('wp_head', function() {
    if (is_front_page()) {
        echo '<meta name="description" content="Get $2,500-$50,000 cash today with Texas title loans. Keep driving your car! Same-day funding, no credit check required. Apply in 60 seconds online.">' . "\n";
    }
}, 1);

/**
 * 7. Preload critical resources and optimize LCP
 */
add_action('wp_head', function() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://ezcar.blckpanda.com">
    <link rel="dns-prefetch" href="https://ezcar.blckpanda.com">
    <?php
    // Preconnect to iframe domain for faster loading
}, 2);

/**
 * 8. Remove unused CSS from WordPress core
 */
add_action('wp_enqueue_scripts', function() {
    // Remove block library CSS if not using Gutenberg blocks
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
        wp_dequeue_style('global-styles'); // Remove global styles
    }
}, 100);

/**
 * 9. Optimize JavaScript loading
 */
add_filter('script_loader_tag', function($tag, $handle, $src) {
    // Defer non-critical scripts
    if (!is_admin() && !in_array($handle, ['jquery-core'])) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}, 10, 3);

/**
 * 10. Fix accessibility - improve color contrast
 */
add_action('wp_head', function() {
    ?>
    <style id="accessibility-fixes">
        /* Fix color contrast issues */
        .testimonial-author span { color: #666 !important; } /* Darker gray for better contrast */
        .form-label { color: #333 !important; } /* Darker labels */
        .trust-badge { background: rgba(0, 0, 0, 0.3) !important; } /* Better contrast for badges */
    </style>
    <?php
}, 20);

/**
 * 11. Add image dimensions to prevent layout shift
 */
add_filter('the_content', function($content) {
    // Add width and height to images without them
    return preg_replace_callback('/<img([^>]+)>/i', function($matches) {
        $img = $matches[0];
        if (strpos($img, 'width=') === false || strpos($img, 'height=') === false) {
            // Default dimensions for common images
            $img = str_replace('<img', '<img width="640" height="420"', $img);
        }
        return $img;
    }, $content);
});

/**
 * 12. Minify inline CSS and JavaScript
 */
function wpgpt_minify_css($css) {
    // Remove comments
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
    // Remove unnecessary whitespace
    $css = str_replace(["\r\n", "\r", "\n", "\t", '  ', '    ', '    '], '', $css);
    $css = preg_replace('/\s+/', ' ', $css);
    return $css;
}

/**
 * 13. Enable Gzip compression via htaccess (for Apache servers)
 */
add_action('init', function() {
    if (!is_admin()) {
        if (function_exists('ob_gzhandler')) {
            ob_start('ob_gzhandler');
        }
    }
});