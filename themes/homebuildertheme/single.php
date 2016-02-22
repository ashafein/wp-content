<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>
<div class="clear"></div>
<div class="page-content">
    <div class="grid_16 alpha">
        <div class="content-bar right-feature gallery">
            <!-- Start the Loop. -->
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="page-item">
                        <?php
                        global $post;
                        $area = get_post_meta($post->ID, '_area', true);
                        $bed = get_post_meta($post->ID, '_bedroom', true);
                        $price = get_post_meta($post->ID, '_price', true);
                        $city = get_post_meta($post->ID, '_city', true);
                        $location = get_post_meta($post->ID, '_location', true);
                        ?>
                        <div class="page-item-content"> 
                            <h1 class="page-item-title"><?php the_title(); ?></h1>			 
                            <table class="table">
                                <tr class="first-row">
                                    <td class="c-1"><span class="info"><?php _e('Area:', 'hb'); ?>&nbsp;<span><?php echo $area . 'sqft'; ?></span></span></td>
                                    <td class="c-2"><span class="info"><?php _e('BHK:', 'hb'); ?>&nbsp;<span><?php echo $bed; ?></span></span></td>
                                    <td class="c-3"><span class="info"><?php _e('Price:', 'hb'); ?>&nbsp;<span><?php echo $price; ?></span></span></td>
                                </tr>
                                <tr class="pair">
                                    <td class="c-4"><span class="info"><?php _e('City:', 'hb'); ?>&nbsp;<span><?php echo $city; ?></span></span></td>
                                    <td colspan="2" class="c-5"><span class="info"><?php _e('Location:', 'hb'); ?>&nbsp;<span><?php echo $location; ?></span></span></td>
                                </tr>
                            </table>
        <?php the_content(); ?>	                            
                            <div class="clear"></div>				  
                                <?php if (has_tag()) { ?>
                                <div class="tag">
                                <?php the_tags('Post Tagged with ', ', ', ''); ?>
                                </div>
        <?php } ?>

                        </div>
                    </div>
                <?php endwhile;
            else: ?>
                <div class="page-item">
                    <p>
    <?php _e('Sorry, no posts matched your criteria.', 'hb'); ?>
                    </p>
                </div>
<?php endif; ?>
            <!--End Loop-->

            <!--Start Comment box-->
<?php comments_template(); ?>
            <!--End Comment box-->
        </div>
    </div>
    <div class="grid_8 omega">
        <!--Start Sidebar-->
<?php get_sidebar(); ?>
        <!--End Sidebar-->
    </div>
</div>
</div>
<?php get_footer(); ?>