<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 */
?>
<div class="grid_6 alpha">
    <div class="widget_inner">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?> 
            <h4><?php _e('Contact Deatiles','hb'); ?></h4>
            <?php _e('Address: FM-9, B-Block,  Second Complex, Bhopal<br/>
            Contact No : +91-9826123456<br/>
            Website:&nbsp;<a href="#">http://inkthemes.com</a><br/>','hb'); ?>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6">
    <div class="widget_inner">
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
            <h4><?php _e('Buyers & Other Links','hb'); ?></h4>
            <ul><?php _e('
                <li> <a href="#">WordPress Blog</a></li>
                <li> <a href="#">Developer Documentation</a></li>
                <li> <a href="#">Reporting Bugs</a></li>
                ','hb'); ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6">
    <div class="widget_inner">
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
            <h4><?php _e('Recent From Blog','hb'); ?></h4>
            <p><?php _e('Qarius dui, quis posuere nibh ollis quis. Mauris omma rhoncus rttitor. <a href="http://www.inkthemes.com">http://www.inkthemes.com</a> </p>','hb'); ?>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6 omega">
    <div class="widget_inner">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <div class="widget_inner last"> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png"/></a> </div>
                <?php endif; ?>
    </div>
</div>