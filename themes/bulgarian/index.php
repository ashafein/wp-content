<?php // Template Name: Главная страница

get_header(); ?>


<div class="home-page-slider">


    <div class="some-slider">
        <img src="<?php echo(get_stylesheet_directory_uri()); ?>/img/slider-back.png" style="width:100%" />
    </div>

    <div class="home-page-slider-content">
        <div class="container-fluid">
            <div class="spacer-45"></div>
            <div class="row slider-content-middle">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 home-slider-text">
                    <h3>Lorem ipsum</h3>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetuer adipiscing elit. Aenean commodo ligula eget dolor. A
                        enean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
                        rem
                    </p>
                    <a href="#" class="btn button-transparent slider-button"><span>Читать далее</span></a>
                </div>
                <div class="col-lg-5 col-md-5"></div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 home-slider-question">
                    <div class="center-block specialist-photo"></div>
                    <a href="<?php echo($GLOBALS['bulg']['deals_link']); ?>" class="btn center-block button-transparent slider-button">задать вопрос риэлтору</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="spacer-120"></div>

            <?php get_template_part('search-horizontal'); ?>

            <div class="spacer-10"></div>
        </div>
    </div>


</div>

<section class="color-white italic home-realty">
    <h2 class="text-color-blue home-page-h2"><em>Найдите идеальную недвижимость прямо сейчас</em></h2>

    <div class="container-fluid color-white home-realty-content">
        <?php

        query_posts(array('post_type'=>'realty','posts_per_page' => '9', 'order_by'=>'date'));
        if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
            ?>
            <?php get_template_part('items-template-part/realty-item'); ?>
        <?php endwhile; // конец цикла
        else: echo '<h2>Нет записей.</h2>'; endif; ?>

    </div>

</section>

<section class="color-grey  free-specialist">
    <h2 class="text-color-blue home-page-h2"><em>Или доверьте бесплатный подбор специалисту</em></h2>
    <div class="container-fluid">
        <form class="form-inline orange-form">
            <div class="form-group">
                <input type="text" class="form-control"  placeholder="Имя*">
                <input type="text" class="form-control"  placeholder="Телефон*">
                <input type="text" class="form-control"  placeholder="Email*">
                <input type="text" class="form-control"  placeholder="Сообщение">
            </div>
            <button type="submit" class="btn orange-button">Отправить</button>
        </form>
    </div>
</section>

<section class="text-center text-color-white why-us">
    <div class="container-fluid">
        <div class="spacer-45"></div>
        <h2 class="">Почему именно мы</h2>
        <hr/>
        <p class="">Три ключевых фактора успеха продаж BulgariaDom</p>
        <div class="center-block why-us-content">



            <div class="why-us-item">
                <div class="why-us-item-body">
                    <?php $page = get_page_by_title( 'Главная', 'page' ); ?>

                    <?php  $img = get_field('factor-image-1',$page->ID) ?>
                    <div class="us-image-1" style="background-image: url('<?php echo($img['url']); ?>')"></div>
                    <h5><?php echo(get_field('factor-head-1',$page->ID)); ?></h5>
                    <p>
                        <?php echo(get_field('factor-descr-1',$page->ID)); ?>
                    </p>
                </div>
                <div class="ok-orange"></div>
            </div>

            <div class="why-us-item">
                <div class="why-us-item-body">
                    <?php  $img = get_field('factor-image-2',$page->ID) ?>
                    <div class="us-image-1" style="background-image: url('<?php echo($img['url']); ?>')"></div>
                    <h5><?php echo(get_field('factor-head-2',$page->ID)); ?></h5>
                    <p>
                        <?php echo(get_field('factor-descr-2',$page->ID)); ?>
                    </p>
                </div>
                <div class="ok-orange"></div>
            </div>

            <div class="why-us-item">
                <div class="why-us-item-body">
                    <?php  $img = get_field('factor-image-3',$page->ID) ?>
                    <div class="us-image-1" style="background-image: url('<?php echo($img['url']); ?>')"></div>
                    <h5><?php echo(get_field('factor-head-3',$page->ID)); ?></h5>
                    <p>
                        <?php echo(get_field('factor-descr-3',$page->ID)); ?>
                    </p>
                </div>
                <div class="ok-orange"></div>
            </div>

        </div>
    </div>
</section>

<section class="text-center text-color-blue color-white our-agents">

    <?php
    $the_query= new WP_Query( "post_type=manager&posts_per_page=2" );
    // The Loop
    if ( $the_query->have_posts() ) {
        echo'    <div class="spacer-45"></div>
                <h2 class="">Наши агенты всегда рады вам помочь</h2>
                <hr/>
                <div class="container-fluid">';

    while ( $the_query->have_posts() ) {
        $the_query->the_post();

             get_template_part('items-template-part/home-agent-item');

        }
        echo'    </div>';
    }  ?>

        <?php wp_reset_postdata(); ?>
</section>

<section class="color-grey text-center home-news">

    <div class="spacer-70"></div>
    <?php $category_id = get_cat_ID( 'Новости' ); ?>
    <h2 class="text-color-blue"><a href="<?php echo get_category_link( $category_id ); ?>">Новости и статьи</a></h2>
    <hr />
    <p class="text-color-black">С BulgariaDom только актуальные новости и полезные статьи</p>
    <div class="container-fluid">
        <?php
        $category_id = get_cat_ID( 'Новости' );
            query_posts(array('post_type'=>'post','cat'=>$category_id,'posts_per_page' => '4','orderby'=>'date','order'   => 'DESC',));
            if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
                ?>
                <?php get_template_part('items-template-part/home-news-item'); ?>
            <?php endwhile; // конец цикла
             endif; ?>
        <?php wp_reset_postdata(); ?>


    </div>
    <div class="spacer-45"></div>
    <div class="home-subscribe">
        <form>
            <button class="subscribe-button-blue" type="submit">Получай эксклюзив первым - подпишись прямо сейчас
            </button>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Введите email">
            </div>
        </form>
    </div>
</section>

<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>
