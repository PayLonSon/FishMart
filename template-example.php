<?php
/**
 * Template Name: Example Template
 * Template Post Type: page
 *
 * This is the template for displaying an example page.
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php
                // Start the loop.
                while (have_posts()) :
                    the_post();

                    // Include the page content template.
                    the_content();

                // End the loop.
                endwhile;
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
    </div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>

