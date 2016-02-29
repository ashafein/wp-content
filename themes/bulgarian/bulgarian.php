<?php // Template Name: О Болгарии
get_header(); ?>

<div class="color-white regions-page sidebar-page sidebar-left"">

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

            <?php get_template_part('contact-form-part/contact-form-sidebar'); ?>

            <?php get_template_part('search-vertical'); ?>

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

            <h2><?php echo the_title() ?> </h2>
            <div class="spacer-20"></div>
            <div>
                <?php echo the_content() ?>
            </div>

            <div>
                <?php $page = get_page_by_title( 'Регионы Болгарии' ); ?>
                <h3 class="additional-links text-center blue-head "><a href="<?php echo($page->guid); ?>">Регионы Болгарии</a></h3>
                <?php
                $category = get_category_by_slug( 'articles' );
                $category_id = $category->term_id;
                ?>
                <h3 class="additional-links text-center blue-head"><a href="<?php echo(get_category_link( $category_id )); ?>">Статьи о Болгарии</a></h3>
                <?php
                $category = get_category_by_slug( 'learning' );
                $category_id = $category->term_id;
                ?>
                <h3 class="additional-links text-center blue-head"><a  href="<?php echo(get_category_link( $category_id )); ?>">Полезно знать</a></h3>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>

</div>


<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
