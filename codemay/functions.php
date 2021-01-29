<?php // Site Functions



/*** Making jQuery to load from Google Library
----------------------------------------------------------------------------------------------------------------------------------*/
function cm_replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'cm_replace_jquery');






/*** Update CSS within in Admin
----------------------------------------------------------------------------------------------------------------------------------*/
function cm_admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}
add_action('admin_enqueue_scripts', 'cm_admin_style');





/*** Custom Login Screen Functions
----------------------------------------------------------------------------------------------------------------------------------*/
function cm_my_custom_login() {
  echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'cm_my_custom_login');

function cm_login_error_override() {
  return 'Incorrect login details.';
}
add_filter('login_errors', 'cm_login_error_override');

function cm_my_login_head() {
  remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'cm_my_login_head');





/*** This loads styles and scripts from the theme
----------------------------------------------------------------------------------------------------------------------------------*/
function cm_load_styles() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
  wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'cm_load_styles' );

function cm_load_scripts() {
  wp_register_script( 'popper', get_stylesheet_directory_uri() . '/js/popper.min.js', array( 'jquery' ), '', true );
  wp_register_script( 'bootstrap.min', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' ,array( 'jquery' ), '', true );
  // wp_register_script( 'googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBPZhnXPBoc0R_JgCyifvr5nDUF1OlgYBM&sensor=false',true);
  wp_register_script( 'jquery.cycle2.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.min.js', array( 'jquery' ), '', true );
  wp_register_script( 'jquery.cycle2.carousel.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.carousel.min.js', array( 'jquery' ), '', true );
  wp_register_script( 'jquery.cycle2.swipe.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.swipe.min.js', array( 'jquery' ), '', true );
  wp_register_script( 'jquery.cycle2.center.min', get_stylesheet_directory_uri() . '/js/jquery.cycle2.center.min.js', array( 'jquery' ), '', true );
  wp_register_script( 'jquery.fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '', true );
  wp_register_script( 'masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), '', true );
  wp_register_script( 'imagesloaded', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );

  wp_enqueue_script('popper');
  wp_enqueue_script('bootstrap.min');
  // wp_enqueue_script('googlemap');
  wp_enqueue_script('jquery.cycle2.min');
  wp_enqueue_script('jquery.cycle2.carousel.min');
  wp_enqueue_script('jquery.cycle2.swipe.min');
  wp_enqueue_script('jquery.cycle2.center.min');
  wp_enqueue_script('jquery.fitvids');
  wp_enqueue_script('masonry');
  wp_enqueue_script('imagesloaded');
}
add_action( 'wp_enqueue_scripts', 'cm_load_scripts' );



// Post Thumbnails
add_theme_support( 'post-thumbnails' );


// Remove Gutenberg Editor
add_filter('use_block_editor_for_post', '__return_false', 10);



/*** ACF Google Maps
----------------------------------------------------------------------------------------------------------------------------------*/
/*
function cm_my_acf_init() {
	acf_update_setting('google_api_key', '');
}
add_action('acf/init', 'cm_my_acf_init');
*/




// Register Custom Navigation Walker
require_once('bs4navwalker.php');





// Dashboard controlled menus
register_nav_menus( array(
  'desktop_menu' => __( 'Desktop Menu', 'bootpress' ),
  'mobile_menu' => __( 'Mobile Menu', 'bootpress' ),
  'footer_menu' => __( 'Footer Menu', 'bootpress' )
) );

add_shortcode('nav_menu','nav_menu');
function nav_menu($atts,$content){

    $atts = shortcode_atts( array(
        'menu_class' => 'menu',
        'menu' => '',
        'container' => 'div',
        'container_class' => '',
        'echo' => false
    ), $atts );

    // Step 2 Code 
    $content = wp_nav_menu(
      array(                
          'menu' => sanitize_text_field($atts['menu']),
          'menu_class' => sanitize_text_field($atts['menu_class']),
          'container'  => sanitize_text_field($atts['container']),
          'container_class' => sanitize_text_field($atts['container_class']),
          'echo' => false
      )
  );

return $content;
}




// Code allowing multiple dynamic sidebars
if ( function_exists('register_sidebar') )
 // Blog Sidebar
   register_sidebar(array('name'=>'Blog Sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h5 class="widgettitle">',
    'after_title' => '</h5>',
   ));




//Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
  $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
  }
  add_filter( 'body_class', 'add_slug_body_class' );





/*** Create Testimonial Post Type
----------------------------------------------------------------------------------------------------------------------------------*/
function clicks_register_my_cpt_testimonial() {

	// Post Type: Testimonials.

	$labels = array(
		"name" => __( "Testimonials", "custom-post-type" ),
		"singular_name" => __( "Testimonial", "custom-post-type" ),
	);

	$args = array(
		"label" => __( "Testimonials", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonial", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 21,
		"supports" => array( "title", "revisions", "author", "page-attributes" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "testimonial", $args );
}

add_action( 'init', 'clicks_register_my_cpt_testimonial' );





/*** Create FAQ Post Type
----------------------------------------------------------------------------------------------------------------------------------*/
function clicks_register_my_cpt_faq() {

	 // Post Type: FAQs.

	$labels = array(
		"name" => __( "FAQs", "custom-post-type" ),
		"singular_name" => __( "FAQ", "custom-post-type" ),
	);

	$args = array(
		"label" => __( "FAQs", "custom-post-type" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "faq", "with_front" => true ),
    "query_var" => true,
    "menu_position" => 21,
		"supports" => array( "title", "editor", "thumbnail" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "faq", $args );
}

add_action( 'init', 'clicks_register_my_cpt_faq' );





/*** Create Process Post Type
----------------------------------------------------------------------------------------------------------------------------------*/
function clicks_register_my_cpt_process() {

  // Post Type: Process.

 $labels = array(
   "name" => __( "Process", "custom-post-type" ),
   "singular_name" => __( "Process", "custom-post-type" ),
 );

 $args = array(
   "label" => __( "Process", "custom-post-type" ),
   "labels" => $labels,
   "description" => "",
   "public" => true,
   "publicly_queryable" => true,
   "show_ui" => true,
   "delete_with_user" => false,
   "show_in_rest" => false,
   "rest_base" => "",
   "rest_controller_class" => "WP_REST_Posts_Controller",
   "has_archive" => false,
   "show_in_menu" => true,
   "show_in_nav_menus" => true,
   "exclude_from_search" => false,
   "capability_type" => "post",
   "map_meta_cap" => true,
   "hierarchical" => false,
   "rewrite" => array( "slug" => "process", "with_front" => true ),
   "query_var" => true,
   "menu_position" => 21,
   "supports" => array( "title", "editor", "thumbnail" ),
   "taxonomies" => array( "category" ),
 );

 register_post_type( "process", $args );
}

add_action( 'init', 'clicks_register_my_cpt_process' );





/*** Create Event Post Type
----------------------------------------------------------------------------------------------------------------------------------*/
/*
function clicks_register_my_cpt_press() {

	// Post Type: Events

	$labels = array(
		"name" => __( "Events", "custom-post-type" ),
		"singular_name" => __( "Event", "custom-post-type" ),
	);

	$args = array(
		"label" => __( "Events", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "event", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 21,
		"supports" => array( "title", "revisions", "author", "page-attributes" ),
		"taxonomies" => array( "category" ),
	);

	register_post_type( "event", $args );
}

add_action( 'init', 'clicks_register_my_cpt_press' );
*/




/*** Create Video Post Type and Taxonomies
----------------------------------------------------------------------------------------------------------------------------------*/
/*
function clicks_register_my_cpt_video() {

	// Post Type: Videos

	$labels = array(
		"name" => __( "Videos", "clicks-post-type" ),
		"singular_name" => __( "Video", "clicks-post-type" ),
	);

	$args = array(
		"label" => __( "Videos", "clicks-post-type" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "video", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 21,
		"supports" => array( "title", "revisions", "author", "page-attributes" ),
	);

	register_post_type( "video", $args );
}

add_action( 'init', 'clicks_register_my_cpt_video' );
*/


/*** Video Categories */
/*
function clicks_register_my_taxes_video_category() {

	$labels = [
		"name" => __( "Video Categories", "clicks-post-type" ),
		"singular_name" => __( "Video Category", "clicks-post-type" ),
	];

	$args = [
		"label" => __( "Video Categories", "clicks-post-type" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_category', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "video_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "video_category", [ "video" ], $args );
}
add_action( 'init', 'clicks_register_my_taxes_video_category' );
*/


/*** Video Tags */
/*
function clicks_register_my_taxes_video_tag() {

	$labels = [
		"name" => __( "Video Tags", "clicks-post-type" ),
		"singular_name" => __( "Video Tag", "clicks-post-type" ),
	];

	$args = [
		"label" => __( "Video Tags", "clicks-post-type" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'video_tag', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "video_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "video_tag", [ "video" ], $args );
}
add_action( 'init', 'clicks_register_my_taxes_video_tag' );
*/




/*** Hex to RBG Conversion
----------------------------------------------------------------------------------------------------------------------------------*/
function hex2rgb($hex) {
  $hex = str_replace("#", "", $hex);

  if(strlen($hex) == 3) {
    $r = hexdec(substr($hex,0,1).substr($hex,0,1));
    $g = hexdec(substr($hex,1,1).substr($hex,1,1));
    $b = hexdec(substr($hex,2,1).substr($hex,2,1));
  } else {
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
  }
  $rgb = array($r, $g, $b);

  return $rgb; // returns an array with the rgb values
}





/*** Field Groups
----------------------------------------------------------------------------------------------------------------------------------*/
/*
global $blog_id;

if ($blog_id != 1) {
  require_once( 'fields/hero-fields.php' );
}
*/





/*** ACF 'Global Settings' Options Pages
----------------------------------------------------------------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
  
  // Global Settings
	acf_add_options_page(array(
		'menu_title'	=>  'Global Settings',
    'menu_slug' 	=>  'global-settings',
    'redirect' => true,
    'position' => 1
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Contact Info',
		'menu_title'	=>  'Contact Info',
		'parent_slug'	=>  'global-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Blog Defaults',
		'menu_title'	=>  'Blog',
		'parent_slug'	=>  'global-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Shop Defaults',
		'menu_title'	=>  'Shop',
		'parent_slug'	=>  'global-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Message',
		'menu_title'	=>  'Global Message',
		'parent_slug'	=>  'global-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'CTA',
		'menu_title'	=>  'CTA Panel',
		'parent_slug'	=>  'global-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Footer Panels',
		'menu_title'	=>  'Footer Panels',
		'parent_slug'	=>  'global-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Tracking Info',
		'menu_title'	=>  'Tracking Info',
		'parent_slug'	=>  'global-settings',
  ));

  // Style Settings
  acf_add_options_page(array(
		'menu_title'	=>  'Style Settings',
    'menu_slug' 	=>  'style-settings',
    'redirect' => true,
    'position' => 1
  ));

	acf_add_options_sub_page(array(
		'page_title' 	=>  'Top Bar',
		'menu_title'	=>  'Top Bar',
		'parent_slug'	=>  'style-settings',
  ));
  
  acf_add_options_sub_page(array(
		'page_title' 	=>  'Fonts',
		'menu_title'	=>  'Fonts',
		'parent_slug'	=>  'style-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Colors',
		'menu_title'	=>  'Colors',
		'parent_slug'	=>  'style-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Animations',
		'menu_title'	=>  'Animations',
		'parent_slug'	=>  'style-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=>  'Extras',
		'menu_title'	=>  'Extras',
		'parent_slug'	=>  'style-settings',
  ));

  // Video Settings
  /*
  acf_add_options_sub_page(array(
    'page_title'  =>  'Global Video Content',
    'menu_title'  =>  'Global Video Content',
    'parent_slug' =>  'edit.php?post_type=video',
    'position'  => 1
  ));
  */
	
}





/*** Custom Columns
----------------------------------------------------------------------------------------------------------------------------------*/
/*
function pagecolumns_header($columns) {
	$columns = array(
		'cb'	 	=> '<input type="checkbox" />',
    'title' 	=> 'Page Title',
    'description'  =>  'Description',
    'referral' => 'Referral ID',
    '3wp_broadcast' => 'Broadcasted',
    'author' => 'Author',
		'date'		=>	'Date',
	);
	return $columns;
}

function pagecolumns_content($column) {
	global $post;
  if($column == 'description') {
		echo get_field('page_description', $post->ID);
  }
  if($column == 'referral') {
    if( get_field('page_cr_referral_id', $postID) ) {
      echo get_field('page_cr_referral_id', $postID);
    } elseif( get_field('global_cr_referral_id','option') ) {
      echo get_field('global_cr_referral_id','option');
    }
  }
}

add_action("manage_pages_custom_column", "pagecolumns_content");
add_filter("manage_edit-lp_columns", "pagecolumns_header");

function pagecolumns_sortable( $columns ) {
  $columns['description'] = 'description';
  $columns['referral'] = 'referral';
  $columns['date'] = 'date';
	return $columns;
}

add_filter("manage_edit-lp_sortable_columns", "pagecolumns_sortable" );
*/





/*** WooCommerce
----------------------------------------------------------------------------------------------------------------------------------*/
// Change Price Range Display
// function iconic_format_price_range( $price, $from, $to ) {
//    return sprintf( '%s %s', __( 'from', 'iconic' ), wc_price( $from ) );
// } 
// add_filter( 'woocommerce_format_price_range', 'iconic_format_price_range', 10, 3 );


// Remove Related Products
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// Remove zoom on hover for product images
// function remove_image_zoom_support() {
//   remove_theme_support( 'wc-product-gallery-zoom' );
// }
// add_action( 'wp', 'remove_image_zoom_support', 100 );



add_filter( 'woocommerce_product_tabs', 'cm_remove_additional_information' );
 
function cm_remove_additional_information( $tabs ) {
 
  unset( $tabs['additional_information'] );
  unset( $tabs['description'] );
  unset( $tabs['reviews'] );
	return $tabs;
 
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'ld_woo_custom_cart_button_text' );
add_filter( 'woocommerce_product_add_to_cart_text', 'ld_woo_custom_cart_button_text' );  
 
function ld_woo_custom_cart_button_text() {
  return __( 'Pay This Amount', 'woocommerce' );
}