<?php
$name = array(
    'name'  => 'name',
    'id'    => 'name',
    'value' => set_value('name'),
    'maxlength' => 200
);
$location = array(
    'name'  => 'location',
    'id'    => 'location',
    'value' => set_value('location'),
    'maxlength' => 300
);
$region = array(
    'name'  => 'region',
    'id'    => 'region',
    'value' => set_value('region'),
    'maxlength' => 300
);
$city = array(
    'name'  => 'city',
    'id'    => 'city',
    'value' => set_value('city'),
    'maxlength' => 100
);
$state = array(
    'name'  => 'state',
    'id'    => 'state',
    'value' => set_value('state'),
    'maxlength' => 30
);
$country = array(
    'name'  => 'country',
    'id'    => 'country',
    'value' => set_value('country'),
    'maxlength' => 50
);

$size = array(
    'name'  => 'size',
    'id'    => 'size',
    'value' => set_value('size'),
    'maxlength' => 50
);
$min_lease_term = array(
    'name'  => 'min_lease_term',
    'id'    => 'min_lease_term',
    'value' => '1',
    'maxlength' => 50
); 
$lease_availability_date = array(
    'name'  => 'lease_availability_date',
    'id'    => 'lease_availability_date',
    'class' => 'datepicker',
    'value' => set_value('lease_availability_date'),
    'maxlength' => 100
);
//array for radio
$features = array(
    'Native forage',
    'Improved forage',
    'Cropland'
);
$feature = '';
$features_forage_type = array(
    'name'  => 'features_forage_type',
    'id'    => 'features_forage_type',
);
$handling_facilities = array(
    'name'  => 'handling_facilities',
    'id'    => 'handling_facilities',
    'value' => set_value('handling_facilities'),
    'maxlength' => 50
);
//array for $allowed_uses checkbox
$allows = array(
    'Cattle',
    'Goats',
    'Sheep',
    'Horses',
    'Exotics',
    'Swine'
);
$allow = '';
$allowed_uses = array(
    'name'  => 'allowed_uses[]',
    'value' => '1',
    'id'    => 'allowed_uses',
);
$restricted_stock_type = array(
    'name'  => 'restricted_stock_type',
    'id'    => 'restricted_stock_type',
    'value' => set_value('restricted_stock_type'),
    'maxlength' => 100
);
$max_head_count = array(
    'name'  => 'max_head_count',
    'id'    => 'max_head_count',
    'value' => '0',
    'maxlength' => 100
);
$min_bid = array(
    'name'  => 'min_bid',
    'id'    => 'min_bid',
    'value' => set_value('min_bid'),
    'maxlength' => 100
);
$opening_bid_date = array(
    'name'  => 'opening_bid_date',
    'id'    => 'opening_bid_date',
    'class' => 'datepicker',
    'value' => set_value('opening_bid_date'),
    'maxlength' => 100
);
$closing_bid_date = array(
    'name'  => 'closing_bid_date',
    'id'    => 'closing_bid_date',
    'class' => 'datepicker',
    'value' => set_value('closing_bid_date'),
    'maxlength' => 100
);
$other_info = array(
    'name'  => 'other_info',
    'id'    => 'other_info',
    'value' => set_value('other_info'),
    'rows'  => 30,
    'cols'  => 30
);
?>
<div class="content span9 forages">
<?php echo form_open(base_url().'forages/create/', array('class' => 'form-horizontal')) ?>
    <h2>Tell Us About Your Forage</h2>
    <div class="control-group">
        <?php echo form_label('Forage Name', $name['id'], array('class' => 'control-label')); ?> 
        <div class="controls">
            <?php echo form_input($name); ?> <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="Name your Forage something unique and easily identifiable. This will be how your forage is referenced throughout the site."></i></span>
            <?php echo form_error($name['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Location', $location['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($location); ?> <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="Street address or nearest local landmark. For example, 'Near old saw mill on State Road 42'."></i></span>
            <?php echo form_error($location['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$location['name']])?$errors[$location['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Region', $region['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($region); ?> <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="Geographic region of state. For example, 'Southwest Texas.'"></i></span>
            <?php echo form_error($region['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$region['name']])?$errors[$region['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('City', $city['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($city); ?> <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="What city is your forage located in?"></i></span>
            <?php echo form_error($city['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('State', $state['id'], array('class' => 'control-label')); ?>
         <div class="controls">
            <select name="state" id="state">
                <option value=''>Select a State</option>
               <option value="Alabama">Alabama</option>
                <option value="Alaska">Alaska</option>
                <option value="Arizona">Arizona</option>
                <option value="Arkansas">Arkansas</option>
                <option value="California">California</option>
                <option value="Colorado">Colorado</option>
                <option value="Connecticut">Connecticut</option>
                <option value="Delaware">Delaware</option>
                <option value="District of Columbia">District of Columbia</option>
                <option value="Florida">Florida</option>
                <option value="Georgia">Georgia</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Kansas">Kansas</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana">Louisiana</option>
                <option value="Maine">Maine</option>
                <option value="Maryland">Maryland</option>
                <option value="Massachusetts">Massachusetts</option>
                <option value="Michigan">Michigan</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Mississippi">Mississippi</option>
                <option value="Missouri">Missouri</option>
                <option value="Montana">Montana</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Nevada">Nevada</option>
                <option value="New Hampshire">New Hampshire</option>
                <option value="New Jersey">New Jersey</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New York">New York</option>
                <option value="North Carolina">North Carolina</option>
                <option value="North Dakota">North Dakota</option>
                <option value="Ohio">Ohio</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oregon">Oregon</option>
                <option value="Pennsylvania">Pennsylvania</option>
                <option value="Rhode Island">Rhode Island</option>
                <option value="South Carolina">South Carolina</option>
                <option value="South Dakota">South Dakota</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas">Texas</option>
                <option value="Utah">Utah</option>
                <option value="Vermont">Vermont</option>
                <option value="Virginia">Virginia</option>
                <option value="Washington">Washington</option>
                <option value="West Virginia">West Virginia</option>
                <option value="Wisconsin">Wisconsin</option>
                <option value="Wyoming">Wyoming</option>
            </select>  <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="What state is your forage located in?"></i></span>
            <?php echo form_error($state['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Country', $country['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($country); ?>  <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="What country is your forage located in?"></i></span>
            <?php echo form_error($country['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$country['name']])?$errors[$country['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Amount', $size['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <div><?php echo form_input($size); ?><span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="e.g. square bales 4'x4'x8', 5' diaround bales, 20 tons?"></i></span></div>            
            <span class="help-block">Specify amount in bales (type/size) or tons</span>
            <?php echo form_error($size['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$size['name']])?$errors[$size['name']]:''; ?>
        </div>
    </div>
    <!--
    <div class="control-group">
        <?php echo form_label('Minimum Lease Term', $min_lease_term['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <div class="input-append">
            <?php echo form_input($min_lease_term); ?><span class="add-on">months</span></div>
            <?php echo form_error($min_lease_term['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$min_lease_term['name']])?$errors[$min_lease_term['name']]:''; ?>
        </div>
    </div>
    -->
    <!--
    <div class="control-group">
        <?php echo form_label('Lease Availability Date', $lease_availability_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($lease_availability_date); ?>  <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="When is your land available to lease?"></i></span>
            <?php echo form_error($lease_availability_date['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$lease_availability_date['name']])?$errors[$lease_availability_date['name']]:''; ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo form_label('Forage Type', $features_forage_type['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
                foreach ($features as $feature){
            ?>
                <label class="radio">
                    <input type="radio" name="features_forage_type" value="<?=$feature?>" 
                    <?php 
                        echo set_radio('features_forage_type', $feature); 
                    ?> 
                /><?=$feature?>
                </label>
            <?php 
                }//end foreach
            ?>
            <?php echo form_error($features_forage_type['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$features_forage_type['name']])?$errors[$features_forage_type['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Handling facilities', $handling_facilities['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($handling_facilities); ?> <span class="help-inline"><i class="icon icon-question-sign" rel="tooltip" data-placement="left" title="Describe any livestock handling facilities, suh as corrals, pens, barns, etc."></i></span>
            <?php echo form_error($handling_facilities['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$handling_facilities['name']])?$errors[$handling_facilities['name']]:''; ?>
        </div>
    </div>
    <<div class="control-group">
        <?php echo form_label('Allowed Uses', 'allowed_uses[]', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php 
                foreach ($allows as $allow){
            ?>
                <label class="checkbox inline">
                    
                    <input type="checkbox" name="allowed_uses[]" value="<?=$allow?>" 
                    <?php 
                        echo set_checkbox('allowed_uses[]', $allow); 
                    ?> 
                /><?=$allow?>
                </label>
            <?php
                } //end foreach
            ?>
            <?php echo form_error($allowed_uses['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$allowed_uses['name']])?$errors[$allowed_uses['name']]:''; ?>
        </div>
    </div>
    -->
    <div class="control-group">
        <?php echo form_label('Description', $other_info['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_textarea($other_info); ?>
            <?php echo form_error($other_info['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$other_info['name']])?$errors[$other_info['name']]:''; ?>
        </div>
    </div>
    <!--
    <div class="control-group">
        <?php echo form_label('Restricted Stock Type', $restricted_stock_type['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($restricted_stock_type); ?>
            <?php echo form_error($restricted_stock_type['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$restricted_stock_type['name']])?$errors[$restricted_stock_type['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Max Head Count', $max_head_count['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($max_head_count); ?>
            <?php echo form_error($max_head_count['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$max_head_count['name']])?$errors[$max_head_count['name']]:''; ?>
        </div>
    </div>
    -->
    <?php 
        $data = array(
        'name'        => 'submit',
        'id'          => 'submit',
        'value'       => 'Create Your forage Listing and Add Images',
        'class'       => 'btn btn-primary btn-block',
        'style'       => 'width: 96%;'
        );
        echo form_submit($data);
        echo form_close();
    ?>
        
<!--     <p style="line-height: 150%;"><span class="label label-info">Did You Know?</span> You can add images of your forage to your listing. Once you create your listing, add images by going to "My Forages" and uploading images to the forage you want!</p> -->
    </div><!-- end span9 -->

</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
