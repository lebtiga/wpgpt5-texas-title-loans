<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>

<!-- Urgency Banner -->
<div class="urgency-banner">
    <div class="container">
        <span class="urgency-banner__text">⚡ Same-Day Funding Available Until 5 PM CST</span>
        <span class="urgency-banner__viewers">👥 17 people viewing now</span>
    </div>
</div>

<!-- Hero Section - Mobile First -->
<section class="hero-sales" id="apply">
    <div class="container">
        <div class="hero-sales__content">
            <!-- Trust indicator -->
            <div class="hero-sales__trust">
                <span class="trust-badge">✓ 4,387 Texans Funded This Month</span>
            </div>
            
            <!-- Main headline with urgency -->
            <h1 class="hero-sales__headline">
                Get <span class="highlight">$2,500-$50,000</span> Cash Today
                <span class="subline">Keep Driving Your Car!</span>
            </h1>
            
            <!-- Value props -->
            <div class="hero-sales__benefits">
                <span>✓ Approved in 15 Minutes</span>
                <span>✓ Cash Same Day</span>
                <span>✓ No Credit Check</span>
            </div>
            
            <!-- Main Form - Simplified -->
            <div class="hero-form" id="instant-quote">
                <div class="form-card">
                    <h2 class="form-card__title">Get Your Cash Now - 60 Second Form</h2>
                    
                    <!-- Progress indicator -->
                    <div class="form-progress">
                        <div class="form-progress__bar" style="width: 33%"></div>
                        <span class="form-progress__text">Step 1 of 3</span>
                    </div>
                    
                    <form class="quote-form" id="title-loan-form" action="#" method="post">
                        <!-- Step 1: Basic Info -->
                        <div class="form-step active" data-step="1">
                            <div class="form-group">
                                <input type="text" class="form-input" id="zip" placeholder="ZIP Code" required pattern="[0-9]{5}">
                                <label class="form-label">Texas ZIP Code</label>
                            </div>
                            
                            <div class="form-group">
                                <select class="form-input" id="vehicle-year" required>
                                    <option value="">Vehicle Year</option>
                                    <?php for($year = date('Y'); $year >= 1995; $year--): ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            
                            <button type="button" class="btn-primary btn-block next-step">
                                Continue → See Your Amount
                            </button>
                        </div>
                        
                        <!-- Step 2: Vehicle Details -->
                        <div class="form-step" data-step="2">
                            <div class="loan-estimate">
                                <span class="loan-estimate__label">Estimated Loan Amount:</span>
                                <span class="loan-estimate__amount">$3,500 - $12,000</span>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-input" id="vehicle-make" placeholder="Vehicle Make (e.g., Ford)">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-input" id="vehicle-model" placeholder="Vehicle Model (e.g., F-150)">
                            </div>
                            
                            <button type="button" class="btn-primary btn-block next-step">
                                Final Step → Get Approved
                            </button>
                        </div>
                        
                        <!-- Step 3: Contact Info -->
                        <div class="form-step" data-step="3">
                            <div class="approval-ready">
                                <span>🎉 Pre-Approved! Complete to get your cash:</span>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-input" id="full-name" placeholder="Full Name" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="tel" class="form-input" id="phone" placeholder="Phone Number" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="email" class="form-input" id="email" placeholder="Email (optional)">
                            </div>
                            
                            <button type="submit" class="btn-primary btn-block btn-submit">
                                <span class="btn-text">Get My Cash Now</span>
                                <span class="btn-secure">🔒 Secure & Encrypted</span>
                            </button>
                        </div>
                    </form>
                    
                    <!-- Trust elements -->
                    <div class="form-trust">
                        <img src="https://img.shields.io/badge/BBB-A%2B%20Rated-green" alt="BBB A+ Rated">
                        <img src="https://img.shields.io/badge/SSL-Secured-blue" alt="SSL Secured">
                        <span>No Impact to Credit Score</span>
                    </div>
                </div>
            </div>
            
            <!-- Mobile CTA for scroll -->
            <div class="hero-mobile-cta">
                <a href="tel:18882248177" class="btn-phone">
                    📞 Call for Instant Approval: 888-224-8177
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Social Proof Ticker -->
<section class="social-proof-ticker">
    <div class="container">
        <div class="ticker-wrapper">
            <div class="ticker-content">
                <span class="ticker-item">✓ Maria from Houston got $5,000 - 23 minutes ago</span>
                <span class="ticker-item">✓ James from Dallas approved for $8,500 - 47 minutes ago</span>
                <span class="ticker-item">✓ Sarah from Austin received $3,200 - 1 hour ago</span>
                <span class="ticker-item">✓ Mike from San Antonio got $12,000 - 2 hours ago</span>
            </div>
        </div>
    </div>
</section>

<!-- Trust Logos -->
<section class="trust-logos">
    <div class="container">
        <p class="trust-logos__title">As Seen On</p>
        <div class="logos-grid">
            <span>FOX 26 Houston</span>
            <span>NBC Dallas</span>
            <span>ABC13 Houston</span>
            <span>CBS Austin</span>
        </div>
    </div>
</section>

<!-- Benefits with Emotional Triggers -->
<section class="benefits-emotional">
    <div class="container">
        <h2 class="section-title-sales">Stop Stressing About Money Tonight</h2>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">⚡</div>
                <h3>Cash in 2 Hours</h3>
                <p>Get funds deposited directly to your account or pick up cash same day</p>
                <a href="#apply" class="benefit-cta">Get Cash Now →</a>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🚗</div>
                <h3>Keep Your Vehicle</h3>
                <p>Drive your car, truck, or motorcycle while you repay - we just hold the title</p>
                <a href="#apply" class="benefit-cta">Start Application →</a>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">✅</div>
                <h3>Approved When Banks Say No</h3>
                <p>Bad credit, no credit, bankruptcy - your car's value is what matters</p>
                <a href="#apply" class="benefit-cta">Check Eligibility →</a>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">🔒</div>
                <h3>Safe & Licensed</h3>
                <p>Texas state licensed lender with transparent terms and no hidden fees</p>
                <a href="#apply" class="benefit-cta">Apply Safely →</a>
            </div>
        </div>
    </div>
</section>

<!-- Loan Calculator -->
<section class="loan-calculator">
    <div class="container">
        <h2 class="section-title-sales">Calculate Your Loan Amount</h2>
        
        <div class="calculator-card">
            <div class="calculator-slider">
                <label>Vehicle Value: <span id="vehicle-value">$10,000</span></label>
                <input type="range" id="value-slider" min="3000" max="50000" value="10000" step="500">
            </div>
            
            <div class="calculator-results">
                <div class="result-item">
                    <span class="result-label">You Could Borrow:</span>
                    <span class="result-amount" id="loan-amount">$2,500 - $5,000</span>
                </div>
                <div class="result-item">
                    <span class="result-label">Monthly Payment:</span>
                    <span class="result-amount" id="monthly-payment">As Low as $97/mo</span>
                </div>
            </div>
            
            <a href="#apply" class="btn-primary btn-block">
                Get This Amount Now →
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title-sales">Real Texas Customers, Real Results</h2>
        
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"Got $5,000 in 2 hours when my AC broke in July. Lifesaver!"</p>
                <div class="testimonial-author">
                    <img src="https://i.pravatar.cc/60?img=1" alt="Maria G.">
                    <div>
                        <strong>Maria G.</strong>
                        <span>Houston, TX - Got $5,000</span>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"Bad credit from divorce. They approved me instantly. Amazing!"</p>
                <div class="testimonial-author">
                    <img src="https://i.pravatar.cc/60?img=3" alt="James T.">
                    <div>
                        <strong>James T.</strong>
                        <span>Dallas, TX - Got $8,500</span>
                    </div>
                </div>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">"Medical bills were crushing us. Same day cash saved our home."</p>
                <div class="testimonial-author">
                    <img src="https://i.pravatar.cc/60?img=5" alt="Sarah L.">
                    <div>
                        <strong>Sarah L.</strong>
                        <span>Austin, TX - Got $12,000</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="testimonial-stats">
            <div class="stat">
                <span class="stat-number">4.8/5</span>
                <span class="stat-label">2,847 Reviews</span>
            </div>
            <div class="stat">
                <span class="stat-number">$4.2M</span>
                <span class="stat-label">Funded This Month</span>
            </div>
            <div class="stat">
                <span class="stat-number">15 Min</span>
                <span class="stat-label">Average Approval</span>
            </div>
        </div>
    </div>
</section>

<!-- How It Works - Simplified -->
<section class="how-it-works">
    <div class="container">
        <h2 class="section-title-sales">3 Simple Steps to Your Cash</h2>
        
        <div class="steps-timeline">
            <div class="step-item">
                <div class="step-number">1</div>
                <h3>Fill Form Above</h3>
                <p>60 seconds, no SSN needed</p>
                <span class="step-time">Right Now</span>
            </div>
            
            <div class="step-item">
                <div class="step-number">2</div>
                <h3>Get Approved</h3>
                <p>Instant decision, clear terms</p>
                <span class="step-time">15 Minutes</span>
            </div>
            
            <div class="step-item">
                <div class="step-number">3</div>
                <h3>Receive Cash</h3>
                <p>Direct deposit or pick up</p>
                <span class="step-time">Same Day</span>
            </div>
        </div>
        
        <div class="cta-center">
            <a href="#apply" class="btn-primary btn-large">Start Step 1 Now - Get Your Cash Today</a>
        </div>
    </div>
</section>

<!-- FAQ - Objection Handling -->
<section class="faq-sales">
    <div class="container">
        <h2 class="section-title-sales">Common Questions - Quick Answers</h2>
        
        <div class="faq-grid">
            <div class="faq-item">
                <h3 class="faq-question">Will this hurt my credit?</h3>
                <p class="faq-answer">No! We don't run hard credit checks. Your score stays safe.</p>
                <a href="#apply" class="faq-cta">Apply Without Risk →</a>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">Can I still drive my car?</h3>
                <p class="faq-answer">Yes! You keep your keys and drive normally. We only hold the title.</p>
                <a href="#apply" class="faq-cta">Keep Your Car →</a>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">What if I have bad credit?</h3>
                <p class="faq-answer">No problem! We approve based on your vehicle value, not credit score.</p>
                <a href="#apply" class="faq-cta">Get Approved Now →</a>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">How fast can I get money?</h3>
                <p class="faq-answer">Same day! Most customers have cash within 2-3 hours of applying.</p>
                <a href="#apply" class="faq-cta">Get Cash Today →</a>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">What documents do I need?</h3>
                <p class="faq-answer">Just your car title, ID, and proof of income. That's it!</p>
                <a href="#apply" class="faq-cta">Start Now →</a>
            </div>
            
            <div class="faq-item">
                <h3 class="faq-question">Are there hidden fees?</h3>
                <p class="faq-answer">Never! Our terms are clear and transparent. No surprises.</p>
                <a href="#apply" class="faq-cta">See Your Terms →</a>
            </div>
        </div>
    </div>
</section>

<!-- Urgency Section -->
<section class="urgency-section">
    <div class="container">
        <div class="urgency-card">
            <h2>⏰ Limited Funds Available Today</h2>
            <div class="funds-meter">
                <div class="funds-bar" style="width: 35%"></div>
                <span class="funds-text">Only $247,000 of $700,000 remaining for Texas today</span>
            </div>
            <p>Same-day funding closes at 5:00 PM CST</p>
            <a href="#apply" class="btn-primary btn-large">
                Secure Your Funds Now Before They're Gone
            </a>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="final-cta">
    <div class="container">
        <h2>Ready to Get Your Cash?</h2>
        <p>Join 4,387 Texans who got funded this month</p>
        
        <div class="cta-buttons">
            <a href="#apply" class="btn-primary btn-xlarge">
                Get Started Now - 60 Second Form
            </a>
            <a href="tel:18882248177" class="btn-secondary btn-xlarge">
                📞 Or Call: 888-224-8177
            </a>
        </div>
        
        <div class="cta-trust">
            <span>✓ No Obligation</span>
            <span>✓ No Credit Impact</span>
            <span>✓ Keep Your Car</span>
        </div>
    </div>
</section>

<!-- Trust Footer -->
<section class="trust-footer">
    <div class="container">
        <div class="trust-grid">
            <div class="trust-item">
                <strong>Licensed in Texas</strong>
                <span>License #TXB-4521</span>
            </div>
            <div class="trust-item">
                <strong>BBB Accredited</strong>
                <span>A+ Rating</span>
            </div>
            <div class="trust-item">
                <strong>Secure & Safe</strong>
                <span>256-bit SSL Encryption</span>
            </div>
            <div class="trust-item">
                <strong>Customer Service</strong>
                <span>Mon-Fri 8am-8pm CST</span>
            </div>
        </div>
    </div>
</section>

<!-- Sticky Mobile CTA -->
<div class="sticky-mobile-cta">
    <a href="#apply" class="sticky-btn-primary">Get Cash Now</a>
    <a href="tel:18882248177" class="sticky-btn-phone">📞</a>
</div>

<!-- Exit Intent Popup -->
<div class="exit-popup" id="exit-popup" style="display: none;">
    <div class="exit-popup__content">
        <button class="exit-popup__close">&times;</button>
        <h2>Wait! Don't Leave Empty-Handed</h2>
        <p class="exit-popup__amount">You're Pre-Qualified for $2,500-$15,000</p>
        <p>Complete your application in 60 seconds:</p>
        <a href="#apply" class="btn-primary btn-block">Claim Your Cash Now</a>
        <p class="exit-popup__disclaimer">No obligation, no credit impact</p>
    </div>
</div>

<?php get_footer(); ?>