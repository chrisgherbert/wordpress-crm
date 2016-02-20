<?php

/////////////////////
// Sample Taxonomy //
/////////////////////

function register_sample_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Sample Taxonomies', 'Taxonomy General Name', 'bac-cpt' ),
		'singular_name'              => _x( 'Sample Taxonomy', 'Taxonomy Singular Name', 'bac-cpt' ),
		'menu_name'                  => __( 'Taxonomy', 'bac-cpt' ),
		'all_items'                  => __( 'All Items', 'bac-cpt' ),
		'parent_item'                => __( 'Parent Item', 'bac-cpt' ),
		'parent_item_colon'          => __( 'Parent Item:', 'bac-cpt' ),
		'new_item_name'              => __( 'New Item Name', 'bac-cpt' ),
		'add_new_item'               => __( 'Add New Item', 'bac-cpt' ),
		'edit_item'                  => __( 'Edit Item', 'bac-cpt' ),
		'update_item'                => __( 'Update Item', 'bac-cpt' ),
		'view_item'                  => __( 'View Item', 'bac-cpt' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bac-cpt' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bac-cpt' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bac-cpt' ),
		'popular_items'              => __( 'Popular Items', 'bac-cpt' ),
		'search_items'               => __( 'Search Items', 'bac-cpt' ),
		'not_found'                  => __( 'Not Found', 'bac-cpt' ),
		'no_terms'                   => __( 'No items', 'bac-cpt' ),
		'items_list'                 => __( 'Items list', 'bac-cpt' ),
		'items_list_navigation'      => __( 'Items list navigation', 'bac-cpt' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'sample_taxonomy', array( 'post', ' sample-post-type' ), $args );

}
add_action( 'init', 'register_sample_taxonomy', 0 );