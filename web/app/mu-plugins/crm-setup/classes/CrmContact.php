<?php

class CrmContact extends CrmEntity {

	public $custom_field_prefix = 'crm_contact_';

	public function get_basic_info_array(){

		$info_types = array(
			'Job Title' => $this->get_job_title(),
			'Email Address' => $this->get_email() ? '<a href="mailto:' . $this->get_email() . '">' . $this->get_email() . '</a>': false,
			'Address' => $this->get_address_string()
		);

		$parts = array();

		foreach ($info_types as $key=>$value){

			if ($value){
				$parts[$key] = $value;
			}

		}

		if ($parts){
			return $parts;
		}

	}

	public function get_extended_info_array(){

		$info_types = array(
			'Honorific' => $this->get_honorific(),
			'First Name' => $this->get_first_name(),
			'Last Name' => $this->get_last_name(),
			'Middle Name' => $this->get_middle_name(),
			'Maiden Name' => $this->get_maiden_name(),
			'Nickname' => $this->get_nickname(),
			'Suffix' => $this->get_suffix(),
			'Professional Suffix' => $this->get_professional_suffix(),
			'Fax' => $this->get_fax(),
			'Phone (cell)' =>  $this->get_phone_mobile(),
			'Phone (office)' =>  $this->get_phone_work(),
			'Phone (home)' =>  $this->get_phone_home(),
			'Fax' =>  $this->get_fax(),
			'Facebook' => $this->get_facebook_url() ? '<a target="_blank" href="' . $this->get_facebook_url() . '">' . $this->get_facebook_url() . '</a>' : false,
			'Twitter' => $this->get_twitter_url() ? '<a target="_blank" href="' . $this->get_twitter_url() . '">' . $this->get_twitter_url() . '</a>' : false,
			'LinkedIn' =>  $this->get_linkedin_url() ? '<a target="_blank" href="' . $this->get_linkedin_url() . '">' . $this->get_linkedin_url() . '</a>' : false,
			'Personal Website' => $this->get_personal_website_url() ? '<a target="_blank" href="' . $this->get_personal_website_url() . '">' . $this->get_personal_website_url() . '</a>' : false,
		);

		$parts = array();

		foreach ($info_types as $key=>$value){

			if ($value){
				$parts[$key] = $value;
			}

		}

		if ($parts){
			return $parts;
		}

	}

	public function get_title(){
		return $this->get_name();
	}

	public function get_name(){

		$parts = array();

		if ($this->get_honorific() && $this->should_include_honorific()){
			$parts[] = $this->get_honorific();
		}

		if ($this->get_first_name()){
			$parts[] = $this->get_first_name();
		}

		if ($this->get_nickname()){
			$nickname = $this->get_nickname();
			$parts[] = '"' . $nickname . '"';
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

	public function get_job_title(){

		$organizations = $this->get_organizations();

		if ($organizations && count($organizations) == 1){
			return $this->get_organization_job_title($organizations[0]->ID);
		}
		else {
			return 'Multiple job titles found';
		}

	}

	public function get_subtitle(){

		$organizations = $this->get_organizations();

		if ($organizations){

			$parts = array();

			foreach ($organizations as $organization){

				$string = '<a href="' . $organization->get_link() . '">' . $organization . '</a>';

				$title = $this->get_organization_job_title($organization->ID);

				if ($title){
					$string = "$title at $string";
				}

				$parts[] = $string;

			}

			if ($parts){
				return implode(', ', $parts);
			}

		}

	}

	/**
	 * Check if the contact's honorific should be included when showing their 
	 * names in standard contexts (eg, Dr., Sen., etc.)
	 * @return bool True if it should be included
	 */
	public function should_include_honorific(){

		$included_honorifics = array(
			'Dr.',
			'Rep.',
			'Hon.',
			'Sen.',
			'Del.',
			'Sir'
		);

		if ($this->get_honorific() && in_array($this->get_honorific(), $included_honorifics)){
			return true;
		}
		else {
			return false;
		}

	}

	// Simple meta data fields

	public function get_notes(){
		return $this->get_cmb2_meta('notes');
	}

	public function get_first_name(){
		return $this->get_cmb2_meta('first_name');
	}

	public function get_last_name(){
		return $this->get_cmb2_meta('last_name');
	}

	public function get_nickname(){
		return $this->get_cmb2_meta('nickname');
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

	/////////////////////
	// P2P Connections //
	/////////////////////

	/**
	 * Get connected organizations
	 * @param  integer $number Number of connected organizations to get
	 * @return array           Connected CrmOrganization objects
	 */
	public function get_organizations($number = -1){

		$query = $this->p2p_adapter->get_connected_objects(
			$this->ID,
			'contact_to_organization',
			'any',
			$number
		);

		// Sort by title
		$query['orderby'] = 'title';
		$query['order'] = 'ASC';

		return CrmQueries::get_posts($query);

	}

	/**
	 * Get the contact's job title for a specific organization
	 * @param  int    $org_post_id Organization's post ID
	 * @return string|null         Job title for organization
	 */
	public function get_organization_job_title($org_post_id){

		return $this->p2p_adapter->get_connection_meta(
			$this->ID,
			$org_post_id,
			'contact_to_organization',
			'job_title'
		);

	}

	public function get_organization_current($org_post_id){
		// to do
	}

	/**
	 * Check if contact is an organization's primary contact
	 * @param  int     $org_post_id Organization post ID
	 * @return bool                 True if the primary contact
	 */
	public function is_organization_primary_contact($org_post_id){

		$primary =  $this->p2p_adapter->get_connection_meta(
			$this->ID,
			$org_post_id,
			'contact_to_organization',
			'primary'
		);

		if ($primary){
			return true;
		}
		else {
			return false;
		}

	}

	//////////////////////////
	// Link/String Builders //
	//////////////////////////

	public function get_organizations_links(){

		$organizations = $this->get_organizations();

		return $this->create_posts_links_string($organizations);

	}

}


