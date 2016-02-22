<?php
/**
 * The template for displaying front page pages.
 *
 */
?>
<?php get_header(); ?>  
<div class="clear"></div>
<!--Start Index-->
<div class="index-page">
    <!--Start Slider-->
    <div class="slider-wrapper">
        <div id="container">
            <div id="example">
                <div id="slides">
                    <div class="slides_container">
                        <?php
                        //The strpos funtion is comparing the strings to allow uploading of the Videos & Images in the Slider
                        $mystring1 = of_get_option('inkthemes_image1');
                        $value_img = array('.jpg', '.png', '.jpeg', '.gif', '.bmp', '.tiff', '.tif');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring1)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image1') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image1'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image1') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image1'); ?>"  alt="Slide 1"/></a> </div>
                            <?php } else { ?>
                                <div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/images/slide-1.jpg"  alt="Slide 1"/></div>
                            <?php }
                        } ?>  
                        <?php
                        $mystring2 = of_get_option('inkthemes_image2');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring2)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image2') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image2'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image2') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image2'); ?>"  alt="Slide 2"/></div>
                                <?php
                            } else {
                                
                            }
                        }
                        ?>   
                        <?php
                        $mystring3 = of_get_option('inkthemes_image3');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring3)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image3') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image3'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image3') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image3'); ?>"  alt="Slide 3"/></div>                   
                                <?php
                            } else {
                                
                            }
                        }
                        ?>
                        <?php
                        $mystring4 = of_get_option('inkthemes_image4');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring4)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image4') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image4'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image4') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image4'); ?>"  alt="Slide 4"/></div>
                                <?php
                            } else {
                                
                            }
                        }
                        ?>    
                        <?php
                        $mystring5 = of_get_option('inkthemes_image5');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring5)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image5') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image5'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image5') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image5'); ?>"  alt="Slide 5"/></div>
                                <?php
                            } else {
                                
                            }
                        }
                        ?> 
                        <?php
                        $mystring6 = of_get_option('inkthemes_image6');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring6)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image6') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image6'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image6') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image6'); ?>"  alt="Slide 6"/></div>
                                <?php
                            } else {
                                
                            }
                        }
                        ?> 
                        <?php
                        $mystring7 = of_get_option('inkthemes_image7');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring7)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image7') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image7'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image7') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image7'); ?>"  alt="Slide 7"/></div>
                                <?php
                            } else {
                                
                            }
                        }
                        ?> 
                        <?php
                        $mystring8 = of_get_option('inkthemes_image8');
                        $check_img_ofset = 0;
                        foreach ($value_img as $get_value) {
                            if (preg_match("/$get_value/", $mystring8)) {
                                $check_img_ofset = 1;
                            }
                        }
                        // Note our use of ===.  Simply == would not work as expected
                        // because the position of 'a' was the 0th (first) character.
                        //            
                        ?>
                        <?php if ($check_img_ofset == 0 && of_get_option('inkthemes_image8') != '') { ?>
                            <div class="slide"><?php echo of_get_option('inkthemes_image8'); ?></div>
                        <?php } else { ?>
                            <?php if (of_get_option('inkthemes_image8') != '') { ?>
                                <div class="slide"><img src="<?php echo of_get_option('inkthemes_image8'); ?>"  alt="Slide 8"/></div>
                                <?php
                            } else {
                                
                            }
                        }
                        ?> 
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-info">
            <div class="header-search-block">
                <div id="listings">
                    <div id="listings-content">                      
                        <div id="listings-options">                            
                            <h2>Искать недвижимость</h2>                                
                            <?php
                            $array1 = of_get_option('listings1'); //Multicheck Categories Array from Themes Option Panel
                            $searchValue = 1;
                            if (is_array($array1)) {
                                $keys = array_keys($array1, $searchValue); //All Active Categories which are 1 are stored in array keys
                                $comma_separated = implode(",", $keys);
                            }
                            ?>
                            <table>
                                <form action="<?php bloginfo('url'); ?>" method="get">                                                             
                                    <tr>
                                        <td> <?php wp_dropdown_categories("title_li=&include=$comma_separated"); ?></td><td class="second"><input class="view" type="submit" name="submit" value="Искать" /></td>
                                    </tr>                                 
                                </form>                                
                                <?php
                                $array2 = of_get_option('listings2'); //Multicheck Categories Array from Themes Option Panel
                                $searchValue = 1;
                                if (is_array($array2)) {
                                    $keys = array_keys($array2, $searchValue); //All Active Categories which are 1 are stored in array keys
                                    $comma_separated = implode(",", $keys);
                                }
                                ?>
                                <form action="<?php bloginfo('url'); ?>" method="get">  
                                    <tr><td><?php wp_dropdown_categories("title_li=&include=$comma_separated"); ?></td><td class="second"><input class="view" type="submit" name="submit" value="Искать" /></td></tr>
                                </form>
                                <?php
                                $array3 = of_get_option('listings3'); //Multicheck Categories Array from Themes Option Panel
                                $searchValue = 1;
                                if (is_array($array3)) {
                                    $keys = array_keys($array3, $searchValue); //All Active Categories which are 1 are stored in array keys
                                    $comma_separated1 = implode(",", $keys);
                                }
                                ?>
                                <form action="<?php bloginfo('url'); ?>" method="get">                               
                                    <tr><td> <?php wp_dropdown_categories("title_li=&include=$comma_separated1"); ?></td><td class="second"><input class="view" type="submit" name="submit" value="Искать" /></td></tr>

                                </form>
                                <?php
                                $array4 = of_get_option('listings4'); //Multicheck Categories Array from Themes Option Panel
                                $searchValue = 1;
                                if (is_array($array4)) {
                                    $keys = array_keys($array4, $searchValue); //All Active Categories which are 1 are stored in array keys
                                    $comma_separated2 = implode(",", $keys);
                                }
                                ?>
                                <form action="<?php bloginfo('url'); ?>" method="get">                               
                                    <tr><td><?php wp_dropdown_categories("title_li=&include=$comma_separated2"); ?></td><td class="second"><input class="view" type="submit" name="submit" value="Искать" /></td></tr>
                                </form>
                            </table>
                        </div> <!-- end #listings-options -->
                    </div> <!-- end #listings-content -->
                    <div id="listings-bottom">
                        <div id="search-container">
                            <form action="<?php bloginfo('url'); ?>" id="customsearch" method="get">
                                <input type="text" id="searchinput" name="s"  value=""/>
                                <input type="submit" name="submit" class="ssubmit" />
                            </form>
                        </div> <!-- end #search-container -->
                    </div> <!-- end #listings-bottom -->
                </div> <!-- end #listings -->
            </div>
        </div>
    </div>
    <!--End Slider-->
    <div class="clear"></div>
    <div class="page-heading">
        <?php if (of_get_option('inkthemes_first_head') != '') { ?>
            <h1><?php echo stripslashes(of_get_option('inkthemes_first_head')); ?></h1>
        <?php } else { ?>
            <h1><?php _e('Buy Sell Rent Property  In Contact Us For Immediately Sell London', 'hb'); ?></h1>
        <?php } ?> 
    </div>
    <div class="page-feature gallery"> 
        <?php if (of_get_option('inkthemes_feature_img1') != '') { ?>
            <a href="<?php echo of_get_option('inkthemes_first_link'); ?>"><span class="fade"></span><img src="<?php echo of_get_option('inkthemes_feature_img1'); ?>"/></a>
        <?php } else { ?>
            <a href="#"><span class="fade"></span><img src="<?php echo get_template_directory_uri(); ?>/images/b-1.jpg"/></a>
        <?php } ?> 

        <?php if (of_get_option('inkthemes_feature_img2') != '') { ?>
            <a href="<?php echo of_get_option('inkthemes_second_link'); ?>"><span class="fade"></span><img src="<?php echo of_get_option('inkthemes_feature_img2'); ?>"/></a>
        <?php } else { ?>
            <a href="#"><span class="fade"></span><img src="<?php echo get_template_directory_uri(); ?>/images/b-2.jpg"/></a>
        <?php } ?> 

        <?php if (of_get_option('inkthemes_feature_img3') != '') { ?>
            <a href="<?php echo of_get_option('inkthemes_third_link'); ?>"><span class="fade"></span><img src="<?php echo of_get_option('inkthemes_feature_img3'); ?>"/></a>
        <?php } else { ?>
            <a href="#"><span class="fade"></span><img src="<?php echo get_template_directory_uri(); ?>/images/b-3.jpg"/></a>
        <?php } ?>      

        <?php if (of_get_option('inkthemes_feature_img4') != '') { ?>
            <a href="<?php echo of_get_option('inkthemes_fourth_link'); ?>" ><span class="fade"></span><img src="<?php echo of_get_option('inkthemes_feature_img4'); ?>"/></a>
        <?php } else { ?>
            <a href="#"><span class="fade"></span><img src="<?php echo get_template_directory_uri(); ?>/images/b-4.jpg"/></a>
        <?php } ?>   
    </div>

    <div class="clear"></div>
    <div class="feature-content">
        <div class="left-feature">
            <?php if (of_get_option('inkthemes_leftcolhead') != '') { ?>
                <h2><?php echo stripslashes(of_get_option('inkthemes_leftcolhead')); ?></h2>
            <?php } else { ?>
                <h2><?php _e('Powerful Reporting', 'hb'); ?></h2>
            <?php } ?> 
            <?php if (of_get_option('inkthemes_leftcoldesc') != '') { ?>
                <p><?php echo stripslashes(of_get_option('inkthemes_leftcoldesc')); ?></p>
            <?php } else { ?>
                <p><?php _e('Product Developers/ Internet Marketer make more sales when they can easily display their products with the buy links in the perfecter location. Easily use their products.', 'hb'); ?></p>
            <?php } ?> 
            <?php
            $nameError = '';
            $emailError = '';
            $commentError = '';
            if (isset($_POST['submitted'])) {
                if (trim($_POST['contactName']) === '') {
                    $nameError = 'Please enter your name.';
                    $hasError = true;
                } else {
                    $name = trim($_POST['contactName']);
                }
                if (trim($_POST['email']) === '') {
                    $emailError = 'Please enter your email address.';
                    $hasError = true;
                } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
                    $emailError = 'You entered an invalid email address.';
                    $hasError = true;
                } else {
                    $email = trim($_POST['email']);
                }
                if (trim($_POST['comments']) === '') {
                    $commentError = 'Please enter a message.';
                    $hasError = true;
                } else {
                    if (function_exists('stripslashes')) {
                        $comments = stripslashes(trim($_POST['comments']));
                    } else {
                        $comments = trim($_POST['comments']);
                    }
                }
                if (!isset($hasError)) {
                    $emailTo = get_option('tz_email');
                    if (!isset($emailTo) || ($emailTo == '')) {
                        $emailTo = get_option('admin_email');
                    }
                    $subject = '[PHP Snippets] From ' . $name;
                    $body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
                    $headers = 'From: ' . $name . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;
                    mail($emailTo, $subject, $body, $headers);
                    $emailSent = true;
                }
            }
            ?>
            <h2><?php _e('Contact Us', 'hb'); ?></h2>
            <?php if (isset($emailSent) && $emailSent == true) { ?>
                <div class="thanks">
                    <p>Thanks, your email was sent successfully.</p>
                </div>
            <?php } else { ?>           
                <form class="contactform" id="conform" action="<?php echo home_url(); ?>" method="post">
                    <table>
                        <tr><td> <label>Имя</label>
                    <?php if ($nameError != '') { ?>
                        <span class="error"> <?php echo $nameError; ?> </span>                      
                    <?php } ?></td><td><input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName']))
                    echo $_POST['contactName']; ?>" class="text required requiredField" /> </td></tr>
                        <tr><td> <label>Почта</label>
                    <?php if ($emailError != '') { ?>
                        <span class="error"> <?php echo $emailError; ?> </span>                        
                    <?php } ?></td><td><input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))
                    echo $_POST['email']; ?>" class="text required requiredField email" />  </td></tr>
                        <tr><td><label>Вопрос</label></td><td><textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField message"><?php
                       if (isset($_POST['comments'])) {
                           if (function_exists('stripslashes')) {
                               echo stripslashes($_POST['comments']);
                           } else {
                               echo $_POST['comments'];
                           }
                       }
                    ?>
                    </textarea> <?php if ($commentError != '') { ?>
                        <span class="error"> <?php echo $commentError; ?> </span>
                        <br/>
                    <?php } ?></td></tr>
                        <tr><td></td><td></td></tr>
                    </table>
                    <input class="view" type="submit" name="submit" value="Отправить"/>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                </form>
            <?php } ?>	
        </div>
        <div class="content-bar right-feature gallery">
            <?php if (of_get_option('inkthemes_left_head') != '') { ?>
                <h1><?php echo stripslashes(of_get_option('inkthemes_left_head')); ?></h1>
            <?php } else { ?>
                <h1><?php _e('Latest Property Listing', 'hb'); ?></h1>
                <hr/>
                <?php
            }
            query_posts('posts_per_page=2');
            ?> 
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="page-item">
                        <?php
                        global $post;
                        $area = get_post_meta($post->ID, '_area', true);
                        $bed = get_post_meta($post->ID, '_bedroom', true);
                        $price = get_post_meta($post->ID, '_price', true);
                        $city = get_post_meta($post->ID, '_city', true);
                        $location = get_post_meta($post->ID, '_location', true);
                        ?>
                        <div class="page-item-content"> 
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('post_thumbnail', array('class' => 'postimg')); ?>
                                </a>
                            <?php } else { ?>
                                <a href="<?php the_permalink() ?>"><?php echo inkthemes_get_image(212, 130); ?></a>
                                <?php
                            }
                            ?>	
                            <h1 class="page-item-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <?php the_excerpt(20); ?>
                        </div>
                        <table class="table">
                            <tr class="first-row">
                                <td class="c-1"><span class="info"><?php _e('Area:', 'hb'); ?>&nbsp;<span><?php echo $area . 'sqft'; ?></span></span></td>
                                <td class="c-2"><span class="info"><?php _e('Bed Room:', 'hb'); ?>&nbsp;<span><?php echo $bed; ?></span></span></td>
                                <td class="c-3"><span class="info"><?php _e('Price:', 'hb'); ?>&nbsp;<span><?php echo $price; ?></span></span></td>
                            </tr>
                            <tr class="pair">
                                <td class="c-4"><span class="info"><?php _e('City:', 'hb'); ?>&nbsp;<span><?php echo $city; ?></span></span></td>
                                <td colspan="2" class="c-5"><span class="info"><?php _e('Location:', 'hb'); ?>&nbsp;<span><?php echo $location; ?></span></span></td>
                            </tr>
                        </table>
                    </div>
                    <?php
                endwhile;
                wp_reset_query();
            else:
                ?>
                <div class="post">
                    <p>
                        <?php _e('Sorry, no posts matched your criteria.', 'hb'); ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
</div>
<!--End Index-->
<?php get_footer(); ?>