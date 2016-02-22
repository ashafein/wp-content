<?php
#----------------------------------------------------------------------------------- 
#Post Thumbnail Support
#-----------------------------------------------------------------------------------
add_theme_support('post-thumbnails');
if (function_exists('add_image_size'))
    add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
    add_image_size('post_thumbnail', 595, 224, true);
}
#----------------------------------------------------------------------------------- 
#Auto Feed Links Support
#-----------------------------------------------------------------------------------
if (function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
}
#----------------------------------------------------------------------------------- 
#Custom Menus Function
#-----------------------------------------------------------------------------------
// Add CLASS attributes to the first <ul> occurence in wp_page_menu

function inkthemes_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'inkthemes_add_menuclass');
add_action('init', 'inkthemes_register_custom_menu');

function inkthemes_register_custom_menu() {
    register_nav_menu('custom_menu', __('Main Menu', 'hb'));
}

function inkthemes_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'inkthemes_nav_fallback'));
    else
        inkthemes_nav_fallback();
}

function inkthemes_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
            <?php
            wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
            ?>
        </ul>
    </div>
    <?php
}

function inkthemes_nav_menu_items($items) {
    if (is_home()) {
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . __('Home', 'hb') . '</a></li>';
    } else {
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . __('Home', 'hb') . '</a></li>';
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'inkthemes_nav_menu_items');
#----------------------------------------------------------------------------------- 
#Breadcrumbs Plugin
#-----------------------------------------------------------------------------------

function inkthemes_breadcrumbs() {
    $delimiter = '&raquo;';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo __('Page', 'hb') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div>';
}

//* ----------------------------------------------------------------------------------- */
/* Function to call first uploaded image in functions file
 /*----------------------------------------------------------------------------------- */
/**
 * This function thumbnail id and
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function inkthemes_get_thumbnail($iw, $ih) {
    $permalink = get_permalink($id);
    $thumb = get_post_thumbnail_id();
    $image = inkthemes_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
        print "<a href='$permalink'><img class='postimg' src='$image[url]' width='$image[width]' height='$image[height]' /></a>";
    }
}

/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function inkthemes_get_image($width, $height) {
    $w = $width;
    $h = $height;
    global $post, $posts;
//This is required to set to Null
    $img_source = '';
    $permalink = get_permalink($id);
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $img_source = $matches [1] [0];
    }
    $img_path = inkthemes_image_resize($img_source, $w, $h);
    if (!empty($img_path[url])) {
        print "<a href='$permalink'><img src='$img_path[url]' class='postimg' alt='Post Image'/></a>";
    }
}

#----------------------------------------------------------------------------------- 
#For Attachment Page
#-----------------------------------------------------------------------------------
//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */

function inkthemes_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'hb');
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'hb');
    } else {
        $posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'hb');
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}
?>
<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;
?>
<?php

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override inkthemes_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function inkthemes_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => __('Primary Widget Area', 'hb'),
        'id' => 'primary-widget-area',
        'description' => __('The primary widget area', 'hb'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => __('Secondary Widget Area', 'hb'),
        'id' => 'secondary-widget-area',
        'description' => __('The secondary widget area', 'hb'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('First Footer Widget Area', 'hb'),
        'id' => 'first-footer-widget-area',
        'description' => __('The first footer widget area', 'hb'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Second Footer Widget Area', 'hb'),
        'id' => 'second-footer-widget-area',
        'description' => __('The second footer widget area', 'hb'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Third Footer Widget Area', 'hb'),
        'id' => 'third-footer-widget-area',
        'description' => __('The third footer widget area', 'hb'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => __('Fourth Footer Widget Area', 'hb'),
        'id' => 'fourth-footer-widget-area',
        'description' => __('The fourth footer widget area', 'hb'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

/** Register sidebars by running inkthemes_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'inkthemes_widgets_init');
#----------------------------------------------------------------------------------- 
#Pagination
#-----------------------------------------------------------------------------------

function inkthemes_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}

#----------------------------------------------------------------------------------- 
#Add Favicon
#-----------------------------------------------------------------------------------

function inkthemes_childtheme_favicon() {
    if (get_option('inkthemes_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . get_option('inkthemes_favicon') . '"/>' . "\n";
    } else {
        ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
        <?php
    }
}

add_action('wp_head', 'inkthemes_childtheme_favicon');
/* ----------------------------------------------------------------------------------- */
/* Show analytics code in footer */
/* ---------------------------------------------------------------------------------- */
function inkthemes_childtheme_analytics() {
    $output = get_option('inkthemes_analytics');
    if ($output <> "")
        echo stripslashes($output);
}
add_action('wp_head', 'inkthemes_childtheme_analytics');
#----------------------------------------------------------------------------------- 
#Custom CSS Styles
#-----------------------------------------------------------------------------------

function inkthemes_of_head_css() {
    $output = '';
    $custom_css = get_option('inkthemes_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'inkthemes_of_head_css');
#----------------------------------------------------------------------------------- 
#Load languages file
#-----------------------------------------------------------------------------------
load_theme_textdomain('hb', get_template_directory() . '/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);
// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();
// activate support for thumbnails
if (function_exists('add_theme_support')) { // added in 2.9
    add_theme_support('menus');
    add_theme_support('post-thumbnails', array('post', 'game_listing'));
    set_post_thumbnail_size(250, 250, false);
    add_image_size('blog-thumbnail', 150, 150, true); // blog post thumbnail size, box resize mode
    add_image_size('sidebar-thumbnail', 48, 48, true); // sidebar blog thumbnail size, box resize mode
}

function get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}
#----------------------------------------------------------------------------------- 
#Custom Excerpt
#-----------------------------------------------------------------------------------
function inkthemes_custom_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '[&hellip;]');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

if (!function_exists('get_catId')) {

    function get_catId($cat_name) {
        $cat_name_id = get_cat_ID(html_entity_decode($cat_name, ENT_QUOTES));
        return $cat_name_id;
    }

}
if (!function_exists('show_categories_menu')) {

    function show_categories_menu($customClass = 'nav clearfix', $addUlContainer = true) {
        global $shortname, $themename, $category_menu, $exclude_cats, $hide, $strdepth2, $projects_cat;

        //excluded categories
        if (get_option($shortname . '_menucats') <> '')
            $exclude_cats = implode(",", get_option($shortname . '_menucats'));

        //hide empty categories
        if (get_option($shortname . '_categories_empty') == 'on')
            $hide = '1';
        else
            $hide = '0';

        //dropdown for categories
        $strdepth2 = '';
        if (get_option($shortname . '_enable_dropdowns_categories') == 'on')
            $strdepth2 = "depth=" . get_option($shortname . '_tiers_shown_categories');
        if ($strdepth2 == '')
            $strdepth2 = "depth=1";

        $args = "orderby=" . get_option($shortname . '_sort_cat') . "&order=" . get_option($shortname . '_order_cat') . "&" . $strdepth2 . "&exclude=" . $exclude_cats . "&hide_empty=" . $hide . "&title_li=&echo=0";

        $categories = get_categories($args);

        if (!empty($categories)) {
            $category_menu = wp_list_categories($args);
            if ($addUlContainer)
                echo('<ul class="' . $customClass . '">');
            echo $category_menu;
            if ($addUlContainer)
                echo('</ul>');
        }
    }

}
#----------------------------------------------------------------------------------- 
#Custom Post Label
#-----------------------------------------------------------------------------------
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Property';
	$submenu['edit.php'][5][0] = 'Property';
	$submenu['edit.php'][10][0] = 'Add Property';
	$submenu['edit.php'][16][0] = 'Property Tags';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Property';
	$labels->singular_name = 'Property';
	$labels->add_new = 'Add Property';
	$labels->add_new_item = 'Add Property';
	$labels->edit_item = 'Edit Property';
	$labels->new_item = 'Property';
	$labels->view_item = 'View Property';
	$labels->search_items = 'Search Property';
	$labels->not_found = 'No Property found';
	$labels->not_found_in_trash = 'No Property found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

