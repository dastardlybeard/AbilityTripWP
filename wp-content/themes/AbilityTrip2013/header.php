<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php wp_title('|', true ,'right'); ?> Ability Trip - Accessible fun for all </title>
	<?php
  		$metaDesc=get_post_meta($post->ID, 'meta-description', true);
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<meta name="description" content="<?php the_excerpt_rss(); ?>" />
		<?php endwhile; endif; else : ?>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
	<?php endif; ?>
	<link REL="SHORTCUT ICON" HREF="<?php print(ab_dir) ?>favicon.ico">
	<link href="<?php print(ab_dir) ?>css/screen.css" media="screen, projection" rel="stylesheet" type="text/css" /> 
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php print(ab_dir) ?>js/easing-min.js"></script>
	<script src="<?php print(ab_dir) ?>js/jquery.mobile.custom.min.js"></script>
	<script src="<?php print(ab_dir) ?>js/global-min.js"></script>
	<?php wp_head(); ?>
</head>
<body>
	<div class="adSpaceTop">
		<div class="container12">
			<div class="column12">
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Responsive Ad 1-2-14 -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-0420758071839028"
					     data-ad-slot="8089425792"
					     data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div>
	<div class="pageContents">
		<div class="transBG">
			<div class="container16 header">
				<div class="column5 logo">
					<a href="/">
						<img src="<?php print(ab_dir) ?>img/logo.png" alt="Ability Trip" />
					</a>
				</div>
				<div class="column11 topNavContainer">
					<div class="utilityNav">
						<?php get_search_form(); ?>
						<?php wp_nav_menu( array( 'theme_location' => 'Utility' , 'menu_class' => 'clearFix' )); ?>
						<!--<form action="post"><input type="text" id="serach"></form>-->
					</div>
					<a href="#" class="mobileOnly mobileNavTrigger"><span>Menu</span><span class="hidden">Close</span></a>
						
					<?php wp_nav_menu( array( 'theme_location' => 'Mobile' , 'menu_class' => 'mobileNav clearFix' )); ?>
					
					<?php wp_nav_menu( array( 'theme_location' => 'Main' , 'menu_class' => 'mainNav clearFix' )); ?>
				</div>
			</div>
		</div>