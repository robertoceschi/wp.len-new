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

        <?php if (have_posts()) : ?>

            <?php /* The loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>


        <?php else : ?>
        <?php endif; ?>

    </div>

</div>
<?php get_footer();?>