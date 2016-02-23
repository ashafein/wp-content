<!DOCTYPE html>
<html <?php language_attributes(); ?> lang="en">

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
    <?php wp_head(); ?>
    <![if IE]>
    <link href="css/all-ie-only.css" rel="stylesheet">
    <![endif]>
    <!--[if IE]>
    <link href="css/all-ie-only.css" rel="stylesheet">
    <![endif]-->
</head>
<body <?php body_class();?>>

<header class="color-white">
    <div class="container-fluid" >
        <div class="row-fluid">

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left bulgaria-logo ">
                <a  class="" href="<?php echo home_url(); ?>">
                     <?php
                        echo(types_render_usermeta_field( "header_logo", array( "alt" => "BulgarianDom",
                            "user_name" => "admin" ) ));
                    ?>
                </a>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-color-blue text-center header-nav">

                <?php

                $args = array(

                    'theme_location' => 'main_menu',

                    'container'       => '',

                    'container_class' => '',

                    'menu_class' => 'list-inline text-center',
                );

                wp_nav_menu( $args );

                ?>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12  text-right header-contacts">
                <div class="header-phone">
                    <i class="fa fa-phone text-color-blue"></i><?php echo(types_render_usermeta_field( "header_phone",array())); ?>
                </div>
                <div  class="header-mail">
                    <i class="fa fa-envelope-o text-color-blue"></i><?php echo(types_render_usermeta_field( "header_email",array())); ?>
                </div>
                <div class="header-callback">
                    <a  href="#"><i class="fa fa-skype text-color-blue"></i>Заказать звонок</a>
                </div>
            </div>
        </div>

    </div>
</header>

<div class="page-wrapper">