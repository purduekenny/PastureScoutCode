<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<ul>
	<li><?php echo form_label($login_label, $login['id']); ?></li>
	<li><?php echo form_input($login); ?></li>
	<li style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></li>
</ul>
<?php echo form_submit('reset', 'Get a new password'); ?>
<?php echo form_close(); ?>