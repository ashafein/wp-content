<?php // Template Name: О Болгарии
get_header(); ?>

<div class="color-grey regions-page sidebar-page sidebar-left"">

<?php get_template_part('header-slider');?>


<div class="container-fluid">
    <div class="breadcrumbs">
        <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
    </div>
</div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4 page-aside-left">
            <div class="aside-free-specialist-form">

                <div class="text-center color-white aside-free-specialist-content">
                    <p class="text-color-blue  aside-specialist-top-text">Заполните форму для бесплатного подбора недвижимости для Вас</p>
                    <?php
                        $on = 1;
                        $html = '';
                        $the_query= new WP_Query( "post_type=manager&meta_key=wpcf-manager_display_in_c&meta_value=$on" );
                        // The Loop
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                $manager_meta = get_post_meta( get_the_ID());

                                $manager_photo = types_render_field("manager_photo", array("raw"=>"true"));

                                $html.= '<div class="text-center agent-pict"> <img src="'.$manager_photo.'" /></div>';
                                $html.= '<div class="text-left text-uppercase agent-content">';

                                    $manager_fio = types_render_field("manager_fio", array("raw"=>"true"));
                                    $html.= '<p class="text-color-blue">'.$manager_fio.'</p>';

                                    $html.= '<div class="text-color-black agent-contacts">';
                                        $html.= ' <div class="agent-phone">
                                                <i class="fa fa-phone text-color-blue"></i>';
                                                $manager_phone = types_render_field("manager_phone", array("raw"=>"true"));
                                                $html.= $manager_phone;
                                        $html.= '</div>';

                                        $html.= '<div  class="agent-mail">';
                                            $html.= '<i class="fa fa-envelope-o text-color-blue"></i>';
                                            $manager_email = types_render_field("manager_email", array("raw"=>"true"));
                                            $html.= $manager_email;
                                        $html.= '</div>';

                                        $html.= '<div class="agent-callback">';
                                            $html.= '<i class="fa fa-skype text-color-blue"></i>';
                                            $manager_skype = types_render_field("manager_skype", array("raw"=>"true"));
                                            $html.= $manager_skype;
                                        $html.= '</div>';
                                    $html.= '</div>';
                                $html.= '</div>';
                                echo($html);
                                break;
                            }
                        }
                        /* Restore original Post Data */
                        wp_reset_postdata();
                    ?>


                    <?php echo do_shortcode('[contact-form-7 id="94"  html_class="blue-form"]'); ?>
                    <?php //echo do_shortcode('[contact-form-7 id="36" html_class="blue-form"]'); ?>
                </div>

            </div>

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

            <?php

            $html = '';
            $the_query= new WP_Query( "post_type=region&orderby=title" );
            // The Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
                    the_post();
                    the_title(); // вывести заголовок

                }
            }
            /* Restore original Post Data */
            wp_reset_postdata();
            ?>


            <div class="row-fluid region-item region-to-the-left">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 region-item-image">
                    <img src="img/region-item-1.png" alt="Bulgarian-region" />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left color-white region-item-content">
                    <h4>Северное побережье</h4>
                    <span>By John POe in Blog entry 15 aug 2014 0 comments</span>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetuer adipiscing elit. Aenean commodo ligula eget dolor. A
                        enean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
                        rem
                    </p>
                    <a>Подробности</a>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="row-fluid region-item region-to-the-right">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 region-item-image">
                    <img src="img/region-item-1.png" alt="Bulgarian-region" />
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left color-white region-item-content">
                    <h4>Северное побережье</h4>
                    <span>By John POe in Blog entry 15 aug 2014 0 comments</span>
                    <p>
                        Lorem ipsum dolor sit amet,
                        consectetuer adipiscing elit. Aenean commodo ligula eget dolor. A
                        enean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                        ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
                        rem
                    </p>
                    <a>Подробности</a>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
</div>


</div>
<?php get_footer();?>
