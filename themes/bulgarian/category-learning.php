<?php // Template Name: Новости

get_header(); ?>

<div class="color-grey article-page sidebar-page">
    <?php get_template_part('header-slider'); ?>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">

                <div class="breadcrumbs">
                    <ul class="list-inline text-left">
                        <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                        <li><a href=""><?php echo(single_cat_title()); ?></a></li>
                    </ul>
                </div>
                <div style="background: #333; padding: 10px;"
                     onmouseover="this.style.backgroundColor='#555';" onmouseout="this.style.backgroundColor='#333';">
                    Dark gray
                </div>
                <?php
                query_posts($query_string.'&order=ASC&posts_per_page=200');
                if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                    ?>

                <?php endwhile; // конец цикла
                else: echo '<h2>Нет записей.</h2>'; endif; // если записей нет, напишем "простите" ?>

            </div>

            <div class="span4 page-aside-right">
                <div class="color-white little-subscribe-form">
                    <form class="form-inline blue-form">
                        <div class="form-group">
                            <label for="email-subscribe">Email*</label>
                            <input type="email" class="form-control" id="email-subscribe" placeholder="">
                        </div>
                        <button type="submit" class="btn blue-button">Получай эксклюзив первым</button>
                    </form>
                </div>

                <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

                <?php get_template_part('search-vertical'); ?>


            </div>
            <?php pagination(); // пагинация, функция нах-ся в function.php ?>
        </div>


    </div>
    <?php get_template_part('contact-form-part/contact-form-blue'); ?>
    <?php get_footer();?>
