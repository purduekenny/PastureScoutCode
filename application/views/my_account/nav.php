<?php

$user_id = $this->tank_auth->get_user_id();

?>
<div class="container-fluid">
<div class="row-fluid">
    <div id="dashboard_nav" class="span4">
        <ul class="nav nav-tabs nav-stacked">
            <li><a href="<?=base_url() . 'auth/change_password/' . $user_id; ?>">Change your Password</a></li>
            <li><a href="<?=base_url() . 'auth/unregister/' . $user_id; ?>">Delete your Account</a></li>
        </ul>
    </div>