<?php // Template Name: Новости

get_header(); ?>


<div class="color-white deals-page">

    <?php get_template_part('header-slider'); ?>

    <section class="color-white sails-offers">
        <div class="container-fluid">

            <div class="breadcrumbs">
                <ul class="list-inline text-left">
                    <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                    <li><a href=""><?php echo(single_cat_title()); ?></a></li>
                </ul>
            </div>

            <h3 class="text-center">Акционные предложения</h3>

            <div class="row-fluid">

                <?php
                query_posts($query_string.'&order=ASC&posts_per_page=10');
                if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                    ?>
                    <?php get_template_part('items-template-part/deals-item'); // для отображения каждой записи берем шаблон category-item.php ?>
                <?php endwhile; // конец цикла
                else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишем "простите" ?>
            </div>
        </div>

    </section>
    <?php get_template_part('banner'); ?>
    <?php get_template_part('contact-form-part/contact-form-grey'); ?>
</div>

<?php get_footer();?>
