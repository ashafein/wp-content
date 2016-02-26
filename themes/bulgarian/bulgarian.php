<?php // Template Name: О Болгарии
get_header(); ?>

<div class="color-grey regions-page sidebar-page sidebar-left"">

<?php get_template_part('header-slider'); ?>


<div class="container-fluid">
    <div class="breadcrumbs">
        <ul class="list-inline">
            <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
            <li><a href=""><?php echo(get_the_title()); ?></a></li>
        </ul>
    </div>
</div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4 page-aside-left">

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

        <div class="span8">
            <?php $page = get_page_by_title( 'Регионы Болгарии' ); ?>
            <a href="<?php echo($page->guid); ?>">Регионы Болгарии</a>
            <a href="">Полезно знать</a>


        </div>

    </div>

</div>


<?php get_template_part('contact-form-blue'); ?>
<?php get_footer();?>
