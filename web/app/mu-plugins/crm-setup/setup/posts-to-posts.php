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
		),
		'admin_box' => array(
			'context' => 'advanced'
		),
		'fields' => array(
			'job_title' => array(
				'title' => 'Job Title',
				'type' => 'text'
			),
			'current' => array(
				'title' => 'Current',
				'type' => 'select',
				'values' => array('', 'current', 'former')
			),
			'primary' => array(
				'title' => 'Primary Contact',
				'type' => 'checkbox'
			)
		)
	));

	p2p_register_connection_type(array(
		'name' => 'content_to_security_group',
		'from' => array('contact', 'organization', 'mailing-list'),
		'to' => 'security-group',
		'admin_column' => 'any',
		'title' => array(
			'from' => 'Security Groups',
			'to' => 'Content'
		),
		'admin_box' => array(
			'context' => 'advanced'
		)
	));

	p2p_register_connection_type(array(
		'name' => 'user_to_security_group',
		'from' => 'user',
		'to' => 'security-group',
		'admin_column' => 'any',
		'title' => array(
			'from' => 'Security Groups',
			'to' => 'Users'
		),
		'admin_box' => array(
			'context' => 'advanced'
		),
		'from_query_vars' => array(
			'orderby' => 'title',
			'order' => 'ASC'
		)
	));

	p2p_register_connection_type(array(
		'name' => 'contact_to_mailing_list',
		'from' => 'contact',
		'to' => 'mailing-list',
		'title' => array(
			'from' => 'Mailing Lists',
			'to' => 'Contacts'
		),
		'admin_box' => array(
			'show' => 'any',
			'context' => 'advanced'
		),
		'from_query_vars' => array(
			'meta_key' => 'crm_person_last_name',
			'orderby' => 'meta_value',
			'order' => 'ASC'
		)
	));

}

add_action('p2p_init', 'crm_connection_types');


function restrict_p2p_box_display( $show, $ctype, $post ) {
	error_log(print_r($show, true));
	error_log(print_r($ctype, true));
	error_log(print_r($post, true));
	return $show;
}

add_filter( 'p2p_admin_box_show', 'restrict_p2p_box_display', 10, 3 );

