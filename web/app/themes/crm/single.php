<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();

// Get the proper class to instantiate
$post_type_class = CrmQueries::get_post_type_class(get_post_type());

$post = Timber::query_post(false, $post_type_class);
$context['post'] = $post;
$context['comment_form'] = TimberHelper::get_comment_form();

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
