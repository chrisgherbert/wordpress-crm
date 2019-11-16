<?php

class CrmUser extends TimberUser {

	public $custom_field_prefix = 'crm_';

	public function get_security_groups(){

		

	}

	public function get_recently_viewed_items_ids(){

		// $ids = $this->

	}

	public function get_recently_viewed_items(){

		$recently_viewed_items = $this->meta();



	}

	public function update_recently_viewed_items($post_id){

		// $recently_viewed_items = $this->

	}

}