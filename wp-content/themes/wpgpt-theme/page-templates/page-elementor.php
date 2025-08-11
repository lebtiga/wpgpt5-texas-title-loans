<?php
/**
 * Template Name: Elementor Full Width
 * Description: Full width template for Elementor page builder
 */

get_header();
?>

<main id="main" class="site-main elementor-page">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();