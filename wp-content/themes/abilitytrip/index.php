<?php get_header(); ?>

	<?php include (TEMPLATEPATH . "/pageheader_top.php"); ?>  
  
    <div id="page_body">
        <?php include (TEMPLATEPATH . "/body_left.php"); ?>
     
        <div id="body_center">
         
         <div id="blog_style">
         
         <?php query_posts($query_string); ?>
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         
         <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
         <div class="post_info">
         	<div class="owner">Posted By: <?php the_author() ?></div><div class="post_date"><?php the_time('m:d:Y') ?></div>
          </div>  
            <?php the_excerpt(); ?>
            <p class="read_more"><a href="<?php the_permalink() ?>">Read More &raquo;</a></p>
         
         
         	<?php endwhile;
			else : ?>

		<h3 class="center">No results could be found. Try a different search?</h3>
		<?php // include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
         
         </div><!--close blog_style div-->
         
            
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>