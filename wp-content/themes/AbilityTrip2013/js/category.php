<?php get_header(); ?>
<div class="container12">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column3">
			hello
			<h1><?php the_title(); ?></h1>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>