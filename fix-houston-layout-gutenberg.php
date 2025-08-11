<?php
// Fix Houston page layout using WordPress Gutenberg blocks
require_once 'wp-load.php';

// Get the page
$page = get_page_by_path('houston-title-loans-elementor');
if (!$page) {
    die("Page not found\n");
}

// Create content using Gutenberg blocks for proper layout
$gutenberg_content = '
<!-- wp:cover {"url":"https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop","dimRatio":70,"overlayColor":"vivid-cyan-blue","minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-vivid-cyan-blue-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="Houston Skyline" src="https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
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

<!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px"}}}} -->
<div class="wp-block-group" style="padding-top:40px;padding-bottom:40px">
<!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center">
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
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop" alt="Houston Texas Downtown Buildings"/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","level":2,"style":{"color":{"text":"#0d4c85"},"spacing":{"margin":{"top":"60px","bottom":"40px"}}}} -->
<h2 class="has-text-align-center has-text-color" style="color:#0d4c85;margin-top:60px;margin-bottom:40px">Benefits of Our Houston Title Loans</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"style":{"border":{"radius":"15px"},"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"backgroundColor":"white","className":"is-style-default"} -->
<div class="wp-block-group is-style-default has-white-background-color has-background" style="border-radius:15px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=200&fit=crop" alt="Fast business approval"/></figure>
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
<div class="wp-block-group has-white-background-color has-background" style="border-radius:15px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=200&fit=crop" alt="Keep driving your car"/></figure>
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
<div class="wp-block-group has-white-background-color has-background" style="border-radius:15px;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop" alt="Financial approval"/></figure>
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
<figure class="wp-block-image size-large"><img src="https://images.unsplash.com/photo-1569163139394-de4798aa62b6?w=600&h=400&fit=crop" alt="Houston Highway System"/></figure>
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
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
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
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
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
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
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
<div class="wp-block-group has-pale-cyan-blue-background-color has-background" style="border-left-color:#3ba55c;border-left-width:4px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
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
</div>
<!-- /wp:group -->
';

// Update the page with Gutenberg blocks
wp_update_post([
    'ID' => $page->ID,
    'post_content' => $gutenberg_content
]);

// Remove Elementor meta since we\'re using Gutenberg
delete_post_meta($page->ID, '_elementor_edit_mode');
delete_post_meta($page->ID, '_elementor_data');
update_post_meta($page->ID, '_wp_page_template', 'default');

echo "Page layout fixed with Gutenberg blocks!\n";
echo "View at: " . get_permalink($page->ID) . "\n";
echo "\nThe page now uses WordPress Gutenberg blocks for proper multi-column responsive layout.\n";