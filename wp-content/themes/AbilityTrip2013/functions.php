<?php
define( 'ATTACHMENTS_LEGACY', true ); 
define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));
define( 'IMAGES', TEMPPATH. "/images"); 
define('ab_dir', TEMPPATH. "/");

add_theme_support( 'nav-menus' );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'Main' => 'Main Nav',
      'Mobile' => 'Mobile Nav',
      'Footer' => 'Footer Nav',
      'Utility' => 'Utility Nav'
		)
	);
}
add_theme_support('html5', array('search-form'));

// Adds Support for Featured Images 
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size( 'sidebar-thumb', 100, 100, true );
}

// Set up the instances for the attachments plugin:

function gallery( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Gallery',

    // all post types to utilize (string|array)
    'post_type'     => array( 'destinations' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Add Gallery Images Here',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Images', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'gallery', $args ); // unique instance name
}
add_action( 'attachments_register', 'gallery' );

function postThumb( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
  );

  $args = array(
    'label'         => 'Post Thumbnail',
    'post_type'     => array( 'destinations' ),
    'position'      => 'side',
    'priority'      => 'default',
    'filetype'      => array('image'),
    'note'          => 'Add a thumbnail to the post',
    'append'        => false,
    'button_text'   => __( 'Attach Image', 'attachments' ),
    'modal_text'    => __( 'Attach', 'attachments' ),
    'router'        => 'browse',
    'fields'        => $fields,

  );

  $attachments->register( 'postthumb', $args );
}

add_action( 'attachments_register', 'postthumb' );

function downloads( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',
      'type'      => 'text',
      'label'     => __( 'Title', 'attachments' ),
      'default'   => 'title',
    ),
    array(
      'name'      => 'caption',
      'type'      => 'textarea',
      'label'     => __( 'Caption', 'attachments' ),
      'default'   => 'caption',
    ),
  );

  $args = array(
    'label'         => 'Downloads',
    'post_type'     => array( 'post' ),
    'position'      => 'side',
    'priority'      => 'default',
    'filetype'      => null,
    'note'          => 'Add a downlodable item. Only used on Travel Tools page',
    'append'        => false,
    'button_text'   => __( 'Add download', 'attachments' ),
    'modal_text'    => __( 'Use', 'attachments' ),
    'router'        => 'browse',
    'fields'        => $fields,

  );

  $attachments->register( 'downloads', $args );
}

add_action( 'attachments_register', 'downloads' );

require_once('destination-manager.php');

//ENsure there are no jQuery conflicts and ensure we are using the CDN one
function load_jquery() {

    if ( ! is_admin() ) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '', FALSE, '1.6.4');
        wp_enqueue_script('jquery');
    }
}
add_action('template_redirect', 'load_jquery');

// Sets up custom login screen styles
function custom_login_css() {
echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login-styles.css" />';
}

add_action('login_head', 'custom_login_css');

function add_login_logout_link($items, $args) { 

  if ( $args->theme_location == 'Utility' ) {  

        ob_start();

        wp_loginout('index.php');

        $loginoutlink = ob_get_contents();

        ob_end_clean(); 

        $items .= '<li>'. $loginoutlink .'</li>';
    }

    return $items;

}

add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);

?>