<section class="bottom-banner">
    <a href="<?php echo(get_field( "banner_url",'user_1')); ?>">
        <div class="container-fluid">

            <div class="text-color-white text-center specoffer" style="background-image: url('<?php $img=get_field( "banner_img",'user_1'); echo($img['url']); ?>'); ">
                <h4 class="text-uppercase"><?php echo(get_field( "banner_head",'user_1')); ?></h4>
                <div class="clearfix"></div>
                <hr/>
                <p class=""><?php echo(get_field( "banner_descr",'user_1')); ?></p>
                <a href="<?php echo($GLOBALS['bulg']['deals_link']); ?>" class="btn transparent-button"><?php echo(get_field( "banner_button",'user_1')); ?></a>

            </div>

        </div>
    </a>
</section>