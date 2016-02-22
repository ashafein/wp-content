<?php
/*
  Template Name: Property Page
 */
?>
<?php get_header(); ?>
<div class="page-content">
    <div class="grid_16 alpha">
        <div class="content-bar right-feature gallery">
            <?php
            $limit = get_option('posts_per_page');
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts('post_type=post');
            $wp_query->is_archive = true;
            $wp_query->is_home = false;
            ?>
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
                            <div class="post_content"> <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                         <?php inkthemes_get_thumbnail(212, 130); ?>
                    <?php } else { ?>
                        <?php inkthemes_get_image(212, 130); ?> 
                        <?php
                    }
                    ?>
                            <h1 class="page-item-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <?php the_excerpt(20); ?>
                        </div>
                        <table class="table">
                            <tr class="first-row">
                                <td class="c-1"><span class="info"><?php _e('Area:','hb'); ?>&nbsp;<span><?php echo $area . 'sqft'; ?></span></span></td>
                                <td class="c-2"><span class="info"><?php _e('Bed Room:','hb'); ?>&nbsp;<span><?php echo $bed; ?></span></span></td>
                                <td class="c-3"><span class="info"><?php _e('Price:','hb'); ?>&nbsp;<span><?php echo $price; ?></span></span></td>
                            </tr>
                            <tr class="pair">
                                <td class="c-4"><span class="info"><?php _e('City:','hb'); ?>&nbsp;<span><?php echo $city; ?></span></span></td>
                                <td colspan="2" class="c-5"><span class="info"><?php _e('Location:','hb'); ?>&nbsp;<span><?php echo $location; ?></span></span></td>
                            </tr>
                        </table>
                    </div>
                <?php endwhile;
            else: ?>
                <div class="post">
                    <p>
                        <?php _e('Sorry, no posts matched your criteria.', 'hb'); ?>
                    </p>
                </div>
            <?php endif; ?>
            <!--End Loop-->
            <div class="clear"></div>
            <nav id="nav-single"> <span class="nav-previous">
                    <?php next_posts_link(__('&larr; Older posts', 'hb')); ?>
                </span> <span class="nav-next">
                    <?php previous_posts_link(__('Newer posts &rarr;', 'hb')); ?>
                </span> </nav>
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