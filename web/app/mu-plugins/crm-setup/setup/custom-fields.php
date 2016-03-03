<?php

///////////////////
// Organizations //
///////////////////

add_action('cmb2_admin_init', 'organization_metabox');

function organization_metabox(){

	$prefix = CPT_PREFIX . 'organization_';

	$cmb2 = new_cmb2_box(array(
		'id' => $prefix . 'metabox',
		'title' => 'Organization Fields',
		'object_types' => array('organization')
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'website',
		'name' => 'Website',
		'type' => 'text_url'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'phone',
		'name' => 'Phone Number',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'type',
		'name' => 'Type',
		'type' => 'Select',
		'options' => array(
			'' => 'Choose',
			'For-Profit' => 'For-Profit',
			'Non-Profit' => 'Non-Profit',
			'Trade Association' => 'Trade Association',
			'Foundation' => 'Foundation',
		)
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'nonprofit_type',
		'name' => 'Non-Profit Type',
		'type' => 'select',
		'options' => array(
			'' => 'Choose Non-Profit Type', '501(c)(1)' => '501(c)(1)','501(c)(2)' => '501(c)(2)','501(c)(3)' => '501(c)(3)','501(c)(4)' => '501(c)(4)','501(c)(5)' => '501(c)(5)','501(c)(6)' => '501(c)(6)','501(c)(7)' => '501(c)(7)','501(c)(8)' => '501(c)(8)','501(c)(9)' => '501(c)(9)','501(c)(10)' => '501(c)(10)','501(c)(11)' => '501(c)(11)','501(c)(12)' => '501(c)(12)','501(c)(13)' => '501(c)(13)','501(c)(14)' => '501(c)(14)','501(c)(15)' => '501(c)(15)','501(c)(16)' => '501(c)(16)','501(c)(17)' => '501(c)(17)','501(c)(18)' => '501(c)(18)','501(c)(19)' => '501(c)(19)','501(c)(20)' => '501(c)(20)','501(c)(21)' => '501(c)(21)','501(c)(22)' => '501(c)(22)','501(c)(23)' => '501(c)(23)','501(c)(24)' => '501(c)(24)','501(c)(25)' => '501(c)(25)','501(c)(26)' => '501(c)(26)','501(c)(27)' => '501(c)(27)','501(c)(28)' => '501(c)(28)','501(c)(29)' => '501(c)(29)',
		)
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'size',
		'name' => 'Organization Size',
		'type' => 'select',
		'options' => array(
			'' => 'Choose Size',
			'1-10 employees' => '1-10 employees',
			'11-50 employees' => '11-50 employees',
			'51-200 employees' => '51-200 employees',
			'201-500 employees' => '201-500 employees',
			'501-1000 employees' => '501-1000 employees',
			'1001-5000 employees' => '1001-5000 employees',
			'5001-10,000 employees' => '5001-10,000 employees',
			'10,001+ employees' => '10,001+ employees',
		)
	));

}

add_action('cmb2_admin_init', 'organization_address_metabox');

function organization_address_metabox(){

	$prefix = CPT_PREFIX . 'organization_';

	$cmb2 = new_cmb2_box(array(
		'id' => $prefix . 'address_metabox',
		'title' => 'Address',
		'object_types' => array('organization')
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'address_1',
		'name' => 'Address 1',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'address_2',
		'name' => 'Address 2',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'city',
		'name' => 'City',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'state',
		'name' => 'State',
		'type' => 'select',
		'options' => array('' => 'Select State', 'AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','DC'=>'District of Columbia','FL'=>'Florida','GA'=>'Georgia','HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland','MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri','MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont','VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming')
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'zip',
		'name' => 'Zip Code',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'country',
		'name' => 'Country',
		'type' => 'select',
		'options' => array(
			"United States" => "United States", "Afghanistan" => "Afghanistan","Aland Islands" => "Aland Islands","Albania" => "Albania","Algeria" => "Algeria","American Samoa" => "American Samoa","Andorra" => "Andorra","Angola" => "Angola","Anguilla" => "Anguilla","Antarctica" => "Antarctica","Antigua" => "Antigua","Argentina" => "Argentina","Armenia" => "Armenia","Aruba" => "Aruba","Australia" => "Australia","Austria" => "Austria","Azerbaijan" => "Azerbaijan","Bahamas" => "Bahamas","Bahrain" => "Bahrain","Bangladesh" => "Bangladesh","Barbados" => "Barbados","Barbuda" => "Barbuda","Belarus" => "Belarus","Belgium" => "Belgium","Belize" => "Belize","Benin" => "Benin","Bermuda" => "Bermuda","Bhutan" => "Bhutan","Bolivia" => "Bolivia","Bosnia" => "Bosnia","Botswana" => "Botswana","Bouvet Island" => "Bouvet Island","Brazil" => "Brazil","British Indian Ocean Trty." => "British Indian Ocean Trty.","Brunei Darussalam" => "Brunei Darussalam","Bulgaria" => "Bulgaria","Burkina Faso" => "Burkina Faso","Burundi" => "Burundi","Caicos Islands" => "Caicos Islands","Cambodia" => "Cambodia","Cameroon" => "Cameroon","Canada" => "Canada","Cape Verde" => "Cape Verde","Cayman Islands" => "Cayman Islands","Central African Republic" => "Central African Republic","Chad" => "Chad","Chile" => "Chile","China" => "China","Christmas Island" => "Christmas Island","Cocos (Keeling) Islands" => "Cocos (Keeling) Islands","Colombia" => "Colombia","Comoros" => "Comoros","Congo" => "Congo","Congo, Democratic Republic of the" => "Congo, Democratic Republic of the","Cook Islands" => "Cook Islands","Costa Rica" => "Costa Rica","Cote d'Ivoire" => "Cote d'Ivoire","Croatia" => "Croatia","Cuba" => "Cuba","Cyprus" => "Cyprus","Czech Republic" => "Czech Republic","Denmark" => "Denmark","Djibouti" => "Djibouti","Dominica" => "Dominica","Dominican Republic" => "Dominican Republic","Ecuador" => "Ecuador","Egypt" => "Egypt","El Salvador" => "El Salvador","Equatorial Guinea" => "Equatorial Guinea","Eritrea" => "Eritrea","Estonia" => "Estonia","Ethiopia" => "Ethiopia","Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)","Faroe Islands" => "Faroe Islands","Fiji" => "Fiji","Finland" => "Finland","France" => "France","French Guiana" => "French Guiana","French Polynesia" => "French Polynesia","French Southern Territories" => "French Southern Territories","Futuna Islands" => "Futuna Islands","Gabon" => "Gabon","Gambia" => "Gambia","Georgia" => "Georgia","Germany" => "Germany","Ghana" => "Ghana","Gibraltar" => "Gibraltar","Greece" => "Greece","Greenland" => "Greenland","Grenada" => "Grenada","Guadeloupe" => "Guadeloupe","Guam" => "Guam","Guatemala" => "Guatemala","Guernsey" => "Guernsey","Guinea" => "Guinea","Guinea-Bissau" => "Guinea-Bissau","Guyana" => "Guyana","Haiti" => "Haiti","Heard" => "Heard","Herzegovina" => "Herzegovina","Holy See" => "Holy See","Honduras" => "Honduras","Hong Kong" => "Hong Kong","Hungary" => "Hungary","Iceland" => "Iceland","India" => "India","Indonesia" => "Indonesia","Iran (Islamic Republic of)" => "Iran (Islamic Republic of)","Iraq" => "Iraq","Ireland" => "Ireland","Isle of Man" => "Isle of Man","Israel" => "Israel","Italy" => "Italy","Jamaica" => "Jamaica","Jan Mayen Islands" => "Jan Mayen Islands","Japan" => "Japan","Jersey" => "Jersey","Jordan" => "Jordan","Kazakhstan" => "Kazakhstan","Kenya" => "Kenya","Kiribati" => "Kiribati","Korea" => "Korea","Korea (Democratic)" => "Korea (Democratic)","Kuwait" => "Kuwait","Kyrgyzstan" => "Kyrgyzstan","Lao" => "Lao","Latvia" => "Latvia","Lebanon" => "Lebanon","Lesotho" => "Lesotho","Liberia" => "Liberia","Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya","Liechtenstein" => "Liechtenstein","Lithuania" => "Lithuania","Luxembourg" => "Luxembourg","Macao" => "Macao","Macedonia" => "Macedonia","Madagascar" => "Madagascar","Malawi" => "Malawi","Malaysia" => "Malaysia","Maldives" => "Maldives","Mali" => "Mali","Malta" => "Malta","Marshall Islands" => "Marshall Islands","Martinique" => "Martinique","Mauritania" => "Mauritania","Mauritius" => "Mauritius","Mayotte" => "Mayotte","McDonald Islands" => "McDonald Islands","Mexico" => "Mexico","Micronesia" => "Micronesia","Miquelon" => "Miquelon","Moldova" => "Moldova","Monaco" => "Monaco","Mongolia" => "Mongolia","Montenegro" => "Montenegro","Montserrat" => "Montserrat","Morocco" => "Morocco","Mozambique" => "Mozambique","Myanmar" => "Myanmar","Namibia" => "Namibia","Nauru" => "Nauru","Nepal" => "Nepal","Netherlands" => "Netherlands","Netherlands Antilles" => "Netherlands Antilles","Nevis" => "Nevis","New Caledonia" => "New Caledonia","New Zealand" => "New Zealand","Nicaragua" => "Nicaragua","Niger" => "Niger","Nigeria" => "Nigeria","Niue" => "Niue","Norfolk Island" => "Norfolk Island","Northern Mariana Islands" => "Northern Mariana Islands","Norway" => "Norway","Oman" => "Oman","Pakistan" => "Pakistan","Palau" => "Palau","Palestinian Territory, Occupied" => "Palestinian Territory, Occupied","Panama" => "Panama","Papua New Guinea" => "Papua New Guinea","Paraguay" => "Paraguay","Peru" => "Peru","Philippines" => "Philippines","Pitcairn" => "Pitcairn","Poland" => "Poland","Portugal" => "Portugal","Principe" => "Principe","Puerto Rico" => "Puerto Rico","Qatar" => "Qatar","Reunion" => "Reunion","Romania" => "Romania","Russian Federation" => "Russian Federation","Rwanda" => "Rwanda","Saint Barthelemy" => "Saint Barthelemy","Saint Helena" => "Saint Helena","Saint Kitts" => "Saint Kitts","Saint Lucia" => "Saint Lucia","Saint Martin (French part)" => "Saint Martin (French part)","Saint Pierre" => "Saint Pierre","Saint Vincent" => "Saint Vincent","Samoa" => "Samoa","San Marino" => "San Marino","Sao Tome" => "Sao Tome","Saudi Arabia" => "Saudi Arabia","Senegal" => "Senegal","Serbia" => "Serbia","Seychelles" => "Seychelles","Sierra Leone" => "Sierra Leone","Singapore" => "Singapore","Slovakia" => "Slovakia","Slovenia" => "Slovenia","Solomon Islands" => "Solomon Islands","Somalia" => "Somalia","South Africa" => "South Africa","South Georgia" => "South Georgia","South Sandwich Islands" => "South Sandwich Islands","Spain" => "Spain","Sri Lanka" => "Sri Lanka","Sudan" => "Sudan","Suriname" => "Suriname","Svalbard" => "Svalbard","Swaziland" => "Swaziland","Sweden" => "Sweden","Switzerland" => "Switzerland","Syrian Arab Republic" => "Syrian Arab Republic","Taiwan" => "Taiwan","Tajikistan" => "Tajikistan","Tanzania" => "Tanzania","Thailand" => "Thailand","The Grenadines" => "The Grenadines","Timor-Leste" => "Timor-Leste","Tobago" => "Tobago","Togo" => "Togo","Tokelau" => "Tokelau","Tonga" => "Tonga","Trinidad" => "Trinidad","Tunisia" => "Tunisia","Turkey" => "Turkey","Turkmenistan" => "Turkmenistan","Turks Islands" => "Turks Islands","Tuvalu" => "Tuvalu","Uganda" => "Uganda","Ukraine" => "Ukraine","United Arab Emirates" => "United Arab Emirates","United Kingdom" => "United Kingdom","United States" => "United States","Uruguay" => "Uruguay","US Minor Outlying Islands" => "US Minor Outlying Islands","Uzbekistan" => "Uzbekistan","Vanuatu" => "Vanuatu","Vatican City State" => "Vatican City State","Venezuela" => "Venezuela","Vietnam" => "Vietnam","Virgin Islands (British)" => "Virgin Islands (British)","Virgin Islands (US)" => "Virgin Islands (US)","Wallis" => "Wallis","Western Sahara" => "Western Sahara","Yemen" => "Yemen","Zambia" => "Zambia","Zimbabwe" => "Zimbabwe",
		)
	));

}

//////////////
// Contacts //
//////////////

add_action('cmb2_admin_init', 'contact_name_metabox');

function contact_name_metabox(){

	$prefix = CPT_PREFIX . 'contact_';

	$cmb2 = new_cmb2_box( array(
		'id' => $prefix . 'name_metabox',
		'title' => 'Name Fields',
		'object_types' => array('contact'),
	) );

	$cmb2->add_field(array(
		'id' => $prefix . 'first_name',
		'name' => 'First Name',
		'type' => 'text',
		'attributes' => array(
			'autofocus' => 'autofocus'
		)
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'last_name',
		'name' => 'Last Name',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'nickname',
		'name' => 'Nickname',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'middle_name',
		'name' => 'Middle Name',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'honorific',
		'name' => 'Honorific',
		'type' => 'select',
		'options' => array(
			'' => 'Choose',
			'Mr.' => 'Mr.',
			'Ms.' => 'Ms.',
			'Mrs.' => 'Mrs.',
			'Miss' => 'Miss',
			'Dr.' => 'Dr.',
			'Hon.' => 'Hon.',
			'Rep.' => 'Rep.',
			'Sen.' => 'Sen.',
			'Del.' => 'Del.',
			'Sir' => 'Sir',
		)
	));

	$cmb2->add_field(array(
		'id' => $prefix .'suffix',
		'name' => 'Suffix',
		'type' => 'select',
		'options' => array(
			'' => 'Choose',
			'Jr.' => 'Jr.',
			'Sr.' => 'Sr.',
			'II' => 'II',
			'III' => 'III',
			'IV' => 'IV',
		)
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'professional_suffix',
		'name' => 'Professional Suffix',
		'type' => 'select',
		'options' => array(
			'' => 'Choose',
			'LL.D.' => 'LL.D.',
			'Ph.D.' => 'Ph.D.',
			'M.D.' => 'M.D.',
			'R.N.' => 'R.N.',
			'Ed.D.' => 'Ed.D.',
			'D.D.S.' => 'D.D.S.',
			'D.M.D.' => 'D.M.D.',
			'CPA' => 'CPA',
			'Esq' => 'Esq',
			'JD' => 'JD',
		)
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'maiden_name',
		'name' => 'Maiden Name',
		'type' => 'text'
	));

}

add_action('cmb2_admin_init', 'contact_address_metabox');

function contact_address_metabox(){

	$prefix = CPT_PREFIX . 'contact_';

	$cmb2 = new_cmb2_box(array(
		'id' => $prefix . 'address_metabox',
		'title' => 'Address',
		'object_types' => array('contact')
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'address_1',
		'name' => 'Address 1',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'address_2',
		'name' => 'Address 2',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'city',
		'name' => 'City',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'state',
		'name' => 'State',
		'type' => 'select',
		'options' => array('' => 'Select State', 'AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California','CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','DC'=>'District of Columbia','FL'=>'Florida','GA'=>'Georgia','HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa','KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland','MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri','MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey','NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio','OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina','SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont','VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming')
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'zip',
		'name' => 'Zip Code',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'country',
		'name' => 'Country',
		'type' => 'select',
		'options' => array(
			"United States" => "United States", "Afghanistan" => "Afghanistan","Aland Islands" => "Aland Islands","Albania" => "Albania","Algeria" => "Algeria","American Samoa" => "American Samoa","Andorra" => "Andorra","Angola" => "Angola","Anguilla" => "Anguilla","Antarctica" => "Antarctica","Antigua" => "Antigua","Argentina" => "Argentina","Armenia" => "Armenia","Aruba" => "Aruba","Australia" => "Australia","Austria" => "Austria","Azerbaijan" => "Azerbaijan","Bahamas" => "Bahamas","Bahrain" => "Bahrain","Bangladesh" => "Bangladesh","Barbados" => "Barbados","Barbuda" => "Barbuda","Belarus" => "Belarus","Belgium" => "Belgium","Belize" => "Belize","Benin" => "Benin","Bermuda" => "Bermuda","Bhutan" => "Bhutan","Bolivia" => "Bolivia","Bosnia" => "Bosnia","Botswana" => "Botswana","Bouvet Island" => "Bouvet Island","Brazil" => "Brazil","British Indian Ocean Trty." => "British Indian Ocean Trty.","Brunei Darussalam" => "Brunei Darussalam","Bulgaria" => "Bulgaria","Burkina Faso" => "Burkina Faso","Burundi" => "Burundi","Caicos Islands" => "Caicos Islands","Cambodia" => "Cambodia","Cameroon" => "Cameroon","Canada" => "Canada","Cape Verde" => "Cape Verde","Cayman Islands" => "Cayman Islands","Central African Republic" => "Central African Republic","Chad" => "Chad","Chile" => "Chile","China" => "China","Christmas Island" => "Christmas Island","Cocos (Keeling) Islands" => "Cocos (Keeling) Islands","Colombia" => "Colombia","Comoros" => "Comoros","Congo" => "Congo","Congo, Democratic Republic of the" => "Congo, Democratic Republic of the","Cook Islands" => "Cook Islands","Costa Rica" => "Costa Rica","Cote d'Ivoire" => "Cote d'Ivoire","Croatia" => "Croatia","Cuba" => "Cuba","Cyprus" => "Cyprus","Czech Republic" => "Czech Republic","Denmark" => "Denmark","Djibouti" => "Djibouti","Dominica" => "Dominica","Dominican Republic" => "Dominican Republic","Ecuador" => "Ecuador","Egypt" => "Egypt","El Salvador" => "El Salvador","Equatorial Guinea" => "Equatorial Guinea","Eritrea" => "Eritrea","Estonia" => "Estonia","Ethiopia" => "Ethiopia","Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)","Faroe Islands" => "Faroe Islands","Fiji" => "Fiji","Finland" => "Finland","France" => "France","French Guiana" => "French Guiana","French Polynesia" => "French Polynesia","French Southern Territories" => "French Southern Territories","Futuna Islands" => "Futuna Islands","Gabon" => "Gabon","Gambia" => "Gambia","Georgia" => "Georgia","Germany" => "Germany","Ghana" => "Ghana","Gibraltar" => "Gibraltar","Greece" => "Greece","Greenland" => "Greenland","Grenada" => "Grenada","Guadeloupe" => "Guadeloupe","Guam" => "Guam","Guatemala" => "Guatemala","Guernsey" => "Guernsey","Guinea" => "Guinea","Guinea-Bissau" => "Guinea-Bissau","Guyana" => "Guyana","Haiti" => "Haiti","Heard" => "Heard","Herzegovina" => "Herzegovina","Holy See" => "Holy See","Honduras" => "Honduras","Hong Kong" => "Hong Kong","Hungary" => "Hungary","Iceland" => "Iceland","India" => "India","Indonesia" => "Indonesia","Iran (Islamic Republic of)" => "Iran (Islamic Republic of)","Iraq" => "Iraq","Ireland" => "Ireland","Isle of Man" => "Isle of Man","Israel" => "Israel","Italy" => "Italy","Jamaica" => "Jamaica","Jan Mayen Islands" => "Jan Mayen Islands","Japan" => "Japan","Jersey" => "Jersey","Jordan" => "Jordan","Kazakhstan" => "Kazakhstan","Kenya" => "Kenya","Kiribati" => "Kiribati","Korea" => "Korea","Korea (Democratic)" => "Korea (Democratic)","Kuwait" => "Kuwait","Kyrgyzstan" => "Kyrgyzstan","Lao" => "Lao","Latvia" => "Latvia","Lebanon" => "Lebanon","Lesotho" => "Lesotho","Liberia" => "Liberia","Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya","Liechtenstein" => "Liechtenstein","Lithuania" => "Lithuania","Luxembourg" => "Luxembourg","Macao" => "Macao","Macedonia" => "Macedonia","Madagascar" => "Madagascar","Malawi" => "Malawi","Malaysia" => "Malaysia","Maldives" => "Maldives","Mali" => "Mali","Malta" => "Malta","Marshall Islands" => "Marshall Islands","Martinique" => "Martinique","Mauritania" => "Mauritania","Mauritius" => "Mauritius","Mayotte" => "Mayotte","McDonald Islands" => "McDonald Islands","Mexico" => "Mexico","Micronesia" => "Micronesia","Miquelon" => "Miquelon","Moldova" => "Moldova","Monaco" => "Monaco","Mongolia" => "Mongolia","Montenegro" => "Montenegro","Montserrat" => "Montserrat","Morocco" => "Morocco","Mozambique" => "Mozambique","Myanmar" => "Myanmar","Namibia" => "Namibia","Nauru" => "Nauru","Nepal" => "Nepal","Netherlands" => "Netherlands","Netherlands Antilles" => "Netherlands Antilles","Nevis" => "Nevis","New Caledonia" => "New Caledonia","New Zealand" => "New Zealand","Nicaragua" => "Nicaragua","Niger" => "Niger","Nigeria" => "Nigeria","Niue" => "Niue","Norfolk Island" => "Norfolk Island","Northern Mariana Islands" => "Northern Mariana Islands","Norway" => "Norway","Oman" => "Oman","Pakistan" => "Pakistan","Palau" => "Palau","Palestinian Territory, Occupied" => "Palestinian Territory, Occupied","Panama" => "Panama","Papua New Guinea" => "Papua New Guinea","Paraguay" => "Paraguay","Peru" => "Peru","Philippines" => "Philippines","Pitcairn" => "Pitcairn","Poland" => "Poland","Portugal" => "Portugal","Principe" => "Principe","Puerto Rico" => "Puerto Rico","Qatar" => "Qatar","Reunion" => "Reunion","Romania" => "Romania","Russian Federation" => "Russian Federation","Rwanda" => "Rwanda","Saint Barthelemy" => "Saint Barthelemy","Saint Helena" => "Saint Helena","Saint Kitts" => "Saint Kitts","Saint Lucia" => "Saint Lucia","Saint Martin (French part)" => "Saint Martin (French part)","Saint Pierre" => "Saint Pierre","Saint Vincent" => "Saint Vincent","Samoa" => "Samoa","San Marino" => "San Marino","Sao Tome" => "Sao Tome","Saudi Arabia" => "Saudi Arabia","Senegal" => "Senegal","Serbia" => "Serbia","Seychelles" => "Seychelles","Sierra Leone" => "Sierra Leone","Singapore" => "Singapore","Slovakia" => "Slovakia","Slovenia" => "Slovenia","Solomon Islands" => "Solomon Islands","Somalia" => "Somalia","South Africa" => "South Africa","South Georgia" => "South Georgia","South Sandwich Islands" => "South Sandwich Islands","Spain" => "Spain","Sri Lanka" => "Sri Lanka","Sudan" => "Sudan","Suriname" => "Suriname","Svalbard" => "Svalbard","Swaziland" => "Swaziland","Sweden" => "Sweden","Switzerland" => "Switzerland","Syrian Arab Republic" => "Syrian Arab Republic","Taiwan" => "Taiwan","Tajikistan" => "Tajikistan","Tanzania" => "Tanzania","Thailand" => "Thailand","The Grenadines" => "The Grenadines","Timor-Leste" => "Timor-Leste","Tobago" => "Tobago","Togo" => "Togo","Tokelau" => "Tokelau","Tonga" => "Tonga","Trinidad" => "Trinidad","Tunisia" => "Tunisia","Turkey" => "Turkey","Turkmenistan" => "Turkmenistan","Turks Islands" => "Turks Islands","Tuvalu" => "Tuvalu","Uganda" => "Uganda","Ukraine" => "Ukraine","United Arab Emirates" => "United Arab Emirates","United Kingdom" => "United Kingdom","United States" => "United States","Uruguay" => "Uruguay","US Minor Outlying Islands" => "US Minor Outlying Islands","Uzbekistan" => "Uzbekistan","Vanuatu" => "Vanuatu","Vatican City State" => "Vatican City State","Venezuela" => "Venezuela","Vietnam" => "Vietnam","Virgin Islands (British)" => "Virgin Islands (British)","Virgin Islands (US)" => "Virgin Islands (US)","Wallis" => "Wallis","Western Sahara" => "Western Sahara","Yemen" => "Yemen","Zambia" => "Zambia","Zimbabwe" => "Zimbabwe",
		)
	));

}

add_action('cmb2_admin_init', 'contact_metabox');

function contact_metabox(){

	$prefix = CPT_PREFIX . 'contact_';

	$cmb2 = new_cmb2_box( array(
		'id' => $prefix . 'metabox',
		'title' => 'Person Fields',
		'object_types' => array('contact'),
	) );

	$cmb2->add_field(array(
		'id' => $prefix . 'email',
		'name' => 'Email Address',
		'type' => 'text_email'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'phone_mobile',
		'name' => 'Phone (cell)',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'phone_work',
		'name' => 'Phone (work)',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'phone_home',
		'name' => 'Phone (home)',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'fax',
		'name' => 'Fax',
		'type' => 'text'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'facebook_url',
		'name' => 'Facebook URL',
		'type' => 'text_url'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'twitter_url',
		'name' => 'Twitter URL',
		'type' => 'text_url'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'linkedin_url',
		'name' => 'LinkedIn URL',
		'type' => 'text_url'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'personal_website_url',
		'name' => 'Personal Website URL',
		'type' => 'text_url'
	));

}

add_action('cmb2_admin_init', 'contact_optout_metabox');

function contact_optout_metabox(){

	$prefix = CPT_PREFIX . 'contact_';

	$cmb2 = new_cmb2_box( array(
		'id' => $prefix . 'optout_metabox',
		'name' => 'Opt Outs',
		'object_types' => array('contact')
	) );

	$cmb2->add_field(array(
		'id' => $prefix . 'opt_out_mail',
		'name' => 'Never contact via mail',
		'type' => 'checkbox'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'opt_out_email',
		'name' => 'Never contact via email',
		'type' => 'checkbox'
	));

	$cmb2->add_field(array(
		'id' => $prefix . 'opt_out_phone',
		'name' => 'Never contact via phone',
		'type' => 'checkbox'
	));

}

add_action('cmb2_admin_init', 'contact_notes_metabox');

function contact_notes_metabox(){

	$prefix = CPT_PREFIX . 'contact_';

	$cmb2 = new_cmb2_box( array(
		'id' => $prefix . 'notes_metabox',
		'title' => 'Notes',
		'object_types' => array('contact'),
	) );

	$group_field_id = $cmb2->add_field(array(
		'id' => $prefix . 'notes',
		'type' => 'group',
		'description' => 'Notes on the contact',
		'options' => array(
			'group_title' => 'Note',
			'add_button' => '+ New Note',
			'remove_button' => '- Remove Note',
		),
	));

	$cmb2->add_group_field($group_field_id, array(
		// 'name' => 'Contents',
		'id' => 'contents',
		'type' => 'textarea',
		'attributes' => array(
			'class' => 'contact_note_contents',
			'style' => 'width: 100%'
		)
	));

	$cmb2->add_group_field($group_field_id, array(
		'name' => 'User',
		'id' => 'user',
		'type' => 'hidden',
		'attributes' => array(
			'class' => 'contact_note_user',
			'data-current-user' => wp_get_current_user()->display_name
		)
	));

	$cmb2->add_group_field($group_field_id, array(
		'name' => 'Date',
		'id' => 'date',
		'type' => 'hidden',
		'attributes' => array(
			'class' => 'contact_note_date',
			'data-current-date' => date('Y-m-d H:i:s')
		)
	));

}

///////////////////
// Files Metabox //
///////////////////

add_action('cmb2_admin_init', 'files_metabox');

function files_metabox(){

	$prefix = CPT_PREFIX . 'contact_';

	$cmb2 = new_cmb2_box(array(
		'id' => $prefix . 'files_metabox',
		'title' => 'File Attachments',
		'object_types' => array('contact', 'organization')
	));

	$group_field_id = $cmb2->add_field(array(
		'id' => $prefix . 'files',
		'type' => 'group',
		'options' => array(
			'group_title' => 'File',
			'add_button' => 'Add New File',
			'remove_button' => 'Remove file'
		)
	));

	$cmb2->add_group_field($group_field_id, array(
		'id' => 'file',
		'type' => 'file',
		'name' => 'File',
		'options' => array(
			'url' => false
		)
	));

}



