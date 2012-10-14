<?php

$user_id = $this->tank_auth->get_user_id();
$days_left = isset($userdata['days_left']) ? $userdata['days_left'] : 'some';
?>
<div class="container-fluid">
<div class="row-fluid">
    <div id="dashboard_nav" class="span4">
        <ul class="nav nav-tabs nav-stacked">
            <li><a href="<?=base_url() . 'my_account/'?>">My Account</a></li>
            <li><a href="<?=base_url() . 'my_account/edit'?>">Edit Profile</a></li>
            <li><a href="<?=base_url() . 'auth/change_password/' . $user_id; ?>">Change your Password</a></li>
            <li><a href="<?=base_url() . 'auth/unregister/' . $user_id; ?>">Delete your Account</a></li>
        </ul>

    <div id="dashboard_nav" class="12 content">
        <p style="padding-top:20px;">You have <strong><?=$days_left?></strong> days left until your free subscription ends</p>
    </div>
    </div>


