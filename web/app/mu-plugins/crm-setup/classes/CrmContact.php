<?php

class CrmContact Extends CrmPost {

	protected $cmb_fields = array(
		'first_name',
		'last_name',
		'address_1',
		'address_2',
		'city',
		'state',
		'zip',
		'country',
		'email',
		'phone_home',
		'phone_office',
		'phone_cell',
		'job_title',
		'facebook_url',
		'twitter_url',
		'linkedin_url',
		'personal_website_url'
	);

	public function get_cmb2_fields(){

		$parent_fields = parent::get_cmb2_fields();

		$fields = $parent_fields + $cmb_fields;

		if ($fields){
			return $fields;
		}

	}

	/**
	 * Simple metadata accessors
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function __get($key){

		$stripped_key = str_replace('get_', '', $key);

		if ( in_array($stripped_key, $this->cmb_fields) ){
			return get_cmb2_meta('contact_' . $stripped_key);
		}

	}



}