<?php
    /**
     * The template for displaying Category pages.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     *
     */




get_header(); ?>



<div class="archive-header">
    <?php if (is_category()) { ?>
        <h1 class="entry-title">"<?php
            single_cat_title(); ?>"</h1>
    <?php
    } elseif (is_tag()) {
        ?>
        <h1 class="entry-title"><?php _e('Tagged as: "', 'lenlenlikes');
            single_tag_title(); ?>"</h1>
    <?php
    } elseif (is_month()) {
        ?>
        <h1 class="entry-title"><?php _e('Monthly Archives of:  "', 'lenlenlikes');
            the_time('F Y'); ?>"</h1>
    <?php }; ?>
</div>

<!--Start Main Content-->
<div id="content" >

    <div id="site-content">
        <div id="list">

        <?php

        if (have_posts()) : while (have_posts()) : the_post();
            ?>

            <!-- end .entry-header -->
            <article id="post-0" class="item">
                <div class="overlay">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title=""
                                                   rel="bookmark"><?php the_title(); ?></a></h2>
                            <span class="entry-meta"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(
                                    ); ?> / </a> <?php comments_popup_link(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="icon-eye" title="icon-eye" target="_blank"><span aria-hidden="true"
                                                                                                                    data-icon="&#xe00a;"
                    </header>
                </div>
                <!--Link zum Post -->
                <div class="thumb-wrap">
                    <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('homepage-thumb'); ?></a>
                </div>
            </article>

        <?php endwhile; else: ?>
            // no posts found
        <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>