<?php 
get_header(); ?>
<div class="container12">
	<div class="column12">
<h1><?php printf( __( 'Search Results for: %s', 'shape' ), get_search_query()); ?></h1>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<h3><?php the_title(); ?></h3>
	<?php the_excerpt(); ?>
	<p><a href="<?php echo get_permalink(); ?>"> Read More...</a></p>
<?php endwhile; 
else: ?>
	<p>Sorry, nothing matched your search term, please try again</p>
<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>