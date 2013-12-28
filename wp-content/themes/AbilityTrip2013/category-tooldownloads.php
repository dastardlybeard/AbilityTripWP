<?php 

 get_header();?>
 	<div class="container12 downloads">
		<article class="column12">
			<?php global $cat; ?>
			<h1><?php echo single_cat_title( $prefix = '', $cat ); ?></h1>
			<?php echo category_description( $cat ); ?>
		</article>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php $attachments = new Attachments( 'downloads' ); ?>
		<?php if( $attachments->exist() ) : ?>
		<?php while( $attachments->get() ) : ?>
		<a class="downloadableItem column3" href="<?php echo $attachments->url(); ?>">
			<span class="title"><?php the_title(); ?></span>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<img src="<?php echo $image[0]; ?>" alt="<?php the_title()?>;">
			<?php remove_filter( 'the_content', 'wpautop' ); ?>
			<span><?php the_content(); ?></span>
		</a>
	<?php 
	endwhile;
	endif;
	endwhile; ?>
	</div>
<?php get_footer(); ?>