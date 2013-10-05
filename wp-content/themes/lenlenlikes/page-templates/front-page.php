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
            $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
            $the_query = new WP_Query( 'posts_per_page=10&paged=' . $paged );
            ?>
            <?php while ( $the_query->have_posts() ) :
                $the_query->the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?> <?php endwhile; ?>

        </div>
    </div>
<?php if ( $paged > 1 ) { ?>

    <nav id="nav-posts">
        <div class="prev"><?php next_posts_link( '« Previous Posts', $the_query->max_num_pages ); ?></div>
        <div class="next"><?php previous_posts_link( 'Newer Posts »' ); ?></div>
    </nav>

<?php } else { ?>

    <nav id="nav-posts">
        <div class="prev"><?php next_posts_link( '« Previous Posts', $the_query->max_num_pages ); ?></div>
    </nav>

<?php } ?>

<?php wp_reset_postdata(); ?>

<?php wp_reset_postdata(); ?>





<?php get_footer(); ?>