
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
        'Alabama' => 'Alabama',
        'Alaska' => 'Alaska',
        'Arizona' => 'Arizona',
        'Arkansas' => 'Arkansas',
        'California' => 'California',
        'Colorado' => 'Colorado',
        'Connecticut' => 'Connecticut',
        'Delaware' => 'Delaware',
        'District of Columbia' => 'District of Columbia',
        'Florida' => 'Florida',
        'Georgia' => 'Georgia',
        'Hawaii' => 'Hawaii',
        'Idaho' => 'Idaho',
        'Illinois' => 'Illinois',
        'Indiana' => 'Indiana',
        'Iowa' => 'Iowa',
        'Kansas' => 'Kansas',
        'Kentucky' => 'Kentucky',
        'Louisiana' => 'Louisiana',
        'Maine' => 'Maine',
        'Maryland' => 'Maryland',
        'Massachusetts' => 'Massachusetts',
        'Michigan' => 'Michigan',
        'Minnesota' => 'Minnesota',
        'Mississippi' => 'Mississippi',
        'Missouri' => 'Missouri',
        'Montana' => 'Montana',
        'Nebraska' => 'Nebraska',
        'Nevada' => 'Nevada',
        'New Hampshire' => 'New Hampshire',
        'New Jersey' => 'New Jersey',
        'New Mexico' => 'New Mexico',
        'New York' => 'New York',
        'North Carolina' => 'North Carolina',
        'North Dakota' => 'North Dakota',
        'Ohio' => 'Ohio',
        'Oklahoma' => 'Oklahoma',
        'Oregon' => 'Oregon',
        'Pennsylvania' => 'Pennsylvania',
        'Rhode Island' => 'Rhode Island',
        'South Carolina' => 'South Carolina',
        'South Dakota' => 'South Dakota',
        'Tennessee' => 'Tennessee',
        'Texas' => 'Texas',
        'Utah' => 'Utah',
        'Vermont' => 'Vermont',
        'Virginia' => 'Virginia',
        'Washington' => 'Washington',
        'West Virginia' => 'West Virginia',
        'Wisconsin' => 'Wisconsin',
        'Wyoming' => 'Wyoming'
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

$max_head_count = array(
    'name'  => 'max_head_count',
    'id'    => 'max_head_count',
    'value' => set_value('max_head_count'),
    'maxlength' => 10
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

<div class="content span9 forages">

<?php echo form_open(base_url().'forages/search_view', array('class' => 'form-horizontal')) ?>
    <h2>Search for Forages	</h2>
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
        <?php echo form_label('Maximum Head Count', $max_head_count['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <div class="input-append"><?php echo form_input($max_head_count); ?> <span class="add-on">animals</span></div>
            <?php echo form_error($max_head_count['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$max_head_count['name']])?$errors[$max_head_count['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Livestock Type', 'allowed_uses[]', array('class' => 'control-label')); ?>
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
        'value'       => 'Search Forages',
        'class'       => 'btn btn-primary'
        );
        echo form_submit($data);
        echo form_close();
    ?>

<?php
/*
        if(empty($forages)){
            ?>
                <h2>Your search did not produce any results.</h2>

            <?php
            }else{

    ?>
    <ul>
        <?php
            foreach($forages as $row){

        ?>
        <li>
            <h3><a href="<?=base_url() . 'forages/view/' . $row['id']; ?>"><?=$row['name']?></a></h3>
            <p><?=$row['city']?>, <?=$row['state']?> <?=$row['country']?></p>
            <p>Description: <?=$row['other_info']?></p>
        </li>
        <?php
            }//end foreach
        }//end else 
        */
        ?>

    </ul>
	
	
	
</div><!-- end content -->
<div class="span8 offset4">
<?=isset($pages) ? $pages : '' ?>
</div>
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->
