<?php
/* WP Post Template: Шаблон Страницы Акции */
?>
<?php
get_header(); ?>

<div class="color-white deals-page  deals-detail sidebar-page">
    <?php get_template_part('header-slider'); ?>

    <div class="container-fluid">
        <div class="breadcrumbs">
            <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">

                <h3 class="text-uppercase text-center text-color-orange"><?php the_title(); ?></h3>
                <p class="text-color-blue">
                    <?php echo $post->post_content; ?>
                </p>
                <div class="text-center orange-button-wrapper">
                    <a href="#" data-toggle="modal" data-target="#contactModal" class="btn orange-button button-single-orange">Хочу узнать подробности</a>
                </div>
            </div>

            <div class="span4 page-aside-right">

                <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

                <?php get_template_part('search-vertical'); ?>

                <?php get_template_part('contact-form'); ?>

            </div>
        </div>
        <?php get_template_part('banner'); ?>
        <?php get_template_part('contact-form-part/contact-form-white'); ?>
    </div>

</div>
<?php get_footer();?>
