<?php
/*
  Template Name: Fullwidth Page
 */
?>
<?php get_header(); ?>
<div class="clear"></div> 
<div class="fullwidth">           
    <?php if (have_posts()) : the_post(); ?>
        <h1 class="page_title"><?php the_title(); ?></h1>
        <?php the_content(); ?>	
    <?php endif; ?>	  
</div>
</div>
<div class="clear"></div> 
<?php get_footer(); ?>