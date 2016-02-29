<?php
/**
 * Plugin Name: Berman & Company - Custom Post Types & Taxonomies Setup
 * Version: 0.1-alpha
 * Description: Custom Post Types and Taxonomies declarations
 * Author: Berman & Company
 * Author URI: http://bermanco.com
 * Text Domain: bac-cpt
 * Domain Path: /languages
 * @package Bac-cpt
 */

function bac_crm_load_files(){

	$files = array(
		'setup/post-types.php',
		'setup/custom-fields.php',
		'setup/taxonomies.php',
		'setup/posts-to-posts.php',
	);

	if ($files) {
		foreach ($files as $file){
			require_once($file);
		}
	}

}

// Set path constants
function bac_crm_set_path_constants(){

	$plugin_path = __DIR__;

	define('BAC_CRM_ASSET_PATH', plugin_dir_path(__FILE__) . 'assets/');
	define('BAC_CRM_ASSET_URL', plugin_dir_url(__FILE__) . 'assets/');

}

function bac_crm_init(){

	if (file_exists('vendor/autoload.php')){
		require_once('vendor/autoload.php');
	}

	bac_crm_load_files();

	bac_crm_set_path_constants();

}

bac_crm_init();

// Load Styles
add_action('admin_init', function(){
	wp_enqueue_style('bac-crm-styles', BAC_CRM_ASSET_URL . 'css/crm-admin-styles.css', false);
});