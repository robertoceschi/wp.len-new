<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title">
            <?php
            printf( _nx( '(1) Comment', '(%1$s) Comments', get_comments_number(), 'comments title', 'lenlenlikes' ),
                number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                                   'callback' => 'lenlenlikes_comment' )
                               );
            ?>
        </ol><!-- .comment-list -->

        <?php
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', 'lenlenlikes' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'lenlenlikes' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentythirteen' ) ); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="no-comments"><?php _e( 'Comments are closed.' , 'lenlenlikes' ); ?></p>
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php comment_form(array(
                            'title_reply' =>__( '<h3 id="reply-title">Leave a Comment</h3>', 'renkon'),
                            'comment_notes_before' =>__( '<p class="comment-note">Required fields are marked <span class="required">*</span>.</p>', 'lenlenlikes'),
                            'comment_notes_after' =>(''),
                            'comment_field'  => '<p class="comment-form-comment"><label for="comment">' . _x( 'Message <span class="required">*</span>', 'noun', 'renkon' ) . 			'</label><br/><textarea id="comment" name="comment" rows="8"></textarea></p>',
                            'label_submit'	=> __( 'Send Comment', 'lenlenlikes' ))
    );  ?>


</div><!-- #comments -->