<?php
/**
 * The main template file. =>blog page => die letzen Post werden angezeigt
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header();?>




    <div id="go_posts"></div>
    <div id="site-content">
        <div id="list">
            <?php

            $temp = $wp_query; $wp_query= null;
            $wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
            ?>
            <?php while ($wp_query->have_posts()) :
                $wp_query->the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?> <?php endwhile; ?>

        </div> </div>
<?php if ($paged > 1) { ?>

    <nav id="nav-posts">
        <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
        <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
    </nav>

<?php } else { ?>

    <nav id="nav-posts">
        <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
    </nav>

<?php } ?>

<?php wp_reset_postdata(); ?>
<?php get_footer();?>