<?php
/* WP Post Template: Шаблон Региона */
?>
<?php
get_header(); ?>

<div class="color-grey cities-page sidebar-page sidebar-left">

    <?php get_template_part('header-slider'); ?>

    <div class="container-fluid">
        <div class="breadcrumbs">
            <ul class="list-inline">
                <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                <?php   $page = get_page_by_title( 'О Болгарии', $output, 'page' ); ?>
                <li><a href="<?php echo(get_permalink($page->ID)); ?>">О Болгарии - </a></li>
                <?php   $page = get_page_by_title( 'Регионы Болгарии', $output, 'page' ); ?>
                <li><a href="<?php echo(get_permalink($page->ID)); ?>">Регионы Болгарии - </a></li>
                <li><a href=""><?php echo(get_the_title()); ?></a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span4 page-aside-left">

                <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

                <?php get_template_part('search-vertical'); ?>

                <?php get_template_part('contact-form'); ?>
            </div>

            <div class="span8">
                <h2><?php echo(get_the_title()); ?></h2>

                <div class="cities">

                    <?php
                    $item_city = '';
                    $child_posts = types_child_posts('city');

                    foreach( $child_posts as $city ) {

                        $item_city .= '<div class="color-white text-left city-item">';
                            $item_city .= '<h3 class="text-color-blue">'.$city->post_title.'</h3>';
                            $item_city .= '<p>';
                                $item_city .= get_the_post_thumbnail($reg->ID, 'large');
                            $item_city .= $city->post_content.'</p>';
                            $item_city .= '<div class="clearfix"></div>';
                            $item_city .= '<div class="text-center button-wrapper">';
                            $item_city .= '<a href="'.$city->guid.'" class="btn orange-button button-single-orange">Начать поиск недвижимости в '.$city->post_title.'</a>';
                            $item_city .= '</div>';
                        $item_city .= '</div>';
                    }
                    echo($item_city);
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    ?>

                </div>

            </div>

        </div>
    </div>
</div>
<?php get_template_part('banner'); ?>
<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
