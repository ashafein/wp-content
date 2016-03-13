<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="sail-offer-item">
        <div class=" item-zoom flag">
            <?php if ( has_post_thumbnail() )
            {
                the_post_thumbnail('medium');
            }else{
                echo('<img src="'.get_stylesheet_directory_uri().'/img/article-img.png"  alt="BulgarianDom" />');
            }
            ?>
            <a href="<?php the_permalink(); ?>" class="text-color-white text-center text-uppercase"><?php the_title(); ?></a>
        </div>
    </div>
</div>