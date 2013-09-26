<?php
/**
 * Template Name: Likes Template
 *
 *
 *
 */

get_header();?>
<?php
$args = array('post_type' => 'likes');
$loop = new WP_Query($args);
while ($loop->have_posts()) : $loop->the_post();
   ?>



    <div id="page_post_content">

        <article id="" class="post">
            <header class="entry-header">
                <div class="entry-date"><h4>Likes</h4></div>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <!-- end .entry-header -->
            <div class="entry-content">
                <div class="image_text">
                    <a href="<?php the_permalink(); ?>" class="thumb"><img src="<?php the_field('image'); ?>" class="thumb" /></a>
                    <p class="post_text_sub">
                        <?php the_field('subtext'); ?>
                    </p>
                    <p class="post_text">
                        <?php the_field('maintext'); ?>
                    </p>
                </div>
            </div>


        </article>
    </div>

<?php endwhile;?>

<?php get_footer(); ?>



