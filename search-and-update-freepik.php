<?php
/**
 * Search Freepik API and update Houston page with the best images
 */
require_once 'wp-load.php';

$api_key = 'FPSX3e1fb9d75ed20336b070cae064f424ef';

// Function to search Freepik
function search_freepik($query, $api_key, $per_page = 5) {
    $url = 'https://api.freepik.com/v1/resources';
    
    $params = [
        'locale' => 'en-US',
        'page' => 1,
        'limit' => $per_page,
        'order' => 'popular',
        'term' => $query,
        'filters[content_type][photo]' => 1,
    ];
    
    $headers = [
        'Accept-Language: en-US',
        'Accept: application/json',
        'Content-Type: application/json',
        'x-freepik-api-key: ' . $api_key
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code === 200) {
        $data = json_decode($response, true);
        if (isset($data['data']) && count($data['data']) > 0) {
            // Return the first high-quality image URL
            foreach ($data['data'] as $item) {
                if (isset($item['image']['source']['url'])) {
                    return [
                        'url' => $item['image']['source']['url'],
                        'title' => $item['title'] ?? $query,
                        'id' => $item['id'] ?? '',
                        'type' => $item['licenses'][0]['type'] ?? 'unknown'
                    ];
                }
            }
        }
    }
    
    return null;
}

// Search queries optimized for Freepik
$searches = [
    'hero' => 'houston texas skyline downtown buildings',
    'houston_downtown' => 'houston texas city business district',
    'approval' => 'business document contract signing professional',
    'car_keys' => 'car keys hand giving vehicle ownership',
    'financial' => 'loan approved financial success money',
    'highway' => 'texas interstate highway aerial view',
    'hurricane' => 'storm disaster relief emergency help',
    'oil_industry' => 'oil gas refinery petroleum industry',
    'medical' => 'modern hospital medical center building',
    'vehicles' => 'pickup truck ford f150 american vehicle'
];

echo "Searching Freepik for professional images...\n";
echo str_repeat("=", 50) . "\n\n";

$found_images = [];
$using_fallback = [];

foreach ($searches as $key => $query) {
    echo "Searching: $query\n";
    $result = search_freepik($query, $api_key);
    
    if ($result) {
        $found_images[$key] = $result['url'];
        echo "  ✓ Found: " . substr($result['title'], 0, 60) . "...\n";
        echo "  URL: " . $result['url'] . "\n";
        echo "  Type: " . $result['type'] . "\n";
    } else {
        // Fallback to high-quality Unsplash
        $fallbacks = [
            'hero' => 'https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop',
            'houston_downtown' => 'https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop',
            'approval' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=200&fit=crop',
            'car_keys' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=200&fit=crop',
            'financial' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop',
            'highway' => 'https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=600&h=400&fit=crop',
            'hurricane' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=400&h=250&fit=crop',
            'oil_industry' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&h=250&fit=crop',
            'medical' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=400&h=250&fit=crop',
            'vehicles' => 'https://images.unsplash.com/photo-1581650107963-3e8c1f48241b?w=600&h=400&fit=crop'
        ];
        
        $found_images[$key] = $fallbacks[$key];
        $using_fallback[] = $key;
        echo "  ✗ No results - using fallback\n";
    }
    
    echo "\n";
    sleep(1); // Rate limiting
}

echo str_repeat("=", 50) . "\n";
echo "Search complete!\n\n";

// Get the page
$page = get_page_by_path('houston-title-loans-elementor');
if (!$page) {
    die("Page not found\n");
}

// Now update the page with the found images
$full_content = '
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
<figure class="wp-block-image size-large"><img src="' . $found_images['houston_downtown'] . '" alt="Houston Texas Downtown Buildings"/></figure>
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
<h3 class="has-text-color" style="color:#0d4c85">Same-Day Approval &amp; Funding</h3>
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

<!-- wp:group {"style":{"color":{"background":"#f8fafc"},"spacing":{"padding":{"top":"60px","right":"40px","bottom":"60px","left":"40px"},"margin":{"top":"60px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="background-color:#f8fafc;margin-top:60px;padding-top:60px;padding-right:40px;padding-bottom:60px;padding-left:40px">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"bottom":"50px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-bottom:50px">How Title Loans Work in Houston, TX</h2>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true,"style":{"typography":{"fontSize":"18px"}}} -->
<ol style="font-size:18px">
<!-- wp:list-item -->
<li><strong>Quick Application:</strong> Fill out our simple online form or visit our Houston location. We\'ll need basic information about you and your vehicle.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Vehicle Evaluation:</strong> We\'ll assess your vehicle\'s value based on its make, model, year, and condition. Houston\'s preference for trucks and SUVs often means higher loan amounts.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Instant Approval:</strong> Once approved, review and sign your loan agreement. We\'ll explain all terms clearly - no hidden fees or surprises.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Get Your Cash:</strong> Receive your funds via direct deposit, check, or cash. Most Houston customers get their money within hours.</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li><strong>Keep Your Car:</strong> Drive away in your vehicle with the cash you need. Make payments according to your agreement while maintaining full use of your car.</li>
<!-- /wp:list-item -->
</ol>
<!-- /wp:list -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Houston Title Loan Requirements</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"}}} -->
<p class="has-text-align-center" style="font-size:18px">Getting a title loan in Houston is straightforward. Here\'s what you\'ll need:</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>📋 Clear vehicle title in your name</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>🆔 Valid government-issued ID</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>🏠 Proof of Houston area residence</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>💵 Proof of income or ability to repay</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>🚗 Vehicle for inspection</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>📱 References (some cases)</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Serving All Houston Communities</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['highway'] . '" alt="Houston Highway System"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">We proudly serve all of Greater Houston and surrounding areas. Our extensive coverage ensures that no matter where you are in the Houston metro area, fast financial help is available.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">From downtown\'s bustling business district to the family-friendly suburbs of Sugar Land and The Woodlands, we\'re here to serve you.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:columns {"style":{"spacing":{"margin":{"top":"40px"}}}} -->
<div class="wp-block-columns" style="margin-top:40px">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"left":{"color":"#3ba55c","width":"4px"}},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding:20px">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Central Houston</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>Downtown - Financial &amp; theater district</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Midtown - Urban living &amp; nightlife</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Montrose - Arts &amp; culture hub</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Museum District - Cultural center</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"left":{"color":"#3ba55c","width":"4px"}},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding:20px">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">West Houston</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>Galleria/Uptown - Shopping district</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Memorial - Established residential</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Energy Corridor - Oil &amp; gas HQ</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Westchase - International business</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"left":{"color":"#3ba55c","width":"4px"}},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding:20px">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">North Houston</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>The Heights - Historic Victorian</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Spring - Growing suburb</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>The Woodlands - Master-planned</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Humble - Family-friendly suburb</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"left":{"color":"#3ba55c","width":"4px"}},"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding:20px">
<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">South Houston</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>Medical Center - World\'s largest</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Pearland - Rapidly growing</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Clear Lake - NASA &amp; aerospace</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Sugar Land - Master-planned</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:group {"align":"full","style":{"color":{"gradient":"linear-gradient(135deg,rgb(13,76,133) 0%,rgb(23,94,166) 100%)"},"spacing":{"padding":{"top":"60px","right":"40px","bottom":"60px","left":"40px"},"margin":{"top":"60px"}}},"textColor":"white"} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background:linear-gradient(135deg,rgb(13,76,133) 0%,rgb(23,94,166) 100%);margin-top:60px;padding-top:60px;padding-right:40px;padding-bottom:60px;padding-left:40px">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#ffffff"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#ffffff">Understanding Houston\'s Unique Financial Needs</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['hurricane'] . '" alt="Houston hurricane infrastructure"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"}}} -->
<h3 class="has-text-color" style="color:#ffffff">Hurricane &amp; Natural Disaster Relief</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffff"}}} -->
<p style="color:#ffffff">Houston residents know the financial strain that hurricanes and flooding can cause. When insurance claims are pending or deductibles are due, our title loans provide immediate relief to help you recover and rebuild.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['oil_industry'] . '" alt="Oil refinery industry"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"}}} -->
<h3 class="has-text-color" style="color:#ffffff">Energy Sector Support</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffff"}}} -->
<p style="color:#ffffff">With oil and gas being major employers, industry downturns can affect thousands of Houston families. Our flexible repayment options are designed to accommodate the unique needs of energy sector workers.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['medical'] . '" alt="Medical professional healthcare"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#ffffff"}}} -->
<h3 class="has-text-color" style="color:#ffffff">Medical Emergency Funding</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffff"}}} -->
<p style="color:#ffffff">Home to the world\'s largest medical center, Houston residents often face unexpected medical expenses. Our quick approval process ensures you can focus on health, not finances.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Popular Vehicles for Title Loans in Houston</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' . $found_images['vehicles'] . '" alt="Pickup trucks and vehicles"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px"}}} -->
<p style="font-size:18px">Houston\'s love for trucks and SUVs often translates to higher loan amounts. Our competitive rates are regulated by Texas state law, ensuring fair lending practices.</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
<!-- wp:list-item -->
<li>✓ Ford F-150</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ Chevrolet Silverado</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ Toyota Camry</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ Honda Accord</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ Nissan Altima</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ Jeep Grand Cherokee</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ RAM 1500</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>✓ Toyota Tacoma</li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Frequently Asked Questions</h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"40px","right":"40px","bottom":"40px","left":"40px"}}},"backgroundColor":"white"} -->
<div class="wp-block-group has-white-background-color has-background" style="border-radius:15px;padding:40px">

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Can I get a title loan if I\'m still making payments on my vehicle?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>In some cases, yes. If you have sufficient equity in your vehicle, we may be able to help even if you haven\'t completely paid off your auto loan.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"backgroundColor":"pale-cyan-blue"} -->
<hr class="wp-block-separator has-text-color has-pale-cyan-blue-color has-alpha-channel-opacity has-pale-cyan-blue-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">How quickly can I get money in Houston?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Most approved applicants receive their funds the same business day. Our Houston location is equipped for rapid processing and immediate funding.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"backgroundColor":"pale-cyan-blue"} -->
<hr class="wp-block-separator has-text-color has-pale-cyan-blue-color has-alpha-channel-opacity has-pale-cyan-blue-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">What if I have bad credit?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Title loans are secured by your vehicle, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"backgroundColor":"pale-cyan-blue"} -->
<hr class="wp-block-separator has-text-color has-pale-cyan-blue-color has-alpha-channel-opacity has-pale-cyan-blue-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">Do you accept motorcycles or RVs?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Yes! We accept cars, trucks, SUVs, motorcycles, RVs, and even commercial vehicles. If it has a clear title, we can likely help.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"backgroundColor":"pale-cyan-blue"} -->
<hr class="wp-block-separator has-text-color has-pale-cyan-blue-color has-alpha-channel-opacity has-pale-cyan-blue-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":3,"style":{"color":{"text":"#0d4c85"}}} -->
<h3 class="has-text-color" style="color:#0d4c85">What areas of Houston do you serve?</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We serve all of Harris County and surrounding areas, including Fort Bend, Montgomery, Brazoria, and Galveston counties.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"gradient":"linear-gradient(135deg,rgb(59,165,92) 0%,rgb(102,187,106) 100%)"},"spacing":{"padding":{"top":"60px","right":"40px","bottom":"60px","left":"40px"},"margin":{"top":"60px"}}},"textColor":"white"} -->
<div class="wp-block-group alignfull has-white-color has-text-color has-background" style="background:linear-gradient(135deg,rgb(59,165,92) 0%,rgb(102,187,106) 100%);margin-top:60px;padding-top:60px;padding-right:40px;padding-bottom:60px;padding-left:40px">
<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#ffffff"}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#ffffff">Apply for Your Houston Title Loan Today</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:20px">Don\'t let financial stress overwhelm you. Houston\'s trusted title loan provider is here to help with fast, friendly service and competitive rates.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons">
<!-- wp:button {"backgroundColor":"white","textColor":"vivid-green-cyan","style":{"border":{"radius":"50px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-vivid-green-cyan-color has-white-background-color has-text-color has-background wp-element-button" style="border-radius:50px">Apply Online Now</a></div>
<!-- /wp:button -->

<!-- wp:button {"style":{"border":{"radius":"50px","width":"2px"}},"borderColor":"white","className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-border-color has-white-border-color wp-element-button" href="tel:888-224-8177" style="border-width:2px;border-radius:50px">📞 Call 888-224-8177</a></div>
<!-- /wp:button -->
</div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"16px"},"color":{"text":"#ffffff"}}} -->
<p class="has-text-align-center has-text-color" style="color:#ffffff;font-size:16px">Whether you\'re in River Oaks or Fifth Ward, Bellaire or Pasadena, we\'re ready to serve you.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","right":"20px","bottom":"20px","left":"20px"}}},"backgroundColor":"pale-cyan-blue"} -->
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="padding:20px">
<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"14px"}}} -->
<p class="has-text-align-center" style="font-size:14px"><small>Title loans are regulated by Texas state law. Rates, terms, and availability subject to approval and may vary based on creditworthiness, vehicle value, and ability to repay. Not all applicants will qualify. See store for details.</small></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"20px"}}}} -->
<p class="has-text-align-center" style="margin-top:20px"><em>Professional images powered by Freepik API</em></p>
<!-- /wp:paragraph -->
';

// Update the page
wp_update_post([
    'ID' => $page->ID,
    'post_content' => $full_content
]);

echo "\n" . str_repeat("=", 50) . "\n";
echo "✅ Page updated successfully!\n";
echo "View at: " . get_permalink($page->ID) . "\n\n";

// Summary
$freepik_count = count($found_images) - count($using_fallback);
echo "Image Summary:\n";
echo "- Freepik images found: $freepik_count\n";
echo "- Fallback images used: " . count($using_fallback) . "\n";

if (count($using_fallback) > 0) {
    echo "\nUsing fallback for: " . implode(", ", $using_fallback) . "\n";
}

echo "\nAll images have been updated on your Houston Title Loans page!\n";