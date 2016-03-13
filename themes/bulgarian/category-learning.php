<?php // Template Name: Новости

get_header(); ?>

<div class="color-grey article-page sidebar-page">
    <?php get_template_part('header-slider'); ?>

    <div class="container-fluid">
        <div class="breadcrumbs">
            <ul class="list-inline text-left">
                <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                <li><a href=""><?php echo(single_cat_title()); ?></a></li>
            </ul>
        </div>
        <div class="row-fluid">
            <div class="span8">


                <div class="learning-top">
                    <h2>Предоставляем вам лучший сервис</h2>
                    <hr/>
                    <p>
                        Компания BulgarianDom понимает важность покупки <br/>
                        недвижмости в Болгарии, поэтом мы предоставляем полную информацию<br/>
                        для принятия Вами взвешенного решения
                    </p>
                </div>

                <div class="row-fluid learning-content">

                    <?php
                    query_posts($query_string.'&order=ASC&posts_per_page=200');
                    if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                        ?>
                        <?php get_template_part('items-template-part/learning-item'); // для отображения каждой записи берем шаблон category-item.php ?>
                    <?php endwhile; // конец цикла
                    else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишем "простите" ?>

                </div>

                <div class="clearfix"></div>

            </div>

            <div class="span4 page-aside-right">

                <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

                <?php get_template_part('search-vertical'); ?>

                <?php get_template_part('contact-form'); ?>

            </div>
            <?php pagination(); // пагинация, функция нах-ся в function.php ?>
        </div>


    </div>
    <?php get_template_part('contact-form-part/contact-form-blue'); ?>
    <?php get_footer();?>
