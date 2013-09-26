<?php
/**
 * All Static - Sites Hauptemplate für statische Seiten
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