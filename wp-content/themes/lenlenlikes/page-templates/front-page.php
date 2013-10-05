<?php
/**
 * Template Name: Home Template
 */


get_header(); ?>
<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!--Bild wird geladen und mit CSS unsichtbar gemacht-->
    <div id="hidden_image">
        <img src="<?php the_field('main_image'); ?>" alt="Main Image Home-Site">
    </div>

    <!--Bild wird mit jQuery als Background-Image ins CSS geladen-->
    <div id="main_image">

        <!--Headline wird ausgegeben-->
        <h1 class="headline"><?php the_field('headline'); ?><br></h1>

        <!--Text unterhalb Headline wird ausgegeben-->
        <p><?php the_field('text'); ?></p>
        <!--Button zu den Artikel-->
        <a href="#go_posts" title="Show Content"><span aria-hidden="true"
                                                      data-icon="&#xe003;"
                                                      class="icon-arrow-down-alt1"></span></a>
    </div>
<?php endwhile; else: ?>
    // no posts found
<?php endif; ?>

        <div id="go_posts"></div>
        <div id="site-content">
    <div id="list">
            <?php
            $linksPosts = new WP_Query( 'posts_per_page=30' );
            ?>
            <?php while ($linksPosts->have_posts()) :
                $linksPosts->the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?> <?php endwhile; ?>
                </div> </div>

    <span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'aquaponicfamily' ) . '</span> %title' ); ?></span>
    <span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'aquaponicfamily' ) . '</span>' ); ?></span>
    </nav><!-- .nav-single -->





<?php get_footer(); ?>