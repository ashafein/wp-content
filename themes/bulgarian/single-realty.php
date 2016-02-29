<?php
/* WP Post Template: Шаблон Страницы Объекта */
?>
<?php
get_header(); ?>


<div class="color-grey page-wrapper">

    <div class="container-fluid product-page">
        <div class="row-fluid">
            <div class="span8 page-main">

                <div class="breadcrumbs">
                    <ul class="list-inline text-left">
                        <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                        <?php   $page = get_page_by_title( 'Каталог объектов', $output, 'page' ); ?>
                        <li><a href="<?php echo(get_permalink($page->ID)); ?>">Каталог объектов - </a></li>
                        <li><a href=""><?php echo(get_the_title()); ?></a></li>
                    </ul>
                </div>


                <h3 class="text-color-blue product-header"><?php echo(get_the_title().' (Лот №'.get_field('realty_lot').')'); ?> </h3>
                <?php

                $rows = get_field('realty_gallery' ); // get all the rows
                $first_row = $rows[0];
                if($first_row['realty_gallery_field']) {
                    if (have_rows('realty_gallery')) {

                        echo ' <div class="product-carousel"><ul id="productGallery">';
                        $html = '';

                        // loop through the rows of data
                        while (have_rows('realty_gallery')) : the_row();
                            $image = get_sub_field('realty_gallery_field');
                            // display a sub field value
                            $html .= '<li data-thumb="' . $image['url'] . '" data-src="' . $image['url'] . '">
                                            <img src="' . $image['url'] . '" />
                                        </li>';

                        endwhile;
                        echo $html;
                        echo ' </ul></div>';

                    }
                }
                ?>


                <p class="color-white text-color-black product-description">
                    <?php echo($post->post_content); ?>
                </p>
                <div class="text-center orange-button-wrapper">
                    <a href="#" class="btn orange-button button-single-orange">Запросить подробности</a>
                </div>
                <!--Body content-->
            </div>


            <div class="span4 page-aside-right">
                <p class="text-color-blue product-price">ЦЕНА: ОТ <span class="text-color-orange"><?php echo get_field('realty_price') ?><i class="fa fa-eur"></i></span></p>
                <div class="clearfix"></div>
                <ul class="list-unstyled text-color-blue product-details-list">
                    <?php
                        $html = "";
                    // check if the repeater field has rows of data
                    if( have_rows('realty_char') ):

                        // loop through the rows of data
                        while ( have_rows('realty_char') ) : the_row();

                            $name = get_sub_field('realty_char_name');
                            $content = get_sub_field('realty_char_value');

                            $html .= '<li class="row-fluid product-details">';
                                $html .= ' <span class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'.$name.'</span>';
                                $html .= ' <span class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'.$content.'</span>';
                                $html .= '<div class="clearfix"></div>';
                            $html .= ' </li>';

                            echo $html;
                        endwhile;

                    else :

                        // no rows found

                    endif;
                    wp_reset_postdata();

                    $realty_type = get_field_object('realty_type');
                    $value = get_field('realty_type');
                    $label = $realty_type['choices'][ $value ];
                        $html = '<li class="row-fluid product-details">';
                        $html .= ' <span class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Тип недвижимости </span>';
                        $html .= ' <span class="col-lg-6 col-md-6 col-sm-6 col-xs-6">'.$label.'</span>';
                        $html .= '<div class="clearfix"></div>';
                        $html .= ' </li>';
                    echo $html;

                    $regions = (get_the_terms($post->ID, 'tax-region'));
                    $region = $regions[0];

                    $html = '<li class="row-fluid product-details">';
                        $html .= ' <span class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Регион</span>';
                        $html .= ' <span class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                             <a  href="'. get_term_link( (int)$region->term_id, $region->taxonomy ) .'" class="text-color-orange product-detapil-href-active">'. $region->name .'</a>
                         </span>';
                        $html .= '<div class="clearfix"></div>';
                    $html .= ' </li>';

                    echo $html;
                    ?>

                </ul>
                <div class="text-center orange-button-wrapper">
                    <a href="#" class="btn orange-button button-single-orange">Запросить подробности</a>
                </div>

                <div class="aside-free-specialist-form">

                        <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

                </div>
                <!--Sidebar content-->
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="span8">

            <?php
            $id = $post->ID;
            $args = array(

                'post_type' => 'realty',
                'post__not_in' => array($post->ID),
                'posts_per_page' => '3',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tax-region',
                        'field' => 'id',
                        'terms' => (int)$region->term_id
                    )
                )
            );
            $realty_query = new WP_Query( $args );


            if ($realty_query->have_posts()) {

                echo(
                    '<div class="row-fluid header-with-line">
                        <hr class="col-lg-2 col-md-2 col-sm-2 col-xs-3 hidden-xs hidden-sm" />
                        <h4 class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-color-blue ">Другие объекты в этом регионе</h4>
                        <hr class="col-lg-2 col-md-2 col-sm-2 col-xs-3 hidden-xs hidden-sm" />
                        <div class="clearfix"></div>
                    </div>
                    <div class="other-realty">
                    <ul class="list-inline">'
                );


                while ($realty_query->have_posts()) { $realty_query->the_post(); // если посты есть - запускаем цикл wp

                     get_template_part('items-template-part/realty-item-little');
                }
                echo(
                   '
                    </ul>
                </div>'
                );
            }

            ?>
        </div>

        <div class="span4 page-aside-right">
            <div class="googlemaps-product">

            </div>
        </div>
    </div>



</div>
<?php get_template_part('banner'); ?>
<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
