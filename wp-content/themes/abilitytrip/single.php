<?php get_header(); ?>

	<?php include (TEMPLATEPATH . "/pageheader_top.php"); ?>  
  
    <div id="page_body">
        <?php include (TEMPLATEPATH . "/body_left.php"); ?>
     
        <div id="body_center">
    		 <div id="blog_style" class="clearfix">
             
			<?php query_posts($query_string); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
			<?php
			$category = get_the_category();
			$current_cat = $category[0]->cat_ID;
			?>
			<div id="breadcrumb"><?php echo get_category_parents($current_cat, TRUE,' : '); ?> <?php the_title(); ?></div>
    
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
            <?php if (!isset($_GET['show']))  { ?>
             <div class="post_info">
                <div class="owner">Posted By: <?php the_author() ?></div><div class="post_date"><?php the_time('m:d:Y') ?></div>
             </div>
            
                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                
                <?php if ($showdiscussbox) {
					if ($registereduser->isLoggedIn()) { ?>       
						<div class="discuss"><h4><a href="?show=comments">Join the USER DISCUSSION for: <?php the_title(); ?></a></h4></div>
					<?php } else { ?>
						<div class="discuss"><h4><a href="/register/">REGISTER NOW TO JOIN THE DISCUSSION!</a></h4></div>
					<?php } ?>
				<?php } ?>
            <?php } ?>
        
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
        
        <?php if (isset($_GET['show']) && $_GET['show'] == "comments")  { ?>
        <?php comments_template(); ?>
		<?php } ?>
        
        <?php endwhile; endif; ?>
    <br clear="all" />
             </div><!--close blog_style div-->
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>