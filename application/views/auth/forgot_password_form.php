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
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

<div class="container-fluid">
<div class="row-fluid">
<div class="span12 content">

<h2 id="login_text">Request a New Password</h2>
	<div class="control-group">
	
		<?php echo form_label($login_label, $login['id'], array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
			<?php echo form_input($login); ?>
		</div>

		<div class="control-group">
			<div class="controls">
		<?php $data = array(
	    'name'        => 'reset',
	    'id'          => 'reset',
	    'value'       => 'Get a New Password',
	    'class'       => 'btn btn-primary',
	    'id'		  => 'reset'
	    );
		echo form_submit($data);
		?>
		<?php echo form_close(); ?>
		</div>
	</div>
</div>
</div>
</div>
</div>