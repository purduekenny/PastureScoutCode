<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
	<ul>
		<li><?php echo form_label('Password', $password['id']); ?></li>
		<li><?php echo form_password($password); ?></li>
		<li style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></li>
		<li><?php echo form_label('New email address', $email['id']); ?></li>
		<li><?php echo form_input($email); ?></li>
		<li style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></li>
	</ul>
<?php echo form_submit('change', 'Send confirmation email'); ?>
<?php echo form_close(); ?>