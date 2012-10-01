<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12 content">
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
<h2 style="margin-left: 180px">Login</h2>
	<div class="control-group">
		<?php echo form_label($login_label, $login['id'], array('class' => 'control-label')); ?>
		<div class="controls">
		<?php echo form_input($login); ?>
		<?php echo form_error($login['name'], '<span class="error">', '</span>'); ?>
			<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
		</div>
    </div>
    <div class="control-group">
		<?php echo form_label('Password', $password['id'], array('class' => 'control-label')); ?>
		<div class="controls">
		<?php echo form_password($password); ?>
		<?php echo form_error($password['name'], '<span class="error">', '</span>'); ?>
		<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		</div>
    </div>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<ul>
		<li colspan="2">
			<div id="recaptcha_image"></div>
		</li>
		<li>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</li>
		<li>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</li>
		<li><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></li>
		<li style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></li>
		<?php echo $recaptcha_html; ?>
	</ul>
	<?php } else { ?>
	<ul>
		<li colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</li>
		<li><?php echo form_label('Confirmation Code', $captcha['id']); ?></li>
		<li><?php echo form_input($captcha); ?></li>
		<li style="color: red;"><?php echo form_error($captcha['name']); ?></li>
	</ul>
	<?php }
	} ?>

	<ul style="margin-left: 180px">
		<li colspan="3" id="login_links">
			<?php echo form_checkbox($remember); ?>
			<span style="position:relative; top:-10px;">
				<?php echo form_label('Remember me', $remember['id']); ?>
				<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
				<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
			</span>
		</li>
	</ul>

<?php $data = array(
    'name'        => 'edit',
    'id'          => 'edit',
    'value'       => 'Login',
    'class'       => 'btn btn-primary',
    'style'		  => 'margin-left: 180px'
    );
echo form_submit($data);
echo form_close();
?>

</div><!-- end edit_account -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->