<?php

class CrmContact extends CrmEntity {

	public $custom_field_prefix = 'crm_contact_';

	public function get_title(){

		return $this->get_name();

	}

	public function get_name(){

		$parts = array();

		if ($this->get_honorific()){
			$parts[] = $this->get_honorific();
		}

		if ($this->get_first_name()){
			$parts[] = $this->get_first_name();
		}

		if ($this->get_last_name()){
			$parts[] = $this->get_last_name();
		}

		if ($this->get_suffix()){
			$parts[] = $this->get_suffix();
		}

		if ($this->get_professional_suffix()){
			$parts[] = $this->get_professional_suffix();
		}

		if ($parts){
			return implode(' ', $parts);
		}
		else {
			return parent::get_title();
		}

	}

	public function get_notes(){
		return $this->get_cmb2_meta('notes');
	}

	// Simple meta data fields

	public function get_first_name(){
		return $this->get_cmb2_meta('first_name');
	}

	public function get_last_name(){
		return $this->get_cmb2_meta('last_name');
	}

	public function get_middle_name(){
		return $this->get_cmb2_meta('middle_name');
	}

	public function get_maiden_name(){
		return $this->get_cmb2_meta('maiden_name');
	}

	public function get_honorific(){
		return $this->get_cmb2_meta('honorific');
	}

	public function get_suffix(){
		return $this->get_cmb2_meta('suffix');
	}

	public function get_professional_suffix(){
		return $this->get_cmb2_meta('professional_suffix');
	}

	public function get_phone_mobile(){
		return $this->get_cmb2_meta('phone_mobile');
	}

	public function get_phone_work(){
		return $this->get_cmb2_meta('phone_work');
	}

	public function get_phone_home(){
		return $this->get_cmb2_meta('phone_home');
	}

	public function get_fax(){
		return $this->get_cmb2_meta('fax');
	}

	public function get_email(){
		return $this->get_cmb2_meta('email');
	}

	public function get_facebook_url(){
		return $this->get_cmb2_meta('facebook_url');
	}

	public function get_twitter_url(){
		return $this->get_cmb2_meta('twitter_url');
	}

	public function get_linkedin_url(){
		return $this->get_cmb2_meta('linkedin_url');
	}

	public function get_personal_website_url(){
		return $this->get_cmb2_meta('personal_website_url');
	}

	// P2P Connections

	public function get_organizations($number = -1){

		$query = $this->p2p_adapter->get_connected_objects(
			$this->ID,
			'contact_to_organization',
			'any',
			$number
		);

		return CrmQueries::get_posts($query);

	}

}