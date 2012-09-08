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
<?php echo form_open($this->uri->uri_string()); ?>

	<ul>
		<li><?php echo form_label($login_label, $login['id']); ?></li>
		<li><?php echo form_input($login); ?></li>
		<li style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></li>
		<li><?php echo form_label('Password', $password['id']); ?></li>
		<li><?php echo form_password($password); ?></li>
		<li style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></li>
	</ul>

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

	<ul>
		<li colspan="3" id="login_links">
			<?php echo form_checkbox($remember); ?>
			<span style="position:relative; top:-10px;">
				<?php echo form_label('Remember me', $remember['id']); ?>
				<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
				<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
			</span>
		</li>
	</ul>
<?php echo form_submit('submit', 'Login'); ?>
<?php echo form_close(); ?>