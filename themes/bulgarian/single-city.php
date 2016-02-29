<?php
/* WP Post Template: Шаблон страницы Города */
?>

<?php
get_header(); ?>

<div class="color-white catalog-page">

    <?php get_template_part('header-slider'); ?>

    <div class="container-fluid">

        <?php get_template_part('search-vertical'); ?>




        <div class="container-fluid color-white catalog-content">

            <?php

            $posts_array = array(0);
            $child_posts = types_child_posts('realty');

            foreach ($child_posts as $child_post) {
                $posts_array[] = $child_post->ID;
            }

            /* Restore original Post Data */
            wp_reset_postdata();
            ?>



            <?php

            query_posts(array('post_type'=>'realty','post__in' => $posts_array ,'posts_per_page' => '9','paged' => get_query_var('paged')));
            if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                ?>
                <?php get_template_part('items-template-part/realty-item'); ?>
            <?php endwhile; // конец цикла
            else: echo '<h2>Нет записей.</h2>'; endif;
            wp_reset_postdata();
           ?>

        </div>
        <?php pagination(); // пагинация, функция нах-ся в function.php ?>
    </div>
</div>

<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
