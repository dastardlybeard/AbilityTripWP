<?php get_header(); ?>
<div class="container12">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="column6">
			<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
			<p><span>Date posted: <?php the_date(); ?></span></p>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink();?>">Read now</a></p>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>