<?php 
 get_header();?>

<div class="container12 journals">
	<article class="column12">
		<?php global $cat; ?>
		    <?php

			    $parentCatName = single_cat_title('',false);
			    $parentCatID = get_cat_ID($parentCatName);
			    $args = array(
		    		'child_of' => $parentCatID,
		    		'order'    => 'DESC',
		    	);
			    $childCats = get_categories( $args);
			    if(is_array($childCats)):
			    foreach($childCats as $child){ ?>
				<div>
				    <h2><?php echo $child->name; ?></h2>
				    <p><?php echo $child->description; ?></p>
				    <a href="/category/<?php echo $child->slug; ?>">Read more</a>
			    </div>
			    <?php
			    wp_reset_query();
			    }
			    endif;
		    ?> 
	</article>

</div>
 	
<?php get_footer(); ?>