<?php

add_action('pre_get_posts', 'filter_by_security_groups');

function filter_by_security_groups(){


}

add_action('deleted_post', 'redirect_after_after_deleting_records', 10, 1);

function redirect_after_after_deleting_records($post_id){

	$accepted_post_types = array(
		'contact',
		'organization'
	);

	$post = Timber::get_post($post_id);

	if (in_array($post->post_type, $accepted_post_types)){

		if (!session_id()){
			@session_start();
		}

		$msg = new \Plasticbrain\FlashMessages\FlashMessages();
		$msg->error('Deleted ' . $post->title);
		wp_redirect('/contact');
		exit;

	}

}