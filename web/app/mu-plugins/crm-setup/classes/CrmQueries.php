<?php

class CrmQueries {

	public static function get_dashboard_recent_items($number = null){

		$query = array(
			'post_status' => array('publish', 'trash'),
			'post_type' => array('contact', 'organization', 'mailing-list')
		);

		if ($number){
			$query['posts_per_page'] = $number;
		}

		return self::get_posts($query);

	}

	public static function get_posts(array $query = null){

		if (!$query){
			global $wp_query;
			$query = $wp_query;
		}

		$posts = get_posts($query);

		$timber_posts = array();

		if ($posts){
			foreach ($posts as $post){
				$timber_posts[] = self::get_post($post->ID);
			}
		}

		return $timber_posts;

	}

	/**
	 * Get a post with the appropriate class
	 * @param  int             $post_id WordPress post ID
	 * @return TimberPost|null          If the post exists, a TimberPost object representing it
	 */
	public static function get_post($post_id){

		$post = get_post($post_id);

		$class = self::get_post_type_class($post->post_type);

		return new $class($post_id);

	}

	/**
	 * Get the appropriate TimberPost class for a post type
	 * @param  string $post_type Post type
	 * @return string            TimberPost class
	 */
	public static function get_post_type_class($post_type){

		$types = array(
			'contact' => 'CrmContact',
			'organization' => 'CrmOrganization',
			'mailing-list' => 'CrmMailingList',
			'security-group' => 'CrmSecurityGroup',
			'saved-search' => 'CrmSavedSearch'
		);

		if (isset($types[$post_type])){
			return $types[$post_type];
		}
		else {
			return 'CrmPost';
		}

	}

}