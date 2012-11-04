<?php
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$zip_code = array(
	'name'	=> 'zip_code',
	'id'	=> 'zip_code',
	'value'	=> set_value('zip_code'),
	'maxlength'	=> 7,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>

<div class="container-fluid">
<div class="row-fluid">
<div class="span12 content" style="padding: 20px; float: left;">
	<div class="registerForm">
		<h2>Join PastureScout Today!</h2>
			<div class="control-group" style="margin-left: 20px;">
		<?php echo form_open($this->uri->uri_string()); ?>
			<?php if ($use_username) { ?>
			<ul>
				<li><?php echo form_label('Username', $username['id']); ?></li>
				<li><?php echo form_input($username); ?></li>
				<li style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></li>
			</ul>
			<?php } ?>
			<ul>
				<li><?php echo form_label('Email Address', $email['id']); ?></li>
				<li><?php echo form_input($email); ?></li>
				<li style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></li>

				<li><?php echo form_label('Zip Code', $zip_code['id']); ?></li>
				<li><?php echo form_input($zip_code); ?></li>
				<li style="color: red;"><?php echo form_error($zip_code['name']); ?><?php echo isset($errors[$zip_code['name']])?$errors[$zip_code['name']]:''; ?></li>

				<li><?php echo form_label('Password', $password['id']); ?></li>
				<li><?php echo form_password($password); ?></li>
				<li style="color: red;"><?php echo form_error($password['name']); ?></li>

				<li><?php echo form_label('Confirm Password', $confirm_password['id']); ?></li>
				<li><?php echo form_password($confirm_password); ?></li>
				<li style="color: red;"><?php echo form_error($confirm_password['name']); ?></li>
			</ul>

			<?php if ($captcha_registration) {
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

		<input type="submit" name="register" value="Join Today" class="btn btn-large btn-primary" />

		<?php echo form_close(); ?>
		</div> <!-- close control group -->
	</div> <!-- close float left" -->
		<div class="registerImage">
		<img src="assets/images/main/registerImage.jpg" alt="find it, bid it, lease it today with pasture scout" />
		</div>

</div> 
</div>
</div>
</div>