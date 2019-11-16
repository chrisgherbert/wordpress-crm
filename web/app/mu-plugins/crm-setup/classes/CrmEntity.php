<?php

abstract class CrmEntity extends CrmPost {

	public $google_maps_image_class = 'bermanco\GoogleMapsStaticImage\GoogleMapsStaticImage';

	abstract public function get_basic_info_array();

	abstract public function get_extended_info_array();

	/**
	 * Get address parts as a string
	 * @return string Address
	 */
	public function get_address_string(){

		$parts = array();

		if ($this->get_address_1()){
			$parts[] = $this->get_address_1();
		}

		if ($this->get_address_2()){
			$parts[] = $this->get_address_2();
		}

		if ($this->get_city()){
			$parts[] = $this->get_city();
		}

		if ($this->get_state()){
			$parts[] = $this->get_state();
		}

		if ($this->get_zip()){
			$parts[] = $this->get_zip();
		}

		if ($this->get_country() && $this->get_country() != 'United States'){
			$parts[] = $this->get_country();
		}

		if ($parts){
			return implode(' ', $parts);
		}

	}

	/**
	 * Get link to the address in Google Maps
	 * @return string URL to address on Google Maps
	 */
	public function get_google_maps_link(){

		$address_string = $this->get_address_string();

		if ($address_string){

			$base_url = 'https://maps.google.com';

			$query = http_build_query(array(
				'q' => $address_string
			));

			$url = $base_url . '?' . $query;

			return $url;

		}

	}

	/**
	 * Get URL of a Google Maps static image of the address
	 * @return string  Google Maps static image URL
	 */
	public function get_google_maps_image(){

		$mapmaker = new $this->google_maps_image_class;

		if ($this->get_address_string()){

			if ($this->get_address_1()){
				$mapmaker->set_address_1($this->get_address_1());
			}

			if ($this->get_address_2()){
				$mapmaker->set_address_2($this->get_address_2());
			}

			if ($this->get_city()){
				$mapmaker->set_city($this->get_city());
			}

			if ($this->get_state()){
				$mapmaker->set_state($this->get_state());
			}

			if ($this->get_zip()){
				$mapmaker->set_zip($this->get_zip());
			}

			$mapmaker->set_size('700x300');

			return $mapmaker->get_map_image();

		}

	}

	/**
	 * Get city/state string (ex: "Washington, DC")
	 * @return string City/state, separated by comma
	 */
	public function get_city_state_string(){

		$parts = array();

		if ($this->get_city()){
			$parts[] = $this->get_city();
		}

		if ($this->get_state()){
			$parts[] = $this->get_state();
		}

		if ($parts){
			return implode(', ', $parts);
		}

	}

	public function get_files(){

		$files_meta = $this->get_cmb2_meta('files');

		if ($files_meta){

			$files = array();

			foreach ($files_meta as $file_meta){
				$files[] = new TimberPost($file_meta['file_id']);
			}

			return $files;

		}

	}

	// Simple CMB2 Postmeta Meta Getters

	public function get_address_1(){
		return $this->get_cmb2_meta('address_1');
	}

	public function get_address_2(){
		return $this->get_cmb2_meta('address_2');
	}

	public function get_city(){
		return $this->get_cmb2_meta('city');
	}

	public function get_state(){
		return $this->get_cmb2_meta('state');
	}

	public function get_zip(){
		return $this->get_cmb2_meta('zip');
	}

	public function get_country(){
		return $this->get_cmb2_meta('country');
	}

}