<?php // Template Name: Регионы
get_header(); ?>

<div class="color-grey regions-page sidebar-page sidebar-left">

    <?php get_template_part('header-slider'); ?>


    <div class="container-fluid">
        <div class="breadcrumbs">
            <ul class="list-inline">
                <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                <?php   $page = get_page_by_title( 'О Болгарии', $output, 'page' ); ?>
                <li><a href="<?php echo(get_permalink($page->ID)); ?>">О Болгарии - </a></li>
                <li><a href=""><?php echo(get_the_title()); ?></a></li>
            </ul>
        </div>
    </div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4 page-aside-left">

            <?php get_template_part('contact-form-sidebar'); ?>

            <div class="search-form">
                <form class="form-inline orange-form">
                    <div class="form-group">
                        <select class="selectpicker">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </select>

                        <select class="selectpicker">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </select>

                        <select class="selectpicker">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </select>
                        <input  type="text" class="form-control"  placeholder="Номер лота">

                    </div>
                    <button type="submit" class="btn orange-button">Начать поиск</button>
                </form>
            </div>

            <div class="color-white little-subscribe-form">
                <form class="form-inline blue-form">
                    <div class="form-group">
                        <label for="email-subscribe">Email*</label>
                        <input type="email" class="form-control" id="email-subscribe" placeholder="">
                    </div>
                    <button type="submit" class="btn blue-button">Получай эксклюзив первым</button>
                </form>
            </div>
        </div>

        <div class="span8">
            <?php
            $i=1;
            $query_regions = new WP_Query;
            $regions = $query_regions->query( array(
                'post_type' => 'region',
                'posts_per_page' => 200,
                'orderby' => 'post_title',
                'order'   => 'ASC',
            ) );

            $item_region = '';
            foreach( $regions as $reg ){

                if ($i & 1){
                    $item_region .= '<div class="row-fluid region-item region-to-the-right">';
                } else {
                    $item_region .= '<div class="row-fluid region-item region-to-the-left">';
                }
                        $item_region .= ' <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 region-item-image">';
                            $item_region .= get_the_post_thumbnail($reg->ID, 'medium');
                        $item_region .= '</div>';

                        $item_region .= '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left color-white region-item-content">';
                            $item_region .= ' <h4>'.$reg->post_title.'</h4>';
                            $item_region .= '<span>By '.get_the_author().' in Blog entry '.$reg->post_date. '</span>';
                            $item_region .= '<p>'.$reg->post_content.'</p>';
                            $item_region .= '<a href="'.get_permalink($reg->ID).'" class="region-item_link">Подробности</a>';
                        $item_region .= '</div>';
                        $item_region .= '<div class="clearfix"></div>';
                $item_region .= '</div>';

                $i++;
            }
            echo($item_region);
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>

        </div>

    </div>
</div>


</div>
<?php get_template_part('contact-form-blue'); ?>
<?php get_footer();?>
