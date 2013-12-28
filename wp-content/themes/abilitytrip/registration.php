<?php
/*
Template Name: Registration Page
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
                                    	  
            <form name="registration" id="registration" action="/app/?a=registration" method="post">
            <div class="row">
                <label for="name"><span class="req">*</span>First Name:</label>
                <div class="fielddescription">Maximum 30 characters</div>

                <div class="field"><input name="firstname" id="firstname" type="text" class="txt" maxlength="30" 
                value="<? if (isset($_SESSION['post']['firstname'])) echo $_SESSION['post']['firstname']; ?>" /></div>
            </div>
            <div class="row">

                <label for="name"><span class="req">*</span>Last Name:</label>
                <div class="fielddescription">Maximum 30 characters</div>
                <div class="field"><input name="lastname" id="lastname" type="text" class="txt" maxlength="30" 
                value="<? if (isset($_SESSION['post']['lastname'])) echo $_SESSION['post']['lastname']; ?>" /></div>
            </div>

            <div class="row">
                <label for="email"><span class="req">*</span>Email:</label>
                <div class="fielddescription">This email address will serve as your username to sign in. We suggest you do not use a shared address.</div>
                <div class="field"><input name="email" id="email" type="text" class="txt" maxlength="100"
                value="<? if (isset($_SESSION['post']['email'])) echo $_SESSION['post']['email']; ?>" /></div>
            </div>
            <div class="row">
                <label for="password"><span class="req">*</span>Password:</label>

                <div class="fielddescription">Your password is case sensitive, and must contain between 7 and 14 characters, including at least one
number.</div>
                <div class="field"><input name="regpassword" id="regpassword" type="password" class="txt" maxlength="14" /></div>
            </div>
            <div class="row">
                <label for="regpassword2"><span class="req">*</span>Confirm Password:</label>
                <div class="field"><input name="regpassword2" id="regpassword2" type="password" class="txt" maxlength="14" /></div>
            </div>

            <div class="row">
                <label for="zipcode">ZIP Code:</label>
                <div class="field"><input name="zipcode" id="zipcode" type="text" class="txt" maxlength="5"
                value="<? if (isset($_SESSION['post']['zipcode'])) echo $_SESSION['post']['zipcode']; ?>" /></div>
            </div>
            
           <div class="row">
                <label for="security_code"><span class="req">*</span>Security Code:</label>
                <div class="field">
                	<?php
					require_once($_SERVER['DOCUMENT_ROOT'].'/includes/recaptchalib.php');
					$publickey = "6LfOLAQAAAAAAGXv2O6MKdBPWXQ7eB0UZkdRtvju";
					echo recaptcha_get_html($publickey);
					?>
                </div>
            </div>
            
            <div class="row">
                <div class="buttons">
                <input type="image" name="submit" value="submit" src="<?php bloginfo('template_directory'); ?>/_resources/images/AT-register_button.gif" alt="Register" />
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