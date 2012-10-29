<?php 
    $opening_bid_date_format = date('F j, Y', strtotime($property['opening_bid_date']));
    $closing_bid_date_format = date('F j, Y', strtotime($property['closing_bid_date']));
    $lease_availability_date_format = date('F j, Y', strtotime($property['lease_availability_date']));
?>
<div class="content span8 properties">
    <h2><?=$property['name']?></h2>
    <p><strong>Description:</strong> 
        <?php echo isset($property['other_info']) ? $property['other_info'] : 'Not specified'?> </p>
    <p><?=$property['city']?>, <?=$property['state']?> <?=$property['country']?></p>
    <p><strong>Location:</strong> <?=$property['city']?> </p>
    <p><strong>Region:</strong> <?=$property['region']?> </p>
    <p><strong>Size:</strong> 
        <?php echo isset($property['size']) ? $property['size'] : 'Not specified'?> </p>
    <p><strong>Minimum Lease Term:</strong> 
        <?php echo isset($property['min_lease_term']) ? $property['min_lease_term'] : 'Not specified'?> </p>
    <p><strong>Lease Availability:</strong> 
        <?php echo isset($property['lease_availability_date']) ? $lease_availability_date_format : 'Not specified'?> </p>
    <p><strong>Features:</strong> 
        <?php echo isset($property['features_forage_type']) ? $property['features_forage_type'] : 'Not specified'?> </p>
    <p><strong>Handling Facilties:</strong> 
        <?php echo isset($property['handling_facilities']) ? $property['handling_facilities'] : 'Not specified'?> </p>
    <p><strong>Allowed Uses:</strong> 
        <?php echo isset($property['allowed_uses']) ? $property['allowed_uses'] : 'Not specified'?> </p>
<hr>
    <h2>Stock Rescrictions</h2>
    <p><strong>Restricted Stock Type:</strong> <?php echo isset($property['restricted_stock_type']) ? $property['restricted_stock_type'] : 'Not specified'?> </p>
    <p><strong>Max Head Count:</strong> 
        <?php echo isset($property['max_head_count']) ? $property['max_head_count'] : 'Not specified'?> </p>
<hr>



