<?php

/**
 * Posts to Posts Connections
 * https://github.com/scribu/wp-posts-to-posts
 */

function crm_connection_types(){

	p2p_register_connection_type(array(
		'name' => 'contact_to_organization',
		'from' => 'contact',
		'to' => 'organization',
		'admin_column' => 'any',
		'title' => array(
			'from' => 'Organizations',
			'to' => 'Contacts'
		)
	));

}

add_action('p2p_init', 'crm_connection_types');
