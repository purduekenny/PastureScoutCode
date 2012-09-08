<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
	<ul>
		<li><?php echo form_label('Password', $password['id']); ?></li>
		<li><?php echo form_password($password); ?></li>
		<li style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></li>
	</ul>
<?php echo form_submit('cancel', 'Delete account'); ?>
<?php echo form_close(); ?>