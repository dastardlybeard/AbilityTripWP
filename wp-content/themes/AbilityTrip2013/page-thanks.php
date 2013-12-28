<?php 
/*
 * Template Name: Sign up thanks
 */
 get_header();
 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container12">
		<article class="column12">
		<h1><?php the_title(); ?></h1>
		</article>
		<article class="column12">
			<?php the_content(); ?>
			<?php wp_loginout(); ?>
		</article>
	</div>
<?php endwhile; endif; 
get_footer(); ?>