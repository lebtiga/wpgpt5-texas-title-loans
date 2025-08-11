<?php
// Temporary script to create Houston page with quality content
require_once 'wp-load.php';

// Delete any existing Houston test page first
$existing = get_page_by_path('houston-title-loans-sample');
if ($existing) {
    wp_delete_post($existing->ID, true);
}

// Create the Houston page with comprehensive content
$houston_content = '
<h1>Houston Car Title Loans - Fast Cash When You Need It Most</h1>

<p>Welcome to Houston\'s premier title loan service, where Space City residents can get the financial help they need without the hassle of traditional lending. Whether you\'re facing an unexpected expense, medical emergency, or simply need cash to bridge a financial gap, our Houston title loan services provide fast, reliable solutions using your vehicle\'s equity.</p>

<h2>Why Houston Residents Choose Our Car Title Loans</h2>

<p>Houston is America\'s fourth-largest city, home to the world\'s largest medical center, NASA\'s Johnson Space Center, and a thriving energy sector. But even in this dynamic economy, financial challenges can arise. That\'s where we come in. Our title loan services are specifically designed for Houston\'s diverse communities, from the Heights to Sugar Land, from Katy to The Woodlands.</p>

<h3>Same-Day Approval and Funding</h3>
<p>In a city that never slows down, neither should your access to emergency funds. Our streamlined approval process means Houston residents can often receive their cash the same day they apply. We understand that when you need money, you need it now.</p>

<h3>Keep Driving Your Vehicle</h3>
<p>Houston\'s sprawling 665 square miles make a vehicle essential for daily life. Unlike selling your car or pawning it, with our title loans, you keep driving your vehicle while using its title as collateral. Continue commuting to work, dropping kids at school, and living your life uninterrupted.</p>

<h2>How Title Loans Work in Houston, TX</h2>

<ol>
<li><strong>Quick Application:</strong> Fill out our simple online form or visit our Houston location. We\'ll need basic information about you and your vehicle.</li>
<li><strong>Vehicle Evaluation:</strong> We\'ll assess your vehicle\'s value based on its make, model, year, and condition. Houston\'s preference for trucks and SUVs often means higher loan amounts.</li>
<li><strong>Instant Approval:</strong> Once approved, review and sign your loan agreement. We\'ll explain all terms clearly - no hidden fees or surprises.</li>
<li><strong>Get Your Cash:</strong> Receive your funds via direct deposit, check, or cash. Most Houston customers get their money within hours.</li>
<li><strong>Keep Your Car:</strong> Drive away in your vehicle with the cash you need. Make payments according to your agreement while maintaining full use of your car.</li>
</ol>

<h2>Houston Car Title Loan Requirements</h2>

<p>Getting a title loan in Houston is straightforward. Here\'s what you\'ll need:</p>

<ul>
<li>Clear vehicle title in your name</li>
<li>Valid government-issued ID</li>
<li>Proof of Houston area residence</li>
<li>Proof of income or ability to repay</li>
<li>Vehicle for inspection</li>
<li>References (some cases)</li>
</ul>

<h2>Serving All Houston Communities</h2>

<p>We proudly serve all of Greater Houston, including:</p>

<div class="houston-areas">
<h3>Central Houston</h3>
<ul>
<li>Downtown Houston - Financial and theater district</li>
<li>Midtown - Urban living and nightlife</li>
<li>Montrose - Arts and culture hub</li>
<li>Museum District - Cultural center</li>
</ul>

<h3>West Houston</h3>
<ul>
<li>Galleria/Uptown - Shopping and business district</li>
<li>Memorial - Established residential area</li>
<li>Energy Corridor - Oil and gas headquarters</li>
<li>Westchase - International business district</li>
</ul>

<h3>North Houston</h3>
<ul>
<li>The Heights - Historic Victorian neighborhood</li>
<li>Spring - Growing suburban community</li>
<li>The Woodlands - Master-planned community</li>
<li>Humble - Family-friendly suburb</li>
</ul>

<h3>South Houston</h3>
<ul>
<li>Medical Center - World\'s largest medical complex</li>
<li>Pearland - Rapidly growing suburb</li>
<li>Clear Lake - NASA and aerospace hub</li>
<li>Sugar Land - Master-planned communities</li>
</ul>
</div>

<h2>Understanding Houston\'s Economy and Your Financial Options</h2>

<p>Houston\'s diverse economy - spanning energy, healthcare, aerospace, and shipping - creates unique financial patterns. The energy sector\'s cyclical nature can lead to income volatility. Hurricane season brings unexpected expenses. The city\'s rapid growth means rising costs of living. Our title loans provide a financial safety net when these challenges arise.</p>

<h3>Hurricane and Natural Disaster Relief</h3>
<p>Houston residents know the financial strain that hurricanes and flooding can cause. When insurance claims are pending or deductibles are due, our title loans can provide immediate relief to help you recover and rebuild.</p>

<h3>Energy Sector Support</h3>
<p>With oil and gas being major employers, industry downturns can affect thousands of Houston families. Our flexible repayment options are designed to accommodate the unique needs of energy sector workers.</p>

<h2>Houston Car Title Loan Amounts and Rates</h2>

<p>Loan amounts typically range from $1,000 to $50,000, depending on your vehicle\'s value. Houston\'s love for trucks and SUVs often translates to higher loan amounts compared to other cities. Our competitive rates are regulated by Texas state law, ensuring fair and transparent lending practices.</p>

<h3>Popular Vehicles for Title Loans in Houston</h3>
<ul>
<li>Ford F-150 (Houston\'s best-selling vehicle)</li>
<li>Chevrolet Silverado</li>
<li>Toyota Camry</li>
<li>Honda Accord</li>
<li>Nissan Altima</li>
<li>Jeep Grand Cherokee</li>
<li>RAM 1500</li>
<li>Toyota Tacoma</li>
</ul>

<h2>Frequently Asked Questions About Houston Car Title Loans</h2>

<h3>Can I get a title loan if I\'m still making payments on my vehicle?</h3>
<p>In some cases, yes. If you have sufficient equity in your vehicle, we may be able to help even if you haven\'t completely paid off your auto loan.</p>

<h3>How quickly can I get money in Houston?</h3>
<p>Most approved applicants receive their funds the same business day. Our Houston location is equipped for rapid processing and immediate funding.</p>

<h3>What if I have bad credit?</h3>
<p>Title loans are secured by your vehicle, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>

<h3>Do you accept motorcycles or RVs?</h3>
<p>Yes! We accept cars, trucks, SUVs, motorcycles, RVs, and even commercial vehicles. If it has a clear title, we can likely help.</p>

<h3>What areas of Houston do you serve?</h3>
<p>We serve all of Harris County and surrounding areas, including Fort Bend, Montgomery, Brazoria, and Galveston counties.</p>

<h2>Apply for Your Houston Car Title Loan Today</h2>

<p>Don\'t let financial stress overwhelm you. Houston\'s trusted title loan provider is here to help with fast, friendly service and competitive rates. Whether you\'re in River Oaks or Fifth Ward, Bellaire or Pasadena, we\'re ready to serve you.</p>

<p><strong>Call us at 888-224-8177</strong> or apply online now. Our Houston team is standing by to help you get the cash you need today.</p>

<div class="disclaimer">
<p><small>Title loans are regulated by Texas state law. Rates, terms, and availability subject to approval and may vary based on creditworthiness, vehicle value, and ability to repay. Not all applicants will qualify. See store for details.</small></p>
</div>
';

// Create the page
$page_id = wp_insert_post([
    'post_title'    => 'Houston Car Title Loans - Complete Guide',
    'post_name'     => 'houston-title-loans-sample',
    'post_content'  => $houston_content,
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'post_author'   => 1,
    'meta_input'    => [
        '_yoast_wpseo_title' => 'Houston Car Title Loans | Same Day Cash | Keep Your Car',
        '_yoast_wpseo_metadesc' => 'Get approved for Houston title loans in 30 minutes. Same-day funding, keep driving your car, no credit check required. Serving all Greater Houston areas.',
        '_wp_page_template' => 'page-templates/page-elementor.php'
    ]
]);

if ($page_id) {
    echo "Page created successfully! ID: $page_id\n";
    echo "URL: " . get_permalink($page_id) . "\n";
    
    // Add Elementor meta
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    update_post_meta($page_id, '_elementor_template_type', 'wp-page');
    update_post_meta($page_id, '_elementor_version', '3.27.3');
    
    // Enable Elementor on this page
    update_post_meta($page_id, '_elementor_data', '[]');
    
    echo "Elementor settings applied. You can now edit this page with Elementor.\n";
} else {
    echo "Failed to create page.\n";
}