        <div id="body_right">

        <?php if (is_single()) { ?>
            <?php $photobrowser = get_post_meta($post->ID, "FLICKR", TRUE); ?>
            <?php if ($photobrowser) { ?>
            <div class="img_block_right">
           		<?php echo $photobrowser; ?>
            </div>
            <?php } ?>
       <?php } ?>

     <?php if (is_single()) { ?>
            <?php $rightadvert = get_post_meta($post->ID, "rightadvert", TRUE); ?>
            <?php if ($rightadvert) { ?>
            <div class="advert_right">
           		<?php echo $rightadvert; ?>
            </div>
            <?php } ?>
       <?php } ?>

        <?php if (is_single() || is_category() || is_page()) { ?>
        		<div class="filler">
                <script type="text/javascript"><!--
				google_ad_client = "pub-0420758071839028";
				/* 200x200, created 12/3/08 */
				google_ad_slot = "6336715282";
				google_ad_width = 200;
				google_ad_height = 200;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
                <!--<img src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_google200.gif" width="200" />-->
                </div>
        <?php } else { ?>
        		<!--<img src="<?php bloginfo('template_directory'); ?>/_resources/images/AT_google250.gif" />-->
                <script type="text/javascript"><!--
				google_ad_client = "pub-0420758071839028";
				/* 250x250, created 12/3/08 */
				google_ad_slot = "6283334014";
				google_ad_width = 250;
				google_ad_height = 250;
				//-->
				</script>
				<script type="text/javascript"
				src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
				</script>
        <?php } ?>


        </div><!--close body_right div-->

          
