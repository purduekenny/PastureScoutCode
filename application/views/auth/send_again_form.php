<?php
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
		<li><?php echo form_label('Email Address', $email['id']); ?></li>
		<li><?php echo form_input($email); ?></li>
		<li style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></li>
	</ul>
<?php echo form_submit('send', 'Send'); ?>
<?php echo form_close(); ?>