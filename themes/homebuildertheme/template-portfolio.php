<?php
/*
  Template Name: Portfolio
 */
?>
<?php get_header(); ?>
<div class="clear"></div> 
<div class="fullwidth">
    <ul class="portfolio">
        <?php
        $limit = get_option('posts_per_page');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        query_posts('post_type=post');
        $wp_query->is_archive = true;
        $wp_query->is_home = false;
        ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                global $post;
                $area = get_post_meta($post->ID, '_area', true);
                $bed = get_post_meta($post->ID, '_bedroom', true);
                $price = get_post_meta($post->ID, '_price', true);
                $city = get_post_meta($post->ID, '_city', true);
                $location = get_post_meta($post->ID, '_location', true);
                ?>
                <li>

                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('post_thumbnail', array('class' => 'postimg')); ?>
                        </a>
                    <?php } else { ?>
                        <a href="<?php the_permalink() ?>"><span class="fade"></span><?php echo inkthemes_blog_image(277, 211); ?></a>
                        <?php
                    }
                    ?>	
                    <h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                    <?php echo inkthemes_custom_trim_excerpt(15); ?>
                    <div class="meta_price">
                        <a class="more" href="<?php the_permalink() ?>">More</a>
                        <span class="price"><?php echo $price; ?></span>
                    </div>

                </li>  
            <?php endwhile;
        else: ?>
            <li>
                <p>
                    <?php _e('Sorry, no posts matched your criteria.', 'hb'); ?>
                </p>
            </li>
        <?php endif; ?>
    </ul>
</div>
</div>
<div class="clear"></div> 
<?php get_footer(); ?>