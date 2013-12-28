<?php 
/**
 * The template for displaying all pages.
 * Template Name: Standard page template
 */

get_header(); ?>
<style type="text/css">
@media handheld, only screen and (max-width: 400px){
	#recaptcha_area, #recaptcha_table{
		margin-left:-30px;
	}
}
</style>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container12">
<div class="column12">
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>