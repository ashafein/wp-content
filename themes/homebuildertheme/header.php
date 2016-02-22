<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>  
            <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;
            wp_title('|', true, 'right');
// Add the blog name.
            bloginfo('name');
// Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
// Add a page number if necessary:
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(__('Page %s', 'hb'), max($paged, $page));
            ?>
        </title>
        <?php if (is_front_page()) { ?>
            <?php if (get_option('inkthemes_keyword') != '') { ?>
                <meta name="keywords" content="<?php echo get_option('inkthemes_keyword'); ?>" />
            <?php } else {
                
            } ?>
            <?php if (get_option('inkthemes_description') != '') { ?>
                <meta name="description" content="<?php echo get_option('inkthemes_description'); ?>" />
            <?php } else {
                
            } ?>
            <?php if (get_option('inkthemes_author') != '') { ?>
                <meta name="author" content="<?php echo get_option('inkthemes_author'); ?>" />
            <?php } else {
                
            } ?>
        <?php } ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
        ?>
        <script>
            jQuery(function(){
                jQuery('#slides').slides({
                    preload: false,
                    preloadImage: 'images/loading.gif',
                    play: 5000,
                    pause: 2500,
                    effect: 'fade',
                    crossfade: true,
                    slideSpeed: 350,
                    fadeSpeed: 1000,
                    hoverPause: true
                });
            });
        </script>
        <!--[if gte IE 9]>
        <script type="text/javascript">
        Cufon.set('engine', 'canvas');
        </script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?> style="<?php if (of_get_option('inkthemes_bodybg') != '') { ?>background:url(<?php echo of_get_option('inkthemes_bodybg'); ?>)<?php } else {  
        } ?>" >
        <div class="main-container">
            <div class="container_24">
                <div class="grid_24">
                    <div class="header">
                        <div class="grid_17 alpha">
                            <div class="logo"> <a href="<?php echo home_url(); ?>"><img src="<?php if (of_get_option('inkthemes_logo') != '') { ?><?php echo of_get_option('inkthemes_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>"/></a> </div>
                        </div>
                        <div class="grid_7 omega">
                            <div class="header_info">
                                <?php if (of_get_option('inkthemes_topright') != '') { ?>
                                    <p><?php echo of_get_option('inkthemes_topright'); ?></p>
                                <?php } else { ?>
                                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/call.png" alt="logo"/></a> 
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="main-content">
                        <div class="full-page">
                            <div class="clear"></div>
                            <!--Start Menu wrapper-->
                            <div class="menu_wrapper">
                                <?php inkthemes_nav(); ?>
                            </div>
                            <!--End Menu-->
                        </div>