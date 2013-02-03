<?php
$name = array(
    'name'  => 'name',
    'id'    => 'name',
    'value' => isset($forages['name']) ? $forages['name'] : set_value('name'),
    'maxlength' => 200
);
$location = array(
    'name'  => 'location',
    'id'    => 'location',
    'value' => isset($forages['location']) ? $forages['location'] : set_value('location'),
    'maxlength' => 300
);
$region = array(
    'name'  => 'region',
    'id'    => 'region',
    'value' => isset($forages['region']) ? $forages['region'] : set_value('region'),
    'maxlength' => 300
);
$city = array(
    'name'  => 'city',
    'id'    => 'city',
    'value' => isset($forages['city']) ? $forages['city'] : set_value('city'),
    'maxlength' => 100
);
$state = array(
    'name'  => 'state',
    'id'    => 'state',
    'value' => isset($forages['state']) ? $forages['state'] : set_value('state'),
    'maxlength' => 30
);
$country = array(
    'name'  => 'country',
    'id'    => 'country',
    'value' => isset($forages['country']) ? $forages['country'] : set_value('country'),
    'maxlength' => 50
);

$size = array(
    'name'  => 'size',
    'id'    => 'size',
    'value' => isset($forages['size']) ? $forages['size'] : set_value('size'),
    'maxlength' => 50
);
$min_lease_term = array(
    'name'  => 'min_lease_term',
    'id'    => 'min_lease_term',
    'value' => isset($forages['min_lease_term']) ? $forages['min_lease_term'] : set_value('min_lease_term'),
    'maxlength' => 50
);

$lease_availability_date = "";
//if date is set, make date pretty
if($forages['lease_availability_date'] != '0000-00-00 00:00:00'){
    // MM/DD/YYYY
    $formatted_lease_availability_date = date('m/d/Y', strtotime($forages['lease_availability_date']));
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
    'Native forage',
    'Improved forage',
    'Cropland'
);
$feature = '';

$features_forage_type = array(
    'name'  => 'features_forage_type',
    'id'    => 'features_forage_type',
);
//set variable to '' in order to avoid php errors
if(empty($forages['features_forage_type'])){
    $forages['features_forage_type'] = '';
}


$handling_facilities = array(
    'name'  => 'handling_facilities',
    'id'    => 'handling_facilities',
    'value' => isset($forages['handling_facilities']) ? $forages['handling_facilities'] : set_value('handling_facilities'),
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
if(empty($forages['allowed_uses'])){
    $forages['allowed_uses'] = '';
}

$restricted_stock_type = array(
    'name'  => 'restricted_stock_type',
    'id'    => 'restricted_stock_type',
    'value' => isset($forages['restricted_stock_type']) ? $forages['restricted_stock_type'] : set_value('restricted_stock_type'),
    'maxlength' => 100
);
$max_head_count = array(
    'name'  => 'max_head_count',
    'id'    => 'max_head_count',
    'value' => isset($forages['max_head_count']) ? $forages['max_head_count'] : set_value('max_head_count'),
    'maxlength' => 100
);
$min_bid = array(
    'name'  => 'min_bid',
    'id'    => 'min_bid',
    'value' => isset($forages['min_bid']) ? $forages['min_bid'] : set_value('min_bid'),
    'maxlength' => 100
);

$formatted_opening_bid_date = "";
//if date is set, make date pretty
if($forages['opening_bid_date'] != '0000-00-00 00:00:00'){
    // MM/DD/YYYY
    $formatted_opening_bid_date = date('m/d/Y', strtotime($forages['opening_bid_date']));
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
if($forages['closing_bid_date'] != '0000-00-00 00:00:00'){
    // MM/DD/YYYY
    $formatted_closing_bid_date = date('m/d/Y', strtotime($forages['closing_bid_date']));
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
    'value' => isset($forages['other_info']) ? $forages['other_info'] : set_value('other_info'),
    'rows'  => 30,
    'cols'  => 30
);
isset($forages['id']) ? $forages['id'] : '';
?>
<div class="container-fluid">
<div class="row-fluid">
<div class="span12 content">
<?php echo form_open(base_url().'forages/edit/'. $forages['id'], array('class' => 'form-horizontal')) ?>

    <h2>Edit Your Forage</h2>
    <div class="control-group">
        <?php echo form_label('forage Name', $name['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($name); ?>
            <?php echo form_error($name['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Location', $location['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($location); ?>
            <?php echo form_error($location['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$location['name']])?$errors[$location['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Region', $region['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($region); ?>
            <?php echo form_error($region['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$region['name']])?$errors[$region['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('City', $city['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($city); ?>
            <?php echo form_error($city['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$city['name']])?$errors[$city['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('State', 'state', array('class' => 'control-label')); ?>
        <div class="controls">
            <select name="state" id="state">
                <option value=''>Select a State</option>
                <option value='Alabama' 
                    <?php 
                        //display if read from database.
                        echo ($forages['state']=='Alabama') ? 'selected' : ''; 
                        //dispaly if there was a validation error
                        echo set_select('state', 'Alabama');?>
                >Alabama
                </option>
                <option value='Alaska' 
                    <?php 
                        echo ($forages['state']=='Alaska') ? 'selected' : ''; 
                        echo set_select('state', 'Alaska'); 
                    ?> 
                >Alaska
                </option>
                <option value='Arizona' 
                    <?php  
                        echo ($forages['state']=='Arizona') ? 'selected' : ''; 
                        echo set_select('state', 'Arizona'); 
                    ?> 
                >Arizona
                </option>
                <option value='Arkansas' 
                    <?php  
                        echo ($forages['state']=='Arkansas') ? 'selected' : ''; 
                        echo set_select('state', 'Arkansas'); 
                    ?> 
                >Arkansas
                </option>
                <option value='California' 
                    <?php  
                        echo ($forages['state']=='California') ? 'selected' : ''; 
                        echo set_select('state', 'California'); 
                    ?> 
                >California
                </option>
                <option value='Colorado' 
                    <?php  
                        echo ($forages['state']=='Colorado') ? 'selected' : ''; 
                        echo set_select('state', 'Colorado'); 
                    ?> 
                >Colorado
                </option>
                <option value='Connecticut' 
                    <?php  
                        echo ($forages['state']=='Connecticut') ? 'selected' : ''; 
                        echo set_select('state', 'Connecticut'); 
                    ?> 
                >Connecticut
                </option>
                <option value='Delaware' 
                    <?php  
                        echo ($forages['state']=='Delaware') ? 'selected' : ''; 
                        echo set_select('state', 'Delaware'); 
                    ?> 
                >Delaware
                </option>
                <option value='District Of Columbia' 
                    <?php  
                        echo ($forages['state']=='District Of Columbia') ? 'selected' : ''; 
                        echo set_select('state', 'District Of Columbia'); 
                    ?> 
                >District Of Columbia
                </option>
                <option value='Florida' 
                    <?php  
                        echo ($forages['state']=='Florida') ? 'selected' : ''; 
                        echo set_select('state', 'Florida'); 
                    ?> 
                >Florida
                </option>
                <option value='Georgia' 
                    <?php  
                        echo ($forages['state']=='Georgia') ? 'selected' : ''; 
                        echo set_select('state', 'Georgia'); 
                    ?> 
                >Georgia
                </option>
                <option value='Hawaii' 
                    <?php  
                        echo ($forages['state']=='Hawaii') ? 'selected' : ''; 
                        echo set_select('state', 'Hawaii'); 
                    ?> 
                >Hawaii
                </option>
                <option value='Idaho' 
                    <?php  
                        echo ($forages['state']=='Idaho') ? 'selected' : ''; 
                        echo set_select('state', 'Idaho'); 
                    ?> 
                >Idaho
                </option>
                <option value='Illinois' 
                    <?php  
                        echo ($forages['state']=='Illinois') ? 'selected' : ''; 
                        echo set_select('state', 'Illinois'); 
                    ?> 
                >Illinois
                </option>
                <option value='Indiana' 
                    <?php  
                        echo ($forages['state']=='Indiana') ? 'selected' : ''; 
                        echo set_select('state', 'Indiana'); 
                    ?> 
                >Indiana
                </option>
                <option value='Iowa' 
                    <?php  
                        echo ($forages['state']=='Iowa') ? 'selected' : ''; 
                        echo set_select('state', 'Iowa'); 
                    ?> 
                >Iowa
                </option>
                <option value='Kansas' 
                    <?php  
                        echo ($forages['state']=='Kansas') ? 'selected' : ''; 
                        echo set_select('state', 'Kansas'); 
                    ?> 
                >Kansas
                </option>
                <option value='Kentucky' 
                    <?php  
                        echo ($forages['state']=='Kentucky') ? 'selected' : ''; 
                        echo set_select('state', 'Kentucky'); 
                    ?> 
                >Kentucky
                </option>
                <option value='Louisiana' 
                    <?php  
                        echo ($forages['state']=='Louisiana') ? 'selected' : ''; 
                        echo set_select('state', 'Louisiana'); 
                    ?> 
                >Louisiana
                </option>
                <option value='Maine' 
                    <?php  
                        echo ($forages['state']=='Maine') ? 'selected' : ''; 
                        echo set_select('state', 'Maine'); 
                    ?> 
                >Maine
                </option>
                <option value='Maryland' 
                    <?php  
                        echo ($forages['state']=='Maryland') ? 'selected' : ''; 
                        echo set_select('state', 'Maryland'); 
                    ?> 
                >Maryland
                </option>
                <option value='Massachusetts' 
                    <?php  
                        echo ($forages['state']=='Massachusetts') ? 'selected' : ''; 
                        echo set_select('state', 'Massachusetts'); 
                    ?> 
                >Massachusetts
                </option>
                <option value='Michigan' 
                    <?php  
                        echo ($forages['state']=='Michigan') ? 'selected' : ''; 
                        echo set_select('state', 'Michigan'); 
                    ?> 
                >Michigan
                </option>
                <option value='Minnesota' 
                    <?php  
                        echo ($forages['state']=='Minnesota') ? 'selected' : ''; 
                        echo set_select('state', 'Minnesota'); 
                    ?> 
                >Minnesota
                </option>
                <option value='Mississippi' 
                    <?php  
                        echo ($forages['state']=='Mississippi') ? 'selected' : ''; 
                        echo set_select('state', 'Mississippi'); 
                    ?> 
                >Mississippi
                </option>
                <option value='Missouri' 
                    <?php  
                        echo ($forages['state']=='Missouri') ? 'selected' : ''; 
                        echo set_select('state', 'Missouri'); 
                    ?> 
                >Missouri
                </option>
                <option value='Montana' 
                    <?php  
                        echo ($forages['state']=='Montana') ? 'selected' : ''; 
                        echo set_select('state', 'Montana'); 
                    ?> 
                >Montana
                </option>
                <option value='Nebraska' 
                    <?php  
                        echo ($forages['state']=='Nebraska') ? 'selected' : ''; 
                        echo set_select('state', 'Nebraska'); 
                    ?> 
                >Nebraska
                </option>
                <option value='Nevada' 
                    <?php  
                        echo ($forages['state']=='Nevada') ? 'selected' : ''; 
                        echo set_select('state', 'Nevada'); 
                    ?> 
                >Nevada
                </option>
                <option value='New Hampshire' 
                    <?php  
                        echo ($forages['state']=='New Hampshire') ? 'selected' : ''; 
                        echo set_select('state', 'New Hampshire'); 
                    ?> 
                >NewHampshire
                </option>
                <option value='New Jersey' 
                    <?php  
                        echo ($forages['state']=='New Jersey') ? 'selected' : ''; 
                        echo set_select('state', 'New Jersey'); 
                    ?> 
                >New Jersey
                </option>
                <option value='New Mexico' 
                    <?php  
                        echo ($forages['state']=='New Mexico') ? 'selected' : ''; 
                        echo set_select('state', 'New Mexico'); 
                    ?> 
                >New Mexico
                </option>
                <option value='New York' 
                    <?php  
                        echo ($forages['state']=='New York') ? 'selected' : ''; 
                        echo set_select('state', 'New York'); 
                    ?> 
                >New York
                </option>
                <option value='North Carolina' 
                    <?php  
                        echo ($forages['state']=='North Carolina') ? 'selected' : ''; 
                        echo set_select('state', 'North Carolina'); 
                    ?> 
                >North Carolina
                </option>
                <option value='North Dakota' 
                    <?php  
                        echo ($forages['state']=='North Dakota') ? 'selected' : ''; 
                        echo set_select('state', 'North Dakota'); 
                    ?> 
                >North Dakota
                </option>
                <option value='Ohio' 
                    <?php  
                        echo ($forages['state']=='Ohio') ? 'selected' : ''; 
                        echo set_select('state', 'Ohio'); 
                    ?> 
                >Ohio
                </option>
                <option value='Oklahoma' 
                    <?php  
                        echo ($forages['state']=='Oklahoma') ? 'selected' : ''; 
                        echo set_select('state', 'Oklahoma'); 
                    ?> 
                >Oklahoma
                </option>
                <option value='Oregon' 
                    <?php  
                        echo ($forages['state']=='Oregon') ? 'selected' : ''; 
                        echo set_select('state', 'Oregon'); 
                    ?> 
                >Oregon
                </option>
                <option value='Pennsylvania' 
                    <?php  
                        echo ($forages['state']=='Pennsylvania') ? 'selected' : ''; 
                        echo set_select('state', 'Pennsylvania'); 
                    ?> 
                >Pennsylvania
                </option>
                <option value='Rhode Island' 
                    <?php  
                        echo ($forages['state']=='Rhode Island') ? 'selected' : ''; 
                        echo set_select('state', 'Rhode Island'); 
                    ?> 
                >Rhode Island
                </option>
                <option value='South Carolina' 
                    <?php  
                        echo ($forages['state']=='South Carolina') ? 'selected' : ''; 
                        echo set_select('state', 'South Carolina'); 
                    ?> 
                >South Carolina
                </option>
                <option value='South Dakota' 
                    <?php  
                        echo ($forages['state']=='South Dakota') ? 'selected' : ''; 
                        echo set_select('state', 'South Dakota'); 
                    ?> 
                >South Dakota
                </option>
                <option value='Tennessee' 
                    <?php  
                        echo ($forages['state']=='Tennessee') ? 'selected' : ''; 
                        echo set_select('state', 'Tennessee'); 
                    ?> 
                >Tennessee
                </option>
                <option value='Texas' 
                    <?php  
                        echo ($forages['state']=='Texas') ? 'selected' : ''; 
                        echo set_select('state', 'Texas'); 
                    ?> 
                >Texas
                </option>
                <option value='Utah' 
                    <?php  
                        echo ($forages['state']=='Utah') ? 'selected' : ''; 
                        echo set_select('state', 'Utah'); 
                    ?> 
                >Utah
                </option>
                <option value='Vermont' 
                    <?php  
                        echo ($forages['state']=='Vermont') ? 'selected' : ''; 
                        echo set_select('state', 'Vermont'); 
                    ?> 
                >Vermont
                </option>
                <option value='Virginia' 
                    <?php  
                        echo ($forages['state']=='Virginia') ? 'selected' : ''; 
                        echo set_select('state', 'Virginia'); 
                    ?> 
                >Virginia
                </option>
                <option value='Washington' 
                    <?php  
                        echo ($forages['state']=='Washington') ? 'selected' : ''; 
                        echo set_select('state', 'Washington'); 
                    ?> 
                >Washington
                </option>
                <option value='West Virginia' 
                    <?php  
                        echo ($forages['state']=='West Virginia') ? 'selected' : ''; 
                        echo set_select('state', 'West Virginia'); 
                    ?> 
                >West Virginia
                </option>
                <option value='Wisconsin' 
                    <?php  
                        echo ($forages['state']=='Wisconsin') ? 'selected' : ''; 
                        echo set_select('state', 'Wisconsin'); 
                    ?> 
                >Wisconsin
                </option>
                <option value='Wyoming' 
                    <?php  
                        echo ($forages['state']=='Wyoming') ? 'selected' : ''; 
                        echo set_select('state', 'Wyoming'); 
                    ?> 
                >Wyoming
                </option>
            </select>
            <?php echo form_error($state['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Country', $country['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($country); ?>
            <?php echo form_error($country['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$country['name']])?$errors[$country['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Amount', $size['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($size); ?>
            <span class="help-block">Specify amount in bales (type/size) or tons</span>
            <?php echo form_error($size['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$size['name']])?$errors[$size['name']]:''; ?>
        </div>
    </div>
    <!--
    <div class="control-group">
        <?php echo form_label('Minimum Lease Term', $min_lease_term['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($min_lease_term); ?>
            <?php echo form_error($min_lease_term['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$min_lease_term['name']])?$errors[$min_lease_term['name']]:''; ?>
        </div>
    </div>
    
    <div class="control-group">
        <?php echo form_label('Lease Availability Date', $lease_availability_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($lease_availability_date); ?>
            <?php echo form_error($lease_availability_date['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$lease_availability_date['name']])?$errors[$lease_availability_date['name']]:''; ?>
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
                        echo ($forages['features_forage_type']==$feature) ? 'checked' : ''; 
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
            <?php echo form_input($handling_facilities); ?>
            <?php echo form_error($handling_facilities['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$handling_facilities['name']])?$errors[$handling_facilities['name']]:''; ?>
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
                        echo (preg_match("/" . $allow . "/", $forages['allowed_uses'])) ? 'checked' : ''; 
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
    </div> -->
    <div class="control-group">
        <?php echo form_label('Description', $other_info['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_textarea($other_info); ?>
            <?php echo form_error($other_info['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$other_info['name']])?$errors[$other_info['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
    <!--
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
    </div>-->
<hr>


<!--     <h2>Bid Information</h2>
    <div class="control-group">
        <?php echo form_label('Min bid', $min_bid['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($min_bid); ?>
            <?php echo form_error($min_bid['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$min_bid['name']])?$errors[$min_bid['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
            <?php echo form_label('Opening Bid Date', $opening_bid_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($opening_bid_date); ?>
            <?php echo form_error($opening_bid_date['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$opening_bid_date['name']])?$errors[$opening_bid_date['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Closing Bid Date', $closing_bid_date['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($closing_bid_date); ?>
            <?php echo form_error($closing_bid_date['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$closing_bid_date['name']])?$errors[$closing_bid_date['name']]:''; ?>
        </div>
    </div> -->

<hr>
    <?php 
        $data = array(
        'name'        => 'edit',
        'id'          => 'edit',
        'value'       => 'Edit forage',
        'class'       => 'btn btn-primary'
        );
    ?>

    <?php
        echo form_submit($data);
        echo form_close();
    ?>

</div><!-- span12 -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->