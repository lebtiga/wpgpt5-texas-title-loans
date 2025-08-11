<?php
/**
 * Page Content Generator
 * Generates unique content for city, service, and combination pages
 */

if (!defined('ABSPATH')) {
    exit;
}

class Page_Content_Generator {
    
    private $freepik_api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';
    
    /**
     * Generate city page content
     */
    public function generate_city_page_content($city_slug, $city_name) {
        // Get city data from theme functions if available
        $city_data = $this->get_city_data($city_slug);
        
        $content = '
<!-- wp:cover {"url":"' . $this->get_city_image($city_name, 'skyline') . '","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . $city_name . ' Skyline" src="' . $this->get_city_image($city_name, 'skyline') . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"48px"},"color":{"text":"#ffffff"}}} -->
<h1 class="has-text-align-center has-text-color" style="color:#ffffff;font-size:48px">' . $city_name . ' Title Loans – Fast Cash When You Need It Most</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"22px"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:22px">Get approved in 30 minutes • Same-day funding • Keep driving your car</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"vivid-green-cyan","style":{"border":{"radius":"50px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" style="border-radius:50px">Get Started Now</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"white","textColor":"vivid-cyan-blue","style":{"border":{"radius":"50px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-cyan-blue-color has-white-background-color has-text-color has-background wp-element-button" href="tel:888-224-8177" style="border-radius:50px">📞 888-224-8177</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}}} -->
<div class="wp-block-group alignfull" style="padding-top:60px;padding-bottom:60px">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85">Why ' . $city_name . ' Residents Choose Our Title Loans</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"}}} -->
<p class="has-text-align-center" style="font-size:18px">' . $this->get_city_description($city_slug, $city_name) . '</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"40px"}}}} -->
<div class="wp-block-columns" style="padding-top:40px">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">✓ Fast Approval</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Get approved in as little as 30 minutes with our streamlined application process designed for ' . $city_name . ' residents.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">✓ Keep Your Vehicle</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Continue driving your car, truck, or motorcycle while you repay your loan. Perfect for ' . $city_name . '\'s commuters.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">✓ No Credit Check</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Your vehicle\'s value secures the loan, not your credit score. All ' . $city_name . ' residents welcome.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Our Title Loan Services in ' . $city_name . '</h2>
<!-- /wp:heading -->

' . $this->generate_service_links_section($city_slug, $city_name) . '

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Areas We Serve in ' . $city_name . '</h2>
<!-- /wp:heading -->

' . $this->generate_areas_section($city_slug, $city_name, $city_data) . '

<!-- wp:group {"align":"full","style":{"color":{"background":"#0d4c85"},"spacing":{"padding":{"top":"60px","bottom":"60px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#0d4c85;padding-top:60px;padding-bottom:60px">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#ffffff">Ready to Get Your ' . $city_name . ' Title Loan?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"20px"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:20px">Join thousands of satisfied ' . $city_name . ' customers who got the cash they needed quickly and easily.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"vivid-green-cyan","style":{"border":{"radius":"50px"},"typography":{"fontSize":"18px"}}} -->
<div class="wp-block-button has-custom-font-size" style="font-size:18px"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" style="border-radius:50px">Apply Now - Get Cash Today</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->';

        return $content;
    }
    
    /**
     * Generate service page content
     */
    public function generate_service_page_content($service_slug, $service_name, $service_description) {
        $content = '
<!-- wp:cover {"url":"' . $this->get_service_image($service_name) . '","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . $service_name . '" src="' . $this->get_service_image($service_name) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"48px"},"color":{"text":"#ffffff"}}} -->
<h1 class="has-text-align-center has-text-color" style="color:#ffffff;font-size:48px">' . $service_name . ' in Texas</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"22px"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:22px">' . $service_description . '</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"60px","bottom":"60px"}}}} -->
<div class="wp-block-group alignfull" style="padding-top:60px;padding-bottom:60px">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85">Available in All Major Texas Cities</h2>
<!-- /wp:heading -->

' . $this->generate_city_links_for_service($service_slug, $service_name) . '

</div>
<!-- /wp:group -->

' . $this->generate_service_benefits_section($service_slug, $service_name) . '

<!-- wp:group {"align":"full","style":{"color":{"background":"#f5f5f5"},"spacing":{"padding":{"top":"60px","bottom":"60px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f5f5f5;padding-top:60px;padding-bottom:60px">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85">How ' . $service_name . ' Work</h2>
<!-- /wp:heading -->

' . $this->generate_how_it_works_section($service_slug) . '

</div>
<!-- /wp:group -->';

        return $content;
    }
    
    /**
     * Generate combination page content
     */
    public function generate_combination_page_content($city_slug, $city_name, $service_slug, $service_name) {
        $content = '
<!-- wp:cover {"url":"' . $this->get_city_image($city_name, 'downtown') . '","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":400,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:400px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="' . $service_name . ' in ' . $city_name . '" src="' . $this->get_city_image($city_name, 'downtown') . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"44px"},"color":{"text":"#ffffff"}}} -->
<h1 class="has-text-align-center has-text-color" style="color:#ffffff;font-size:44px">' . $service_name . ' in ' . $city_name . ', TX</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:20px">Fast approval • Local service • Keep your vehicle</p>
<!-- /wp:paragraph -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"}}}} -->
<div class="wp-block-group alignwide" style="padding-top:40px;padding-bottom:40px">
<!-- wp:heading {"level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-color" style="color:#0d4c85">Get ' . $service_name . ' in ' . $city_name . ' Today</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">Looking for ' . strtolower($service_name) . ' in ' . $city_name . '? We provide fast, reliable title loan services to residents throughout the ' . $city_name . ' area. Our local team understands the unique needs of ' . $city_name . ' residents and can get you approved quickly.</p>
<!-- /wp:paragraph -->

<!-- wp:columns {"style":{"spacing":{"padding":{"top":"30px"}}}} -->
<div class="wp-block-columns" style="padding-top:30px">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
<h3 style="font-size:24px">📍 Local ' . $city_name . ' Service</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Serving all neighborhoods and surrounding areas of ' . $city_name . ' with convenient title loan options.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"24px"}}} -->
<h3 style="font-size:24px">⚡ ' . $this->get_service_highlight($service_slug) . '</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>' . $this->get_service_benefit($service_slug, $city_name) . '</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:heading {"level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"40px"}}}} -->
<h2 class="has-text-color" style="color:#0d4c85;margin-top:40px">Why Choose Our ' . $service_name . ' in ' . $city_name . '?</h2>
<!-- /wp:heading -->

' . $this->generate_local_benefits($city_slug, $city_name, $service_slug) . '

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"40px"}}}} -->
<div class="wp-block-buttons" style="margin-top:40px">
<!-- wp:button {"backgroundColor":"vivid-cyan-blue","style":{"border":{"radius":"50px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-cyan-blue-background-color has-background wp-element-button" style="border-radius:50px">Apply for ' . $service_name . ' in ' . $city_name . '</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

</div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"40px"}}}} -->
<p class="has-text-align-center" style="margin-top:40px">
<a href="/' . $city_slug . '-title-loans/">← Back to ' . $city_name . ' Title Loans</a> | 
<a href="/' . $service_slug . '/">View All ' . $service_name . ' Locations →</a>
</p>
<!-- /wp:paragraph -->';

        return $content;
    }
    
    // Helper functions
    
    private function get_city_data($city_slug) {
        // Try to get from theme functions if available
        if (function_exists('get_city_data')) {
            return get_city_data($city_slug);
        }
        
        // Default data
        return [
            'areas' => [
                ['name' => 'Downtown', 'description' => 'Business district'],
                ['name' => 'Suburbs', 'description' => 'Residential areas'],
                ['name' => 'Surrounding Areas', 'description' => 'Nearby communities']
            ]
        ];
    }
    
    private function get_city_image($city_name, $type = 'skyline') {
        // Default images - these would ideally come from Freepik API
        $images = [
            'skyline' => 'https://images.unsplash.com/photo-1568515045052-f9a854d70bfd?w=1920&h=600&fit=crop',
            'downtown' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?w=1920&h=500&fit=crop',
            'street' => 'https://images.unsplash.com/photo-1556075798-4825dfaaf498?w=800&h=400&fit=crop'
        ];
        
        return $images[$type] ?? $images['skyline'];
    }
    
    private function get_service_image($service_name) {
        // Service-specific images
        $images = [
            'Online' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1920&h=600&fit=crop',
            'Emergency' => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?w=1920&h=600&fit=crop',
            'No Credit' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1920&h=600&fit=crop',
            'Vehicle' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1920&h=600&fit=crop'
        ];
        
        foreach ($images as $key => $url) {
            if (stripos($service_name, $key) !== false) {
                return $url;
            }
        }
        
        return 'https://images.unsplash.com/photo-1560472355-536de3962603?w=1920&h=600&fit=crop';
    }
    
    private function get_city_description($city_slug, $city_name) {
        $descriptions = [
            'houston' => 'Houston, America\'s fourth-largest city, is home to a diverse economy spanning energy, healthcare, and aerospace industries.',
            'dallas' => 'Dallas, a modern metropolis in north Texas, is a commercial and cultural hub known for its thriving business sector.',
            'san-antonio' => 'San Antonio blends rich colonial heritage with modern military and healthcare industries.',
            'austin' => 'Austin, the state capital, is known for its vibrant tech scene and diverse economy.',
            'fort-worth' => 'Fort Worth maintains its Western heritage while embracing modern aerospace and defense industries.'
        ];
        
        return $descriptions[$city_slug] ?? $city_name . ' is a thriving Texas city with diverse economic opportunities and a growing population in need of flexible financial solutions.';
    }
    
    private function generate_service_links_section($city_slug, $city_name) {
        $services = [
            'online-title-loans' => 'Online Title Loans',
            'no-credit-check-title-loans' => 'No Credit Check Title Loans',
            'emergency-title-loans' => 'Emergency Title Loans',
            'vehicle-title-loans' => 'Vehicle Title Loans'
        ];
        
        $content = '<!-- wp:columns --><div class="wp-block-columns">';
        
        foreach ($services as $slug => $name) {
            $content .= '
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-radius:10px;padding:20px">
<!-- wp:heading {"level":4} -->
<h4><a href="/' . $city_slug . '-' . $slug . '/">' . $name . '</a></h4>
<!-- /wp:heading -->
<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">Get ' . strtolower($name) . ' in ' . $city_name . ' with our fast, easy process.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->';
        }
        
        $content .= '</div><!-- /wp:columns -->';
        
        return $content;
    }
    
    private function generate_areas_section($city_slug, $city_name, $city_data) {
        $content = '<!-- wp:columns --><div class="wp-block-columns">';
        
        if (!empty($city_data['areas'])) {
            foreach (array_slice($city_data['areas'], 0, 3) as $area) {
                $content .= '
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":4,"style":{"color":{"text":"#0d4c85"}}} -->
<h4 class="has-text-color" style="color:#0d4c85">' . $area['name'] . '</h4>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>' . $area['description'] . '</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->';
            }
        }
        
        $content .= '</div><!-- /wp:columns -->';
        
        return $content;
    }
    
    private function generate_city_links_for_service($service_slug, $service_name) {
        $cities = [
            'houston' => 'Houston',
            'san-antonio' => 'San Antonio',
            'dallas' => 'Dallas',
            'austin' => 'Austin',
            'fort-worth' => 'Fort Worth'
        ];
        
        $content = '<!-- wp:columns --><div class="wp-block-columns">';
        
        foreach ($cities as $slug => $name) {
            $link_slug = ($service_slug === 'title-loans') ? $slug . '-title-loans' : $slug . '-' . $service_slug;
            
            $content .= '
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"width":"2px","radius":"8px"}},"borderColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-border-color has-pale-cyan-blue-border-color" style="border-width:2px;border-radius:8px">
<!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"15px","bottom":"15px"}}}} -->
<p class="has-text-align-center" style="padding-top:15px;padding-bottom:15px">
<a href="/' . $link_slug . '/"><strong>' . $name . '</strong></a>
</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->';
        }
        
        $content .= '</div><!-- /wp:columns -->';
        
        return $content;
    }
    
    private function generate_service_benefits_section($service_slug, $service_name) {
        $benefits = $this->get_service_benefits($service_slug);
        
        $content = '
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Benefits of ' . $service_name . '</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">';
        
        foreach ($benefits as $benefit) {
            $content .= '
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="has-medium-font-size">' . $benefit['title'] . '</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>' . $benefit['description'] . '</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->';
        }
        
        $content .= '</div><!-- /wp:columns -->';
        
        return $content;
    }
    
    private function get_service_benefits($service_slug) {
        $benefits = [
            'online-title-loans' => [
                ['title' => '🖥️ Apply From Home', 'description' => 'Complete your entire application online without visiting a store.'],
                ['title' => '⚡ Instant Decision', 'description' => 'Get approved in minutes with our automated system.'],
                ['title' => '📱 Mobile Friendly', 'description' => 'Apply from any device, anywhere in Texas.']
            ],
            'no-credit-check-title-loans' => [
                ['title' => '✅ All Credit Welcome', 'description' => 'Bad credit, no credit, bankruptcy - we can help.'],
                ['title' => '🚗 Vehicle Value Matters', 'description' => 'Your car\'s value determines your loan, not your credit.'],
                ['title' => '🔒 No Hard Inquiry', 'description' => 'Checking your rate won\'t affect your credit score.']
            ],
            'emergency-title-loans' => [
                ['title' => '💰 Same Day Cash', 'description' => 'Get funds within hours of approval.'],
                ['title' => '🚨 Crisis Support', 'description' => 'Designed for urgent financial emergencies.'],
                ['title' => '📞 Priority Processing', 'description' => 'Expedited service for emergency situations.']
            ],
            'vehicle-title-loans' => [
                ['title' => '🚗 Cars & Trucks', 'description' => 'We accept all types of personal vehicles.'],
                ['title' => '🏍️ Motorcycles', 'description' => 'Get a loan using your motorcycle title.'],
                ['title' => '🚐 RVs & More', 'description' => 'Commercial vehicles and RVs also qualify.']
            ]
        ];
        
        return $benefits[$service_slug] ?? [
            ['title' => '✓ Fast Service', 'description' => 'Quick approval and funding process.'],
            ['title' => '✓ Keep Driving', 'description' => 'Continue using your vehicle.'],
            ['title' => '✓ Flexible Terms', 'description' => 'Payment plans that work for you.']
        ];
    }
    
    private function generate_how_it_works_section($service_slug) {
        $steps = [
            '1. Apply' => 'Fill out our simple online application or call us.',
            '2. Get Approved' => 'Receive your approval decision in minutes.',
            '3. Get Your Cash' => 'Receive your funds the same day.',
            '4. Keep Driving' => 'Continue using your vehicle while you repay.'
        ];
        
        $content = '<!-- wp:columns --><div class="wp-block-columns">';
        
        foreach ($steps as $step => $description) {
            $content .= '
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"textAlign":"center","level":4,"style":{"color":{"text":"#3ba55c"}}} -->
<h4 class="has-text-align-center has-text-color" style="color:#3ba55c">' . $step . '</h4>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">' . $description . '</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->';
        }
        
        $content .= '</div><!-- /wp:columns -->';
        
        return $content;
    }
    
    private function get_service_highlight($service_slug) {
        $highlights = [
            'online-title-loans' => 'Digital Process',
            'no-credit-check-title-loans' => 'No Credit Required',
            'emergency-title-loans' => 'Same Day Funding',
            'vehicle-title-loans' => 'All Vehicles Welcome'
        ];
        
        return $highlights[$service_slug] ?? 'Fast Approval';
    }
    
    private function get_service_benefit($service_slug, $city_name) {
        $benefits = [
            'online-title-loans' => 'Apply online from anywhere in ' . $city_name . ' and get instant approval without leaving home.',
            'no-credit-check-title-loans' => 'Your credit history doesn\'t matter. We serve all ' . $city_name . ' residents based on vehicle value.',
            'emergency-title-loans' => 'When ' . $city_name . ' residents face emergencies, we provide same-day cash solutions.',
            'vehicle-title-loans' => 'Whether you drive a car, truck, motorcycle, or RV in ' . $city_name . ', we can help.'
        ];
        
        return $benefits[$service_slug] ?? 'Fast, reliable title loan services for ' . $city_name . ' residents.';
    }
    
    private function generate_local_benefits($city_slug, $city_name, $service_slug) {
        $content = '
<!-- wp:list -->
<ul>
<li><strong>Local Knowledge:</strong> We understand ' . $city_name . '\'s economy and can tailor solutions to your needs</li>
<li><strong>Fast Service:</strong> Same-day funding available for qualified ' . $city_name . ' applicants</li>
<li><strong>Convenient Process:</strong> ' . $this->get_service_convenience($service_slug) . '</li>
<li><strong>Competitive Rates:</strong> Fair rates for ' . $city_name . ' residents with flexible repayment options</li>
<li><strong>Keep Your Vehicle:</strong> Continue driving throughout ' . $city_name . ' while repaying your loan</li>
</ul>
<!-- /wp:list -->';
        
        return $content;
    }
    
    private function get_service_convenience($service_slug) {
        $convenience = [
            'online-title-loans' => 'Apply online 24/7 from anywhere',
            'no-credit-check-title-loans' => 'No credit check means faster approval',
            'emergency-title-loans' => 'Priority processing for urgent needs',
            'vehicle-title-loans' => 'We accept all types of vehicles'
        ];
        
        return $convenience[$service_slug] ?? 'Simple application and quick approval';
    }
}