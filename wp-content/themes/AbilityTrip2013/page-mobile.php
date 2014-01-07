<?php 
/*
 * Template Name: App Page
 */
 get_header();
 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="container12">
		<article class="column9">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
		<article class="column3">
			<a href="https://itunes.apple.com/us/app/abilitytrip-mobile-accessible/id517375464?mt=8" rel="external">
				<img src="<?php print(ab_dir) ?>img/phone.png" alt="Download on the App Store" />
			</a>
			<a href="https://itunes.apple.com/us/app/abilitytrip-mobile-accessible/id517375464?mt=8" rel="external">
				<img src="<?php print(ab_dir) ?>img/badge_appstore-lrg.png" alt="Download on the App Store" />
			</a>
		</article>
	</div>
<?php endwhile; endif; 
get_footer(); ?>