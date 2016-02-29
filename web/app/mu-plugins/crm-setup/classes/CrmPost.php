<?php

class CrmPost extends BasePost {

	protected $font_awesome_icon_class = 'fa-database';

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
				'fa_icon_class' => 'fa-trash'
			);
		}

		if ($this->post_date_gmt == $this->post_modified_gmt){
			return array(
				'text' => 'Deleted',
				'fa_icon_class' => 'fa-plus'
			);
		}

		else {
			return array(
				'text' => 'Edited',
				'fa_icon_class' => 'fa-pencil-square-o'
			);
		}

	}

	/**
	 * Get the Font Awesome class for the post type.
	 * @return string Font Awesome class
	 */
	public function get_font_awesome_icon(){
		return $this->font_awesome_icon_class;
	}

}