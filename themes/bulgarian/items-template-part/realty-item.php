<div class="realty-item">
    <div class="realty-picture">
        <?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
    </div>
    <div class="realty-body">
        <div data-toggle="popover" class="realty-head"  data-content='76 listings avaliable'>
            <a href="#" class="text-color-blue"><?php the_title(); ?></a>
            <div>актульная цена 285 359</div>
        </div>
        <div class="realty-descr">
            <?php the_content('') ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="realty-detail">Подробнее >></a>
    </div>
</div>