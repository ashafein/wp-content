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

                <?php
                    query_posts($query_string.'&order=ASC&posts_per_page=10');
                    if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                ?>
                    <?php get_template_part('items-template-part/category-item'); // для отображения каждой записи берем шаблон category-item.php ?>
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


            </div>
            <?php pagination(); // пагинация, функция нах-ся в function.php ?>
        </div>


</div>
<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
