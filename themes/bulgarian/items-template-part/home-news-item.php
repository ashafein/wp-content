<div class="home-news-item">
    <div class=" item-zoom home-news-item-pict">        <?php if ( has_post_thumbnail() )
        {
            the_post_thumbnail('medium');
        }else{
            echo('<img src="'.get_stylesheet_directory_uri().'/img/article-img.png"  alt="BulgarianDom" />');
        }

        ?>
    </div>
    <div class="text-color-black text-left">
        <a href="<?php the_permalink(); ?>" > <?php the_content('') ?> </a>
    </div>
</div>