<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12  learning-item">
    <a href="<?php the_permalink() ?>"  onmouseover="blueImg(document.getElementById('item-<?php the_ID() ?>'))" onmouseout="normalImg(document.getElementById('item-<?php the_ID() ?>'))">
        <div id="item-<?php the_ID() ?>"  class="learning-item-image" style="background-image: url('<?php $img=get_field('learning_img'); echo($img['url']); ?>'); "
             hover-data="<?php $img=get_field('learning_hover'); echo($img['url']); ?>"
             norm-data="<?php $img=get_field('learning_img'); echo($img['url']); ?>" >

            <script>
                function blueImg(x) {
                    data = x.getAttribute("hover-data")
                    x.style.backgroundImage="url('"+data+"')";
                }

                function normalImg(x) {
                    data = x.getAttribute("norm-data")
                    x.style.backgroundImage="url('"+data+"')";
                }
            </script>
        </div>

        <h3><?php the_title() ?></h3>
    </a>
    <div class="clearfix"></div>
</div>
