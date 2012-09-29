<?php
$name = array(
	'name'	=> 'name',
	'id'	=> 'name',
	'value'	=> isset($property[0]['name']) ? $property[0]['name'] : set_value('name'),
	'maxlength'	=> 200
);
$location = array(
	'name'	=> 'location',
	'id'	=> 'location',
	'value'	=> isset($property[0]['location']) ? $property[0]['location'] : set_value('location'),
	'maxlength'	=> 300
);
$region = array(
	'name'	=> 'region',
	'id'	=> 'region',
	'value' => isset($property[0]['region']) ? $property[0]['region'] : set_value('region'),
	'maxlength'	=> 300
);
$city = array(
	'name'	=> 'city',
	'id'	=> 'city',
	'value' => isset($property[0]['city']) ? $property[0]['city'] : set_value('city'),
	'maxlength'	=> 100
);
$state_list = array(
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'DC' => 'District Of Columbia',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming'
		);
$state = array(
	'name'	=> 'state',
	'id'	=> 'state',
	'value' => isset($property[0]['state']) ? $property[0]['state'] : set_value('state'),
	'maxlength'	=> 30
);
$country = array(
	'name'	=> 'country',
	'id'	=> 'country',
	'value' => isset($property[0]['country']) ? $property[0]['country'] : set_value('country'),
	'maxlength'	=> 50
);
$restricted_stock_type = array(
	'name'	=> 'restricted_stock_type',
	'id'	=> 'restricted_stock_type',
	'value' => isset($property[0]['restricted_stock_type']) ? $property[0]['restricted_stock_type'] : set_value('restricted_stock_type'),
	'maxlength'	=> 100
);
$max_head_count = array(
	'name'	=> 'max_head_count',
	'id'	=> 'max_head_count',
	'value' => isset($property[0]['max_head_count']) ? $property[0]['max_head_count'] : set_value('max_head_count'),
	'maxlength'	=> 100
);
$min_bid = array(
	'name'	=> 'min_bid',
	'id'	=> 'min_bid',
	'value' => isset($property[0]['min_bid']) ? $property[0]['min_bid'] : set_value('min_bid'),
	'maxlength'	=> 100
);

//if date is set, make date pretty
if(isset($property[0]['opening_bid_date'])){
	// MM/DD/YYYY
	$formatted_opening_bid_date = date('m/d/Y', strtotime($property[0]['opening_bid_date']));
}else{
	set_value('opening_bid_date');
} 

$opening_bid_date = array(
	'name'	=> 'opening_bid_date',
	'id'	=> 'opening_bid_date',
	'class' => 'datepicker',
	'value' => isset($formatted_opening_bid_date),
	'maxlength'	=> 100
);

//if date is set, make date pretty
if(isset($property[0]['closing_bid_date'])){
	// MM/DD/YYYY
	$formatted_closing_bid_date = date('m/d/Y', strtotime($property[0]['closing_bid_date']));
}else{
	set_value('closing_bid_date');
} 

$closing_bid_date = array(
	'name'	=> 'closing_bid_date',
	'id'	=> 'closing_bid_date',
	'class' => 'datepicker',
	'value' => isset($formatted_closing_bid_date),
	'maxlength'	=> 100
);


$other_info = array(
	'name'	=> 'other_info',
	'id'	=> 'other_info',
	'value' => set_value('other_info'),
	'rows'	=> 30,
	'cols'  => 30
);
?>
<?php echo form_open(base_url().'properties/edit/'. isset($property[0]['id'])) ?>
	<ul style="display:inline-block; width: 50%; vertical-align: top;">
		<h2>Enter Description</h2>
		<li><?php echo form_label('Pasture Name', $name['id']); ?></li>
		<li><?php echo form_input($name); ?></li>
		<li style="color: red;"><?php echo form_error($name['name']); ?><?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?></li>

		<li><?php echo form_label('Location', $location['id']); ?></li>
		<li><?php echo form_input($location); ?></li>
		<li style="color: red;"><?php echo form_error($location['name']); ?><?php echo isset($errors[$location['name']])?$errors[$location['name']]:''; ?></li>

		<li><?php echo form_label('Region', $region['id']); ?></li>
		<li><?php echo form_input($region); ?></li>
		<li style="color: red;"><?php echo form_error($region['name']); ?><?php echo isset($errors[$region['name']])?$errors[$region['name']]:''; ?></li>

		<li><?php echo form_label('City', $city['id']); ?></li>
		<li><?php echo form_input($city); ?></li>
		<li style="color: red;"><?php echo form_error($city['name']); ?><?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?></li>

		<li><?php echo form_label('State/Province', $state['id']); ?></li>
		<li><?php echo form_input($state); ?></li>
		<li style="color: red;"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></li>

		<li><?php echo form_label('Country', $country['id']); ?></li>
		<li><?php echo form_input($country); ?></li>
		<li style="color: red;"><?php echo form_error($country['name']); ?><?php echo isset($errors[$country['name']])?$errors[$country['name']]:''; ?></li>

		<h2>(Optional) Stock Restrictions</h2>
		<li><?php echo form_label('Restricted Stock Type', $restricted_stock_type['id']); ?></li>
		<li><?php echo form_input($restricted_stock_type); ?></li>
		<li style="color: red;"><?php echo form_error($restricted_stock_type['name']); ?><?php echo isset($errors[$restricted_stock_type['name']])?$errors[$restricted_stock_type['name']]:''; ?></li>

		<li><?php echo form_label('Min bid', $min_bid['id']); ?></li>
		<li><?php echo form_input($min_bid); ?></li>
		<li style="color: red;"><?php echo form_error($min_bid['name']); ?><?php echo isset($errors[$min_bid['name']])?$errors[$min_bid['name']]:''; ?></li>

		<li><?php echo form_label('Max Head Count', $max_head_count['id']); ?></li>
		<li><?php echo form_input($max_head_count); ?></li>
		<li style="color: red;"><?php echo form_error($max_head_count['name']); ?><?php echo isset($errors[$max_head_count['name']])?$errors[$max_head_count['name']]:''; ?></li>
	</ul>
	<ul style="display:inline-block; width: 49%">
		<h2>Bid Information</h2>
		<li><?php echo form_label('Opening Bid Date', $opening_bid_date['id']); ?></li>
		<li><?php echo form_input($opening_bid_date); ?></li>
		<li style="color: red;"><?php echo form_error($opening_bid_date['name']); ?><?php echo isset($errors[$opening_bid_date['name']])?$errors[$opening_bid_date['name']]:''; ?></li>

		<li><?php echo form_label('Closing Bid Date', $closing_bid_date['id']); ?></li>
		<li><?php echo form_input($closing_bid_date); ?></li>
		<li style="color: red;"><?php echo form_error($closing_bid_date['name']); ?><?php echo isset($errors[$closing_bid_date['name']])?$errors[$closing_bid_date['name']]:''; ?></li>

		<li><?php echo form_label('Other Info', $other_info['id']); ?></li>
		<li><?php echo form_textarea($other_info); ?></li>
		<li style="color: red;"><?php echo form_error($other_info['name']); ?><?php echo isset($errors[$other_info['name']])?$errors[$other_info['name']]:''; ?></li>
	</ul>
<?php echo form_submit('submit', 'Edit Pasture'); ?>
<?php echo form_close(); ?>