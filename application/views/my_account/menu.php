<?php

$user_id = $this->tank_auth->get_user_id();

?>
<br>
<div>
	<a href="<?='my_account/edit/' . $user_id; ?>">Edit Your Account</a>
	<a href="<?=base_url() . 'auth/unregister/' . $user_id; ?>">Delete your Account</a>
</div>