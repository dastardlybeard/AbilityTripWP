<?php get_header(); ?>

	<?php include (TEMPLATEPATH . "/pageheader_top.php"); ?>  
  
    <div id="page_body">
        <?php include (TEMPLATEPATH . "/body_left.php"); ?>
     
        <div id="body_center">
		<?php query_posts($query_string); ?>
        	<?php
			 $cat = get_query_var('cat');
		     $catlist = get_categories('child_of='.$cat);
			?>	
        
        <div id="breadcrumb"><?php echo get_category_parents($cat, TRUE, ' : ') ?> </div><!--close "breadcrumb div-->
			<?php if (count($catlist) > 0) { ?>
         <div id="body_nav">
        		
        	<div class="parent_nav clearfix">
					<?php
                    wp_list_categories('title_li=&depth=1&child_of='.$cat); 
					?>
            </div>     
        </div><!--close "body_nav div-->
        	<?php } ?>
           
         <h2>LATEST DESTINATION REVIEWS</h2>
         
         <div id="blog_style">
         
         
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         
         	<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
         	<div class="post_info">
         	<div class="owner">Posted By: <?php the_author() ?></div><div class="post_date"><?php the_time('m:d:Y') ?></div>
          	</div>  
            <?php the_excerpt(); ?>
            <p class="read_more"><a href="<?php the_permalink() ?>">Read More &raquo;</a></p>
         	<?php endwhile; endif; ?>
         
         </div><!--close blog_style div-->
            
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>