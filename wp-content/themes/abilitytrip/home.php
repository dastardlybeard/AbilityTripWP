<?php
/*
Template Name: Homepage
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
       	
        <h1 class="pagetitle_img welcome"><?php the_title(); ?></h1>
        <?php the_content('Read the rest of this entry &raquo;'); ?>
        
        <p class="learn_more"><a href="/about/">Learn More &raquo;</a></p>
        <img src="<?php bloginfo('template_directory'); ?>/_resources/images/Home-page-composite-110102.jpg" alt="Welcome to AbilityTrip" class="blue_block_bottom_img" />
        
        <?php endwhile; endif; ?>
        </div><!--close "blue_block div-->
            
         <h2>LATEST DESTINATION REVIEWS</h2>
         
         <div id="blog_style">
         
         <?php /* show latest posts - but exclude category id 8 (ability tips) */ ?>
         <?php query_posts("showposts=3&cat=-8,-570"); ?>
         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         
         <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
         <div class="post_info">
         	<div class="owner">Posted By: <?php the_author() ?></div><div class="post_date"><?php the_time('m:d:Y') ?></div>
          </div>  
            <?php the_excerpt(); ?>
            <p class="read_more"><a href="<?php the_permalink() ?>">Read More &raquo;</a></p>
         
         
         	<?php endwhile; endif; ?>
<div id="blue_block">

<p>AbilityTrip's goal is to increase the accessibility of global destinations by providing a forum for information on: disabled travel, disabled holiday, accessible hotels, ability travel, wheelchair accessible vacations, senior travel, handicap travel, mature travel, vacations for disabled, physically challenged travel, wheelchair accessible travel, accessibility, wheelchair travel, disabled travel guides, accessible vacations, and handicap vacations.</p>

<P>A note to our members and visitors... We recognize many of the "words" we've chosen on this site to describe the community and the goals of AbilityTrip ARE NOT helpful to the community as our use actually helps reinforce their usage (e.g., handicapped, disabled). The challenge we face is that these same words are most commonly used on search engines by our community, and if we don't riddle the AbilityTrip home page with them, search engine rankings drop, and no one will find the site. If anyone can help use rid the site of this language while preserving relevance on search engines, please contact us.
</P>
             </div><!--close "blue_block div-->
         </div><!--close blog_style div-->
            
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>