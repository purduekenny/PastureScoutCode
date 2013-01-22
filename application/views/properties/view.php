<?php 
    $opening_bid_date_format = date('F j, Y', strtotime($property['opening_bid_date']));
    $closing_bid_date_format = date('F j, Y', strtotime($property['closing_bid_date']));
    $lease_availability_date_format = date('F j, Y', strtotime($property['lease_availability_date']));
    $profile_image = isset($property['images'][0])? 'files/'.$property['images'][0] : 'assets/images/main/nopic.png';
?>
<div class="content span9 properties">
    <h2><?=$property['name']?>
        <span id="favorite">
            <a id="<?=$is_favorite['title']?>" class="btn btn-medium" href="#" rel="tooltip" data-placement="top" data-original-title="<?=$is_favorite['title']?>">
                <i class="<?=$is_favorite['a_class']?>"></i>
            </a>
        </span>
    </h2>
    <div class="pasturePic"><img src="<?=base_url("$profile_image")?>"></div>  
    <div class="pastureInfo">
        <p style="font-size: 18px;"><strong><?=$property['city']?>, <?=$property['state']?></strong></p>
        <p><strong>Description:</strong> 
            <?php echo isset($property['other_info']) ? $property['other_info'] : 'Not specified'?> </p>
        
        <div style="float: left; width: 45%">
            <p><strong>Location</strong> 
                <br />
                <?=$property['city']?> </p>
            <p><strong>Region</strong> 
                <br />
                <?=$property['region']?> </p>
            <p><strong>Size</strong> 
                <br />
                <?php echo isset($property['size']) ? $property['size'] : 'Not specified'?> acres</p>
            <p><strong>Minimum Lease Term</strong> 
                <br />
                <?php echo isset($property['min_lease_term']) ? $property['min_lease_term'] . " months" : 'Not specified'?></p>
        </div>
        <div style="float: left; width: 45%">    
            <p><strong>Lease Availability</strong> 
                <br />
                <?php echo isset($property['lease_availability_date']) ? $lease_availability_date_format : 'Not specified'?> </p>
            <p><strong>Features</strong> 
                <br />
                <?php echo isset($property['features_forage_type']) ? $property['features_forage_type'] : 'None'?> </p>
            <p><strong>Handling Facilties</strong> 
                <br />
                <?php echo isset($property['handling_facilities']) ? $property['handling_facilities'] : 'None'?> </p>
            <p><strong>Allowed Uses</strong> 
                <br />
                <?php echo isset($property['allowed_uses']) ? $property['allowed_uses'] : 'None specified'?> </p>
        </div>
            <br class="clearfix">
            <p><?= $property["name"] ?>'s max head count is <?php echo isset($property['max_head_count']) ? "<strong>" . $property['max_head_count'] . "</strong>" : 'not specified'?>. </p>
        
            <h2>Contact Information</h2>
            <?php

            $user_id = $this->tank_auth->get_user_id();
            $isSeeker = $this->user->seeking_sub($user_id);
            
            if($isSeeker == 1)
            {   
            ?>  
                <div class="alert alert-info" style="margin:5px;">
                    You can contact this user by e-mail at <a href="mailto:<?= $user['email'] ?>"><strong style="color: #3a87ad;"><?= $user["email"]; ?></strong></a>.
                </div>
            <?php } 
            else {
            ?>
                <div class="alert alert-warning" style="margin: 5px;">
                    Unfortunately, you do not have a Pasture Seeker subscription so you cannot see the contact information for this pasture's owner. <br /><br />
                    <a href="<?= base_url() . 'my_account';?>"><strong style='color: #cb9853'>Get a Pasture Seeker subscription now!</strong></a> <i class="icon icon-share"></i>
                </div>
            <?php } ?>

            


    </div>
<hr width="100%">



