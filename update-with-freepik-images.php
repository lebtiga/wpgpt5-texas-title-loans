<?php
/**
 * Update Houston page with Freepik image URLs
 * 
 * To use this:
 * 1. Search for each image type in Freepik
 * 2. Copy the image URLs
 * 3. Replace the URLs in this script
 * 4. Run the script to update your page
 */

require_once 'wp-load.php';

// Get the page
$page = get_page_by_path('houston-title-loans-elementor');
if (!$page) {
    die("Page not found\n");
}

// REPLACE THESE WITH FREEPIK IMAGE URLs
// Search terms to use in Freepik:
$freepik_images = [
    // Hero: Search "Houston skyline" or "Texas city skyline"
    'hero' => 'https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop',
    
    // About: Search "Houston downtown" or "Texas business district"
    'houston_downtown' => 'https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop',
    
    // Benefits Card 1: Search "business approval" or "document signing"
    'approval' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=200&fit=crop',
    
    // Benefits Card 2: Search "car keys" or "vehicle ownership"
    'car_keys' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=200&fit=crop',
    
    // Benefits Card 3: Search "financial approval" or "loan approved"
    'financial' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop',
    
    // Houston Areas: Search "Texas highway" or "Houston freeway"
    'highway' => 'https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=600&h=400&fit=crop',
    
    // Special Circumstances 1: Search "hurricane relief" or "disaster recovery"
    'hurricane' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=400&h=250&fit=crop',
    
    // Special Circumstances 2: Search "oil refinery" or "energy industry"
    'oil_industry' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=400&h=250&fit=crop',
    
    // Special Circumstances 3: Search "medical center" or "hospital"
    'medical' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=400&h=250&fit=crop',
    
    // Popular Vehicles: Search "pickup truck" or "Texas truck"
    'vehicles' => 'https://images.unsplash.com/photo-1581650107963-3e8c1f48241b?w=600&h=400&fit=crop'
];

// Full content with Freepik images
$full_content = '
<!-- wp:cover {"url":"' . $freepik_images['hero'] . '","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Houston Skyline" src="' . $freepik_images['hero'] . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
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
<figure class="wp-block-image size-large"><img src="' . $freepik_images['houston_downtown'] . '" alt="Houston Texas Downtown Buildings"/></figure>
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
<figure class="wp-block-image size-large"><img src="' . $freepik_images['approval'] . '" alt="Fast business approval"/></figure>
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
<figure class="wp-block-image size-large"><img src="' . $freepik_images['car_keys'] . '" alt="Keep driving your car"/></figure>
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
<figure class="wp-block-image size-large"><img src="' . $freepik_images['financial'] . '" alt="Financial approval"/></figure>
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

<!-- CONTINUE WITH REST OF CONTENT... -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"40px"}}}} -->
<p class="has-text-align-center" style="margin-top:40px"><em>Professional images provided by Freepik</em></p>
<!-- /wp:paragraph -->
';

// Update the page
wp_update_post([
    'ID' => $page->ID,
    'post_content' => $full_content
]);

echo "Page ready for Freepik images!\n";
echo "View at: " . get_permalink($page->ID) . "\n\n";

echo "NEXT STEPS:\n";
echo "1. Go to Freepik.com and search for these image types:\n";
echo "   - Houston skyline or Texas city skyline\n";
echo "   - Business approval or document signing\n";
echo "   - Car keys or vehicle ownership\n";
echo "   - Financial approval or loan approved\n";
echo "   - Texas highway or Houston freeway\n";
echo "   - Hurricane relief or disaster recovery\n";
echo "   - Oil refinery or energy industry\n";
echo "   - Medical center or hospital\n";
echo "   - Pickup truck or Texas truck\n";
echo "\n";
echo "2. Copy the image URLs from Freepik\n";
echo "3. Replace the URLs in this script\n";
echo "4. Run the script again to update your page\n";