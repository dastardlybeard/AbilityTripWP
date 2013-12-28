<?php
/*
Template Name: Destinations Page
*/
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
	
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		<?php endwhile; endif; ?>
        
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
        
        
        <img src="<?php bloginfo('template_directory'); ?>/_resources/images/map.jpg" border="0" usemap="#Map" alt="destinations" />
        <map name="Map" id="Map">
        <area shape="poly" coords="62,106,40,83,47,55,40,45,7,55,26,35,49,22,66,24,87,20,153,9,202,10,164,40,147,40,147,62,113,68,105,84,96,92,83,87,74,97,88,107,97,116,91,123" href="/north_america/" />
        <area shape="poly" coords="94,123,89,140,106,164,111,211,133,224,132,203,147,175,160,143,141,119,107,111,94,123" href="/south_america/" />
        <area shape="poly" coords="277,116,265,115,249,86,233,79,220,75,198,79,181,95,181,118,192,129,209,129,217,149,229,190,245,190,272,176,274,134,276,117" href="/africa/" />
        <area shape="poly" coords="266,64,231,77,190,79,184,54,215,22,264,12,274,20,275,50" href="/europe/" />
        <area shape="poly" coords="283,112,269,112,250,84,243,79,271,65,281,47,277,20,315,15,341,18,407,26,404,42,394,60,394,82,380,104,351,139,328,106,317,127,294,101" href="/asia/" />
        <area shape="poly" coords="398,132,352,167,351,195,406,201,418,172,398,134" href="/australia/" />
<area shape="poly" coords="117,96,90,95,81,99,93,105,110,107,121,110" href="/caribbean/" alt="caribbean" />
        </map>
        
        <?php /*?><ul>
       	<?php wp_list_categories('&title_li=&exclude=8&depth=1&hide_empty=0'); ?>
		<ul><?php */?>
    
             </div><!--close blog_style div-->
        </div>  <!--close body_center div-->
        
        <?php include (TEMPLATEPATH . "/body_right.php"); ?>
        
    <div id="body_footer">&nbsp;</div>
    </div>  <!--close page_body div-->

<?php get_footer(); ?>