<?php
/**
 * Template Name: Main Hub - Landing Page
 * Description: Main car title loans landing page with full SEO optimization
 */

if (!defined('ABSPATH')) { exit; }
get_header(); 
?>

<!-- Hero Section -->
<section class="hero" id="apply">
    <div class="container">
        <div class="hero__inner">
            <div class="hero__content">
                <h1 class="hero__title">Car Title Loans</h1>
                <p class="hero__subtitle">Fast, secure car title loans. Apply in minutes. Get pre-qualified today and keep your keys.</p>
                <ul class="hero__bullets">
                    <li>Bad credit OK • No hidden fees</li>
                    <li>Same-day decisions • Secure & private</li>
                    <li>Serving multiple locations</li>
                </ul>
                <div class="hero__ctas">
                    <a class="button button--primary" href="#mini-form">Get Pre-Qualified</a>
                    <a class="button button--ghost" href="tel:18882248177">Call 888-224-8177</a>
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
        <h2 class="section__title">Your 3-Step Path to Fast Funding</h2>
        <div class="cardgrid cardgrid--3">
            <article class="card">
                <h3 class="card__title">Step 1: Easy Application</h3>
                <p class="card__text">Tell us about you and your vehicle in a few minutes—online from anywhere.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Step 2: Swift Approval</h3>
                <p class="card__text">We review your info quickly and share your title loan options with clear terms.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Step 3: Access Your Cash</h3>
                <p class="card__text">Get funds fast at our locations while you keep driving your car.</p>
            </article>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="benefits">
    <div class="container">
        <h2 class="section__title">Title Loan Services</h2>
        <div class="cardgrid cardgrid--3">
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/services/car-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Car Title Loans</a></h3>
                <p class="card__text">Traditional title loans using your car as collateral. Get $1,000 to $50,000 based on vehicle value.</p>
            </article>
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/services/online-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Online Title Loans</a></h3>
                <p class="card__text">Apply 100% online from anywhere. Upload documents and get approved without visiting a store.</p>
            </article>
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/services/no-credit-check-title-loans/'); ?>" style="color: inherit; text-decoration: none;">No Credit Check Loans</a></h3>
                <p class="card__text">Bad credit or no credit history? No problem. Approval based on vehicle value, not credit score.</p>
            </article>
        </div>
        <div class="cardgrid cardgrid--3" style="margin-top: 16px;">
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/services/emergency-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Emergency Title Loans</a></h3>
                <p class="card__text">Need cash for emergencies? Same-day funding available for qualified applicants.</p>
            </article>
            <article class="card">
                <h3 class="card__title"><a href="<?php echo home_url('/services/vehicle-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Vehicle Title Loans</a></h3>
                <p class="card__text">Beyond cars - use trucks, SUVs, motorcycles, or RVs as collateral for your title loan.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Fast Approval Process</h3>
                <p class="card__text">Most applications approved within hours. Get your cash the same day you apply.</p>
            </article>
        </div>
    </div>
</section>

<!-- Eligibility Section -->
<section class="eligibility">
    <div class="container eligibility__inner">
        <div class="eligibility__content">
            <h2 class="section__title">Title Loan Requirements</h2>
            <ul class="checklist">
                <li><strong>Vehicle Title:</strong> Clear title in your name (no liens)</li>
                <li><strong>ID:</strong> Valid driver's license or state ID</li>
                <li><strong>Income Proof:</strong> Pay stubs, bank statements, or benefits</li>
                <li><strong>Vehicle:</strong> Must be in working condition with current registration</li>
                <li><strong>Insurance:</strong> Valid auto insurance required</li>
            </ul>
            <p class="muted">These basics help confirm your eligibility and speed up approval across all locations.</p>
            <div style="margin-top: 20px;">
                <a href="#apply" class="button button--primary">Apply Now</a>
            </div>
        </div>
        <div class="eligibility__image" style="background: linear-gradient(135deg, #0d4c85 0%, #002868 50%, #0b2f53 100%); min-height: 300px; border-radius: 10px;">
            <!-- Image removed for performance - using CSS gradient instead -->
        </div>
    </div>
</section>

<!-- Use Cases -->
<section class="usecases">
    <div class="container">
        <h2 class="section__title">Common Uses for Title Loans</h2>
        <div class="cardgrid cardgrid--3">
            <article class="card">
                <h3 class="card__title">Emergency Expenses</h3>
                <p class="card__text">Medical bills, home repairs, or unexpected costs. Get support without long waits.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Disaster Recovery</h3>
                <p class="card__text">Natural disasters cause damage. Get funds for repairs not covered by insurance.</p>
            </article>
            <article class="card">
                <h3 class="card__title">Business Capital</h3>
                <p class="card__text">Small business owners use title loans for inventory or operational expenses.</p>
            </article>
        </div>
    </div>
</section>

<!-- Locations Section -->
<?php get_template_part('template-parts/section', 'locations'); ?>

<!-- SEO Content Section -->
<section class="eligibility">
    <div class="container">
        <article class="content-article">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
            
            <h2 class="section__title">Car Title Loans - Fast Cash When You Need It</h2>
            <p>Welcome to our premier car title loan service, where we help customers access quick cash using their vehicle's equity. Our streamlined online application process makes it easy to get the funds you need without the hassle of traditional bank loans.</p>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Why Choose Car Title Loans?</h3>
            <p>Texas residents face unique financial challenges, from unexpected medical bills to home repairs after severe weather. Traditional lending options often involve lengthy approval processes and strict credit requirements. Car title loans offer a practical alternative for Texans who need quick access to cash.</p>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">How Much Can You Borrow?</h3>
            <p>Texas title loans typically range from $1,000 to $50,000, depending on your vehicle's value and your ability to repay. We evaluate:</p>
            <ul>
                <li>Vehicle make, model, and year</li>
                <li>Current mileage and condition</li>
                <li>Market value in your area</li>
                <li>Your income and repayment capacity</li>
            </ul>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Texas Title Loan Regulations</h3>
            <p>Texas has specific regulations governing title loans to protect consumers. We operate in full compliance with Texas Finance Code Chapter 393, ensuring transparent disclosure of all terms and fees, fair interest rates and repayment schedules, and protection against predatory lending practices.</p>
            
            <h3 style="margin-top: 30px; margin-bottom: 15px;">Major Texas Cities Served</h3>
            <p>Our title loan services are available throughout Texas, with specialized support for residents in all major metropolitan areas. From the bustling streets of Houston to the tech corridors of Austin, from the historic districts of San Antonio to the business centers of Dallas, we're here to serve all Texans.</p>
            
            <p>Each city has unique economic factors that affect title loan needs. Houston's energy sector volatility, Dallas's diverse economy, Austin's tech industry growth, and San Antonio's military presence all create different financial situations for residents. We understand these local dynamics and tailor our services accordingly.</p>
        </article>
    </div>
</section>

<!-- FAQ Section -->
<?php get_template_part('template-parts/section', 'faqs'); ?>

<!-- CTA Band -->
<section class="cta-band" id="contact">
    <div class="container cta-band__inner">
        <div>
            <h2 class="cta-band__title">Ready to Get Your Texas Title Loan?</h2>
            <p class="cta-band__text">Apply online or call us now—no pressure, no obligation.</p>
        </div>
        <div class="cta-band__actions">
            <a class="button button--primary" href="#apply" style="background: white; color: #3ba55c;">Apply Now</a>
            <a class="button button--ghost" href="tel:18882248177" style="border-color: white; color: white;">Call 888-224-8177</a>
        </div>
    </div>
</section>

<!-- Sticky CTA for Mobile -->
<div class="sticky-cta" data-sticky-cta>
    <a class="button button--primary" href="#apply">Apply Now</a>
    <a class="button" href="tel:18882248177">Call</a>
</div>

<!-- Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FinancialService",
  "name": "<?php bloginfo('name'); ?> - Texas Car Title Loans",
  "description": "Fast car title loans throughout Texas with same-day approval",
  "url": "<?php echo get_permalink(); ?>",
  "telephone": "888-224-8177",
  "address": {
    "@type": "PostalAddress",
    "addressRegion": "TX",
    "addressCountry": "US"
  },
  "areaServed": {
    "@type": "State",
    "name": "Texas"
  }
}
</script>

<!-- FAQ Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How quickly can I get a title loan in Texas?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Most Texas title loan applications are approved within hours, and you can receive your funds the same day."
      }
    },
    {
      "@type": "Question",
      "name": "Can I get a title loan with bad credit in Texas?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes! Title loans in Texas don't require credit checks. We base approval on your vehicle's value and your ability to repay."
      }
    },
    {
      "@type": "Question",
      "name": "Do I keep my car during the title loan?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! You continue driving your vehicle throughout the entire loan term."
      }
    }
  ]
}
</script>

<?php get_footer(); ?>