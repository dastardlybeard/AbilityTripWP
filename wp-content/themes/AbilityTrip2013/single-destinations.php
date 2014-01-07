<?php get_header(); ?>
      <?php if (have_posts()) : while (have_posts()) :
        the_post(); 

        $custom = get_post_custom( $post -> ID);
        $transport = $custom["transport"][0];
        $accommodation = $custom["accommodation"][0];
        $activities = $custom["activities"][0];
        $medical = $custom["medical"][0];
        $tips = $custom["tips"][0];
        $appQuery = $custom["appQuery"][0];
        $topicChooser = $custom["topicChooser"][0];
        $heroImage = get_the_post_thumbnail( $post_id );

        ?>
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
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div class="letterboxItem hidden" style="background-image:url('<?php echo $image[0]; ?> ')">
					<div class="container12">
						<div class="column6 letterboxContent">
							<h2><?php the_title() ?></h2>
							<?php remove_filter( 'the_content', 'wpautop' ); ?>
							<p><?php the_content() ?></p>
						</div>
					</div>
				</div>
		</div>
		<div class="container12" id="mainContent">
			<div class="quicklinks mobileOnly column12">
				<h2>Quick links</h2>
				<ul>
					<?php if ($transport != ''): ?>
						<li><a href="#transport" class="transport">Getting around</a></li>
					<?php endif ?>
					<?php if ($accommodation != ''): ?>
						<li><a href="#accommodation" class="accomomdation">Accommodations</a></li>
					<?php endif ?>
					<?php if ($activities != ''): ?>
						<li><a href="#activities" class="activities">Activities</a></li>
					<?php endif ?>
					<?php if ($medical != ''): ?>
						<li><a href="#medical" class="medical">Medical</a></li>
					<?php endif ?>
					<?php if ($tips != ''): ?>
						<li><a href="#tips" class="tips">Tips and tricks</a></li>
					<?php endif ?>
				</ul>
			</div>
			<article class="column9">
				<?php if ($transport != ''): ?>
					<div class="section" id="transport">
						<h2>Getting around</h2>
						<?php echo wpautop($transport, $br) ?>
					</div>
				<?php endif ?>
				<?php if ($accommodation != ''): ?>
					<div class="section" id="accommodation">
						<h2>Accommodation</h2>
						<?php echo wpautop($accommodation, $br) ?>
					</div>
				<?php endif ?>
				<?php if ($activities != ''): ?>
					<div class="section" id="activities">
						<h2>Activities</h2>
						<?php echo wpautop($activities, $br) ?>
					</div>
				<?php endif ?>
				<?php if ($medical != ''): ?>
					<div class="section" id="medical">
						<h2>Medical</h2>
						<?php echo wpautop($medical, $br) ?>
					</div>
				<?php endif ?>
				<?php if ($tips != ''): ?>
					<div class="section" id="tips">
						<h2>Tips</h2>
						<?php echo wpautop($tips, $br) ?>
					</div>
				<?php endif ?>
				<?php if ($appQuery != ''): ?>
					<div class="section" id="appQuery">
						<h2>Travelling to <?php the_title() ?> soon?</h2>
						<p>Download the AbilityTrip mobile application to get detailed information on the accessible features of popular destinations around the globe. Each city is carefully documented by local writers who know what to capture so you can make fully-informed decisions – even while on-the-go. With rich content on hotels, attractions, restaurants, transportation, medical services and more, you’ll never be short on options.</p>
						<p>The app is free, and comes preloaded with Chicago documentation. Additional cities can be purchased in-app for $2.99 each.</p>
						<a href="https://itunes.apple.com/us/app/abilitytrip-mobile-accessible/id517375464?mt=8" rel="external">
							<img src="<?php print(ab_dir) ?>img/badge_appstore-lrg.png" alt="Download on the App Store" />
						</a>
					</div>
				<?php endif ?>
				<?php if ($topicChooser != ''): 
					echo '<div id="topicHolder" rel="'.$topicChooser.'"></div>';
				endif ?> 
			</article>
			
			<div id="sideBar" class="column3">
				<div class="quicklinks desktopOnly">
					<h2>Quick links</h2>
					<ul>
						<?php if ($transport != ''): ?>
							<li><a href="#transport" class="transport">Getting around</a></li>
						<?php endif ?>
						<?php if ($accommodation != ''): ?>
							<li><a href="#accommodation" class="accomomdation">Accommodations</a></li>
						<?php endif ?>
						<?php if ($activities != ''): ?>
							<li><a href="#activities" class="activities">Activities</a></li>
						<?php endif ?>
						<?php if ($medical != ''): ?>
							<li><a href="#medical" class="medical">Medical</a></li>
						<?php endif ?>
						<?php if ($tips != ''): ?>
							<li><a href="#tips" class="tips">Tips and tricks</a></li>
						<?php endif ?>
					</ul>
				</div>
				<?php $attachments = new Attachments( 'gallery' ); ?>
				<?php if( $attachments->exist() ) : ?>
				<div class="postGallery clearfix">
					<h2>Gallery</h2>
					<ul class="column3 alpha omega">
					<?php while( $attachment = $attachments->get() ) : ?>
						<li><a href="<?php echo $attachments->url(); ?>" title="<?php echo $attachments->field( 'title' ); ?>" rel="<?php echo $attachments->field( 'caption' ); ?>"><img src="<?php echo $attachments->src( 'sidebar-thumb' ); ?>" alt="<?php echo $attachments->field( 'title' ); ?>" /></a>
						</li>
					<?php endwhile;?>
					</ul>
					<div id="mainGalleryImage" class="hidden">
						<h3></h3>
						<p></p>
						<img src="" alt="">
					</div>
					<a href="" class="hidden closeBtn">Close</a>
				</div>
				
				<?php
				 endif; 	
				 ?>
			</div>
		</div>
		<?php 
		endwhile;
		endif;
		?>
		
		<?php get_footer(); ?>