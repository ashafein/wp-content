<div class="color-white text-left row-fluid article-item">
    <div class="item-zoom article-image">
        <?php if ( has_post_thumbnail() )
        {
            the_post_thumbnail('medium');
        }else{
            echo('<img src="'.get_stylesheet_directory_uri().'/img/article-img.png"  alt="BulgarianDom" />');
        }
        ?>
    </div>
    <div class="article-content">
        <h4><?php the_title(); ?></h4>
        <p class="article-head-part"> <?php echo('By '.get_the_author().' in Blog entry '.$post->post_date); ?></p>
        <p class="article-descr">
            <?php echo $post->post_content; ?>
        </p>
        <a href="<?php the_permalink(); ?>" class="article-button-blue">Читать далее</a>
    </div>
</div>
