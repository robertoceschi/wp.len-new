<?php


    /**
     * Proper way to enqueue scripts and styles
     */

add_action('wp_enqueue_scripts', 'len_len_theme_css_js');

function len_len_theme_css_js()
{
    //Load the Theme CSS
    wp_enqueue_style('main', get_template_directory_uri() . '/library/css/styles.css');

    //Loads the Typekit JS
    wp_enqueue_script('theme_typekit', '//use.typekit.net/dtv6mdo.js');


    // Adds Costum JS
    wp_enqueue_script(
        'len-len-main-js', get_template_directory_uri() . '/library/js/main.js', array('jquery'), '1.0.0', true
    );

    // Adds JavaScript for Modernizr
    wp_enqueue_script(
        'modernizr', get_template_directory_uri() . '/library/js/modernizr.2.6.2.min.js', array('jquery'), '2.6.2', true
    );

    // Adds JavaScript for Masonry
    wp_enqueue_script(
        'masonry', get_template_directory_uri() . '/library/js/jquery.masonry.min.js', array('jquery'), '2.1.08', true
    );

    // Adds JavaScript for Fittext
    wp_enqueue_script('fittext', get_template_directory_uri() . '/library/js/fittext.js', array('jquery'), '1.1');
}


/**
     * TypeKit Fonts
     *
     * @since Theme 1.0
     */
    function theme_typekit_inline () {
        if (wp_script_is('theme_typekit', 'done')) {
            ?>
            <!--Typekit inline JavaScript that kicks off font loading -->
            <script type="text/javascript">try {
                    Typekit.load();
                } catch (e) {
                }</script>
        <?php
        }
    }

    add_action('wp_head', 'theme_typekit_inline');




/**
 * Wordpress Custom Stuff
 *
 *
 */


add_action('after_setup_theme', 'len_len_theme_setup');

function len_len_theme_setup() {
    //enable custom menus
    add_theme_support('menus');
    //enable Featured Images in Posts and Pages
    add_theme_support('post-thumbnails');
    //changing standart Thumb-Size for Masonry
    add_image_size('homepage-thumb', 360, auto); // Soft Crop Mode
    add_image_size('homepage-thumb_big', 1000, auto); // Soft Crop Mode
    add_image_size('orbit-custom', 1000, 600); // Soft Crop Mode

}


/**
 * Custom Post Type About Me
 *
 *
 */

add_action( 'init', 'create_my_post_type' );

function create_my_post_type() {
    register_post_type( 'about',
        array(
             'labels' => array(
                 'name' => __( 'About Me' ),
                 'add_new' => (''),

             ),
             'public' => true,
        )
    );
}

/**
 * Removing Permalinks in Custom Post Type About Me
 *
 *
 */

    add_filter('get_sample_permalink_html', 'perm', '',4);

    function perm($return, $id, $new_title, $new_slug){
        global $post;
        if($post->post_type == 'about')
        {
            $ret2 = preg_replace('/<div id="edit-slug-box</div><span id="edit-slug-buttons">.*<\/span>|<span id=\'view-post-btn\'>.*<\/span>/i', '', $return);
        }

        return $ret2;
    }
/**
 * Removing p-Tags from Content
 *
 *
 */

remove_filter ('the_content', 'wpautop');


if ( ! function_exists( 'lenlenlikes_comment' ) ) :
/*-----------------------------------------------------------------------------------*/
/* Comments template lenlenlikes_comment
/*-----------------------------------------------------------------------------------*/
function lenlenlikes_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
            ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <article id="comment-<?php comment_ID(); ?>" class="comment">

                <div class="comment-avatar">
                    <?php echo get_avatar( $comment, 40 ); ?>
                </div>

                <div class="comment-content">
                    <ul class="comment-meta">
                        <li class="comment-author"><?php printf( __( ' %s ', 'lenlenlikes' ), sprintf( ' %s ', get_comment_author_link() ) ); ?></li>
                        <li class="comment-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                <?php
                                /* translators: 1: date, 2: time */
                                printf( __( '%1$s @ %2$s', 'lenlenlikes' ),
                                    get_comment_date('d.m.y'),
                                    get_comment_time() );
                                ?></a></li>
                        <li class="comment-edit"><?php edit_comment_link( __( 'Edit', 'lenlenlikes' ), ' ' );?></li>
                    </ul>
                    <div class="comment-text">
                        <?php comment_text(); ?>
                        <?php if ( $comment->comment_approved == '0' ) : ?>
                            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lenlenlikes' ); ?></p>
                        <?php endif; ?>
                        <p class="comment-reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'lenlenlikes' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
                    </div><!-- end .comment-text -->

                </div><!-- end .comment-content -->

            </article><!-- end .comment -->

            <?php
            break;
        case 'pingback'  :
        case 'trackback' :
            ?>
            <li class="pingback">
            <p><?php _e( '<span>Pingback:</span>', 'lenlenlikes' ); ?> <?php comment_author_link(); ?></p>
            <p class="pingback-edit"><?php edit_comment_link( __('Edit', 'lenlenlikes'), ' ' ); ?></p>
            <?php
            break;
    endswitch;
}
endif;

function SearchFilter($query) {
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

