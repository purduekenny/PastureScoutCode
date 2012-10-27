<hr>
    <h2>Bid Information</h2>
    <p><strong>Min Bid:</strong> 
        <?php echo isset($property['min_bid']) ? $property['min_bid'] : 'Not specified'?> </p>
    <p><strong>Opening Bid Date:</strong> 
        <?php echo isset($property['opening_bid_date']) ? $opening_bid_date_format : 'Not specified'?> </p>
    <p><strong>Closing Bid:</strong> 
        <?php echo isset($property['closing_bid_date']) ? $closing_bid_date_format : 'Not specified'?> </p>
<hr>
