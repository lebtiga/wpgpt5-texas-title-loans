<?php
// Create Houston page using Elementor data structure
require_once 'wp-load.php';

// Get or create the page
$page = get_page_by_path('houston-title-loans-elementor');
if ($page) {
    wp_delete_post($page->ID, true);
}

// Create new page
$page_id = wp_insert_post([
    'post_title'    => 'Houston Car Title Loans - Professional Layout',
    'post_name'     => 'houston-title-loans-elementor',
    'post_content'  => '', // Elementor will handle content
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'post_author'   => 1,
]);

if (!$page_id) {
    die("Failed to create page\n");
}

// Set page template
update_post_meta($page_id, '_wp_page_template', 'page-templates/page-elementor.php');
update_post_meta($page_id, '_elementor_edit_mode', 'builder');
update_post_meta($page_id, '_elementor_template_type', 'wp-page');
update_post_meta($page_id, '_elementor_version', '3.27.3');

// Create Elementor data structure
$elementor_data = [
    [
        'id' => 'hero-section',
        'elType' => 'section',
        'settings' => [
            'layout' => 'full_width',
            'background_background' => 'classic',
            'background_image' => [
                'url' => 'https://images.unsplash.com/photo-1591474200742-8e512e6f98f8?w=1920&h=600&fit=crop'
            ],
            'background_overlay_background' => 'gradient',
            'background_overlay_color' => '#0d4c85',
            'background_overlay_color_b' => '#175ea6',
            'background_overlay_opacity' => ['size' => 0.7],
            'padding' => [
                'unit' => 'px',
                'top' => '100',
                'bottom' => '100'
            ]
        ],
        'elements' => [
            [
                'id' => 'hero-column',
                'elType' => 'column',
                'settings' => ['_column_size' => 100],
                'elements' => [
                    [
                        'id' => 'hero-title',
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'Houston Car Title Loans - Fast Cash When You Need It Most',
                            'align' => 'center',
                            'title_color' => '#ffffff',
                            'typography_typography' => 'custom',
                            'typography_font_size' => ['unit' => 'px', 'size' => 48],
                            'typography_font_weight' => '700'
                        ]
                    ],
                    [
                        'id' => 'hero-subtitle',
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p style="text-align: center; color: #ffffff; font-size: 22px;">Get approved in 30 minutes • Same-day funding • Keep driving your car</p>'
                        ]
                    ],
                    [
                        'id' => 'hero-buttons',
                        'elType' => 'widget',
                        'widgetType' => 'button',
                        'settings' => [
                            'text' => 'Get Started Now',
                            'align' => 'center',
                            'button_background_color' => '#3ba55c',
                            'size' => 'lg',
                            'border_radius' => ['unit' => 'px', 'size' => 50]
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'stats-section',
        'elType' => 'section',
        'settings' => [
            'padding' => ['unit' => 'px', 'top' => '60', 'bottom' => '60']
        ],
        'elements' => [
            [
                'id' => 'stat-1',
                'elType' => 'column',
                'settings' => ['_column_size' => 25],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'counter',
                        'settings' => [
                            'starting_number' => 1,
                            'ending_number' => 50,
                            'prefix' => '$',
                            'suffix' => 'K',
                            'title' => 'Loan Amounts',
                            'number_color' => '#3ba55c',
                            'title_color' => '#666666'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'stat-2',
                'elType' => 'column',
                'settings' => ['_column_size' => 25],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'counter',
                        'settings' => [
                            'ending_number' => 30,
                            'suffix' => ' Min',
                            'title' => 'Fast Approval',
                            'number_color' => '#3ba55c',
                            'title_color' => '#666666'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'stat-3',
                'elType' => 'column',
                'settings' => ['_column_size' => 25],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'Same Day',
                            'header_size' => 'h2',
                            'align' => 'center',
                            'title_color' => '#3ba55c'
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p style="text-align: center; color: #666;">Get Your Cash</p>'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'stat-4',
                'elType' => 'column',
                'settings' => ['_column_size' => 25],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'No Credit',
                            'header_size' => 'h2',
                            'align' => 'center',
                            'title_color' => '#3ba55c'
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p style="text-align: center; color: #666;">Check Required</p>'
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'about-section',
        'elType' => 'section',
        'settings' => [],
        'elements' => [
            [
                'id' => 'about-text',
                'elType' => 'column',
                'settings' => ['_column_size' => 50],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'Why Houston Residents Choose Our Car Title Loans',
                            'header_size' => 'h2',
                            'title_color' => '#0d4c85'
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p>Houston is America\'s fourth-largest city, home to the world\'s largest medical center, NASA\'s Johnson Space Center, and a thriving energy sector. But even in this dynamic economy, financial challenges can arise.</p><p>Our title loan services are specifically designed for Houston\'s diverse communities, from the Heights to Sugar Land, from Katy to The Woodlands. We understand the unique financial needs of Space City residents.</p>'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'about-image',
                'elType' => 'column',
                'settings' => ['_column_size' => 50],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'image',
                        'settings' => [
                            'image' => [
                                'url' => 'https://images.unsplash.com/photo-1587923623987-1374b6962116?w=600&h=400&fit=crop'
                            ],
                            'image_border_radius' => ['unit' => 'px', 'size' => 10]
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'benefits-section',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f8fafc',
            'padding' => ['unit' => 'px', 'top' => '80', 'bottom' => '80']
        ],
        'elements' => [
            [
                'id' => 'benefits-title-col',
                'elType' => 'column',
                'settings' => ['_column_size' => 100],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'Benefits of Our Houston Car Title Loans',
                            'header_size' => 'h2',
                            'align' => 'center',
                            'title_color' => '#0d4c85'
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'benefits-cards',
        'elType' => 'section',
        'settings' => [
            'background_background' => 'classic',
            'background_color' => '#f8fafc'
        ],
        'elements' => [
            [
                'id' => 'benefit-1',
                'elType' => 'column',
                'settings' => ['_column_size' => 33],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'image',
                        'settings' => [
                            'image' => ['url' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=200&fit=crop']
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'Same-Day Approval & Funding',
                            'header_size' => 'h3',
                            'title_color' => '#0d4c85'
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p>In a city that never slows down, neither should your access to emergency funds. Our streamlined approval process means Houston residents can often receive their cash the same day they apply.</p>'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'benefit-2',
                'elType' => 'column',
                'settings' => ['_column_size' => 33],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'image',
                        'settings' => [
                            'image' => ['url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=200&fit=crop']
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'Keep Driving Your Vehicle',
                            'header_size' => 'h3',
                            'title_color' => '#0d4c85'
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p>Houston\'s sprawling 665 square miles make a vehicle essential. Unlike selling or pawning your car, with our title loans, you keep driving while using its title as collateral.</p>'
                        ]
                    ]
                ]
            ],
            [
                'id' => 'benefit-3',
                'elType' => 'column',
                'settings' => ['_column_size' => 33],
                'elements' => [
                    [
                        'elType' => 'widget',
                        'widgetType' => 'image',
                        'settings' => [
                            'image' => ['url' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=200&fit=crop']
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'heading',
                        'settings' => [
                            'title' => 'No Credit Check Required',
                            'header_size' => 'h3',
                            'title_color' => '#0d4c85'
                        ]
                    ],
                    [
                        'elType' => 'widget',
                        'widgetType' => 'text-editor',
                        'settings' => [
                            'editor' => '<p>Your vehicle\'s value secures the loan, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>'
                        ]
                    ]
                ]
            ]
        ]
    ]
];

// Save Elementor data
update_post_meta($page_id, '_elementor_data', wp_json_encode($elementor_data));

// Also update with better standard content for non-Elementor view
$standard_content = '
<h1>Houston Car Title Loans - Fast Cash When You Need It Most</h1>

<p><strong>Get approved in 30 minutes • Same-day funding • Keep driving your car</strong></p>

<h2>Why Houston Residents Choose Our Car Title Loans</h2>

<p>Houston is America\'s fourth-largest city, home to the world\'s largest medical center, NASA\'s Johnson Space Center, and a thriving energy sector. But even in this dynamic economy, financial challenges can arise.</p>

<p>Our title loan services are specifically designed for Houston\'s diverse communities, from the Heights to Sugar Land, from Katy to The Woodlands. We understand the unique financial needs of Space City residents.</p>

<h2>Benefits of Our Houston Car Title Loans</h2>

<h3>Same-Day Approval & Funding</h3>
<p>In a city that never slows down, neither should your access to emergency funds. Our streamlined approval process means Houston residents can often receive their cash the same day they apply.</p>

<h3>Keep Driving Your Vehicle</h3>
<p>Houston\'s sprawling 665 square miles make a vehicle essential. Unlike selling or pawning your car, with our title loans, you keep driving while using its title as collateral.</p>

<h3>No Credit Check Required</h3>
<p>Your vehicle\'s value secures the loan, not your credit score. We approve customers with all credit types, including those with poor or no credit history.</p>

<h2>How Title Loans Work in Houston, TX</h2>

<ol>
<li><strong>Quick Application:</strong> Fill out our simple online form or visit our Houston location.</li>
<li><strong>Vehicle Evaluation:</strong> We\'ll assess your vehicle\'s value based on its make, model, year, and condition.</li>
<li><strong>Instant Approval:</strong> Once approved, review and sign your loan agreement.</li>
<li><strong>Get Your Cash:</strong> Receive your funds via direct deposit, check, or cash.</li>
<li><strong>Keep Your Car:</strong> Drive away in your vehicle with the cash you need.</li>
</ol>

<h2>Call 888-224-8177 or Apply Online Today!</h2>
';

wp_update_post([
    'ID' => $page_id,
    'post_content' => $standard_content
]);

echo "New Elementor-ready page created successfully!\n";
echo "Page ID: $page_id\n";
echo "View at: " . get_permalink($page_id) . "\n";
echo "\nYou can now edit this page with Elementor\'s visual builder for a professional layout.\n";