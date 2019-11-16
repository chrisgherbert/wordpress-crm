<?php

class CrmPerson extends CrmPost {

	public function get_first_name(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'first_name');
	}

	public function get_last_name(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'last_name');
	}

	public function get_middle_name(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'middle_name');
	}

	public function get_honorific(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'honorific');
	}

	public function get_suffix(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'suffix');
	}

	public function get_professional_suffix(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'professional_suffix');
	}

	public function get_maiden_name(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'maiden_name');
	}

	public function get_address_1(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'address_1');
	}

	public function get_address_2(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'address_2');
	}

	public function get_city(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'city');
	}

	public function get_state(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'state');
	}

	public function get_zip(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'zip');
	}

	public function get_country(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'country');
	}

	public function get_notes(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'notes');
	}

	public function get_job_title(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'job_title');
	}

	public function get_phone_mobile(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'phone_mobile');
	}

	public function get_phone_work(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'phone_work');
	}

	public function get_phone_home(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'phone_home');
	}

	public function get_fax(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'fax');
	}

	public function get_email(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'email');
	}

	public function get_facebook_url(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'facebook_url');
	}

	public function get_twitter_url(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'twitter_url');
	}

	public function get_linkedin_url(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'linkedin_url');
	}

	public function get_personal_website_url(){
		return $this->get_cmb_meta($this->custom_field_prefix . 'personal_website_url');
	}

	/////////////
	// Aliases //
	/////////////

	// @codeCoverageIgnoreStart

	public function first_name(){
		return $this->get_first_name();
	}

	public function last_name(){
		return $this->get_last_name();
	}

	public function middle_name(){
		return $this->get_middle_name();
	}

	public function honorific(){
		return $this->get_honorific();
	}

	public function suffix(){
		return $this->get_suffix();
	}

	public function professional_suffix(){
		return $this->get_professional_suffix();
	}

	public function maiden_name(){
		return $this->get_maiden_name();
	}

	public function address_1(){
		return $this->get_address_1();
	}

	public function address_2(){
		return $this->get_address_2();
	}

	public function city(){
		return $this->get_city();
	}

	public function state(){
		return $this->get_state();
	}

	public function zip(){
		return $this->get_zip();
	}

	public function country(){
		return $this->get_country();
	}

	public function notes(){
		return $this->get_notes();
	}

	public function job_title(){
		return $this->get_job_title();
	}

	public function phone_mobile(){
		return $this->get_phone_mobile();
	}

	public function phone_work(){
		return $this->get_phone_work();
	}

	public function phone_home(){
		return $this->get_phone_home();
	}

	public function fax(){
		return $this->get_fax();
	}

	public function email(){
		return $this->get_email();
	}

	public function facebook_url(){
		return $this->get_facebook_url();
	}

	public function twitter_url(){
		return $this->get_twitter_url();
	}

	public function linkedin_url(){
		return $this->get_linkedin_url();
	}

	public function personal_website_url(){
		return $this->get_personal_website_url();
	}

	// @codeCoverageIgnoreEnd

}