<?php

////////////
// People //
////////////

add_action('cmb2_admin_init', 'person_name_metabox');

function person_name_metabox(){

	$prefix = CPT_PREFIX . 'person_';

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

add_action('cmb2_admin_init', 'person_address_metabox');

function person_address_metabox(){

	$prefix = CPT_PREFIX . 'person_';

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
			"United States", "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"
		)
	));

}

add_action('cmb2_admin_init', 'person_notes_metabox');

function person_notes_metabox(){

	$prefix = CPT_PREFIX . 'person_';

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
			'group_title' => 'Notes',
			'add_button' => '+ New Note',
			'remove_button' => '- Remove Note'
		)
	));

	$cmb2->add_group_field($group_field_id, array(
		'name' => 'Contents',
		'id' => 'contents',
		'type' => 'textarea'
	));

}

add_action('cmb2_admin_init', 'person_metabox');

function person_metabox(){

	$prefix = CPT_PREFIX . 'person_';

	$cmb2 = new_cmb2_box( array(
		'id' => $prefix . 'metabox',
		'title' => 'Person Fields',
		'object_types' => array('contact'),
	) );

	$cmb2->add_field(array(
		'id' => $prefix . 'job_title',
		'name' => 'Job Title',
		'type' => 'text'
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
		'id' => $prefix . 'email',
		'name' => 'Email Address',
		'type' => 'text_email'
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

add_action('cmb2_admin_init', 'person_optout_metabox');

function person_optout_metabox(){

	$prefix = CPT_PREFIX . 'person_';

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