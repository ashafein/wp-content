<div class="sidebar">
    <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
        <h4><?php _e('Search Property:', 'real'); ?></h4>
        <?php get_search_form(); ?>
        <h4>
            <?php _e('Recent Listing', 'hb'); ?>
        </h4>
        <ul>
            <?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?>
        </ul>

        <h4>
            <?php _e('Archives', 'hb'); ?>
        </h4>
        <ul>
            <?php wp_get_archives('type=monthly'); ?>
        </ul>
        <?php
//foreach((get_the_category()) as $childcat) {
//  $parentcat = $childcat->category_parent;
//  echo get_cat_name($parentcat);
//}
        ?>
    <?php endif; // end primary widget area ?>
    <?php
// A second sidebar for widgets, just because.
    if (is_active_sidebar('secondary-widget-area')) :
        ?>
        <?php dynamic_sidebar('secondary-widget-area'); ?>
    <?php endif; ?>
</div>