<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Ability Trip
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not found', 'Ability Trip 2013' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'Ability Trip 2013' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'Ability Trip 2013' ); ?></p>

					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>