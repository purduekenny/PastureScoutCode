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
<!-- <hr>
    <h2>Bid Information</h2>
    <p><strong>Min Bid:</strong> 
        <?php echo isset($property['min_bid']) ? $property['min_bid'] : 'Not specified'?> </p>
    <p><strong>Opening Bid Date:</strong> 
        <?php echo isset($property['opening_bid_date']) ? $opening_bid_date_format : 'Not specified'?> </p>
    <p><strong>Closing Bid:</strong> 
        <?php echo isset($property['closing_bid_date']) ? $closing_bid_date_format : 'Not specified'?> </p>
<hr>
 -->
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
            $images = $property['images'];
            foreach ($images as $image){
        ?>
            <li class="span2">
                <a href="<?=base_url("files/$image")?>" title="Pasture" rel="gallery">
                    <img src="<?=base_url("thumbnails/$image")?>" class="img-polaroid">
                </a>
            </li>
        <?php
        }//end foreach 
        ?>
        </ul>
    </div>

</div><!-- end content -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->

