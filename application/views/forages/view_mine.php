    <?php
    $opening_bid_date_format = date('F j, Y', strtotime($forage['opening_bid_date']));
    $closing_bid_date_format = date('F j, Y', strtotime($forage['closing_bid_date']));
    $lease_availability_date_format = date('F j, Y', strtotime($forage['lease_availability_date']));
    $profile_image = isset($forage['images'][0])? 'files/'.$forage['images'][0] : 'assets/images/main/nopic.png';
?>

<div class="content span9 forages">
    <h2><strong><?=$forage['name']?></strong></h2>
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
            <p><strong>Size</strong> 
                <br />
                <?php echo isset($forage['size']) ? $forage['size'] : 'Not specified'?> acres</p>
            <p><strong>Minimum Lease Term</strong> 
                <br />
                <?php echo isset($forage['min_lease_term']) ? $forage['min_lease_term'] . " months" : 'Not specified'?></p>
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
            <p><strong>Allowed Uses</strong> 
                <br />
                <?php echo isset($forage['allowed_uses']) ? $forage['allowed_uses'] : 'None specified'?> </p>
        </div>
            <br class="clearfix">
            <h2>Stock Rescrictions</h2>
            <p><?= $forage["name"] ?>'s max head count is <?php echo isset($forage['max_head_count']) ? "<strong>" . $forage['max_head_count'] . "</strong>" : 'not specified'?>. </p>
        
            <p><strong>Restricted Stock Type</strong> 
                <br />
                <?php echo isset($forage['restricted_stock_type']) ? $forage['restricted_stock_type'] : 'Not specified'?> </p>

<!--     <h2>Bid Information</h2>
    <p><strong>Min Bid:</strong> 
        <?php echo isset($forage['min_bid']) ? $forage['min_bid'] : 'Not specified'?> </p>
    <p><strong>Opening Bid Date:</strong> 
        <?php echo ($forage['opening_bid_date'] != '0000-00-00 00:00:00') ? $opening_bid_date_format : 'Not specified'?> </p>
    <p><strong>Closing Bid:</strong> 
        <?php echo ($forage['closing_bid_date'] != '0000-00-00 00:00:00') ? $closing_bid_date_format : 'Not specified'?> </p> -->
</div>
<hr width="100%" />  
    <!-- modal-gallery is the modal dialog used for the image gallery -->
    <div id="modal-gallery" class="modal modal-gallery hide fade" tabindex="-1">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body"><div class="modal-image"></div></div>
        <div class="modal-footer">
            <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
            <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
            <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
            <a class="btn modal-download" target="_blank"><i class="icon-download"></i> Download</a>
        </div>
    </div>

    <h2>Photos</h2>
    <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">
        <ul class="thumbnails">
        <?php 
            $images = $forage['images'];
            foreach ($images as $image){
        ?>
            <li class="span2">
                <a href="<?=base_url("files/$image")?>" title="forage" rel="gallery">
                    <img src="<?=base_url("thumbnails/$image")?>" class="img-polaroid">
                </a>
            </li>
        <?php
        }//end foreach 
        ?>
        </ul>
    </div>
<hr>

