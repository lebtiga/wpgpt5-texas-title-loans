<?php if (!defined('ABSPATH')) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="topbar">
    <div class="container topbar__inner">
        <span class="topbar__label">Speak to an expert</span>
        <?php $phone = get_theme_mod('wpgpt_phone', '888-224-8177'); ?>
        <a class="topbar__phone" href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
    </div>
</div>
<header class="site-header">
    <div class="container">
        <a class="site-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <?php
            $logo_url = get_theme_mod('wpgpt_logo_url');
            if ($logo_url) {
                echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '" style="height:36px; width:auto;" />';
            } else if (function_exists('the_custom_logo') && has_custom_logo()) {
                the_custom_logo();
            } else {
                bloginfo('name');
            }
            ?>
        </a>
        <nav class="site-nav" aria-label="Primary">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu menu--primary',
                'fallback_cb'    => false,
            ]);
            ?>
        </nav>
        <div class="header-cta">
            <?php $cta_label = get_theme_mod('wpgpt_cta_label', 'Get Started'); $cta_link = get_theme_mod('wpgpt_cta_link', '#apply'); ?>
            <a class="button button--small button--primary" href="<?php echo esc_url($cta_link); ?>"><?php echo esc_html($cta_label); ?></a>
        </div>
    </div>
</header>
<main class="site-main" id="main-content">
