<?php

/*
Template Name: Blog Archive Template
*/
/**
 *
 *
 *
 *
 */

get_header(); ?>
<?php

if (have_posts()) : while (have_posts()) : the_post();
    ?>
    <div id="page_post_content">
        <div class="blog_archives">
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <h3 class="archivepage-title"><?php _e('Filter by Tags', 'lenlenlikes') ?></h3>

            <div class="archive-tags">
                <?php wp_tag_cloud('orderby=count&number=50'); ?>
            </div>
            <!-- end .archive-tags -->

            <h3 class="archivepage-title"><?php _e('The Latest 20 Posts', 'lenlenlikes') ?></h3>
            <ul class="latest-posts-list">
                <?php wp_get_archives('type=postbypost&limit=20'); ?>
            </ul>
            <!-- end .latest-posts-list -->

            <h3 class="archivepage-title"><?php _e('The Monthly Archive', 'lenlenlikes') ?></h3>
            <ul class="monthly-archive-list">
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
            <!-- end .monthly-archive-list -->
        </div>
        <!-- end .entry-content -->

    </div>
<?php endwhile; else: ?>
    // no posts found
<?php endif; ?>

<?php get_footer(); ?>