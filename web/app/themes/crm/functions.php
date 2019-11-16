<?php

////////////////////////////////
// Make sure Timber is loaded //
////////////////////////////////

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

/////////////////////////////////////
// Setup Timber template locations //
/////////////////////////////////////

Timber::$dirname = array('templates', 'views');

//////////////////////
// Load Theme Files //
//////////////////////

function load_local_theme_files(){
	$files = array(
		'classes/Site.php',
		'classes/RouteCreator.php',
		'classes/AdminOptions.php',
	);

	if ($files) {
		foreach ($files as $file) {
			require_once($file);
		}
	}
}

load_local_theme_files();


////////////////////////////
// Instantiate Site Class //
////////////////////////////

new Site();

///////////////////////
// Set Custom Routes //
///////////////////////

// Methods defined in classes/RouteCreator.php

// add_action('after_setup_theme', function(){
// 	$route_creator = new RouteCreator('$containing_post_type', '$contained_post_type', 'p2p_connection_type');
// 	$route_creator->set_template_file('sub-archive.php');
// 	$route_creator->create_route();
// });

//////////////////////////////
// Set Up Site Options Page //
//////////////////////////////

/**
 * Helper function to get/return the Myprefix_Admin object
 * @since  0.1.0
 * @return Myprefix_Admin object
 */
function myprefix_admin() {
	static $object = null;
	if ( is_null( $object ) ) {
		$object = new AdminOptions();
		$object->hooks();
	}
	return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function get_theme_option( $key = '', $filter = null) {
	$option = cmb2_get_option( myprefix_admin()->key, $key );
	if ($filter){
		return apply_filters($filter, $option);
	}
	return $option;
}

/**
 * Initiate (Uncomment to create Site Options page)
 */
//myprefix_admin();

///////////////////////////
// remove junk from head //
///////////////////////////

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

///////////////////////
// Custom Login Logo //
///////////////////////

function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.get_bloginfo('template_directory').'/assets/img/logo_dark.svg) !important;
	 background-size: contain !important;
	 width: 100% !important;
	 height: 75px !important;
	 pointer-events: none;
	}
	</style>';
}

add_action('login_head', 'custom_login_logo');

///////////////////////
// Set Custom Routes //
///////////////////////

// person/articles
add_action('after_setup_theme', function(){
	$route_creator = new RouteCreator('person', 'article', 'people_to_content');
	$route_creator->set_template_file('sub-archive.php');
	$route_creator->create_route();
});