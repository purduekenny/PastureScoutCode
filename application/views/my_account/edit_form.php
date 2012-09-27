<?php
$user_id = $this->tank_auth->get_user_id();
$first_name = array(
	'name'	=> 'first_name',
	'id'	=> 'first_name',
	'value' => isset($info[0]['first_name']) ? $info[0]['first_name'] : set_value('first_name'),
	'maxlength'	=> 100
);
$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value' => isset($info[0]['last_name']) ? $info[0]['last_name'] : set_value('last_name'),
	'maxlength'	=> 100
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> isset($info[0]['email']) ? $info[0]['email'] : set_value('email'),
	'maxlength'	=> 80
);
$street = array(
	'name'	=> 'street',
	'id'	=> 'street',
	'value'	=> isset($info[0]['street']) ? $info[0]['street'] : set_value('street'),
	'maxlength'	=> 5
);
$city = array(
	'name'	=> 'city',
	'id'	=> 'city',
	'value'	=> isset($info[0]['city']) ? $info[0]['city'] : set_value('city'),
	'maxlength'	=> 5
);
$state = array(
	'name'	=> 'state',
	'id'	=> 'state',
	'value'	=> isset($info[0]['state']) ? $info[0]['state'] : set_value('state'),
	'maxlength'	=> 5
);
$state_value = isset($info[0]['state']) ? $info[0]['state'] : set_value('state');
$zip_code = array(
	'name'	=> 'zip_code',
	'id'	=> 'zip_code',
	'value'	=> isset($info[0]['zip_code']) ? $info[0]['zip_code'] : set_value('zip_code'),
	'maxlength'	=> 5
);

$birthday = array(
	'name'	=> 'birthday',
	'id'	=> 'birthday',
	'value'	=> isset($info[0]['birthday']) ? $info[0]['birthday'] : set_value('birthday'),
	'maxlength'	=> 5
);

$home_phone = array(
	'name'	=> 'home_phone',
	'id'	=> 'home_phone',
	'value'	=> isset($info[0]['home_phone']) ? $info[0]['home_phone'] : set_value('home_phone'),
	'maxlength'	=> 5
);

$cell_phone = array(
	'name'	=> 'cell_phone',
	'id'	=> 'cell_phone',
	'value'	=> isset($info[0]['cell_phone']) ? $info[0]['cell_phone'] : set_value('cell_phone'),
	'maxlength'	=> 5
);

?>

<div id="edit_account">
<?php echo form_open(base_url().'my_account/edit/'. $user_id); ?>
	<h2>Account Information</h3>
	<ul>
		<li><?php echo form_label('First Name', $first_name['id']); ?></li>
		<li><?php echo form_input($first_name); ?></li>
		<li style="color: red;"><?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?></li>

		<li><?php echo form_label('Last Name', $last_name['id']); ?></li>
		<li><?php echo form_input($last_name); ?></li>
		<li style="color: red;"><?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?></li>

		<li><?php echo form_label('Email Address', $email['id']); ?></li>
		<li><?php echo form_input($email); ?></li>
		<li style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></li>

		<li><?php echo form_label('Mailing Address', $street['id']); ?></li>
		<li><?php echo form_input($street); ?></li>
		<li style="color: red;"><?php echo form_error($street['name']); ?><?php echo isset($errors[$street['name']])?$errors[$street['name']]:''; ?></li>

		<li><?php echo form_label('City', $city['id']); ?></li>
		<li><?php echo form_input($city); ?></li>
		<li style="color: red;"><?php echo form_error($city['name']); ?><?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?></li>

		<li><?php echo form_label('State', $state['id']); ?></li>
		<li><? echo state_dropdown('state', $state_value, 'state','state'); ?></li>
		<li style="color: red;"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></li>

		<li><?php echo form_label('Zip Code', $zip_code['id']); ?></li>
		<li><?php echo form_input($zip_code); ?></li>
		<li style="color: red;"><?php echo form_error($zip_code['name']); ?><?php echo isset($errors[$zip_code['name']])?$errors[$zip_code['name']]:''; ?></li>

		<li><?php echo form_label('Date of Birth', $birthday['id']); ?></li>
		<li><?php echo form_input($birthday); ?></li>
		<li style="color: red;"><?php echo form_error($birthday['name']); ?><?php echo isset($errors[$birthday['name']])?$errors[$birthday['name']]:''; ?></li>

		<li><?php echo form_label('Home Phone', $home_phone['id']); ?></li>
		<li><?php echo form_input($home_phone); ?></li>
		<li style="color: red;"><?php echo form_error($home_phone['name']); ?><?php echo isset($errors[$home_phone['name']])?$errors[$home_phone['name']]:''; ?></li>

		<li><?php echo form_label('Cell Phone', $cell_phone['id']); ?></li>
		<li><?php echo form_input($cell_phone); ?></li>
		<li style="color: red;"><?php echo form_error($cell_phone['name']); ?><?php echo isset($errors[$cell_phone['name']])?$errors[$cell_phone['name']]:''; ?></li>
	</ul>

	<h3>Business Information</h3>
	<ul>
		<li><?php echo form_label('Type of Operation', $operation_type['id']); ?></li>
		<li><?php echo form_input($operation_type); ?></li>
		<li style="color: red;"><?php echo form_error($operation_type['name']); ?><?php echo isset($errors[$operation_type['name']])?$errors[$operation_type['name']]:''; ?></li>
	</ul>
<?php echo form_submit('edit', 'Edit Account'); ?>
<?php echo form_close(); ?>
<a href="<?=base_url() . 'auth/change_password/' . $user_id; ?>">Change your Password</a></br>
<a href="<?=base_url() . 'auth/unregister/' . $user_id; ?>">Delete your Account</a>
<script>
	$("#first_name").focus();
</script>
</div>