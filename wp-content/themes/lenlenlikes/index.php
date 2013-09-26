<?php
    /**
     * The main template file. =>Default Template im Backend
     *
     * This is the most generic template file in a WordPress theme
     * and one of the two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * For example, it puts together the home page when no home.php file exists.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     *
     */

get_header(); ?>
<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>



    <!--Start Main Content-->
    <div id="site-content">
        <div class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </div>
        <!-- end .entry-header -->

        <div class="entry-content ">
            <?php the_content(); ?>
        </div>
        <!-- end .entry-content -->
    </div>
    <!--End Main Content-->

<?php endwhile; else: ?>
    // no posts found
<?php endif; ?>


<?php get_footer(); ?>