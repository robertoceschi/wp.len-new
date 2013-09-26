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
    $('#site-content').masonry({
        columnWidth: 320,
        itemSelector: '.item',
        isFitWidth: true,
        isAnimated: !Modernizr.csstransitions
    }).imagesLoaded(function () {
            jQuery('#site-content').masonry('reload');
        });
});