<?php

/**
 * Define custom field prefix
 */
define( 'CPT_PREFIX', 'crm_' );

//////////////
// Contacts //
//////////////

class Person_CPT extends CPT_Core {

	public function __construct(){

		parent::__construct(
			array(
				'Contact', // Singular
				'Contacts', // Plural
				'contact' // Slug
			),
			array(
				'menu_icon' => 'dashicons-universal-access',
				'supports' => array( 'thumbnail'),
			)
		);

	}

	public function columns($columns){

		// unset($columns['title']);

		$new_columns = array(
			'name' => 'Name',
			'location' => 'Location'
		);

		return array_merge($columns, $new_columns);

	}

	public function columns_display($column, $post_id){

		switch ($column){

			case 'name':

				$first_name = get_post_meta($post_id, 'crm_person_first_name', true);
				$last_name = get_post_meta($post_id, 'crm_person_last_name', true);
				$url = get_edit_post_link($post_id);
				echo "<a href='$url'><strong>$first_name $last_name</strong></a>";
				break;

			case 'location':
				$parts = array();
				foreach (array(get_post_meta($post_id, 'crm_person_city', true), get_post_meta($post_id, 'crm_person_state', true)) as $part){
					$parts[] = $part;
				}
				echo implode(', ', $parts);
				break;

		}

	}

}


add_action('save_post', 'set_person_title_to_name', 10, 3);

function set_person_title_to_name($post_id, $post, $update){

	if ($post->post_type != 'person'){
		return;
	}

	$first_name = get_post_meta($post_id, 'crm_person_first_name', true);
	$last_name = get_post_meta($post_id, 'crm_person_last_name', true);
	$name = trim("$first_name $last_name");

	// unhook this function so it doesn't loop infinitely
	remove_action( 'save_post', 'set_person_title_to_name');

	if (wp_is_post_revision($post_id)){
		$post_id = wp_is_post_revision($post_id);
	}

	wp_update_post(array(
		'ID' => $post_id,
		'post_title' => $name
	));

	// re-hook this function
	add_action( 'save_post', 'set_person_title_to_name', 10, 3);

}

new Person_CPT;

///////////////////
// Organizations //
///////////////////

register_via_cpt_core(
	array(
		'Organization',
		'Organization',
		'organization'
	),
	array(
		'supports' => array('title', 'thumbnail')
	)
);

/////////////////////
// Security Groups //
/////////////////////

register_via_cpt_core(
	array(
		'Security Group',
		'Security Groups',
		'security-group'
	),
	array(
		'supports' => array('title'),
		'menu_icon' => 'dashicons-lock'
	)
);

///////////////////
// Mailing Lists //
///////////////////

register_via_cpt_core(
	array(
		'Mailing List',
		'Mailing Lists',
		'mailing-list'
	),
	array(
		'supports' => array('title'),
		'menu_icon' => 'dashicons-email'
	)
);

