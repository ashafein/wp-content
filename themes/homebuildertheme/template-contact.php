<?php
/*
  Template Name: Contact Page
 */
?>
<?php
$nameError = '';
$emailError = '';
$commentError = '';
if (isset($_POST['submitted'])) {
    if (trim($_POST['contactName']) === '') {
        $nameError = 'Введите имя';
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }
    if (trim($_POST['email']) === '') {
        $emailError = 'Введите почту';
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $emailError = 'Вы ввели неправильный адрес почты';
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }
    if (trim($_POST['comments']) === '') {
        $commentError = 'Введите сообщение';
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
<?php get_header(); ?>
<div class="clear"></div>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#contactForm").validate();
    });
</script>
<div class="page-content"> 
    <div class="grid_16 alpha">
        <div class="content-bar">
            <div class="contact-page">
                <?php if (have_posts()) : the_post(); ?>
                    <h1 class="page_title"><?php the_title(); ?></h1>
                <?php endif; ?>	
                <?php the_content(); ?>
                <?php if (isset($emailSent) && $emailSent == true) { ?>
                    <div class="thanks">
                        <p>Thanks, your email was sent successfully.</p>
                    </div>
                <?php } else { ?>
                    <form class="contactform" id="contactForm" action="<?php the_permalink(); ?>" method="post">

                        <table>
                            <tr><td><label>Name</label></td><td><input type="text" name="contactName" id="contactName" value="<?php if (isset($_POST['contactName']))
                    echo $_POST['contactName']; ?>" class="text required requiredField" />
                                                                       <?php if ($nameError != '') { ?>
                                        <span class="error"> <?php echo $nameError; ?> </span>                            
                                    <?php } ?></td></tr>
                            <tr><td><label>Email</label></td><td><input type="text" name="email" id="email" value="<?php if (isset($_POST['email']))
                                    echo $_POST['email']; ?>" class="text required requiredField email" />
                                                                        <?php if ($emailError != '') { ?>
                                        <span class="error"> <?php echo $emailError; ?> </span>                            
                                    <?php } ?></td></tr>
                            <tr><td><label>Query</label></td><td><textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField message"><?php
                                if (isset($_POST['comments'])) { if (function_exists('stripslashes')) { echo stripslashes($_POST['comments']);} else { echo $_POST['comments']; } } ?></textarea>
                                    <?php if ($commentError != '') { ?>
                                        <span class="error"> <?php echo $commentError; ?> </span>
                                        <br/>
                                    <?php } ?></td></tr> 
                            <tr><td></td><td><input  class="btnSubmit" type="submit" name="submit" value="Send Message"/></td></tr>
                        </table>                        
                        <input type="hidden" name="submitted" id="submitted" value="true" />
                    </form> 
                <?php } ?>	
            </div>
        </div>
    </div>
    <div class="grid_8 omega">
        <!--Start Sidebar-->
        <?php get_sidebar(); ?>
        <!--End Sidebar-->
    </div>
</div>
</div>
<?php get_footer(); ?>