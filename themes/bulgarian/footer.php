</div> <!-- Page-wrapper close -->

<?php wp_footer(); ?>



<a href="#" data-toggle="modal" data-target="#contactModal" class="question"> Задать вопрос</a>
<footer>
    <div class="text-color-white container-fluid">
        <div class="row-fluid">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="footer-subscribe">
                    <p>ХОТИТЕ ПОЛУЧАТЬ НОВЫЕ ОБЪЕКТЫ?</p>
                    <a href="#" data-toggle="modal" data-target="#subscribeModal" > Подпишитесь прямо сейчас</a>
                </div>
                <div class="footer-contacts">
                    <div class="text-left header-contacts">
                        <div class="header-phone">
                            <i class="fa fa-phone fa-lg text-color-white"></i><?php echo(types_render_usermeta_field( "header_phone",array())); ?>
                        </div>
                        <div  class="header-mail">
                            <i class="fa fa-envelope-o  fa-lg text-color-white"></i><?php echo(types_render_usermeta_field( "header_email",array())); ?>
                        </div>
                        <div class="header-callback">
                            <i class="fa fa-skype  fa-lg text-color-white"></i><?php echo(types_render_usermeta_field( "header_skype",array())); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left useful-links">
                <p>Useful links</p>
                <ul class="list-unstyled">
                    <li> Community Guidelines</li>
                    <li> Free Credit Report </li>
                    <li> Help & FAQ</li>
                    <li>Home price</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                </ul>
            </div>
            <div  class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left useful-links">
                <p>Useful links</p>
                <ul class="list-unstyled">
                    <li> Community Guidelines</li>
                    <li> Free Credit Report </li>
                    <li> Help & FAQ</li>
                    <li>Home price</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                </ul>
            </div>
            <div  class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left useful-links">
                <p>Useful links</p>
                <ul class="list-unstyled">
                    <li> Community Guidelines</li>
                    <li> Free Credit Report </li>
                    <li> Help & FAQ</li>
                    <li>Home price</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                </ul>
            </div>
            <div  class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-left useful-links">
                <p>Useful links</p>
                <ul class="list-unstyled">
                    <li> Community Guidelines</li>
                    <li> Free Credit Report </li>
                    <li> Help & FAQ</li>
                    <li>Home price</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                    <li>Market View</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="text-color-white footer-bottom">
        <div class="container-fluid">
            <div class="row-fluid ">
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class=" footer-logo"></div>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 footer-rights">
                    <p>2016 ©</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 footer-terms">
                    <p> Все права защищены</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 footer-terms">
                    <p>Условия Использования и Конфиденциальности</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>
    <a href="#top" class="to-top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;"></a>
</footer>
<!-- SubscribeModal -->
<div id="subscribeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
            <div class="color-white little-subscribe-form">
                <div class="form-inline blue-form">
                    <div class="es_msg_2">
                        <span id="es_msg_pg_2"></span>
                    </div>
                    <div class="form-group">
                        <label for="es_txt_email_pg_2">Email*</label>
                        <div  class="modal-close" data-dismiss="modal">Close X</div>
                        <div class="clearfix"></div>
                        <input name="es_txt_email_pg_2" id="es_txt_email_pg_2" onkeypress="if(event.keyCode==13) es_submit_pages('<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>',2)" value="" maxlength="225" type="text" class="form-control"  placeholder="">
                        <input name="es_txt_name_pg_2" id="es_txt_name_pg_2" value="" type="hidden">
                        <input name="es_txt_group_pg_2" id="es_txt_group_pg_2" value="" type="hidden">
                    </div>
                    <button name="es_txt_button_pg_2" id="es_txt_button_pg_2" onclick="return es_submit_pages('<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>',2)" class="btn blue-button"  type="button">Получай эксклюзив первым</button>
                </div>
            </div>

    </div>
</div>
<!--END SubscribeModal -->

<!-- SubscribeModal -->
<div id="contactModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div  class="modal-close" data-dismiss="modal">Close X</div>
        <?php get_template_part('contact-form-part/contact-form-blue'); ?>
    </div>
</div>
<!--END SubscribeModal -->
<script type="text/javascript">
    $(document).ready(function() {
        if(document.getElementById("stick_menu")) {
            var start_pos = $('#stick_menu').offset().top;
            $(window).scroll(function () {
                if ($(window).scrollTop() >= start_pos) {
                    if ($('#stick_menu').hasClass() == false) $('#stick_menu').addClass('to_top');
                }
                else $('#stick_menu').removeClass('to_top');
            });
        }
    });
</script>

</body>
</html>