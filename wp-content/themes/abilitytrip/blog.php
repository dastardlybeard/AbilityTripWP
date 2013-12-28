<?php
/*
Template Name: Journal
*/
?>
<?php get_header(); ?>

	<?php include (TEMPLATEPATH . "/pageheader_top.php"); ?>  
  
    <div id="page_body">
        <?php include (TEMPLATEPATH . "/body_left.php"); ?>
     

        
         <div id="body_center">
    		
        <div id="blue_block">
        <?php query_posts($query_string); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <div id="blog_style">       	
        <h3>Welcome to Darren's travel journal</h3>
        </div>
        <?php the_content('Read the rest of this entry &raquo;'); ?>

        <?php endwhile; endif; ?>
        </div><!--close "blue_block div-->
            
         <h2>JOURNAL ENTRIES</h2>
         
         <div id="blog_style">
         
         <?php /* show Darren's blog posts - but exclude all other categories */ ?>
         <?php query_posts("showposts=3&cat=570"); ?>
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         
         <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
         <div class="post_info">
         	<div class="owner">Posted By: Darren</div><div class="post_date"><?php the_time('m:d:Y') ?></div>
          </div>  
            <?php the_excerpt(); ?>
            <?php the_content(); ?>
         
         
         	<?php endwhile; endif; ?>
         </div><!--close blog_style div-->
            
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>