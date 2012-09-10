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
$zip_code = array(
	'name'	=> 'zip_code',
	'id'	=> 'zip_code',
	'value'	=> isset($info[0]['zip_code']) ? $info[0]['zip_code'] : set_value('zip_code'),
	'maxlength'	=> 5
);

?>
<?php echo form_open(base_url().'my_account/edit/'. $user_id); ?>
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

		<li><?php echo form_label('Zip Code', $zip_code['id']); ?></li>
		<li><?php echo form_input($zip_code); ?></li>
		<li style="color: red;"><?php echo form_error($zip_code['name']); ?><?php echo isset($errors[$zip_code['name']])?$errors[$zip_code['name']]:''; ?></li>
	</ul>
<?php echo form_submit('edit', 'Edit Account'); ?>
<?php echo form_close(); ?>
<a href="<?=base_url() . 'auth/change_password/' . $user_id; ?>">Change your Password</a></br>
<a href="<?=base_url() . 'auth/unregister/' . $user_id; ?>">Delete your Account</a>
<script>
	$("#first_name").focus();
</script>