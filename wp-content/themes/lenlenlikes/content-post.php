<?php
/**
 * The Template for displaying all single posts.
 *
 *
 *
 */

get_header(); ?>
<?php

$content_post = get_post($my_postid);
$content = $content_post->post_content;
if (strpos($content,'orbit') !== false) {
    echo 'no slideshow';

}elseif (strpos($content,'orbit') === false) {
 echo 'slideshow';
}




if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div id="page_post_content">
        <!--Start Page/Post Content-->
        <article id="" class="post">
            <header class="entry-header">
                <div class="entry-date"><?php the_date('Y-m-d', '<h4>', '</h4>'); ?></div>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
             </header>
            <!-- end .entry-header -->
                <div class="entry-content">
                    <div class="image_text">
                        <?php
                        //check if single-post has a image-gallery
                        //if no show Thumbnail
                        if (strpos($post->post_content,'[gallery') === false){
                         ?>
                            <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('homepage-thumb_big'); ?></a>
                            <p class="post_text">
                                <?php the_content(); ?>
                            </p>

                        <?php }else{ ?>
                            <p class="post_text">
                                <?php the_content(); ?>
                            </p>
                        <?php }
                        ?>
                    </div>
                </div>



            <footer class="entry-meta">
                <div class="postinfo-wrap">
                    <span class="share-btn"><span
                            aria-hidden="true" data-icon="&#xe009;" class="hi-icon icon-share"></span>Share this</span>
                    <div class="category">
                    <span>CATEGORY</span><?php the_category(' ') ;?>
                    </div>
                    <div class="tags">
                        <span>TAGS</span><?php the_tags(' ');  ?>
                    </div>
                </div>
            </footer>
        </article>

        <div class="comments-wrap">
            <!-- Comments template wird geladen-->
            <?php comments_template(); ?>


            <!--Post-Navigation-->
            <nav class="nav-single clearfix">
                <div class="nav-previous"><?php next_post_link( '%link', __( 'Next Post  &rarr;', 'lenlenlikes' ) ); ?></div>
                <div class="nav-next"><?php previous_post_link( '%link', __( '&larr; Previous Post', 'lenlenlikes' ) ); ?></div>
            </nav><!-- end .nav-below -->
    </div>
    <!--End Page/Post Content-->

<?php endwhile; else: ?>
    // no posts found
<?php endif; ?>


<?php get_footer(); ?>