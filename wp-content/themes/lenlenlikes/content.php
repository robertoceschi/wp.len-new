<?php

//Single Post

?>


<article id="post-<?php the_ID(); ?> " class="item">
    <div class="overlay">
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title=""
                                       rel="bookmark"><?php the_title(); ?></a></h2>
                            <span class="entry-meta"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?>
                                    / </a> <?php comments_popup_link(); ?></span>
            <a href="<?php the_permalink(); ?>" class="icon-eye" title="icon-eye" target="_blank"><span aria-hidden="true"
                                                                                                        data-icon="&#xe00a;"
                                                                                                        class="icon-eye"></span></a>
        </header>
    </div>
    <!--Link zum Post -->
    <div class="thumb-wrap">
        <a href="<?php the_permalink(); ?>" class="thumb"><?php the_post_thumbnail('homepage-thumb'); ?></a>
    </div>
</article>
