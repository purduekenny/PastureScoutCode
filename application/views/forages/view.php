<?php
    $forage_id = isset($forage['id']) ? $forage['id'] : "";
?>
<script>
/* <![CDATA[ */
    var forage_id = "<?php echo $forage_id; ?>";
/* ]]> */
</script>
<?php 
    $opening_bid_date_format = date('F j, Y', strtotime($forage['opening_bid_date']));
    $closing_bid_date_format = date('F j, Y', strtotime($forage['closing_bid_date']));
    $lease_availability_date_format = date('F j, Y', strtotime($forage['lease_availability_date']));
    $profile_image = isset($forage['images'][0])? 'files/'.$forage['images'][0] : 'assets/images/main/nopic.png';
?>
<div class="content span9 forages">
    <h2><?=$forage['name']?>
        <span id="favorite">
            <a id="<?=$is_favorite['title']?>" class="btn btn-medium" href="#" rel="tooltip" data-placement="top" data-original-title="<?=$is_favorite['title']?>">
                <i class="<?=$is_favorite['a_class']?>"></i>
            </a>
        </span>
    </h2>
    <div class="foragePic"><img src="<?=base_url("$profile_image")?>"></div>  
    <div class="forageInfo">
        <p style="font-size: 18px;"><strong><?=$forage['city']?>, <?=$forage['state']?></strong></p>
        <p><strong>Description:</strong> 
            <?php echo isset($forage['other_info']) ? $forage['other_info'] : 'Not specified'?> </p>
        
        <div style="float: left; width: 45%">
            <p><strong>Location</strong> 
                <br />
                <?=$forage['city']?> </p>
            <p><strong>Region</strong> 
                <br />
                <?=$forage['region']?> </p>
            <p><strong>Amount</strong> 
                <br />
                <?php echo isset($forage['size']) ? $forage['size'] : 'Not specified'?> acres</p>
        </div>
        <div style="float: left; width: 45%">    
            <p><strong>Lease Availability</strong> 
                <br />
                <?php echo isset($forage['lease_availability_date']) ? $lease_availability_date_format : 'Not specified'?> </p>
            <p><strong>Features</strong> 
                <br />
                <?php echo isset($forage['features_forage_type']) ? $forage['features_forage_type'] : 'None'?> </p>
            <p><strong>Handling Facilties</strong> 
                <br />
                <?php echo isset($forage['handling_facilities']) ? $forage['handling_facilities'] : 'None'?> </p>

        </div>
            <br class="clearfix">
            <h2>Stock Rescrictions</h2>
            <p><strong>Restricted Stock Type</strong> 
                <br />
                <?php echo isset($forage['restricted_stock_type']) ? $forage['restricted_stock_type'] : 'Not specified'?> </p>

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
                    Unfortunately, you do not have a Forage Seeker subscription so you cannot see the contact information for this forage's owner. <br /><br />
                    <a href="<?= base_url() . 'my_account';?>"><strong style='color: #cb9853'>Get a forage Seeker subscription now!</strong></a> <i class="icon icon-share"></i>
                </div>
            <?php } ?>

            


    </div>
<hr width="100%">



