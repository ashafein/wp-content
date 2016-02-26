<?php
    if ($i & 1){
    echo('<div class="row-fluid region-item region-to-the-right">');
    } else {
    echo('<div class="row-fluid region-item region-to-the-left">');
        }
?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 region-item-image">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); // выводим миниатюру поста, если есть ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left color-white region-item-content">
        <h4><?php the_title(); ?></h4>
        <span><?php echo('By '.get_the_author().' in Blog entry '.$post->post_date); ?></span>
        <p>
            <?php echo $post->post_content; ?>
        </p>
        <a href="<?php the_permalink(); ?>" class="region-item_link">Подробности</a>
    </div>
    <div class="clearfix"></div>
</div>