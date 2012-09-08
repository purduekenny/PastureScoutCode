<?php
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size' 	=> 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<ul>
		<li><?php echo form_label('New Password', $new_password['id']); ?></li>
		<li><?php echo form_password($new_password); ?></li>
		<li style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></li>
		<li><?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?></li>
		<li><?php echo form_password($confirm_new_password); ?></li>
		<li style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></li>
	</ul>
</table>
<?php echo form_submit('change', 'Change Password'); ?>
<?php echo form_close(); ?>