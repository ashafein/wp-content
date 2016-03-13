<div class="realty-item">
    <div class="realty-picture">
        <?php if ( has_post_thumbnail() )
        {
            the_post_thumbnail('medium');
        }else{
            echo('<img src="'.get_stylesheet_directory_uri().'/img/article-img.png"  alt="BulgarianDom" />');
        }

        ?>
    </div>
    <div class="realty-body">
        <div data-toggle="popover" class="realty-head"  data-content='<?php echo('Цена от: '.get_field('realty_price').'<i class="fa fa-eur"></i>'); ?>'>
            <a href="<?php the_permalink(); ?>" class="text-color-blue"><?php the_title(); ?></a>
            <div><?php echo (get_field('realty_price').'<i class="fa fa-eur"></i>'); ?></div>
        </div>
        <div class="realty-descr">
            <a href="<?php the_permalink(); ?>" class="text-color-black"><?php the_content('') ?></a>
        </div>
        <a href="<?php the_permalink(); ?>" class="realty-detail">Подробнее >></a>
    </div>
</div>