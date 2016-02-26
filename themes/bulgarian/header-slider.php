<div class="head-slider">
    <div class="some-head-slider">
        <?php masterslider(1); ?>
    </div>
    <div class="container-fluid">
        <a href="#" class="btn button-transparent ">
            <?php
            if(!(is_category())){
                echo(get_the_title());
            } else{
                echo(single_cat_title());
            }
            ?>
        </a>
    </div>
</div>