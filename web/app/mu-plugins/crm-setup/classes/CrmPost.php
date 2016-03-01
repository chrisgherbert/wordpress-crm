<?php

class CrmPost extends BasePost {

	public $custom_field_prefix = 'crm_';

	/**
	 * Get the last action performed on the item (create, edit or delete).
	 * - If it's in the trash, it's "deleted".
	 * - If the modified and creation dates are the same, it's "created".
	 * - Otherwise, it's "edited".
	 * @return array Array of info on the action
	 */
	public function get_last_action(){

		if ($this->post_status == 'trash'){
			return array(
				'text' => 'Deleted',
				'fa_icon_class' => 'fa-trash',
				'bs_action_class' => 'danger'
			);
		}

		if ($this->post_date_gmt == $this->post_modified_gmt){
			return array(
				'text' => 'Created',
				'fa_icon_class' => 'fa-plus',
				'bs_action_class' => 'success'
			);
		}

		else {
			return array(
				'text' => 'Edited',
				'fa_icon_class' => 'fa-pencil-square-o',
				'bs_action_class' => 'info'
			);
		}

	}

	/**
	 * Get the Dashicon CSS class for the post type.
	 * @return string Dashicon CSS class
	 */
	public function get_dashicon_class(){

		$post_type_obj = get_post_type_object($this->post_type);

		if (isset($post_type_obj->menu_icon)){
			return $post_type_obj->menu_icon;
		}
		else {
			return 'dashicons-admin-site';
		}

	}

	public function __get($name){

		$method_name = 'get_' . $name;

		if (method_exists($this, $method_name)){
			return $this->$method_name();
		}

	}

}


