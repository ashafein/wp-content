<?php // Template Name: Каталог объектов
get_header(); ?>

<div class="color-white catalog-page">

    <?php get_template_part('header-slider'); ?>

    <div class="container-fluid">
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


        <div class="container-fluid color-white catalog-content">
            <?php

            query_posts(array('post_type'=>'realty','posts_per_page' => '9','paged' => get_query_var('paged')));
            if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                ?>
                <?php get_template_part('items-template-part/realty-item'); ?>
            <?php endwhile; // конец цикла
            else: echo '<h2>Нет записей.</h2>'; endif; ?>

        </div>

        <?php pagination(); // пагинация, функция нах-ся в function.php ?>
    </div>
</div>

<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
