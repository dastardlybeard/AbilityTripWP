		<?php get_header(); ?>
		<div class="container12" id="mainContent">
			<?php
				$taxonomy = 'd_cats';
				$terms = get_terms($taxonomy);
				if ($terms) {
					?>
					<div class="column12 destinationFilter">
						<p>Filter by location:</p>
						<ul>
							<li><a href="#" rel="destination" class="selected">Show all</a></li>
						<?php
						foreach($terms as $term) {
						  	if ($term->slug != 'featured') {
						  		echo '<li><a href="?' . $term->slug . '" rel="'. $term->slug .'">' . $term->name .'</a></li>';
						  	}
				  		}?>
						</ul>
					</div>
			  		<?php
				}
			?>
			<div class="locations">
				<?php if (have_posts()) : while (have_posts()) :
					the_post(); 
					global $post;
					$theTerms= wp_get_object_terms($post->ID, 'd_cats');
					if ($theTerms[0]->slug != 'featured') {
						$theTerms = $theTerms[0];
					}else{
						$theTerms = $theTerms[1];
					}
					?>
				<?php $attachments = new Attachments( 'postthumb' ); ?>
					<?php if( $attachments->exist() ) : ?>
				<div class="column3 destination <?php echo $theTerms->slug ?>">
					<a href="<?php the_permalink(); ?>">
						<?php while( $attachment = $attachments->get() ) : ?>
						<img src="<?php echo $attachments->src( 'full' ); ?>" alt="<?php echo $attachments->field( 'title' ); ?>" />
					<?php endwhile; ?>
					<span class="description"><?php the_title(); ?></span></a>
				</div>
				
				<?php 
					endif; 	
					endwhile;
					endif;
				?>
			</div>
		</div>
		
		<?php get_footer(); ?>