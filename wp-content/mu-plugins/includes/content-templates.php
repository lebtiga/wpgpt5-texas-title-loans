<?php
/**
 * Content Templates for Texas Title Loans
 * Provides additional template functions and data
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get comprehensive city data
 */
function get_city_data($city_slug) {
    $cities = [
        'houston' => [
            'name' => 'Houston',
            'population' => '2.3 million',
            'county' => 'Harris County',
            'areas' => [
                ['name' => 'Downtown Houston', 'description' => 'Central business district with major corporations and cultural venues'],
                ['name' => 'The Galleria', 'description' => 'Uptown area known for shopping and business centers'],
                ['name' => 'Midtown', 'description' => 'Vibrant neighborhood with restaurants and nightlife'],
                ['name' => 'Heights', 'description' => 'Historic area with Victorian homes and local businesses'],
                ['name' => 'Montrose', 'description' => 'Diverse neighborhood with arts and entertainment']
            ],
            'economy' => 'Energy, healthcare, aerospace, and port operations',
            'landmarks' => ['Space Center Houston', 'Museum District', 'Houston Zoo']
        ],
        'san-antonio' => [
            'name' => 'San Antonio',
            'population' => '1.5 million',
            'county' => 'Bexar County',
            'areas' => [
                ['name' => 'Downtown', 'description' => 'Historic center with River Walk and Alamo'],
                ['name' => 'North Central', 'description' => 'Airport area and major shopping districts'],
                ['name' => 'Medical Center', 'description' => 'South Texas Medical Center district'],
                ['name' => 'Stone Oak', 'description' => 'Upscale residential and commercial area'],
                ['name' => 'Alamo Heights', 'description' => 'Historic affluent neighborhood']
            ],
            'economy' => 'Military, healthcare, tourism, and financial services',
            'landmarks' => ['The Alamo', 'River Walk', 'Six Flags Fiesta Texas']
        ],
        'dallas' => [
            'name' => 'Dallas',
            'population' => '1.3 million',
            'county' => 'Dallas County',
            'areas' => [
                ['name' => 'Downtown Dallas', 'description' => 'CBD with Fortune 500 companies'],
                ['name' => 'Uptown', 'description' => 'Trendy area with dining and nightlife'],
                ['name' => 'Deep Ellum', 'description' => 'Entertainment and arts district'],
                ['name' => 'Bishop Arts', 'description' => 'Eclectic neighborhood with local shops'],
                ['name' => 'Highland Park', 'description' => 'Affluent residential area']
            ],
            'economy' => 'Banking, commerce, telecommunications, and technology',
            'landmarks' => ['Reunion Tower', 'Dallas Museum of Art', 'Sixth Floor Museum']
        ],
        'austin' => [
            'name' => 'Austin',
            'population' => '1.0 million',
            'county' => 'Travis County',
            'areas' => [
                ['name' => 'Downtown Austin', 'description' => 'State capitol and business district'],
                ['name' => 'South Congress', 'description' => 'Trendy shopping and dining area'],
                ['name' => 'East Austin', 'description' => 'Hip neighborhood with food trucks and venues'],
                ['name' => 'Domain', 'description' => 'North Austin shopping and tech hub'],
                ['name' => 'Westlake', 'description' => 'Upscale residential community']
            ],
            'economy' => 'Technology, government, education, and music industry',
            'landmarks' => ['State Capitol', 'UT Austin', '6th Street']
        ],
        'fort-worth' => [
            'name' => 'Fort Worth',
            'population' => '918,000',
            'county' => 'Tarrant County',
            'areas' => [
                ['name' => 'Downtown', 'description' => 'Sundance Square and business district'],
                ['name' => 'Cultural District', 'description' => 'Museums and arts venues'],
                ['name' => 'Stockyards', 'description' => 'Historic district with Western heritage'],
                ['name' => 'West 7th', 'description' => 'Entertainment and dining corridor'],
                ['name' => 'TCU Area', 'description' => 'University neighborhood']
            ],
            'economy' => 'Aviation, defense, manufacturing, and logistics',
            'landmarks' => ['Fort Worth Stockyards', 'Kimbell Art Museum', 'Sundance Square']
        ],
        'el-paso' => [
            'name' => 'El Paso',
            'population' => '682,000',
            'county' => 'El Paso County',
            'areas' => [
                ['name' => 'Downtown', 'description' => 'Historic business district'],
                ['name' => 'West El Paso', 'description' => 'Residential and commercial growth area'],
                ['name' => 'Northeast', 'description' => 'Fort Bliss military area'],
                ['name' => 'East El Paso', 'description' => 'Established residential neighborhoods'],
                ['name' => 'Mission Valley', 'description' => 'Historic mission trail area']
            ],
            'economy' => 'Military, healthcare, trade, and manufacturing',
            'landmarks' => ['Franklin Mountains', 'Plaza Theatre', 'Mission Trail']
        ],
        'arlington' => [
            'name' => 'Arlington',
            'population' => '398,000',
            'county' => 'Tarrant County',
            'areas' => [
                ['name' => 'Entertainment District', 'description' => 'Sports stadiums and Six Flags'],
                ['name' => 'Downtown', 'description' => 'Urban center development'],
                ['name' => 'North Arlington', 'description' => 'Residential communities'],
                ['name' => 'South Arlington', 'description' => 'Parks and neighborhoods'],
                ['name' => 'UT Arlington Area', 'description' => 'University district']
            ],
            'economy' => 'Entertainment, aerospace, and automotive manufacturing',
            'landmarks' => ['AT&T Stadium', 'Globe Life Field', 'Six Flags Over Texas']
        ],
        'plano' => [
            'name' => 'Plano',
            'population' => '288,000',
            'county' => 'Collin County',
            'areas' => [
                ['name' => 'Downtown Plano', 'description' => 'Historic arts district'],
                ['name' => 'Legacy West', 'description' => 'Corporate headquarters and shopping'],
                ['name' => 'Shops at Legacy', 'description' => 'Mixed-use development'],
                ['name' => 'West Plano', 'description' => 'Upscale residential areas'],
                ['name' => 'East Plano', 'description' => 'Established neighborhoods']
            ],
            'economy' => 'Corporate headquarters, technology, and finance',
            'landmarks' => ['Legacy West', 'Historic Downtown', 'Arbor Hills Nature Preserve']
        ],
        'corpus-christi' => [
            'name' => 'Corpus Christi',
            'population' => '326,000',
            'county' => 'Nueces County',
            'areas' => [
                ['name' => 'Downtown', 'description' => 'Marina and business district'],
                ['name' => 'Southside', 'description' => 'Residential and commercial area'],
                ['name' => 'Calallen', 'description' => 'Northwest community'],
                ['name' => 'Flour Bluff', 'description' => 'Naval air station area'],
                ['name' => 'Padre Island', 'description' => 'Beach and resort area']
            ],
            'economy' => 'Port operations, petroleum, tourism, and military',
            'landmarks' => ['USS Lexington', 'Texas State Aquarium', 'Padre Island']
        ],
        'lubbock' => [
            'name' => 'Lubbock',
            'population' => '260,000',
            'county' => 'Lubbock County',
            'areas' => [
                ['name' => 'Downtown', 'description' => 'Business and cultural district'],
                ['name' => 'Texas Tech Area', 'description' => 'University district'],
                ['name' => 'South Lubbock', 'description' => 'Growing residential area'],
                ['name' => 'North Lubbock', 'description' => 'Established neighborhoods'],
                ['name' => 'West Lubbock', 'description' => 'New development area']
            ],
            'economy' => 'Agriculture, education, healthcare, and manufacturing',
            'landmarks' => ['Texas Tech University', 'Buddy Holly Center', 'National Ranching Heritage Center']
        ]
    ];
    
    return $cities[$city_slug] ?? [
        'name' => ucwords(str_replace('-', ' ', $city_slug)),
        'areas' => [
            ['name' => 'Downtown', 'description' => 'Central business district'],
            ['name' => 'Suburbs', 'description' => 'Residential areas'],
            ['name' => 'Surrounding Areas', 'description' => 'Nearby communities']
        ]
    ];
}

/**
 * Get service-specific data
 */
function get_service_data($service_slug) {
    $services = [
        'title-loans' => [
            'name' => 'Title Loans',
            'description' => 'Fast cash using your vehicle title as collateral',
            'loan_amounts' => '$500 to $50,000',
            'approval_time' => '30 minutes',
            'requirements' => [
                'Clear vehicle title',
                'Valid government ID',
                'Proof of income',
                'Vehicle for inspection'
            ],
            'benefits' => [
                'Keep driving your vehicle',
                'Same-day funding available',
                'No prepayment penalties',
                'Flexible repayment terms'
            ]
        ],
        'online-title-loans' => [
            'name' => 'Online Title Loans',
            'description' => 'Apply online and get approved in minutes',
            'loan_amounts' => '$500 to $25,000',
            'approval_time' => '15 minutes online',
            'requirements' => [
                'Vehicle title photos',
                'ID verification',
                'Online application',
                'Vehicle photos'
            ],
            'benefits' => [
                'Apply from home 24/7',
                'Instant pre-approval',
                'Digital document upload',
                'Fast direct deposit'
            ]
        ],
        'no-credit-check-title-loans' => [
            'name' => 'No Credit Check Title Loans',
            'description' => 'Get approved regardless of credit history',
            'loan_amounts' => '$500 to $35,000',
            'approval_time' => '30 minutes',
            'requirements' => [
                'Vehicle title',
                'Valid ID',
                'Vehicle value verification',
                'Proof of residence'
            ],
            'benefits' => [
                'No credit score required',
                'Bad credit welcome',
                'Bankruptcy OK',
                'Focus on vehicle value'
            ]
        ],
        'emergency-title-loans' => [
            'name' => 'Emergency Title Loans',
            'description' => 'Same-day funding for urgent financial needs',
            'loan_amounts' => '$500 to $15,000',
            'approval_time' => 'Within 1 hour',
            'requirements' => [
                'Emergency documentation',
                'Vehicle title',
                'Quick verification',
                'Bank account for deposit'
            ],
            'benefits' => [
                'Priority processing',
                'Same-day cash',
                'Weekend availability',
                '24-hour support'
            ]
        ],
        'vehicle-title-loans' => [
            'name' => 'Vehicle Title Loans',
            'description' => 'Loans for cars, trucks, motorcycles, and RVs',
            'loan_amounts' => '$1,000 to $100,000',
            'approval_time' => '45 minutes',
            'requirements' => [
                'Any vehicle type',
                'Clear title',
                'Vehicle inspection',
                'Insurance proof'
            ],
            'benefits' => [
                'All vehicles accepted',
                'Classic cars welcome',
                'Commercial vehicles OK',
                'RVs and boats eligible'
            ]
        ]
    ];
    
    return $services[$service_slug] ?? [
        'name' => 'Title Loan Service',
        'description' => 'Professional title loan services',
        'loan_amounts' => '$500 to $50,000',
        'approval_time' => '30 minutes'
    ];
}

/**
 * Generate FAQ content
 */
function generate_faq_content($context = 'general') {
    $faqs = [
        [
            'question' => 'How much can I borrow with a title loan in Texas?',
            'answer' => 'Loan amounts typically range from $500 to $50,000, depending on your vehicle\'s value and your ability to repay. Most customers receive between $1,000 and $10,000.'
        ],
        [
            'question' => 'Can I keep driving my car with a title loan?',
            'answer' => 'Yes! You keep and drive your vehicle throughout the entire loan period. We only hold onto your title as collateral, not your car.'
        ],
        [
            'question' => 'What documents do I need for a title loan?',
            'answer' => 'You\'ll need: (1) Clear vehicle title in your name, (2) Valid government-issued ID, (3) Proof of income, (4) Proof of residence, and (5) Vehicle for inspection.'
        ],
        [
            'question' => 'How fast can I get my money?',
            'answer' => 'Most customers receive their funds the same day they apply. Online applications can be approved in as little as 15 minutes, with cash available within hours.'
        ],
        [
            'question' => 'Do you check credit for title loans?',
            'answer' => 'No credit check is required for most title loans. Your loan is secured by your vehicle\'s value, not your credit score. Bad credit, no credit, and bankruptcies are all acceptable.'
        ]
    ];
    
    return $faqs;
}

/**
 * Generate schema markup for local business
 */
function generate_local_business_schema($city_name, $city_slug) {
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => $city_name . ' Title Loans',
        'description' => 'Fast title loans in ' . $city_name . ', Texas. Same-day approval, keep your car, no credit check required.',
        'url' => home_url('/' . $city_slug . '-title-loans/'),
        'telephone' => '888-224-8177',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => $city_name,
            'addressRegion' => 'TX',
            'addressCountry' => 'US'
        ],
        'openingHours' => 'Mo-Fr 09:00-18:00, Sa 09:00-14:00',
        'priceRange' => '$500-$50,000'
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}

/**
 * Get testimonial content
 */
function get_testimonials($city_name = '') {
    $testimonials = [
        [
            'name' => 'Maria G.',
            'rating' => 5,
            'text' => 'Got approved in 30 minutes and had cash the same day. The process was so easy and the staff was incredibly helpful.',
            'location' => $city_name ?: 'Houston'
        ],
        [
            'name' => 'James T.',
            'rating' => 5,
            'text' => 'I needed emergency funds for medical bills. They approved my application quickly even with bad credit. Lifesaver!',
            'location' => $city_name ?: 'Dallas'
        ],
        [
            'name' => 'Sarah L.',
            'rating' => 5,
            'text' => 'Best title loan experience ever. No hidden fees, clear terms, and I kept driving my car. Highly recommend!',
            'location' => $city_name ?: 'Austin'
        ]
    ];
    
    return $testimonials;
}

/**
 * Get competitive advantages
 */
function get_competitive_advantages() {
    return [
        'Lowest rates in Texas - guaranteed',
        'Approval in 30 minutes or less',
        'No prepayment penalties ever',
        'Keep driving your vehicle',
        'Bad credit or no credit OK',
        'Same-day cash available',
        'Flexible repayment terms',
        'Local Texas company you can trust'
    ];
}

/**
 * Generate internal links for SEO
 */
function generate_internal_links($current_page_type, $current_city = '', $current_service = '') {
    $links = [];
    
    // Always include main service pages
    $links[] = ['url' => '/title-loans/', 'text' => 'Texas Title Loans'];
    $links[] = ['url' => '/online-title-loans/', 'text' => 'Online Title Loans'];
    
    // Add relevant city links
    if ($current_city && $current_city !== 'houston') {
        $links[] = ['url' => '/houston-title-loans/', 'text' => 'Houston Title Loans'];
    }
    if ($current_city && $current_city !== 'dallas') {
        $links[] = ['url' => '/dallas-title-loans/', 'text' => 'Dallas Title Loans'];
    }
    
    return $links;
}