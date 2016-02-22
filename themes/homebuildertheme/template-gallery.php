<?php
/*
  Template Name: Gallery Page
 */
?>
<?php get_header(); ?>
<div class="gallery-main">
    <h1 class="page_title"><?php the_title(); ?></h1>	
    <script type="text/javascript"> 
        //<![CDATA[
        jQuery(function(){
            jQuery('a.zoombox').zoombox();
        });
        //]]>
    </script> 
    <ul class="thumbnail">
        <?php
        if ($wp_query->have_posts()) : while (have_posts()) : the_post();
                the_content();
                $attachment_args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_status' => null,
                    'post_parent' => $post->ID,
                    'orderby' => 'menu_order ID'
                );
                $attachments = get_posts($attachment_args);
                if ($attachments) {
                    foreach ($attachments as $gallery_image) {
                        $attachment_img = wp_get_attachment_url($gallery_image->ID);
						$img_source=inkthemes_image_resize($attachment_img,180,152);
                        echo '<div class="gall-item"><a alt="' . $gallery_image->post_title . '" href="' . $attachment_img . '" class="zoombox zgallery1">';
                        echo '<img src="'.$img_source[url].'" alt=""/>';
                        echo '</a></div>';
                    }
                }
                ?>
            <?php endwhile;
        endif; ?>
    </ul>
</div>
</div>
<?php get_footer(); ?>