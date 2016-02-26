<?php
if ($i & 1){
    echo('<div class="row-fluid region-item region-to-the-right">');
} else {
    echo('<div class="row-fluid region-item region-to-the-left">');
}
?>

<div class="row-fluid region-item region-to-the-left">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 region-item-image">
        <?php get_the_post_thumbnail(->ID, 'medium'); ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left color-white region-item-content">
        <h4>Северное побережье</h4>
        <span>By John POe in Blog entry 15 aug 2014 0 comments</span>
        <p>
            Lorem ipsum dolor sit amet,
            consectetuer adipiscing elit. Aenean commodo ligula eget dolor. A
            enean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
            ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
            rem
        </p>
        <a>Подробности</a>
    </div>
    <div class="clearfix"></div>
</div>