<?php 
get_header(); 
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container12">
<div class="column12">
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; 
get_footer(); ?>