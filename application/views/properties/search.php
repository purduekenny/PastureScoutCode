
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


$state_options = array(
		'NO' => 'No preference',
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming'
);

$state = array(
    'name'  => 'state',
    'id'    => 'state',
    'value' => set_value('state'),
    'maxlength' => 30
);

$size = array(
    'name'  => 'size',
    'id'    => 'size',
    'value' => set_value('size'),
    'maxlength' => 50
);


//array for $allowed_uses checkbox
$allowed_uses_options = array(
    'NO' => 'No preference',
    'cattle' => 'Cattle',
    'goats' => 'Goats',
    'sheep' => 'Sheep',
    'horses' => 'Horses',
    'exotics' => 'Exotics',
    'swine' => 'Swine'
);
$allow = '';
$allowed_uses = array(
    'name'  => 'allowed_uses[]',
    'id'    => 'allowed_uses',
);	
?>

<div class="content span8 properties">

<?php echo form_open(base_url().'properties/search_view', array('class' => 'form-horizontal')) ?>
    <h2>Search for Pastures	</h2>
    <div class="control-group">
        <?php echo form_label('State/Province', $state['id'], array('class' => 'control-label')); ?>
        <div class="controls">
			<?php echo form_dropdown('state', $state_options); ?>
            <?php echo form_error($state['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Maximum Size', $size['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <div class="input-append"><?php echo form_input($size); ?> <span class="add-on">acres</span></div>
            <?php echo form_error($size['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$size['name']])?$errors[$size['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Cattle Type', 'allowed_uses[]', array('class' => 'control-label')); ?>
        <div class="controls">
        	<? echo form_dropdown('allowed_uses', $allowed_uses_options); ?>
            <?php echo form_error($allowed_uses['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$allowed_uses['name']])?$errors[$allowed_uses['name']]:''; ?>
        </div>
    </div>




    <?php 
        $data = array(
        'name'        => 'submit',
        'id'          => 'submit',
        'value'       => 'Search Pastures',
        'class'       => 'btn btn-primary'
        );
        echo form_submit($data);
        echo form_close();
    ?>

<?php

        if(empty($properties)){
            ?>
                <h2>Your search did not produce any results.</h2>

            <?php
            }else{

    ?>
    <ul>
        <?php
            foreach($properties as $row){

        ?>
        <li>
            <h3><a href="<?=base_url() . 'properties/view/' . $row['id']; ?>"><?=$row['name']?></a></h3>
            <p><?=$row['city']?>, <?=$row['state']?> <?=$row['country']?></p>
            <p>Description: <?=$row['other_info']?></p>
        </li>
        <?php
            }//end foreach
        }//end else
        ?>

    </ul>
	
	
	
</div><!-- end content -->
<div class="span8 offset4">
<?=isset($pages) ? $pages : '' ?>
</div>
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
