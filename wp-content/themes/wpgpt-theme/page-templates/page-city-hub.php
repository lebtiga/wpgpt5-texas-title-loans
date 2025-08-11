<?php
/**
 * Template Name: City Hub Page
 * Description: Template for individual Texas city pages
 */

if (!defined('ABSPATH')) { exit; }

// Get city data from custom fields or page slug
$city_slug = get_post_field('post_name', get_the_ID());
$city_data = get_city_data($city_slug); // Helper function defined in functions.php

get_header(); 
?>

<!-- Hero Section -->
<section class="hero" id="apply">
    <div class="container">
        <div class="hero__inner">
            <div class="hero__content">
                <h1 class="hero__title">Car Title Loans in <?php echo esc_html($city_data['name']); ?>, Texas</h1>
                <p class="hero__subtitle">Fast cash for <?php echo esc_html($city_data['nickname']); ?> residents. Same-day approval, keep your car, bad credit OK.</p>
                <ul class="hero__bullets">
                    <li>Serving all <?php echo esc_html($city_data['name']); ?> neighborhoods</li>
                    <li>Same-day funding available</li>
                    <li>No credit check required</li>
                    <li>Keep driving your vehicle</li>
                </ul>
                <div class="hero__ctas">
                    <a class="button button--primary" href="#mini-form">Get <?php echo esc_html($city_data['name']); ?> Quote</a>
                    <a class="button button--ghost" href="tel:18882248177">Call Now</a>
                </div>
            </div>
            <div class="hero__form" id="mini-form">
                <?php get_template_part('template-parts/form', 'quote'); ?>
            </div>
        </div>
    </div>
</section>

<!-- 3-Step Process -->
<section class="steps">
    <div class="container">
        <h2 class="section__title">Getting a Title Loan in <?php echo esc_html($city_data['name']); ?> - Simple 3-Step Process</h2>
        <div class="cardgrid cardgrid--3">
            <article class="card">
                <h3 class="card__title">Step 1: Apply Online or Call</h3>
                <p class="card__text">Complete our <?php echo esc_html($city_data['name']); ?>-specific application online or call our local team.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Step 2: Quick <?php echo esc_html($city_data['name']); ?> Approval</h3>
                <p class="card__text">Get approved in minutes. We serve all <?php echo esc_html($city_data['name']); ?> zip codes with same-day decisions.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Step 3: Get Cash in <?php echo esc_html($city_data['name']); ?></h3>
                <p class="card__text">Receive your funds at a <?php echo esc_html($city_data['name']); ?> location or via direct deposit.</p>
            </article>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="benefits">
    <div class="container">
        <h2 class="section__title">Title Loan Services in <?php echo esc_html($city_data['name']); ?></h2>
        <div class="cardgrid cardgrid--3">
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/' . $city_slug . '/car-title-loans/'); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($city_data['name']); ?> Car Title Loans</a></h3>
                <p class="card__text">Traditional car title loans for <?php echo esc_html($city_data['name']); ?> drivers. Use your vehicle's title to secure funding.</p>
            </article>
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/' . $city_slug . '/online-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Online Title Loans <?php echo esc_html($city_data['name']); ?></a></h3>
                <p class="card__text">Apply from anywhere in <?php echo esc_html($city_data['name']); ?>. Perfect for busy professionals who can't visit during business hours.</p>
            </article>
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/' . $city_slug . '/no-credit-check-title-loans/'); ?>" style="color: inherit; text-decoration: none;">No Credit Check <?php echo esc_html($city_data['name']); ?></a></h3>
                <p class="card__text">Bad credit? Our no credit check options focus on your vehicle's value, not your credit history.</p>
            </article>
        </div>
        <div class="cardgrid cardgrid--3" style="margin-top: 16px;">
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/' . $city_slug . '/emergency-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Emergency Loans <?php echo esc_html($city_data['name']); ?></a></h3>
                <p class="card__text">When emergencies strike in <?php echo esc_html($city_data['name']); ?>, get same-day funding for qualified applicants.</p>
            </article>
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/' . $city_slug . '/vehicle-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Vehicle Title Loans</a></h3>
                <p class="card__text">Beyond cars, we accept titles for work trucks, motorcycles, RVs, and boats in <?php echo esc_html($city_data['name']); ?>.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Local <?php echo esc_html($city_data['name']); ?> Service</h3>
                <p class="card__text">Our team understands <?php echo esc_html($city_data['name']); ?>'s unique needs and provides personalized local service.</p>
            </article>
        </div>
    </div>
</section>

<!-- Eligibility Section -->
<section class="eligibility">
    <div class="container eligibility__inner">
        <div class="eligibility__content">
            <h2 class="section__title"><?php echo esc_html($city_data['name']); ?> Title Loan Requirements</h2>
            <ul class="checklist">
                <li><strong>Vehicle Title:</strong> Clear title (no liens)</li>
                <li><strong>Texas ID:</strong> Valid driver's license</li>
                <li><strong><?php echo esc_html($city_data['name']); ?> Residence:</strong> Proof of local address</li>
                <li><strong>Income:</strong> Proof of ability to repay</li>
                <li><strong>Vehicle:</strong> Must be in working condition</li>
            </ul>
            <p class="muted">Serving all <?php echo esc_html($city_data['name']); ?> neighborhoods and surrounding areas.</p>
            <div style="margin-top: 20px;">
                <a href="#apply" class="button button--primary">Apply in <?php echo esc_html($city_data['name']); ?></a>
            </div>
        </div>
        <div class="eligibility__image">
            <img src="<?php echo esc_url($city_data['image']); ?>" alt="<?php echo esc_attr($city_data['name']); ?> Texas skyline - car title loans available" />
        </div>
    </div>
</section>

<!-- Areas Served -->
<section class="usecases">
    <div class="container">
        <h2 class="section__title"><?php echo esc_html($city_data['name']); ?> Areas We Serve</h2>
        <div class="cardgrid cardgrid--3">
            <?php foreach ($city_data['areas'] as $area) : ?>
            <article class="card">
                <h3 class="card__title"><?php echo esc_html($area['name']); ?></h3>
                <p class="card__text"><?php echo esc_html($area['description']); ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SEO Content Section -->
<section class="eligibility">
    <div class="container">
        <article class="content-article">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
            
            <h2 class="section__title"><?php echo esc_html($city_data['name']); ?> Car Title Loans - Serving <?php echo esc_html($city_data['county']); ?> County</h2>
            <p><?php echo esc_html($city_data['name']); ?> is <?php echo esc_html($city_data['description']); ?>. Our title loan services are designed specifically for <?php echo esc_html($city_data['name']); ?> residents who need quick access to cash.</p>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Why <?php echo esc_html($city_data['name']); ?> Residents Choose Title Loans</h3>
            <p><?php echo esc_html($city_data['economic_info']); ?></p>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;"><?php echo esc_html($city_data['name']); ?>-Specific Loan Amounts</h3>
            <p>Title loan amounts in <?php echo esc_html($city_data['name']); ?> typically range from $1,000 to $50,000, depending on your vehicle's value and condition. <?php echo esc_html($city_data['vehicle_culture']); ?></p>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Local Economic Factors</h3>
            <p><?php echo esc_html($city_data['economic_factors']); ?></p>
        </article>
    </div>
</section>

<!-- Nearby Cities -->
<section class="locations" id="locations">
    <div class="container">
        <div class="locations__header">
            <h2 class="section__title">Nearby Texas Cities</h2>
            <a class="button" href="<?php echo home_url('/'); ?>">All Texas Locations</a>
        </div>
        <div class="locations__grid">
            <ul>
                <?php foreach ($city_data['nearby_cities'] as $nearby) : ?>
                <li><a href="<?php echo home_url('/cities/' . sanitize_title($nearby) . '/'); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($nearby); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<!-- City-Specific FAQs -->
<?php 
$city_faqs = [
    [
        'question' => 'Where can I get a title loan in ' . $city_data['name'] . '?',
        'answer' => 'We serve all ' . $city_data['name'] . ' areas including ' . implode(', ', array_slice(array_column($city_data['areas'], 'name'), 0, 3)) . '. You can apply online or visit one of our ' . $city_data['name'] . '-area locations for same-day service.'
    ],
    [
        'question' => 'How much can I borrow with a ' . $city_data['name'] . ' title loan?',
        'answer' => $city_data['name'] . ' title loans typically range from $1,000 to $50,000. The amount depends on your vehicle\'s value, condition, and your ability to repay.'
    ],
    [
        'question' => 'Do you serve all ' . $city_data['name'] . ' zip codes?',
        'answer' => 'Yes, we serve all ' . $city_data['name'] . ' zip codes and the entire ' . $city_data['county'] . ' County area.'
    ]
];

// Merge with default FAQs
$faqs = array_merge($city_faqs, [
    [
        'question' => 'Can I get a title loan with bad credit in Texas?',
        'answer' => 'Yes! Title loans don\'t require credit checks. We base approval on your vehicle\'s value and your ability to repay.'
    ],
    [
        'question' => 'Do I keep my car during the title loan?',
        'answer' => 'Absolutely! You continue driving your vehicle throughout the entire loan term.'
    ]
]);

get_template_part('template-parts/section', 'faqs', ['faqs' => $faqs]); 
?>

<!-- CTA Band -->
<section class="cta-band" id="contact">
    <div class="container cta-band__inner">
        <div>
            <h2 class="cta-band__title">Ready for Your <?php echo esc_html($city_data['name']); ?> Title Loan?</h2>
            <p class="cta-band__text">Apply online or call our <?php echo esc_html($city_data['name']); ?> team now.</p>
        </div>
        <div class="cta-band__actions">
            <a class="button button--primary" href="#apply" style="background: white; color: #3ba55c;">Apply Now</a>
            <a class="button button--ghost" href="tel:18882248177" style="border-color: white; color: white;">Call 888-224-8177</a>
        </div>
    </div>
</section>

<!-- Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "<?php echo esc_html($city_data['name']); ?> Car Title Loans",
  "description": "Fast car title loans in <?php echo esc_html($city_data['name']); ?>, Texas with same-day approval",
  "url": "<?php echo get_permalink(); ?>",
  "telephone": "888-224-8177",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "<?php echo esc_html($city_data['name']); ?>",
    "addressRegion": "TX",
    "postalCode": "<?php echo esc_html($city_data['zip']); ?>",
    "addressCountry": "US"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": <?php echo esc_html($city_data['latitude']); ?>,
    "longitude": <?php echo esc_html($city_data['longitude']); ?>
  },
  "areaServed": [
    "<?php echo esc_html($city_data['name']); ?>",
    "<?php echo esc_html($city_data['county']); ?> County",
    <?php foreach ($city_data['areas'] as $area) : ?>
    "<?php echo esc_html($area['name']); ?>",
    <?php endforeach; ?>
  ]
}
</script>

<?php get_footer(); ?>