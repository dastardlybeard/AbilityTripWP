<?php
/*
Template Name: Forgot Password Page
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
                                    	  
            <form name="forgotpassword" id="forgotpassword" action="/app/?a=forgotpass" method="post">
            <div class="row">
                <label for="email"><span class="req">*</span>Email:</label>
                <div class="field"><input name="email" id="email" type="text" class="txt required email" maxlength="100"
                value="" /></div>
            </div>
            <div class="row">
                <div class="buttons"><input type="image" name="submit" value="submit"  src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_btn_Send.gif" alt="Send" /></div>
            </div>

        	</form>

         	</div>  <!--close register div--> 
        
        
        
	
    
             </div><!--close blog_style div-->
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>