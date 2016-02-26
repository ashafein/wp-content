<?php // Template Name: О нас

get_header(); ?>

<div class="color-grey about-us-page sidebar-page">
    <?php get_template_part('header-slider'); ?>


    <div class="container-fluid">
        <div class="breadcrumbs">
            <ul class="list-inline text-left">
                <li><a href="<?php echo get_home_url() ?>">Главная - </a></li>
                <li><a href=""><?php echo(get_the_title()); ?></a></li>
            </ul>
        </div>

        <div class="row-fluid">
            <div class="span8">

                <div class="about-us-top">
                    <div class="row-fluid">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left">
                            <?php
                            echo(types_render_usermeta_field( "about-us-img", array( "alt" => "BulgarianDom",
                                "user_name" => "admin" ) ));
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-us-top-content">
                            <h4 class="text-color-blue text-left text-uppercase">Свяжитесь с нами прямо сейчас</h4>
                            <ul class="list-unstyled text-left">
                                <?php
                                        $data = types_render_usermeta_field( "phone-kyivstar", array());
                                    if($data){
                                        echo('<li><i class="contact-icon kievstar"></i>'.$data.'</li>');
                                    }
                                ?>
                                <?php
                                $data = types_render_usermeta_field( "phone-mts", array());
                                if($data){
                                    echo('<li><i class="contact-icon mts"></i>'.$data.'</li>');
                                }
                                ?>
                                <?php
                                $data = types_render_usermeta_field( "about-us-email", array());
                                if($data){
                                    echo('<li class="text-color-orange text-underline"><i class="contact-icon email"></i>'.$data.'</li>');
                                }
                                ?>
                                <?php
                                $data = types_render_usermeta_field( "about-us-skype", array());
                                if($data){
                                    echo('<li><i class="contact-icon skype"></i>'.$data.'</li>');
                                }
                                ?>
                                <?php
                                $data = types_render_usermeta_field( "about-us-working-hou", array());
                                if($data){
                                    echo('<li><i class="contact-icon working-time"></i>'.$data.'</li>');
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="clearfix"></div>

                <div class="about-us-content">
                    <h2 class="text-color-orange text-center text-uppercase">BulgariaDom предоставляет своим клиентам максимальный спектр услуг</h2>

                    <?php
                    $i = 1;
                    $query_descr = new WP_Query;
                    $descriptions = $query_descr->query( array(
                        'post_type' => 'company-descr',
                        'orderby' => 'post_date',
                        'order'   => 'ASC',
                    ) );

                    $item_descr = '';
                    foreach( $descriptions as $descr ){
                        $item_descr .= '<div class="text-color-blue service-item">';
                            $item_descr .= '<div class="text-left">';
                                $item_descr .= '<span class="text-center service-item-id">'.$i.'</span>';
                                $item_descr .= '<div class="spacer-40"> </div>';
                                $item_descr .= $descr->post_content;
                            $item_descr .= '</div>';
                        $item_descr .= '</div>';
                        $i++;
                    }
                    echo($item_descr);
                    /* Restore original Post Data */
                    wp_reset_postdata();
                    ?>

                </div>
            </div>

            <div class="span4 page-aside-right">
                <div class="row-fluid color-white about-us-contact-form">
                    <div class="col-lg-4 col-md-4 hidden-xs hidden-sm"></div>
                    <h4  class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center text-uppercase text-color-orange">Оставайтесь на связи</h4>
                    <div  class="col-lg-4 col-md-4 hidden-xs hidden-sm"></div>
                    <p class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-center text-color-blue">Задайте нам вопрос</p>
                    <?php //echo do_shortcode('[contact-form-7 id="117" html_class="form-horizontal text-color-blue"]'); ?>
                    <?php echo do_shortcode('[contact-form-7 id="78" html_class="form-horizontal text-color-blue"]'); ?>

                </div>
            </div>

        </div>

        <div class="row-fluid text-color-blue about-us-bottom">
            <div class="text-center about-us-bottom-item">
                <div>
                    <img src="<?php echo( get_stylesheet_directory_uri())?>/img/service-item1.png" />
                    <p>Чистые сделки<br/>
                        100% юридическая<br/>
                        защита
                    </p>
                </div>
            </div>

            <div class="text-center margin-block about-us-bottom-item">
                <div>
                    <img src="<?php echo( get_stylesheet_directory_uri())?>/img/service-item2.png" />
                    <p>Работаем<br/> без посредников<br/> и наценок
                    </p>
                </div>
            </div>

            <div class="text-center about-us-bottom-item">
                <div>
                    <img src="<?php echo( get_stylesheet_directory_uri())?>/img/service-item3.png" />
                    <p>Наши услуги<br/> оплачивает<br/> <u>продавец</u>
                    </p>
                </div>
            </div>
            <div class="button-wrapper text-center">
                <a class="btn orange-button button-single-orange"><i class="fa fa-phone fa-2x text-color-white hidden-xs "></i><span>Заказать бесплатный звонок специалиста из болгарии</span></a>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('contact-form-blue'); ?>
<?php get_footer();?>
