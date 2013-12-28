        <div id="body_left">
    	
        <div id="mainnav">
            <ul>
                <li><a href="/north_america/">NORTH AMERICA</a></li>
                <li><a href="/central_america/">CENTRAL AMERICA</a></li>
                <li><a href="/south_america/">SOUTH AMERICA</a></li>
                <li><a href="/caribbean/">CARIBBEAN</a></li>
                <li><a href="/europe/">EUROPE</a></li>
                <li><a href="/africa/">AFRICA</a></li>
                <li><a href="/asia/">ASIA</a></li>
                <li><a href="/oceania/">OCEANIA</a></li>
                <li><a href="/middle east/">MIDDLE EAST</a></li>
                <li><a href="/how-to/">HOW TO...</a></li>
                <li><a href="/darrens-travel-journal/">DARREN'S JOURNAL</a></li>
            </ul>
        </div>

        <div id="login_help">
        	<?php if ($registereduser->isLoggedIn()) { ?>
            <?php } else { ?>
           		<a href="/register/">Click here for FREE registration</a><br >   
           		<a href="/benefits/">Why register?</a>  
            <?php } ?>                    
        </div>
        
        <div id="login_form">
			<?php 
			$registereduser = new User();
			if ($registereduser->isLoggedIn()) { 
				$registereduser->setFullProfile(); ?>
            	Welcome back, <?php echo $registereduser->getName()." ".$registereduser->getLastName(); ?>.
            <?php } else { ?>
                <form action="/app/?a=login" method="post">
                    <div class="field_block">E-Mail Address<br /><input name="email" id="email" type="text" class="txt required email" size="10" maxlength="100" /></div>
                    
                    <div class="field_block">Password<br /> <input name="password" id="password" type="password" class="txt required" size="10" maxlength="10" /></div>
                    
                    <div class="login_button"><input type="image" src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_login.gif" alt="Submit" /></div>
                    <input type="hidden" name="returnto" value="<?php echo seperate_comments_curPageURL() ?>"  />
                </form>
            <?php } ?>
        </div>
        
        <div id="login_help">
        	<?php if ($registereduser->isLoggedIn()) { ?>
            	<a href="/app/?a=logout">Logout</a>
            <?php } else { ?>
            	<a href="/forgotpassword/">Forgot your password?</a><br />
            <?php } ?>                    
        </div>

     <?php if (is_single()) { ?>
            <?php $leftadvert = get_post_meta($post->ID, "leftadvert", TRUE); ?>
            <?php if ($leftadvert) { ?>
            <div class="advert_left">
           		<?php echo $leftadvert; ?>
            </div>
            <?php } ?>
       <?php } ?>


        
        <?php if (is_single()) {
		$showdiscussbox = true;
		} else {
		$showdiscussbox = false;
		} ?>
        
        
         <?php
		/* Pull in a random posts from the ability tips category */
	
		if (isset($post->ID)) {
			$tag = get_post_meta($post->ID, "abilitytips", TRUE);
			$taglist = "tag=".$tag."+".$tag;
			query_posts('cat=8&showposts=1&orderby=rand&'.$taglist);
		} else {
			query_posts('cat=8&showposts=1&orderby=rand');
		}

		if (!have_posts()) { 
			query_posts('cat=8&showposts=1&orderby=rand');
		}
		?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div id="abilitytips_leftcol">
            <div id="abilitytips_leftcol_title">
                <h2>AbilityTips</h2>
            </div>
            <h3><?php the_title(); ?></h3>
            <?php the_content('Read the rest of this entry &raquo;'); ?>
        </div>
        <?php endwhile; endif; ?>

        <?php if ($showdiscussbox) {
 			if ($registereduser->isLoggedIn()) { ?> 
            	<?php if (!(isset($_GET['show']) && $_GET['show'] == "comments"))  { ?>
        		<div class="discuss"><h4><a href="?show=comments">DISCUSS NOW!</a></h4></div>
                <?php } ?>
            <?php } else { ?>
            	<div class="discuss"><h4><a href="/register/">REGISTER NOW TO JOIN THE DISCUSSION!</a></h4></div>
            <?php } ?>
		<?php } ?>

        
        <div> 
             
             <a href="http://www.facebook.com/pages/Chicago-IL/AbilityTrip/125375322502" target="_blank"><img src="http://abilitytrip.com/wp-content/uploads/2009/images/facebook.gif" alt="Facebook"></a>
             <a href="http://www.linkedin.com/groups?about=&gid=1652477&trk=anet_ug_grppro" target="_blank"><img src="http://abilitytrip.com/wp-content/uploads/2009/images/linkedin.gif" alt="LinkedIn"></a> 
             <a href="http://twitter.com/AbilityTrip" target="_blank"><img src="http://abilitytrip.com/wp-content/uploads/2009/images/twitter_icon.gif" alt="twitter"></a> 
             <A href="mailto:?subject=I think you might like this travel site for individuals with disabilities&amp;body=Hi! I found this site - http://www.AbilityTrip.com - and thought you might find it interesting. It's an online community that features information about the accessibility of global destinations, and covers everything from logistics to activities to restaurants and medical services."><img src="http://abilitytrip.com/wp-content/uploads/2009/images/emailimages2.jpg" alt="email a friend"></a> 
        </div> 

     </div>   <!--close body_left div--> 