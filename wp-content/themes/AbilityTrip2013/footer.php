
<?php
			$args= array(
				'post_type' => 'destinations',
				'tax_query' => array(
				    array (
					    'taxonomy' => 'd_cats',
				        'field' => 'slug',
				        'terms' => 'featured'
					) 	
			    )
		      );
			$featuredDestinations = get_posts($args);
			if ($featuredDestinations) {
				
			
			?>
		<div id="pageFooter" class="container12">
			<div class="column9 posRel">
				<h2>Popular locations</h2>
				
				<div class="popularCarouselContainer">
					<div class="popularCarouselControls controls">
						<a href="#left" class="left">
							<
						</a>
						<a href="#right" class="right">
							>				
						</a>
					</div>
					<ul>
						<?php

						foreach ($featuredDestinations as $post) : setup_postdata($post); ?>
						   <li>
							<a href="<?php the_permalink(); ?>">
								<?php $attachments = new Attachments( 'postthumb' ); ?>
								<?php if( $attachments->exist() ) : ?>
									<?php while( $attachment = $attachments->get() ) : ?>
									<img src="<?php echo $attachments->src( 'full' ); ?>" alt="<?php echo $attachments->field( 'title' ); ?>" />
								
									<?php endwhile;
									 endif; 	
									 ?>
								<span class="description"><?php the_title(); ?></span>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="column3">
				<style>
				@media(min-width: 800px) { .responsive-ad-1-2-14 { width: 172px; height: 90px; } }
				</style>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- Responsive Ad 1-2-14 -->
				<ins class="adsbygoogle responsive-ad-1-2-14"
				     style="display:inline-block"
				     data-ad-client="ca-pub-0420758071839028"
				     data-ad-slot="8089425792"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
		<?php } ?>
		<div class="container12">
			<div id="forumHolder" class="colum9">
				
			</div>
		</div>
		<div class="footer">
			<div class="container12">
				<div class="socialLinks">
					<ul>
						<li>
							<a href="http://www.facebook.com/pages/Chicago-IL/AbilityTrip/125375322502">facebook</a>
						</li>
						<li>
							<a class="linkedin" href="http://www.linkedin.com/groups?about=&amp;gid=1652477&amp;trk=anet_ug_grppro">linkedin</a>
						</li>
						<li>
							<a class="twitter" href="http://twitter.com/AbilityTrip">Twitter</a>
						</li>
					</ul>
				</div>

				<div class="footerNav">
					<?php wp_nav_menu( array( 'theme_location' => 'Footer' , 'menu_class' => 'clearFix' )); ?>
				</div>
				
			</div>
		</div>
	</div>
</body>
<?php wp_footer(); ?>
</html>