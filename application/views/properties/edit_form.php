<?php
$name = array(
    'name'  => 'name',
    'id'    => 'name',
    'value' => isset($property[0]['name']) ? $property[0]['name'] : set_value('name'),
    'maxlength' => 200
);
$location = array(
    'name'  => 'location',
    'id'    => 'location',
    'value' => isset($property[0]['location']) ? $property[0]['location'] : set_value('location'),
    'maxlength' => 300
);
$region = array(
    'name'  => 'region',
    'id'    => 'region',
    'value' => isset($property[0]['region']) ? $property[0]['region'] : set_value('region'),
    'maxlength' => 300
);
$city = array(
    'name'  => 'city',
    'id'    => 'city',
    'value' => isset($property[0]['city']) ? $property[0]['city'] : set_value('city'),
    'maxlength' => 100
);
$state = array(
    'name'  => 'state',
    'id'    => 'state',
    'value' => isset($property[0]['state']) ? $property[0]['state'] : set_value('state'),
    'maxlength' => 30
);
$country = array(
    'name'  => 'country',
    'id'    => 'country',
    'value' => isset($property[0]['country']) ? $property[0]['country'] : set_value('country'),
    'maxlength' => 50
);

$size = array(
    'name'  => 'size',
    'id'    => 'size',
    'value' => isset($property[0]['size']) ? $property[0]['size'] : set_value('size'),
    'maxlength' => 50
);
$min_lease_term = array(
    'name'  => 'min_lease_term',
    'id'    => 'min_lease_term',
    'value' => isset($property[0]['min_lease_term']) ? $property[0]['min_lease_term'] : set_value('min_lease_term'),
    'maxlength' => 50
);

$lease_availability_date = "";
//if date is set, make date pretty
if(isset($property[0]['lease_availability_date'])){
    // MM/DD/YYYY
    $formatted_lease_availability_date = date('m/d/Y', strtotime($property[0]['lease_availability_date']));
}else{
    $formatted_lease_availability_date = set_value('lease_availability_date');
} 
$lease_availability_date = array(
    'name'  => 'lease_availability_date',
    'id'    => 'lease_availability_date',
    'class' => 'datepicker',
    'value' => $formatted_lease_availability_date,
    'maxlength' => 100
);

//array for radio
$features = array(
    'Native Pasture',
    'Improved Pasture',
    'Cropland'
);
$feature = '';

$features_forage_type = array(
    'name'  => 'features_forage_type',
    'id'    => 'features_forage_type',
);
//set variable to '' in order to avoid php errors
if(empty($property[0]['features_forage_type'])){
    $property[0]['features_forage_type'] = '';
}


$handling_facilities = array(
    'name'  => 'handling_facilities',
    'id'    => 'handling_facilities',
    'value' => isset($property[0]['handling_facilities']) ? $property[0]['handling_facilities'] : set_value('handling_facilities'),
    'maxlength' => 50
);

//array for $allowed_uses checkbox
$allows = array(
    'cattle',
    'goats',
    'sheep',
    'horses',
    'exotics',
    'swine'
);
$allow = '';
$allowed_uses = array(
    'name'  => 'allowed_uses[]',
    'id'    => 'allowed_uses',
);
//set variable to '' in order to avoid php errors
if(empty($property[0]['allowed_uses'])){
    $property[0]['allowed_uses'] = '';
}

$restricted_stock_type = array(
    'name'  => 'restricted_stock_type',
    'id'    => 'restricted_stock_type',
    'value' => isset($property[0]['restricted_stock_type']) ? $property[0]['restricted_stock_type'] : set_value('restricted_stock_type'),
    'maxlength' => 100
);
$max_head_count = array(
    'name'  => 'max_head_count',
    'id'    => 'max_head_count',
    'value' => isset($property[0]['max_head_count']) ? $property[0]['max_head_count'] : set_value('max_head_count'),
    'maxlength' => 100
);
$min_bid = array(
    'name'  => 'min_bid',
    'id'    => 'min_bid',
    'value' => isset($property[0]['min_bid']) ? $property[0]['min_bid'] : set_value('min_bid'),
    'maxlength' => 100
);

$formatted_opening_bid_date = "";
//if date is set, make date pretty
if(isset($property[0]['opening_bid_date'])){
    // MM/DD/YYYY
    $formatted_opening_bid_date = date('m/d/Y', strtotime($property[0]['opening_bid_date']));
}else{
    $formatted_opening_bid_date = set_value('opening_bid_date');
} 
$opening_bid_date = array(
    'name'  => 'opening_bid_date',
    'id'    => 'opening_bid_date',
    'class' => 'datepicker',
    'value' => $formatted_opening_bid_date,
    'maxlength' => 100
);

$formatted_closing_bid_date = "";
//if date is set, make date pretty
if(isset($property[0]['closing_bid_date'])){
    // MM/DD/YYYY
    $formatted_closing_bid_date = date('m/d/Y', strtotime($property[0]['closing_bid_date']));
}else{
    $formatted_closing_bid_date = set_value('closing_bid_date');
} 

$closing_bid_date = array(
    'name'  => 'closing_bid_date',
    'id'    => 'closing_bid_date',
    'class' => 'datepicker',
    'value' => $formatted_closing_bid_date,
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

<?php echo form_open(base_url().'properties/edit/'. isset($property[0]['id']), array('class' => 'form-horizontal')) ?>

    <h2>Enter Description</h2>
    <div class="control-group">
        <?php echo form_label('Pasture Name', $name['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($name); ?>
            <?php echo form_error($name['name']); ?><?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Location', $location['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($location); ?>
            <?php echo form_error($location['name']); ?><?php echo isset($errors[$location['name']])?$errors[$location['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Region', $region['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($region); ?>
            <?php echo form_error($region['name']); ?><?php echo isset($errors[$region['name']])?$errors[$region['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('City', $city['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($city); ?>
            <?php echo form_error($city['name']); ?><?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('State/Province', $state['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($state); ?>
            <?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Country', $country['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($country); ?>
            <?php echo form_error($country['name']); ?><?php echo isset($errors[$country['name']])?$errors[$country['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Size', $size['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($size); ?>
            <?php echo form_error($size['name']); ?><?php echo isset($errors[$size['name']])?$errors[$size['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Minimum Lease Term', $min_lease_term['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($min_lease_term); ?>
            <?php echo form_error($min_lease_term['name']); ?><?php echo isset($errors[$min_lease_term['name']])?$errors[$min_lease_term['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Lease Availability Date', $lease_availability_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($lease_availability_date); ?>
            <?php echo form_error($lease_availability_date['name']); ?><?php echo isset($errors[$lease_availability_date['name']])?$errors[$lease_availability_date['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Features: Forage Type', $features_forage_type['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php
                foreach ($features as $feature){
            ?>
                <label class="radio">
                    <input type="radio" name="features_forage_type" value="<?=$feature?>" 
                    <?php 
                        echo ($property[0]['features_forage_type']==$feature) ? 'checked' : ''; 
                        echo set_radio('features_forage_type', $feature); 
                    ?> 
                /><?=$feature?>
                </label>
            <?php 
                }//end foreach
            ?>
            <?php echo form_error($features_forage_type['name']); ?><?php echo isset($errors[$features_forage_type['name']])?$errors[$features_forage_type['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Handling facilities', $handling_facilities['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($handling_facilities); ?>
            <?php echo form_error($handling_facilities['name']); ?><?php echo isset($errors[$handling_facilities['name']])?$errors[$handling_facilities['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Allowed Uses', 'allowed_uses[]', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php 
                foreach ($allows as $allow){
            ?>
                <label class="checkbox">
                    
                    <input type="checkbox" name="allowed_uses[]" value="<?=$allow?>" 
                    <?php 
                        echo (preg_match("/" . $allow . "/", $property[0]['allowed_uses'])) ? 'checked' : ''; 
                        echo set_checkbox('allowed_uses[]', $allow); 
                    ?> 
                /><?=$allow?>
                </label>
            <?php
                } //end foreach
            ?>
            <?php echo form_error($allowed_uses['name']); ?><?php echo isset($errors[$allowed_uses['name']])?$errors[$allowed_uses['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
    <h2>Stock Restrictions (Optional)</h2>
        <?php echo form_label('Restricted Stock Type', $restricted_stock_type['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($restricted_stock_type); ?>
            <?php echo form_error($restricted_stock_type['name']); ?><?php echo isset($errors[$restricted_stock_type['name']])?$errors[$restricted_stock_type['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Min bid', $min_bid['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($min_bid); ?>
            <?php echo form_error($min_bid['name']); ?><?php echo isset($errors[$min_bid['name']])?$errors[$min_bid['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Max Head Count', $max_head_count['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($max_head_count); ?>
            <?php echo form_error($max_head_count['name']); ?><?php echo isset($errors[$max_head_count['name']])?$errors[$max_head_count['name']]:''; ?>
        </div>
    </div>
    <h2>Bid Information</h2>
    <div class="control-group">
            <?php echo form_label('Opening Bid Date', $opening_bid_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($opening_bid_date); ?>
            <?php echo form_error($opening_bid_date['name']); ?><?php echo isset($errors[$opening_bid_date['name']])?$errors[$opening_bid_date['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Closing Bid Date', $closing_bid_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($closing_bid_date); ?>
            <?php echo form_error($closing_bid_date['name']); ?><?php echo isset($errors[$closing_bid_date['name']])?$errors[$closing_bid_date['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Description', $other_info['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_textarea($other_info); ?>
            <?php echo form_error($other_info['name']); ?><?php echo isset($errors[$other_info['name']])?$errors[$other_info['name']]:''; ?>
        </div>
    </div>
<?php echo form_submit('submit', 'Edit Pasture'); ?>
<?php echo form_close();?>
