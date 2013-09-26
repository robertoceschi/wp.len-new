<!doctype html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Google Chrome Frame for IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php bloginfo('name') ?>| <?php bloginfo('description'); ?></title>

    <!-- mobile meta (hooray!) -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <!-- or, set /favicon.ico for IE10 win -->
    <meta name="msapplication-TileColor" content="#f01d4f">
    <meta name="msapplication-TileImage"
          content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- drop Google Analytics Here -->
    <!-- end analytics -->

</head>

<body <?php body_class(); ?>>
<!--Start Main Container-->
<div class="fluid-container">
    <!--Start Inner Container-->
    <div class="inner-content">
        <?php get_sidebar(); ?>

        <!--End OFF-Canvas part left -->
            <!--Start Main Content -->
            <div role="main" class="main-content">
                <header role="banner">
                <span class="sidebar-item">
                    <a href="#sidebar" id="sidebar_button" class="sidebar_button" aria-hidden="true"
                       data-icon="&#xe006;" title="Menu"><span class="menu_title">Menu</span></a></span>
                    <!--Blog Title und Logo-->
                    <div class="site-title">
                        <h1 class="main-link-headline"><a href="<?php echo home_url('/'); ?>
    "><?php bloginfo('name'); ?></a></h1>
                    </div>
                    <?php get_sidebar(); ?>
                </header>