<?php
/**
 * Template Part: Locations Section
 * Displays Texas cities grid with links
 */
if (!defined('ABSPATH')) { exit; }

// Define Texas cities
$texas_cities = [
    'houston' => 'Houston',
    'san-antonio' => 'San Antonio', 
    'dallas' => 'Dallas',
    'austin' => 'Austin',
    'fort-worth' => 'Fort Worth',
    'el-paso' => 'El Paso',
    'arlington' => 'Arlington',
    'corpus-christi' => 'Corpus Christi',
    'plano' => 'Plano',
    'lubbock' => 'Lubbock'
];

// Service types for cross-linking
$services = [
    'car-title-loans' => 'Car Title Loans',
    'online-title-loans' => 'Online Title Loans',
    'no-credit-check-title-loans' => 'No Credit Check',
    'emergency-title-loans' => 'Emergency Loans',
    'vehicle-title-loans' => 'Vehicle Title Loans'
];
?>

<section class="locations" id="locations">
    <div class="container">
        <div class="locations__header">
            <h2 class="section__title">Texas Cities We Serve</h2>
            <a class="button" href="#apply">Apply Now</a>
        </div>
        <div class="locations__grid">
            <ul>
                <?php 
                $count = 0;
                foreach (array_slice($texas_cities, 0, 6) as $slug => $name) : 
                    $city_url = home_url('/cities/' . $slug . '/');
                ?>
                    <li><a href="<?php echo esc_url($city_url); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($name); ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul>
                <?php foreach (array_slice($texas_cities, 6, 4) as $slug => $name) : 
                    $city_url = home_url('/cities/' . $slug . '/');
                ?>
                    <li><a href="<?php echo esc_url($city_url); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html($name); ?></a></li>
                <?php endforeach; ?>
                <!-- Add some popular city-service combinations -->
                <li><a href="<?php echo home_url('/houston/car-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Houston Car Loans</a></li>
                <li><a href="<?php echo home_url('/dallas/online-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Dallas Online Loans</a></li>
            </ul>
            <ul>
                <li><a href="<?php echo home_url('/san-antonio/emergency-title-loans/'); ?>" style="color: inherit; text-decoration: none;">San Antonio Emergency</a></li>
                <li><a href="<?php echo home_url('/austin/no-credit-check-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Austin No Credit Check</a></li>
                <li><a href="<?php echo home_url('/fort-worth/vehicle-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Fort Worth Vehicles</a></li>
                <li><a href="<?php echo home_url('/el-paso/car-title-loans/'); ?>" style="color: inherit; text-decoration: none;">El Paso Title Loans</a></li>
                <li><a href="<?php echo home_url('/arlington/online-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Arlington Online</a></li>
                <li><a href="<?php echo home_url('/plano/emergency-title-loans/'); ?>" style="color: inherit; text-decoration: none;">Plano Emergency</a></li>
            </ul>
        </div>
    </div>
</section>