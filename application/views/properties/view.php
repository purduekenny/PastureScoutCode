<div class="dashboard_content span8 properties">
    <h3><?=$property[0]['name']?></h3>
    <p><?=$property[0]['city']?>, <?=$property[0]['state']?> <?=$property[0]['country']?></p>
    <p><strong>Location:</strong> <?=$property[0]['city']?> </p>
    <p><strong>Region:</strong> <?=$property[0]['region']?> </p>
    <p><strong>Restricted Stock Type:</strong> <?php echo isset($property[0]['restricted_stock_type']) ? $property[0]['restricted_stock_type'] : 'Not specified'?> </p>
    <p><strong>Max Head Count:</strong> <?php echo isset($property[0]['max_head_count']) ? $property[0]['max_head_count'] : 'Not specified'?> </p>
    <p><strong>Min Bid:</strong> <?php echo isset($property[0]['min_bid']) ? $property[0]['min_bid'] : 'Not specified'?> </p>
</div><!-- end dashboard_content -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->

