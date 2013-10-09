// Make the showSidebar function into a variable so it can be easily called
var showSidebar = function () {
    var $target = jQuery('body').toggleClass("active");
    //Anpassungen für OFF-CanvasBanner
    if ($target.hasClass('active')) {
        jQuery('.main-link-headline').css('display', 'none');
        jQuery('nav[role="navigation"]').css('display', 'block');
    }
    if (!$target.hasClass('active')) {
        jQuery('.main-link-headline').css('display', 'block');
        jQuery('nav[role="navigation"]').css('display', 'none');
    }
};
// add/remove classes everytime the window resize event fires
jQuery(window).resize(function () {
    var off_canvas_nav_display = jQuery('.off-canvas-navigation').css('display');
    if (off_canvas_nav_display === 'block') {
        jQuery("body").removeClass("active");
    }
});
jQuery(document).ready(function ($) {

    //Jetpack Image Gallery custom
    jQuery(".gallery-icon ").prepend( ' <div class="hover">Click for Gallery</div>' );

    jQuery(function() {

        jQuery(".gallery-icon").hover(
            function() {
                jQuery('.attachment-medium',this).fadeTo(200, 0.7).end().children(".hover").show();

            },
            function() {
                jQuery('.attachment-medium',this).fadeTo(200, 1).end().children(".hover").hide();
            });
    });

    //removing second "sharable" in Image -Gallery
    jQuery('div.image_text div.sharedaddy').css('display', 'none');



    // "smooth" Link to the posts on Frontpage
    jQuery('a[href="#go_posts"]').on('click', function (e) {
        e.preventDefault();

        var target = this.hash,
            $target =  jQuery(target);

        jQuery('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });



    // Hauptbild auf der Home-Site wird als CSS-Background-Image ausgegeben
    var image_src = jQuery("#hidden_image img").attr('src');
    jQuery("#main_image").css("background-image", "url(" + image_src + ")");


    // Toggle for sidebar
    $('#sidebar_button').click(function (e) {
        e.preventDefault();
        showSidebar();
    });

    jQuery("#sidebar_button").click(function () {

        $('#banner_toggle').toggleClass("banner_new");
    });

   //FitText for headlines in Home-Site
    jQuery(".headline").fitText();
    // Fittext
    jQuery(".headline").fitText(1.2, { minFontSize: '24px', maxFontSize: '110px' });
    jQuery("#main_image p").fitText(3, { minFontSize: '18px', maxFontSize: '40px' });


    // Initialize Masonry
    jQuery(window).imagesLoaded(function () {
        var columns = 3,
            setColumns = function () {
                columns = jQuery(window).width() > 1280 ? 2 : jQuery(window).width() > 640 ? 2 : jQuery(window).width() > 320 ? 1 : 1;


            };

        setColumns();
        jQuery(window).resize(setColumns);

        var $container = jQuery('#list');

        $container.masonry(
            {
                isAnimated: true,
                animationOptions: {
                    duration: 500,
                    easing: 'linear',
                    queue: false
                },
                isAnimated: !Modernizr.csstransitions,
                itemSelector: '.item',
                columnWidth: function (containerWidth) {
                    return containerWidth / columns;
                }
            });

        $container.infinitescroll({
                navSelector  : '#nav-posts',    // selector for the paged navigation
                nextSelector : '#nav-posts .prev a',  // selector for the NEXT link (to page 2)
                itemSelector : '.item',     // selector for all items you'll retrieve
                loading: {
                    finishedMsg: 'No more pages to load.',
                    img: 'http://i.imgur.com/6RMhx.gif'
                }
            },
            // trigger Masonry as a callback
            function( newElements ) {
                // hide new items while they are loading
                var $newElems = jQuery( newElements ).css({ opacity: 0 });
                // ensure that images load before adding to masonry layout
                $newElems.imagesLoaded(function(){
                    // show elems now they're ready
                    $newElems.animate({ opacity: 1 });
                    $container.masonry( 'appended', $newElems, true );
                });
            }
        );
    });
});

