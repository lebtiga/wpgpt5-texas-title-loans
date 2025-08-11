<?php
/**
 * Direct Freepik API Integration for Houston Page
 * Uses the Freepik API directly to search and update images
 */

require_once 'wp-load.php';

// Freepik API configuration
$api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';
$api_base = 'https://api.freepik.com/v1';

/**
 * Search Freepik API for images
 */
function search_freepik($query, $api_key) {
    $url = "https://api.freepik.com/v1/resources?locale=en-US&page=1&limit=10&order=latest&filters[content_type][photo]=1";
    $url .= "&term=" . urlencode($query);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept-Language: en-US',
        'x-freepik-api-key: ' . $api_key,
        'Accept: application/json'
    ]);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code !== 200) {
        echo "API Error for query '$query': HTTP $http_code\n";
        return null;
    }
    
    $data = json_decode($response, true);
    if (!empty($data['data'])) {
        // Return the first high-quality image
        foreach ($data['data'] as $item) {
            if (!empty($item['image']['source']['url'])) {
                return $item['image']['source']['url'];
            }
        }
    }
    
    return null;
}

echo "Searching Freepik for professional images...\n\n";

// Define search queries and fallbacks
$searches = [
    'hero' => ['houston skyline', 'texas city skyline', 'modern city skyline'],
    'downtown' => ['houston downtown business', 'texas business district', 'modern office buildings'],
    'approval' => ['business approval document', 'approved stamp', 'successful business deal'],
    'car_keys' => ['car keys hand', 'vehicle keys', 'auto keys'],
    'financial' => ['financial approval', 'loan approved', 'money success'],
    'highway' => ['houston highway', 'texas freeway', 'city highway'],
    'hurricane' => ['hurricane relief assistance', 'disaster recovery help', 'emergency assistance'],
    'oil' => ['oil refinery industry', 'energy sector', 'petroleum industry'],
    'medical' => ['medical center building', 'hospital exterior', 'healthcare facility'],
    'vehicles' => ['pickup truck', 'texas truck', 'american truck']
];

$found_images = [];
$fallback_images = [
    'hero' => 'https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop',
    'downtown' => 'https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop',
    'approval' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=200&fit=crop',
    'car_keys' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=200&fit=crop',
    'financial' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop',
    'highway' => 'https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=600&h=400&fit=crop',
    'hurricane' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=400&h=250&fit=crop',
    'oil' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&h=250&fit=crop',
    'medical' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=400&h=250&fit=crop',
    'vehicles' => 'https://images.unsplash.com/photo-1581650107963-3e8c1f48241b?w=600&h=400&fit=crop'
];

// Search for each image type
foreach ($searches as $key => $queries) {
    echo "Searching for $key images...\n";
    $found = false;
    
    foreach ($queries as $query) {
        $image_url = search_freepik($query, $api_key);
        if ($image_url) {
            $found_images[$key] = $image_url;
            echo "✓ Found: $image_url\n";
            $found = true;
            break;
        }
    }
    
    if (!$found) {
        echo "✗ Using fallback image for $key\n";
        $found_images[$key] = $fallback_images[$key];
    }
    
    // Small delay to respect API rate limits
    usleep(500000); // 0.5 second
}

echo "\n=== Summary ===\n";
foreach ($found_images as $key => $url) {
    $source = (strpos($url, 'b2bpic.net') !== false || strpos($url, 'freepik') !== false) ? 'Freepik' : 'Fallback';
    echo "$key: $source\n";
}

// Now update the page with the found images
echo "\nUpdating Houston page with images...\n";

$page = get_page_by_path('houston-title-loans-elementor');
if (!$page) {
    die("Error: Houston page not found\n");
}

// Build the complete page content with all images
$content = '
<!-- wp:cover {"url":"' . $found_images['hero'] . '","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Houston Skyline" src="' . $found_images['hero'] . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"48px"},"color":{"text":"#ffffff"}}} -->
<h1 class="has-text-align-center has-text-color" style="color:#ffffff;font-size:48px">Houston Title Loans – Fast Cash When You Need It Most</h1>
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
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#3ba55c"},"typography":{"fontSize":"36px"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#3ba55c;font-size:36px">$1K-$50K</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#666666"}}} -->
<p class="has-text-align-center has-text-color" style="color:#666666">Loan Amounts</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#3ba55c"},"typography":{"fontSize":"36px"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#3ba55c;font-size:36px">30 Min</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#666666"}}} -->
<p class="has-text-align-center has-text-color" style="color:#666666">Fast Approval</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#3ba55c"},"typography":{"fontSize":"36px"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#3ba55c;font-size:36px">Same Day</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#666666"}}} -->
<p class="has-text-align-center has-text-color" style="color:#666666">Get Your Cash</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"width":"25%"} -->
<div class="wp-block-column" style="flex-basis:25%">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#3ba55c"},"typography":{"fontSize":"36px"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#3ba55c;font-size:36px">No Credit</h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#666666"}}} -->
<p class="has-text-align-center has-text-color" style="color:#666666">Check Required</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:40px;padding-bottom:40px">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:heading {"level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-color" style="color:#0d4c85">Why Houston Residents Choose Our Title Loans</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">Houston is America\'s fourth-largest city, home to the world\'s largest medical center, NASA\'s Johnson Space Center, and a thriving energy sector. But even in this dynamic economy, financial challenges can arise.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">Our title loan services are specifically designed for Houston\'s diverse communities, from the Heights to Sugar Land, from Katy to The Woodlands. We understand the unique financial needs of Space City residents.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['downtown'] . '" alt="Houston Texas Downtown Buildings"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Benefits of Our Houston Title Loans</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"backgroundColor":"white"} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:15px;padding:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['approval'] . '" alt="Fast business approval"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Same-Day Approval & Funding</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In a city that never slows down, neither should your access to emergency funds. Our streamlined approval process means Houston residents can often receive their cash the same day they apply.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"backgroundColor":"white"} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:15px;padding:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['car_keys'] . '" alt="Keep driving your car"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Keep Driving Your Vehicle</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Houston\'s sprawling 665 square miles make a vehicle essential. Unlike selling or pawning your car, with our title loans, you keep driving while using its title as collateral.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"backgroundColor":"white"} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:15px;padding:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['financial'] . '" alt="Financial approval"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">No Credit Check Required</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Your vehicle\'s value secures the loan, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"60px","bottom":"40px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:60px;padding-bottom:40px">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['highway'] . '" alt="Houston Highway System"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:heading {"level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-color" style="color:#0d4c85">Serving All Houston Areas</h2>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<li>Downtown & Midtown</li>
<li>The Heights & Montrose</li>
<li>Sugar Land & Missouri City</li>
<li>Katy & Cypress</li>
<li>The Woodlands & Spring</li>
<li>Pearland & Friendswood</li>
<li>Clear Lake & League City</li>
<li>Humble & Kingwood</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>No matter where you are in the Greater Houston area, we\'re here to help with fast, reliable title loan services.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Special Programs for Houston\'s Unique Circumstances</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-radius:15px;padding:20px">
<!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
<figure class="wp-block-image size-medium"><img src="' . $found_images['hurricane'] . '" alt="Hurricane Relief Assistance"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3>Hurricane & Natural Disaster Relief</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Special expedited processing and flexible terms for residents affected by hurricanes, flooding, or other natural disasters.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-radius:15px;padding:20px">
<!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
<figure class="wp-block-image size-medium"><img src="' . $found_images['oil'] . '" alt="Oil and Energy Industry"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3>Oil & Energy Sector Support</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Understanding of cyclical employment in the energy sector with flexible repayment options during industry downturns.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-radius:15px;padding:20px">
<!-- wp:image {"sizeSlug":"medium","linkDestination":"none"} -->
<figure class="wp-block-image size-medium"><img src="' . $found_images['medical'] . '" alt="Medical Center Support"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3} -->
<h3>Medical Emergency Assistance</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Fast funding for medical emergencies with consideration for those working at or receiving treatment from the Texas Medical Center.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"60px","bottom":"40px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center" style="padding-top:60px;padding-bottom:40px">
<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:heading {"level":2,"style":{"color":{"text":"#0d4c85"}}} -->
<h2 class="has-text-color" style="color:#0d4c85">Popular Vehicles We Finance in Houston</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">From Texas-sized trucks to fuel-efficient commuters, we accept all types of vehicles:</p>
<!-- /wp:paragraph -->

<!-- wp:list {"style":{"typography":{"fontSize":"16px"}}} -->
<ul style="font-size:16px">
<li><strong>Pickup Trucks:</strong> Ford F-150, Chevrolet Silverado, RAM 1500, Toyota Tacoma</li>
<li><strong>SUVs:</strong> Chevrolet Tahoe, Ford Explorer, Toyota Highlander, Honda Pilot</li>
<li><strong>Sedans:</strong> Honda Accord, Toyota Camry, Nissan Altima</li>
<li><strong>Work Vehicles:</strong> Commercial trucks, vans, and fleet vehicles</li>
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['vehicles'] . '" alt="Popular vehicles in Houston"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#0d4c85"},"spacing":{"padding":{"top":"60px","bottom":"60px"}}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#0d4c85;padding-top:60px;padding-bottom:60px">
<!-- wp:heading {"textAlign":"center","style":{"color":{"text":"#ffffff"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#ffffff">Ready to Get Your Houston Title Loan?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"20px"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:20px">Join thousands of satisfied Houston customers who got the cash they needed quickly and easily.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"vivid-green-cyan","style":{"border":{"radius":"50px"},"typography":{"fontSize":"18px"}}} -->
<div class="wp-block-button has-custom-font-size" style="font-size:18px"><a class="wp-block-button__link has-vivid-green-cyan-background-color has-background wp-element-button" style="border-radius:50px">Apply Now - Get Cash Today</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"white","textColor":"vivid-cyan-blue","style":{"border":{"radius":"50px"},"typography":{"fontSize":"18px"}}} -->
<div class="wp-block-button has-custom-font-size" style="font-size:18px"><a class="wp-block-button__link has-vivid-cyan-blue-color has-white-background-color has-text-color has-background wp-element-button" href="tel:888-224-8177" style="border-radius:50px">📞 Call 888-224-8177</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->
</div>
<!-- /wp:group -->';

// Update the page
$update_result = wp_update_post([
    'ID' => $page->ID,
    'post_content' => $content
]);

if ($update_result) {
    echo "\n✅ Page successfully updated!\n";
    echo "View at: " . get_permalink($page->ID) . "\n";
    
    // Show which images are from Freepik vs fallback
    $freepik_count = 0;
    foreach ($found_images as $url) {
        if (strpos($url, 'b2bpic.net') !== false || strpos($url, 'freepik') !== false || strpos($url, 'fp-cdn') !== false) {
            $freepik_count++;
        }
    }
    
    echo "\nImage sources: $freepik_count Freepik images, " . (count($found_images) - $freepik_count) . " fallback images\n";
} else {
    echo "\n❌ Error updating page\n";
}