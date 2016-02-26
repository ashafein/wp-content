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
                    <a href="#" class="btn orange-button button-single-orange">Хочу узнать подробности</a>
                </div>
            </div>

            <div class="span4 page-aside-right">

                <?php get_template_part('contact-form-sidebar'); ?>

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
        </div>

        <?php get_template_part('contact-form-white'); ?>
    </div>

</div>
<?php get_footer();?>
