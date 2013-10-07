<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package    WordPress
 * @subpackage Twenty_Thirteen
 * @since      Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="archive-header">

<?php if (have_posts()) : ?>

    <h1 class="entry-title"><?php echo $wp_query->found_posts; ?><?php printf(__(' Search Results for: %s', 'lenlenlikes'), get_search_query()); ?></h1>
    </div>

<?php endif; ?>

    <!--Start Main Content-->

    <div id="page_post_content">
<?php

if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) : while (have_posts()) : the_post();
    ?>
    <!-- end .entry-header -->
        <article id="post-0" class="item">
            <div class="overlay">
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title=""
                                               rel="bookmark"><?php the_title(); ?></a></h2>
                                <span class="entry-meta"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?>
                                        / </a> <?php comments_popup_link(); ?></span>
                    <a href="<?php the_permalink(); ?>" class="icon-eye" title="icon-eye" target="_blank"><span
                            aria-hidden="true"
                            data-icon="&#xe00a;"
                </header>
            </div>
            <!--Link zum Post -->
            <div class="thumb-wrap">
                <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('homepage-thumb'); ?></a>
            </div>
        </article>


            <?php endwhile; else:
    ?>
            <div class="archive-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'lenlenlikes' ); ?></h1>  </div>
    <div id="content">
    <div id="site-content">
    <article id="post-0" class="search_none">
                <p><?php _e( 'Sorry, nothing matched your search criteria. <br> Please try again with different keywords', 'renkon' ); ?></p>
    <?php get_template_part ('content', 'searchform'); ?>
            <?php endif; ?>
    </article>
    </div>
</div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>