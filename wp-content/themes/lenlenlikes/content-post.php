


<?php
/**
 * The Template for displaying all single posts.
 *
 *
 *
 */

get_header(); ?>




<?php

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
                        //check if single-post has a image-gallery or a Slideshow
                        if (strpos($post->post_content,'[gallery') === false and get_field( "slideshow" ) === false ){
                         ?>
                        <a href="" class="thumb"><?php the_post_thumbnail('homepage-thumb_big'); ?></a>
                            <p class="post_text_sub">
                                <?php the_field('text_before'); ?>
                            </p>
                            <p class="post_text">
                                <?php the_field('post');?>
                               <br><br>
                            <?php $url = get_field('link');
                            if ($url != '') {
                                echo  '<a href="http://www.'. $url .'" target="_blank" class="post_link">' . $url . '</a>';
                            }else {
                            }
                            ?>
                            </p>

                            <p><?php the_field('soundcloud');?></p>

                            <?php } elseif(strpos($post->post_content,'[gallery') === false and get_field( "slideshow" ) === true ){;?>
                            <?php
                            //zeige Slideshow und Texte
                            the_content();?>
                            <p class="post_text_sub">
                                <?php echo the_field('text_before');?>
                            </p>
                            <p class="post_text">
                                  <?php the_field('post');?>
                                  </p>
                            <?php
                            $url = get_field('link');
                            if ($url != '') {
                                echo  '<a href="http://www.'.$url.'" target="_blank" class="post_link">' . $url . '</a>';
                            }else {
                            }
                            ?>
                            <p><?php the_field('soundcloud');?></p>

                           <?php }
                            else{
                                //falls Gallery vorhanden zeige nur die Gallery
                                ?>
                                <p class="post_text">
                                 <?php the_content(); ?>
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

<script>




</script>




<?php get_footer(); ?>