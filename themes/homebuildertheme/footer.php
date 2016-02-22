  
<div class="clear"></div>
<!--Start Footer-->
<div class="footer">
    <?php
    /* A sidebar in the footer? Yep. You can can customize
     * your footer with four columns of widgets.
     */
    get_sidebar('footer');
    ?>
    <div class="clear"></div>
</div>
<div class="clear"></div>
<!--Start footer bottom inner-->
<div class="bottom-footer">
    <div class="grid_12 alpha">
        <div class="footer_bottom_inner"> 
            <?php if (of_get_option('inkthemes_footertext') != '') { ?>
                <span class="copyright"><?php echo of_get_option('inkthemes_footertext'); ?></span> 
            <?php } else { ?>
                <span class="copyright">Тема от <a href="http://www.inkthemes.com">InkThemes.com</a>, <a href="http://best-wordpress-templates.ru/">WordPress темы</a>.</span>
            <?php } ?>
        </div>
    </div>
    <div class="grid_12 omega">

    </div>
</div>
<!--End Footer bottom inner-->
<!--End Footer bottom-->
</div>
</div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>