
		<?php get_header(); ?>
		<div id="letterboxContainer" class="fullLbx autoRotate letterboxContainer hidden">
			<div class="container12">
				<div class="letterboxControls controls">
					<a href="#left" class="left">
						<
					</a>
					<a href="#right" class="right">
						>				
					</a>
				</div>
			</div>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
				if (in_category( 'homeletterbox' )) : ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<?php if ($image[0] != ''): ?>
						<div class="letterboxItem hidden" style="background-image:url('<?php echo $image[0]; ?> ')">
							<div class="container12">
								<div class="column6 letterboxContent">
									<h2><?php the_title() ?></h2>
									<?php remove_filter( 'the_content', 'wpautop' ); ?>
									<p><?php the_content() ?></p>
								</div>
							</div>
						</div>
					<?php endif ?>
				<?php endif; 
			 endwhile; else: ?>
	      		<p><?php _e('No posts were found. Sorry!'); ?></p>
	      	<?php endif; ?>
		</div>
		<?php get_footer(); ?>