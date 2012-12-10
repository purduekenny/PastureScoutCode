<?php
$user_id = $this->tank_auth->get_user_id();
// ass backwards way to hide the subscriptions because we are using the auth controller instead of the my_account controller
// since it's not passing the same info, we're hiding subscriptions for delete account and change password
$sub_access = isset($subscription_access) ? $subscription_access : "<style>.subscriptions { display: none; } </style>";
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

    <div id="dashboard_nav" class="12 content subscriptions">
        <h2>Subscriptions</h2>
        <p style="padding-top:20px;"><?=$sub_access?></p>
    </div>
    </div>


