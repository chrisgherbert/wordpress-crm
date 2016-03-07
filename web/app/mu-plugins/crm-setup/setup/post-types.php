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

/**
 * Automatically set "contact" posts titles to the first and last name.  
 * There's no need to have users enter someone's name twice.
 * @param   array $data     WordPress post data being submitted
 * @return  array           WordPress post data, modified
 */
function set_contact_title($data, $postarr){

	$post_type = $data['post_type'];

	if ($post_type == 'contact'){

		if (isset($_POST['crm_contact_first_name']) && isset($_POST['crm_contact_last_name'])){

			$first_name = $_POST['crm_contact_first_name'];
			$last_name = $_POST['crm_contact_last_name'];

			if ($first_name && $last_name){
				$data['post_title'] = "$first_name $last_name";
			}

		}

	}

	return $data;

}

add_filter('wp_insert_post_data', 'set_contact_title', 10, 2);

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
		'supports' => array('title', 'thumbnail'),
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
		'menu_icon' => 'dashicons-lock',
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
		'menu_icon' => 'dashicons-email',
	)
);

