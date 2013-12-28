<?php
/*
Template Name: Contact Us Page
*/

require_once($_SERVER['DOCUMENT_ROOT']."/app/process/global.php");
?>
<?php get_header(); ?>

	<?php include (TEMPLATEPATH . "/pageheader_top.php"); ?>  
  
    <div id="page_body">
        <?php include (TEMPLATEPATH . "/body_left.php"); ?>
     
        <div id="body_center">
    		 <div id="blog_style">
		<?php query_posts($query_string); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<h1><?php the_title(); ?></h1>
        
        <?php if (isset($_SESSION['post']['message'])) { 
				echo $_SESSION['post']['message'];
				unset($_SESSION['post']['message']); 
			}
			?>
	
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		<?php endwhile; endif; ?>
        
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
        
        
        
            		
            <div id="register">
                                    	  
            <form name="contactus" id="contactus" action="/app/?a=emailform" method="post">
            <div class="row">
                <label for="name">First Name:</label>
                <div class="field"><input name="firstname" id="firstname" type="text" class="txt required" maxlength="30" 
                value="<? if (isset($_SESSION['post']['firstname'])) echo $_SESSION['post']['firstname']; ?>" /></div>
            </div>
            <div class="row">

                <label for="name">Last Name:</label>
                <div class="field"><input name="lastname" id="lastname" type="text" class="txt required" maxlength="30" 
                value="<? if (isset($_SESSION['post']['lastname'])) echo $_SESSION['post']['lastname']; ?>" /></div>
            </div>

            <div class="rowpadded">
                <label for="email">Email:</label>
                <div class="field"><input name="email" id="email" type="text" class="txt required email" maxlength="100"
                value="<? if (isset($_SESSION['post']['email'])) echo $_SESSION['post']['email']; ?>" /></div>
            </div>
            <div class="row">
                <label for="emailmessage">Message:</label>
                <div class="field"><textarea rows="5" class="txt required" id="emailmessage" name="emailmessage"><? if (isset($_SESSION['post']['emailmessage'])) echo $_SESSION['post']['emailmessage']; ?></textarea></div>
            </div>
            <div class="row">
                <label for="security_code">Security Code:</label>
                <div class="field">
                	<?php
					require_once($_SERVER['DOCUMENT_ROOT'].'/includes/recaptchalib.php');
					$publickey = "6LfOLAQAAAAAAGXv2O6MKdBPWXQ7eB0UZkdRtvju";
					echo recaptcha_get_html($publickey);
					?>

                <!--<img src="/captcha/CaptchaSecurityImages.php?width=100&height=40&character=5" /><br />
Enter the code you see above into the field below:<br />
<input name="security_code" id="security_code" type="text" class="txt required" maxlength="100" />--></div>
            </div>
            
            <div class="row">
                <div class="buttons">
                <input type="image" name="submit" value="submit" src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_btn_Send.gif" alt="Register" />
				</div>
            </div>

        </form>

         </div>  <!--close register div--> 
        
        
        
	
    
             </div><!--close blog_style div-->
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->
<?php unset($_SESSION['post']); ?>
<?php get_footer(); ?>