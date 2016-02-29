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


        <?php //echo do_shortcode('[contact-form-7 id="94"  html_class="blue-form"]'); ?>
        <?php echo do_shortcode('[contact-form-7 id="36" html_class="blue-form"]'); ?>
    </div>

</div>