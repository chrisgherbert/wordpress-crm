<?php
/**
 * Plugin Name: Berman & Company CRM - Setup
 * Version: 0.1-alpha
 * Description: Custom Post Types and Taxonomies declarations, etc
 * Author: Berman & Company
 * Author URI: http://bermanco.com
 * Text Domain: bac-cpt
 * Domain Path: /languages
 * @package Bac-cpt
 */

/**
 * Require plugin files
 */
function bac_crm_load_files(){

	$files = array(
		'setup/post-types.php',
		'setup/custom-fields.php',
		'setup/taxonomies.php',
		'setup/posts-to-posts.php',
		'classes/CrmQueries.php',
		'classes/CrmPost.php',
		'classes/CrmEntity.php',
		'classes/CrmContact.php',
		'classes/CrmOrganization.php',
		'classes/CrmMailingList.php',
		'classes/CrmSavedSearch.php',
		'classes/CrmSecurityGroup.php',
		'classes/CrmUser.php'
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

/**
 * Require the user to be logged in, unless they're on the login page, or using WP CLI
 */
function bac_crm_require_login(){

	add_action('init', function(){

		$is_login = in_array( $GLOBALS['pagenow'], array('wp-login.php'));

		$is_wp_cli = defined('WP_CLI') && WP_CLI;

		if (!is_user_logged_in() && !$is_login && !is_admin() && !$is_wp_cli){

			wp_redirect(wp_login_url());

			exit();

		}

	});

}

function bac_crm_init(){

	if (file_exists('vendor/autoload.php')){
		require_once('vendor/autoload.php');
	}

	bac_crm_load_files();

	bac_crm_set_path_constants();

	bac_crm_require_login();

}

add_action('plugins_loaded', 'bac_crm_init');

// Load Admin Styles & Scripts
add_action('admin_init', function(){

	wp_enqueue_style('bac-crm-admin-style', BAC_CRM_ASSET_URL . 'css/crm-admin-styles.css', false);

	wp_enqueue_script('bac-crm-admin-script', BAC_CRM_ASSET_URL . 'js/crm-admin-scripts.js', array('jquery'));

});


