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
            <div class="grid-sizer"></div>

            <?php
            $linksPosts = new WP_Query( 'posts_per_page=20' );
            ?>
            <?php while ($linksPosts->have_posts()) :
                $linksPosts->the_post(); ?>
                <article id="post-<?php the_ID(); ?> " class="item">
                    <div class="overlay">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title=""
                                                       rel="bookmark"><?php the_title(); ?></a></h2>
                            <span class="entry-meta"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(
                                ); ?> / </a> <?php comments_popup_link(); ?></span>
                            <a href="<?php the_permalink(); ?>" class="icon-eye" title="icon-eye" target="_blank"><span aria-hidden="true"
                                                                                                   data-icon="&#xe00a;"
                                                                                                   class="icon-eye"></span></a>
                        </header>
                    </div>
                    <!--Link zum Post -->
                    <div class="thumb-wrap">
                        <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('homepage-thumb'); ?></a>
                    </div>
                </article> <?php endwhile; ?>
        </div>


<script>
    jQuery(document).ready(function(){


    });
</script>


<?php get_footer(); ?>