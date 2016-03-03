<?php

class CrmOrganization extends CrmEntity {

	public $custom_field_prefix = 'crm_organization_';

	////////////////
	// Taxonomies //
	////////////////

	public function get_industries(){
		return $this->get_terms('industry');
	}

	/////////////////////
	// P2P Connections //
	/////////////////////

	public function get_contacts($number = -1){

		$query = $this->p2p_adapter->get_connected_objects(
			$this->ID,
			'contact_to_organization',
			'any',
			$number
		);

		// Order by last name
		$query['meta_key'] = 'crm_contact_last_name';
		$query['orderby'] = 'meta_value';
		$query['order'] = 'ASC';

		return CrmQueries::get_posts($query);

	}

	public function get_contact_job_title($contact_id){

		return $this->p2p_adapter->get_connection_meta(
			$contact_id,
			$this->ID,
			'contact_to_organization',
			'job_title'
		);

	}

	public function get_security_groups($number = -1){

		$query = $this->p2p_adpater->get_connected_objects(
			$this->ID,
			'content_to_security_group',
			'any',
			$number
		);

		return CrmQueries::get_posts($query);

	}

	public function get_subtitle(){

		$parts = array();

		if ($this->get_type()){
			$parts[] = $this->get_type();
		}

		if ($this->get_size()){
			$parts[] = $this->get_size();
		}

		if ($this->get_industries_links()){
			$parts[] = $this->get_industries_links();
		}

		if ($parts){
			return implode(', ', $parts);
		}

	}

	// Organization Information

	public function get_basic_info_array(){

		$info_types = array(
			'Phone' => $this->get_phone(),
			'Address' => $this->get_address_string(),
			'Industries' => $this->get_industries_links(),
			'Type' => $this->get_type(),
			'Non-Profit Status' => $this->get_status(),
			'Size' => $this->get_size()
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
			'Address 1' => $this->get_address_1(),
			'Address 2' => $this->get_address_2(),
			'City' => $this->get_city(),
			'State' => $this->get_state(),
			'ZIP Code' => $this->get_zip_code(),
			'Country' => $this->get_country()
		);

	}

	/////////////////////////
	// Simple CMB2 Getters //
	/////////////////////////

	public function get_type(){
		return $this->get_cmb2_meta('type');
	}

	public function get_size(){
		return $this->get_cmb2_meta('size');
	}

	public function get_phone(){
		return $this->get_cmb2_meta('phone');
	}

	public function get_website(){
		return $this->get_cmb2_meta('website');
	}

	//////////////////////////
	// Link/String Builders //
	//////////////////////////

	public function get_industries_links(){

		$industries = $this->get_terms('industry');

		return $this->create_terms_links_string($industries);

	}

}

