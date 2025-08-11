<?php if (!defined('ABSPATH')) { exit; } ?>
<?php get_header(); ?>

<div class="container">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
                <h1 class="entry__title"><?php the_title(); ?></h1>
                <div class="entry__content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else: ?>
        <p><?php esc_html_e('No content found.', 'wpgpt'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
