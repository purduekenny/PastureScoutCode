<?php
$name = array(
	'name'	=> 'name',
	'id'	=> 'name',
	'value'	=> set_value('name'),
	'maxlength'	=> 200
);
$location = array(
	'name'	=> 'location',
	'id'	=> 'location',
	'value'	=> set_value('location'),
	'maxlength'	=> 300
);
$region = array(
	'name'	=> 'region',
	'id'	=> 'region',
	'value' => set_value('region'),
	'maxlength'	=> 300
);
$city = array(
	'name'	=> 'city',
	'id'	=> 'city',
	'value' => set_value('city'),
	'maxlength'	=> 100
);
$state = array(
	'name'	=> 'state',
	'id'	=> 'state',
	'value' => set_value('state'),
	'maxlength'	=> 30
);
$country = array(
	'name'	=> 'country',
	'id'	=> 'country',
	'value' => set_value('country'),
	'maxlength'	=> 50
);
$restricted_stock_type = array(
	'name'	=> 'restricted_stock_type',
	'id'	=> 'restricted_stock_type',
	'value' => set_value('restricted_stock_type'),
	'maxlength'	=> 100
);
$max_head_count = array(
	'name'	=> 'max_head_count',
	'id'	=> 'max_head_count',
	'value' => set_value('max_head_count'),
	'maxlength'	=> 100
);
$min_bid = array(
	'name'	=> 'min_bid',
	'id'	=> 'min_bid',
	'value' => set_value('min_bid'),
	'maxlength'	=> 100
);
$opening_bid_date = array(
	'name'	=> 'opening_bid_date',
	'id'	=> 'opening_bid_date',
	'class' => 'datepicker',
	'value' => set_value('opening_bid_date'),
	'maxlength'	=> 100
);
$closing_bid_date = array(
	'name'	=> 'closing_bid_date',
	'id'	=> 'closing_bid_date',
	'class' => 'datepicker',
	'value' => set_value('closing_bid_date'),
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
<?php echo form_open(base_url().'properties/create/') ?>
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
<?php echo form_submit('submit', 'Add Pasture'); ?>
<?php echo form_close(); ?>