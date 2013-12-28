<?php 
/*
 * Template Name: Image Sidebar
 */
 get_header();
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container12">
		<article class="column9">
			<?php the_content(); ?>
		</article>
		<div id="sideBarStatic" class="column3">
		<?php $attachments = new Attachments( 'attachments' ); ?>
		<?php if( $attachments->exist() ) : ?>
			<?php while( $attachment = $attachments->get() ) : ?>
				<div>
					<img src="<?php echo $attachments->src(); ?>" alt="<?php echo $attachments->field( 'title' ); ?>" />
					<span class="caption"><?php echo $attachments->field( 'title' ); ?></span>
				</div>
			<?php endwhile;?>
		</div>
		<?php
		 endif; 	
		 ?>
	</div>
<?php endwhile; endif; 
get_footer(); ?>