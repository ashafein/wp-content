<?php

include_once TEMPLATEPATH . '/functions/inkthemes-functions.php';
if (!function_exists('optionsframework_init')) {
    /* ----------------------------------------------------------------------------------- */
    /* Options Framework Theme
      /*----------------------------------------------------------------------------------- */
    /* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */
//    if (STYLESHEETPATH == TEMPLATEPATH) {
        define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
        define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
//    } else {
//        define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
//        define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/');
//    }
    require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
    require_once (TEMPLATEPATH . '/functions/metabox.php');
	require_once ($functions_path . 'dynamic-image.php');
}
/* ----------------------------------------------------------------------------------- */
/* Styles Enqueue */
/* ----------------------------------------------------------------------------------- */

//function inkthemes_add_stylesheet() {
//    wp_enqueue_style('coloroptions', get_template_directory_uri() . "/color/" . get_option('inkthemes_altstylesheet') . ".css", '', '', 'all');
//}
//
//add_action('init', 'inkthemes_add_stylesheet');
/* ----------------------------------------------------------------------------------- */
/* jQuery Enqueue */
/* ----------------------------------------------------------------------------------- */
function inkthemes_wp_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('inkthemes-ddsmoothmenu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));     
        wp_enqueue_script('inkthemes-slides', get_template_directory_uri() . '/js/slides.min.jquery.js', array('jquery'));
        wp_enqueue_script('inkthemes-cunfon-yui', get_template_directory_uri() . '/js/cufon-yui.js', array('jquery'));
        wp_enqueue_script('inkthemes-museo-cufon', get_template_directory_uri() . '/js/bitter_400.font.js', array('jquery'));
        wp_enqueue_script('inkthemes-validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'));
        wp_enqueue_script('inkthemes-zoombox', get_template_directory_uri() . '/js/zoombox.js', array('jquery'));
        wp_enqueue_script('inkthemes-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    } elseif (is_admin()) {
        
    }
}
add_action('wp_enqueue_scripts', 'inkthemes_wp_enqueue_scripts');
