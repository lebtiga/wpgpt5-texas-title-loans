<?php
/**
 * Update Houston page with better search terms for Freepik
 */
require_once 'wp-load.php';

$api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';

// Function to search Freepik for free images
function search_freepik_free($query, $api_key) {
    $url = 'https://api.freepik.com/v1/resources';
    $params = [
        'term' => $query,
        'limit' => 5,
        'filters[license]' => 'free', // Only free images
        'order' => 'popular'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Accept: application/json',
        'x-freepik-api-key: ' . $api_key
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code === 200) {
        $data = json_decode($response, true);
        if (isset($data['data']) && count($data['data']) > 0) {
            foreach ($data['data'] as $item) {
                if (isset($item['image']['source']['url'])) {
                    return $item['image']['source']['url'];
                }
            }
        }
    }
    return null;
}

// Search for specific images
$searches = [
    'city skyline' => 'hero',
    'business meeting' => 'approval',
    'car keys' => 'vehicle',
    'customer service' => 'service',
    'money finance' => 'financial',
    'highway road' => 'texas',
    'office building' => 'houston'
];

echo "Searching for Freepik images...\n";
$images = [];

foreach ($searches as $query => $key) {
    echo "Searching: $query... ";
    $url = search_freepik_free($query, $api_key);
    if ($url) {
        $images[$key] = $url;
        echo "Found!\n";
    } else {
        // Fallback to Unsplash
        $images[$key] = '';
        echo "Using fallback\n";
    }
    sleep(1); // Rate limiting
}

// Fallback images (high-quality Unsplash)
$fallback_images = [
    'hero' => 'https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop',
    'approval' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=400&fit=crop',
    'vehicle' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop',
    'service' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?w=600&h=400&fit=crop',
    'financial' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&h=400&fit=crop',
    'texas' => 'https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=600&h=400&fit=crop',
    'houston' => 'https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop'
];

// Use Freepik images where found, otherwise use fallbacks
foreach ($fallback_images as $key => $fallback) {
    if (empty($images[$key])) {
        $images[$key] = $fallback;
    }
}

// Get the page
$page = get_page_by_path('houston-title-loans-elementor');
if (!$page) {
    die("Page not found\n");
}

// Update content with better images
$updated_content = '
<!-- wp:cover {"url":"' . $images['hero'] . '","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Houston Skyline" src="' . $images['hero'] . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
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
<p style="font-size:18px">Our title loan services are specifically designed for Houston\'s diverse communities, from the Heights to Sugar Land, from Katy to The Woodlands.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $images['houston'] . '" alt="Houston Texas Downtown Buildings"/></figure>
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
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"backgroundColor":"white","className":"is-style-default"} -->
<div class="wp-block-group is-style-default has-white-background-color has-background" style="border-radius:15px;padding:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $images['approval'] . '" alt="Fast business approval"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Same-Day Approval &amp; Funding</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our streamlined approval process means Houston residents can often receive their cash the same day they apply.</p>
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
<figure class="wp-block-image size-large"><img src="' . $images['vehicle'] . '" alt="Keep driving your car"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Keep Driving Your Vehicle</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Unlike selling or pawning your car, with our title loans, you keep driving while using its title as collateral.</p>
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
<figure class="wp-block-image size-large"><img src="' . $images['financial'] . '" alt="Financial approval"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">No Credit Check Required</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Your vehicle\'s value secures the loan, not your credit score. We approve all credit types.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"40px"}}}} -->
<p class="has-text-align-center" style="margin-top:40px"><em>Images provided by Freepik and Unsplash</em></p>
<!-- /wp:paragraph -->
';

// Update the page
wp_update_post([
    'ID' => $page->ID,
    'post_content' => $updated_content
]);

echo "\nPage updated with optimized images!\n";
echo "View at: " . get_permalink($page->ID) . "\n";

// Display the images used
echo "\nImages used:\n";
foreach ($images as $key => $url) {
    $source = strpos($url, 'freepik') !== false ? 'Freepik' : 'Unsplash';
    echo "- $key: $source\n";
}