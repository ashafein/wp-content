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

            <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

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
                $i = 1;
                $html = '';
                query_posts(array('post_type'=>'region','posts_per_page' => '200','orderby' => 'post_title', 'order'   => 'ASC',));
                if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp

                $i++;
            ?>
                    <?php $array = array( 'i' => $i ); // Этот масссив будет доступен в файле my_template.php

                    include(locate_template('items-template-part/region-item.php')); ?>
                <?php endwhile; // конец цикла
                else: echo '<h2>Нет записей.</h2>'; endif;
                wp_reset_postdata();
            ?>

        </div>

    </div>
</div>


</div>
<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
