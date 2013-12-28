<?php 

add_action('init', 'destination_manager_register' );

function destination_manager_register(){
	$args = array(  
        'label' => __('Destinations'),  
        'singular_label' => __('Destination'),  
        'public' => true,  
        'show_ui' => true,
        'menu_position' => 5,
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
        'rewrite' => array('slug' => 'destinations', 'with_front' => false),
       );  
	//Register type and custom taxonomy for type.
	register_post_type( 'destinations' , $args );
	register_taxonomy("d_cats", "destinations",
        array(
            "hierarchical" => true, 
            "label" => "Destination Categories", 
            "singular_label" => "Destination Category",
            'rewrite' => array( 'slug' => 'd_cats', 'with_front' => false ))
        );
}

add_action("admin_init", "destination_add_meta_box" );
    
function destination_add_meta_box(){
    add_meta_box("destination_custom_meta", "Destination details", "destination_meta_options", "destinations","normal", "high");   
}  

function destination_meta_options(){
    global $post;
    if (defined('DOING_AUTOSAVE')&& DOING_AUTOSAVE)
        return $post_id;
        $custom = get_post_custom( $post -> ID);
        $transport = $custom["transport"][0];
        $accommodation = $custom["accommodation"][0];
        $activities = $custom["activities"][0];
        $medical = $custom["medical"][0];
        $tips = $custom["tips"][0];
?>  

<style type="text/css">
    <?php include('destination_meta.css'); ?>
</style>

<div class="destinationMetaBox">
    <div class="fieldContainer">
        <label>Getting about:</label>
        <?php 
            $content = $transport;
            $editor_id = 'transport';

            wp_editor( $content, $editor_id );
        ?>
    </div>
    <div class="fieldContainer">
        <label>Accomodation:</label>
        <?php 
            $content = $accommodation;
            $editor_id = 'accommodation';

            wp_editor( $content, $editor_id );
        ?>
    </div>
    <div class="fieldContainer">
        <label>Activities:</label>
        <?php 
            $content = $activities;
            $editor_id = 'activities';

            wp_editor( $content, $editor_id );
        ?>
    </div>
    <div class="fieldContainer">
        <label>Medical:</label>
        <?php 
            $content = $medical;
            $editor_id = 'medical';

            wp_editor( $content, $editor_id );
        ?>
    </div>
    <div class="fieldContainer">
        <label>Tips and Tricks:</label>
        <?php 
            $content = $tips;
            $editor_id = 'tips';

            wp_editor( $content, $editor_id );
        ?>
    </div>
</div>
<?php  
    } 
    
add_action('save_post', 'destination_save_extras'); 
  
function destination_save_extras(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ //if you remove this the sky will fall on your head.
        return $post_id;
    }else{
        update_post_meta($post->ID, "transport", $_POST["transport"]); 
        update_post_meta($post->ID, "accommodation", $_POST["accommodation"]);
        update_post_meta($post->ID, "activities", $_POST["activities"]);
        update_post_meta($post->ID, "medical", $_POST["medical"]);
        update_post_meta($post->ID, "tips", $_POST["tips"]); 
    } 
}  


?>
