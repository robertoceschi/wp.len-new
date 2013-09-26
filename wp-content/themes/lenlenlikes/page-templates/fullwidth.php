<?php
/**
 * Template Name: Fullwidth Template
 *
 */


get_header(); ?>
<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>



    <div id="page_post_content">
    <!--Start Page/Post Content-->
    <article id="" class="post">
        <header class="entry-header">
            <!--Nur für Platzhalter wird mit CSS ausgeblendet-->
            <h1 class="entry-title-fullwidth"><?php the_title(); ?></h1>
        </header>
        <!-- end .entry-header -->
        <div class="entry-content">
            <div class="image_text">
                <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('homepage-thumb_big'); ?></a>
                <p class="post_text">
                    <?php the_content(); ?>
                </p>
            </div>
        </div>
    </article>
    <!--End Main Content-->

<?php endwhile; else: ?>
    // no posts found
<?php endif; ?>


<?php get_footer(); ?>