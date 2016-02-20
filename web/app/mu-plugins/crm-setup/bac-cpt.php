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

function bac_cpt_load_files(){

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

function bac_cpt_init(){

	if (file_exists('vendor/autoload.php')){
		require_once('vendor/autoload.php');
	}

	bac_cpt_load_files();

}

bac_cpt_init();