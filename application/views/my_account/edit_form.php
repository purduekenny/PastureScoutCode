<?php
$user_id = $this->tank_auth->get_user_id();
$first_name = array(
    'name'  => 'first_name',
    'id'    => 'first_name',
    'value' => isset($info[0]['first_name']) ? $info[0]['first_name'] : set_value('first_name'),
    'maxlength' => 100
);
$last_name = array(
    'name'  => 'last_name',
    'id'    => 'last_name',
    'value' => isset($info[0]['last_name']) ? $info[0]['last_name'] : set_value('last_name'),
    'maxlength' => 100
);
$email = array(
    'name'  => 'email',
    'id'    => 'email',
    'value' => isset($info[0]['email']) ? $info[0]['email'] : set_value('email'),
    'maxlength' => 100
);
$street = array(
    'name'  => 'street',
    'id'    => 'street',
    'value' => isset($info[0]['street']) ? $info[0]['street'] : set_value('street'),
    'maxlength' => 100
);
$city = array(
    'name'  => 'city',
    'id'    => 'city',
    'value' => isset($info[0]['city']) ? $info[0]['city'] : set_value('city'),
    'maxlength' => 100
);

$state = array(
    'name'  => 'state',
    'id'    => 'state',
    'maxlength' => 100
);

if(empty($info[0]['state'])){
    $info[0]['state'] = "";
}

$zip_code = array(
    'name'  => 'zip_code',
    'id'    => 'zip_code',
    'value' => isset($info[0]['zip_code']) ? $info[0]['zip_code'] : set_value('zip_code'),
    'maxlength' => 5
);

//if date is set, make date pretty
if(isset($info[0]['birthday'])){
    // MM/DD/YYYY
    $formatted_birthday = date('m/d/Y', strtotime($info[0]['birthday']));
}else{
    $formatted_birthday = set_value('birthday');
} 

$birthday = array(
    'name'  => 'birthday',
    'id'    => 'birthday',
    'value' => $formatted_birthday,
    'maxlength' => 20
);

$home_phone = array(
    'name'  => 'home_phone',
    'id'    => 'home_phone',
    'value' => isset($info[0]['home_phone']) ? $info[0]['home_phone'] : set_value('home_phone'),
    'maxlength' => 10
);

$cell_phone = array(
    'name'  => 'cell_phone',
    'id'    => 'cell_phone',
    'value' => isset($info[0]['cell_phone']) ? $info[0]['cell_phone'] : set_value('cell_phone'),
    'maxlength' => 10
);

$operation_type = array(
    'name'  => 'operation_type'
);
//set variable to '' in order to avoid php errors
if(empty($info[0]['operation_type'])){
    $info[0]['operation_type'] = '';
}

$livestock_type_owned = array(
    'name'  => 'livestock_type_owned[]',
    'value' => 'cattle'
);
//set variable to '' in order to avoid php errors
if(empty($info[0]['livestock_type_owned'])){
    $info[0]['livestock_type_owned'] = '';
}

$livestock_number = array(
    'name'  => 'livestock_number',
    'id'    => 'livestock_number',
);
//set variable to '' in order to avoid php errors
if(empty($info[0]['livestock_number'])){
    $info[0]['livestock_number'] = '';
}

$livestock_managing_percent = array(
    'name'  => 'livestock_managing_percent',
    'id'    => 'livestock_managing_percent',
);
//set variable to '' in order to avoid php errors
if(empty($info[0]['livestock_managing_percent'])){
    $info[0]['livestock_managing_percent'] = '';
}
$number_years_experience = array(
    'name'  => 'number_years_experience',
    'id'    => 'number_years_experience',
    'value' => isset($info[0]['number_years_experience']) ? $info[0]['number_years_experience'] : set_value('number_years_experience'),
    'maxlength' => 100
);
$largest_lease = array(
    'name'  => 'largest_lease',
    'id'    => 'largest_lease',
    'value' => isset($info[0]['largest_lease']) ? $info[0]['largest_lease'] : set_value('largest_lease'),
    'maxlength' => 100
);
$education = array(
    'name'  => 'education',
    'id'    => 'education',
    'value' => isset($info[0]['education']) ? $info[0]['education'] : set_value('education'),
    'maxlength' => 100
);
$land_management_training = array(
    'name'  => 'land_management_training',
    'id'    => 'land_management_training',
    'value' => isset($info[0]['land_management_training']) ? $info[0]['land_management_training'] : set_value('land_management_training'),
    'maxlength' => 100
);

?>

<div class="span8 dashboard_content">
<h2>Account Information</h2>
<?php echo form_open(base_url().'my_account/edit/'. $user_id, array('class' => 'form-horizontal')); ?>
    
    <div class="control-group">
        <?php echo form_label('First Name', $first_name['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($first_name); ?>
            <?php echo form_error($first_name['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Last Name', $last_name['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($last_name); ?>
            <?php echo form_error($last_name['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Email Address', $email['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($email); ?>
            <?php echo form_error($email['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Mailing Address', $street['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($street); ?>
            <?php echo form_error($street['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$street['name']])?$errors[$street['name']]:''; ?>
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
                        echo ($info[0]['state']=='Alabama') ? 'selected' : ''; 
                        //dispaly if there was a validation error
                        echo set_select('state', 'Alabama');?>
                >Alabama
                </option>
                <option value='Alaska' 
                    <?php 
                        echo ($info[0]['state']=='Alaska') ? 'selected' : ''; 
                        echo set_select('state', 'Alaska'); 
                    ?> 
                >Alaska
                </option>
                <option value='Arizona' 
                    <?php  
                        echo ($info[0]['state']=='Arizona') ? 'selected' : ''; 
                        echo set_select('state', 'Arizona'); 
                    ?> 
                >Arizona
                </option>
                <option value='Arkansas' 
                    <?php  
                        echo ($info[0]['state']=='Arkansas') ? 'selected' : ''; 
                        echo set_select('state', 'Arkansas'); 
                    ?> 
                >Arkansas
                </option>
                <option value='California' 
                    <?php  
                        echo ($info[0]['state']=='California') ? 'selected' : ''; 
                        echo set_select('state', 'California'); 
                    ?> 
                >California
                </option>
                <option value='Colorado' 
                    <?php  
                        echo ($info[0]['state']=='Colorado') ? 'selected' : ''; 
                        echo set_select('state', 'Colorado'); 
                    ?> 
                >Colorado
                </option>
                <option value='Connecticut' 
                    <?php  
                        echo ($info[0]['state']=='Connecticut') ? 'selected' : ''; 
                        echo set_select('state', 'Connecticut'); 
                    ?> 
                >Connecticut
                </option>
                <option value='Delaware' 
                    <?php  
                        echo ($info[0]['state']=='Delaware') ? 'selected' : ''; 
                        echo set_select('state', 'Delaware'); 
                    ?> 
                >Delaware
                </option>
                <option value='District Of Columbia' 
                    <?php  
                        echo ($info[0]['state']=='District Of Columbia') ? 'selected' : ''; 
                        echo set_select('state', 'District Of Columbia'); 
                    ?> 
                >District Of Columbia
                </option>
                <option value='Florida' 
                    <?php  
                        echo ($info[0]['state']=='Florida') ? 'selected' : ''; 
                        echo set_select('state', 'Florida'); 
                    ?> 
                >Florida
                </option>
                <option value='Georgia' 
                    <?php  
                        echo ($info[0]['state']=='Georgia') ? 'selected' : ''; 
                        echo set_select('state', 'Georgia'); 
                    ?> 
                >Georgia
                </option>
                <option value='Hawaii' 
                    <?php  
                        echo ($info[0]['state']=='Hawaii') ? 'selected' : ''; 
                        echo set_select('state', 'Hawaii'); 
                    ?> 
                >Hawaii
                </option>
                <option value='Idaho' 
                    <?php  
                        echo ($info[0]['state']=='Idaho') ? 'selected' : ''; 
                        echo set_select('state', 'Idaho'); 
                    ?> 
                >Idaho
                </option>
                <option value='Illinois' 
                    <?php  
                        echo ($info[0]['state']=='Illinois') ? 'selected' : ''; 
                        echo set_select('state', 'Illinois'); 
                    ?> 
                >Illinois
                </option>
                <option value='Indiana' 
                    <?php  
                        echo ($info[0]['state']=='Indiana') ? 'selected' : ''; 
                        echo set_select('state', 'Indiana'); 
                    ?> 
                >Indiana
                </option>
                <option value='Iowa' 
                    <?php  
                        echo ($info[0]['state']=='Iowa') ? 'selected' : ''; 
                        echo set_select('state', 'Iowa'); 
                    ?> 
                >Iowa
                </option>
                <option value='Kansas' 
                    <?php  
                        echo ($info[0]['state']=='Kansas') ? 'selected' : ''; 
                        echo set_select('state', 'Kansas'); 
                    ?> 
                >Kansas
                </option>
                <option value='Kentucky' 
                    <?php  
                        echo ($info[0]['state']=='Kentucky') ? 'selected' : ''; 
                        echo set_select('state', 'Kentucky'); 
                    ?> 
                >Kentucky
                </option>
                <option value='Louisiana' 
                    <?php  
                        echo ($info[0]['state']=='Louisiana') ? 'selected' : ''; 
                        echo set_select('state', 'Louisiana'); 
                    ?> 
                >Louisiana
                </option>
                <option value='Maine' 
                    <?php  
                        echo ($info[0]['state']=='Maine') ? 'selected' : ''; 
                        echo set_select('state', 'Maine'); 
                    ?> 
                >Maine
                </option>
                <option value='Maryland' 
                    <?php  
                        echo ($info[0]['state']=='Maryland') ? 'selected' : ''; 
                        echo set_select('state', 'Maryland'); 
                    ?> 
                >Maryland
                </option>
                <option value='Massachusetts' 
                    <?php  
                        echo ($info[0]['state']=='Massachusetts') ? 'selected' : ''; 
                        echo set_select('state', 'Massachusetts'); 
                    ?> 
                >Massachusetts
                </option>
                <option value='Michigan' 
                    <?php  
                        echo ($info[0]['state']=='Michigan') ? 'selected' : ''; 
                        echo set_select('state', 'Michigan'); 
                    ?> 
                >Michigan
                </option>
                <option value='Minnesota' 
                    <?php  
                        echo ($info[0]['state']=='Minnesota') ? 'selected' : ''; 
                        echo set_select('state', 'Minnesota'); 
                    ?> 
                >Minnesota
                </option>
                <option value='Mississippi' 
                    <?php  
                        echo ($info[0]['state']=='Mississippi') ? 'selected' : ''; 
                        echo set_select('state', 'Mississippi'); 
                    ?> 
                >Mississippi
                </option>
                <option value='Missouri' 
                    <?php  
                        echo ($info[0]['state']=='Missouri') ? 'selected' : ''; 
                        echo set_select('state', 'Missouri'); 
                    ?> 
                >Missouri
                </option>
                <option value='Montana' 
                    <?php  
                        echo ($info[0]['state']=='Montana') ? 'selected' : ''; 
                        echo set_select('state', 'Montana'); 
                    ?> 
                >Montana
                </option>
                <option value='Nebraska' 
                    <?php  
                        echo ($info[0]['state']=='Nebraska') ? 'selected' : ''; 
                        echo set_select('state', 'Nebraska'); 
                    ?> 
                >Nebraska
                </option>
                <option value='Nevada' 
                    <?php  
                        echo ($info[0]['state']=='Nevada') ? 'selected' : ''; 
                        echo set_select('state', 'Nevada'); 
                    ?> 
                >Nevada
                </option>
                <option value='New Hampshire' 
                    <?php  
                        echo ($info[0]['state']=='New Hampshire') ? 'selected' : ''; 
                        echo set_select('state', 'New Hampshire'); 
                    ?> 
                >NewHampshire
                </option>
                <option value='New Jersey' 
                    <?php  
                        echo ($info[0]['state']=='New Jersey') ? 'selected' : ''; 
                        echo set_select('state', 'New Jersey'); 
                    ?> 
                >New Jersey
                </option>
                <option value='New Mexico' 
                    <?php  
                        echo ($info[0]['state']=='New Mexico') ? 'selected' : ''; 
                        echo set_select('state', 'New Mexico'); 
                    ?> 
                >New Mexico
                </option>
                <option value='New York' 
                    <?php  
                        echo ($info[0]['state']=='New York') ? 'selected' : ''; 
                        echo set_select('state', 'New York'); 
                    ?> 
                >New York
                </option>
                <option value='North Carolina' 
                    <?php  
                        echo ($info[0]['state']=='North Carolina') ? 'selected' : ''; 
                        echo set_select('state', 'North Carolina'); 
                    ?> 
                >North Carolina
                </option>
                <option value='North Dakota' 
                    <?php  
                        echo ($info[0]['state']=='North Dakota') ? 'selected' : ''; 
                        echo set_select('state', 'North Dakota'); 
                    ?> 
                >North Dakota
                </option>
                <option value='Ohio' 
                    <?php  
                        echo ($info[0]['state']=='Ohio') ? 'selected' : ''; 
                        echo set_select('state', 'Ohio'); 
                    ?> 
                >Ohio
                </option>
                <option value='Oklahoma' 
                    <?php  
                        echo ($info[0]['state']=='Oklahoma') ? 'selected' : ''; 
                        echo set_select('state', 'Oklahoma'); 
                    ?> 
                >Oklahoma
                </option>
                <option value='Oregon' 
                    <?php  
                        echo ($info[0]['state']=='Oregon') ? 'selected' : ''; 
                        echo set_select('state', 'Oregon'); 
                    ?> 
                >Oregon
                </option>
                <option value='Pennsylvania' 
                    <?php  
                        echo ($info[0]['state']=='Pennsylvania') ? 'selected' : ''; 
                        echo set_select('state', 'Pennsylvania'); 
                    ?> 
                >Pennsylvania
                </option>
                <option value='Rhode Island' 
                    <?php  
                        echo ($info[0]['state']=='Rhode Island') ? 'selected' : ''; 
                        echo set_select('state', 'Rhode Island'); 
                    ?> 
                >Rhode Island
                </option>
                <option value='South Carolina' 
                    <?php  
                        echo ($info[0]['state']=='South Carolina') ? 'selected' : ''; 
                        echo set_select('state', 'South Carolina'); 
                    ?> 
                >South Carolina
                </option>
                <option value='South Dakota' 
                    <?php  
                        echo ($info[0]['state']=='South Dakota') ? 'selected' : ''; 
                        echo set_select('state', 'South Dakota'); 
                    ?> 
                >South Dakota
                </option>
                <option value='Tennessee' 
                    <?php  
                        echo ($info[0]['state']=='Tennessee') ? 'selected' : ''; 
                        echo set_select('state', 'Tennessee'); 
                    ?> 
                >Tennessee
                </option>
                <option value='Texas' 
                    <?php  
                        echo ($info[0]['state']=='Texas') ? 'selected' : ''; 
                        echo set_select('state', 'Texas'); 
                    ?> 
                >Texas
                </option>
                <option value='Utah' 
                    <?php  
                        echo ($info[0]['state']=='Utah') ? 'selected' : ''; 
                        echo set_select('state', 'Utah'); 
                    ?> 
                >Utah
                </option>
                <option value='Vermont' 
                    <?php  
                        echo ($info[0]['state']=='Vermont') ? 'selected' : ''; 
                        echo set_select('state', 'Vermont'); 
                    ?> 
                >Vermont
                </option>
                <option value='Virginia' 
                    <?php  
                        echo ($info[0]['state']=='Virginia') ? 'selected' : ''; 
                        echo set_select('state', 'Virginia'); 
                    ?> 
                >Virginia
                </option>
                <option value='Washington' 
                    <?php  
                        echo ($info[0]['state']=='Washington') ? 'selected' : ''; 
                        echo set_select('state', 'Washington'); 
                    ?> 
                >Washington
                </option>
                <option value='West Virginia' 
                    <?php  
                        echo ($info[0]['state']=='West Virginia') ? 'selected' : ''; 
                        echo set_select('state', 'West Virginia'); 
                    ?> 
                >West Virginia
                </option>
                <option value='Wisconsin' 
                    <?php  
                        echo ($info[0]['state']=='Wisconsin') ? 'selected' : ''; 
                        echo set_select('state', 'Wisconsin'); 
                    ?> 
                >Wisconsin
                </option>
                <option value='Wyoming' 
                    <?php  
                        echo ($info[0]['state']=='Wyoming') ? 'selected' : ''; 
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
        <?php echo form_label('Zip Code', $zip_code['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($zip_code); ?>
            <?php echo form_error($zip_code['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$zip_code['name']])?$errors[$zip_code['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Date of Birth', $birthday['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($birthday); ?>
            <?php echo form_error($birthday['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$birthday['name']])?$errors[$birthday['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Home Phone', $home_phone['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($home_phone); ?>
            <?php echo form_error($home_phone['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$home_phone['name']])?$errors[$home_phone['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Cell Phone', $cell_phone['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($cell_phone); ?>
            <?php echo form_error($cell_phone['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$cell_phone['name']])?$errors[$cell_phone['name']]:''; ?>
        </div>
    </div>
<hr>
<h2>Business Information</h2>
    <div class="control-group">
        <?php echo form_label('Type of Operation', 'operation_type', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="operation_type" value="cow" 
                    <?php  
                    echo ($info[0]['operation_type']=='cow') ? 'checked' : '';
                    echo set_radio('operation_type', 'cow'); 
                    ?> 
                />Cow/Calf
            </label>
            <label class="radio">
                <input type="radio" name="operation_type" value="stocker" 
                <?php
                    echo ($info[0]['operation_type']=='stocker') ? 'checked' : '';
                    echo set_radio('operation_type', 'stocker'); 
                ?>
            />Stocker
            </label>
            <label class="radio">
                <input type="radio" name="operation_type" value="seedstock" 
                <?php 
                    echo ($info[0]['operation_type']=='seedstock') ? 'checked' : '';
                    echo set_radio('operation_type', 'seedstock');
                ?> 
            /> Seedstock
            </label>
            <label class="radio">
                <input type="radio" name="operation_type" value="hobby" 
                <?php 
                    echo ($info[0]['operation_type']=='hobby') ? 'checked' : '';
                    echo set_radio('operation_type', 'hobby'); 
                ?> 
            /> Hobby
            </label>
            <?php echo form_error($operation_type['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$operation_type['name']])?$errors[$operation_type['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Livestock Type Owned (Check all that apply)', 'livestock_type_owned[]', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned[]" value="goats" 
                <?php 
                    echo (preg_match("/goats/", $info[0]['livestock_type_owned'])) ? 'checked' : ''; 
                    echo set_checkbox('livestock_type_owned[]', 'goats'); 
                ?> 
            />Goats
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned[]" value="cattle" 
                <?php 
                    echo (preg_match("/cattle/", $info[0]['livestock_type_owned'])) ? 'checked' : ''; 
                    echo set_checkbox('livestock_type_owned[]', 'cattle'); 
                ?> 
            />Cattle
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned[]" value="sheep" 
                <?php 
                    echo (preg_match("/sheep/", $info[0]['livestock_type_owned'])) ? 'checked' : ''; 
                    echo set_checkbox('livestock_type_owned[]', 'sheep'); 
                ?> 
            />Sheep
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned[]" value="horses" 
                <?php 
                    echo (preg_match("/horses/", $info[0]['livestock_type_owned'])) ? 'checked' : ''; 
                    echo set_checkbox('livestock_type_owned[]', 'horses'); 
                ?> 
            />Horses
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned[]" value="exotics" 
                <?php 
                    echo (preg_match("/exotics/", $info[0]['livestock_type_owned'])) ? 'checked' : ''; 
                    echo set_checkbox('livestock_type_owned[]', 'exotics'); 
                ?> 
            />Exotics
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned[]" value="swine" 
                <?php 
                    echo (preg_match("/swine/", $info[0]['livestock_type_owned'])) ? 'checked' : ''; 
                    echo set_checkbox('livestock_type_owned[]', 'swine'); 
                ?> 
            />Swine
            </label>
            <?php echo form_error($livestock_type_owned['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$livestock_type_owned['name']])?$errors[$livestock_type_owned['name']]:''; ?>
        </div>
        <div class="control-group">
        <?php echo form_label('Total Number of Livestock', 'livestock_number', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="livestock_number" value="0-100" 
                <?php 
                    echo ($info[0]['livestock_number']=='0-100') ? 'checked' : ''; 
                    echo set_radio('livestock_number', '0-100'); 
                ?> 
            />0-100
            </label>
            <label class="radio">
                <input type="radio" name="livestock_number" value="101-300" 
                <?php 
                    echo ($info[0]['livestock_number']=='101-300') ? 'checked' : '';
                    echo set_radio('livestock_number', '101-300'); 
                ?>
            />101-300
            </label>
            <label class="radio">
                <input type="radio" name="livestock_number" value="301-500" 
                <?php 
                    echo ($info[0]['livestock_number']=='301-500') ? 'checked' : '';
                    echo set_radio('livestock_number', '301-500');
                ?> 
            />301-500
            </label>
            <label class="radio">
                <input type="radio" name="livestock_number" value="500+" 
                <?php 
                    echo ($info[0]['livestock_number']=='500+') ? 'checked' : '';
                    echo set_radio('livestock_number', '500+'); 
                ?> 
            />500+
            </label>
            <?php echo form_error($livestock_number['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$livestock_number['name']])?$errors[$livestock_number['name']]:'';
             ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Percent of Time Spent Managing Livestock', 'livestock_managing_percent', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="25% or less" 
                <?php
                    echo ($info[0]['livestock_managing_percent']=='25% or less') ? 'checked' : '';
                    echo set_radio('livestock_managing_percent', '1'); 
                ?> 
            />25% or less
            </label>
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="50%" 
                <?php
                    echo ($info[0]['livestock_managing_percent']=='50%') ? 'checked' : '';
                    echo set_radio('livestock_managing_percent', '2'); 
                ?>
            />50%
            </label>
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="75%" 
                <?php
                    echo ($info[0]['livestock_managing_percent']=='75%') ? 'checked' : '';
                    echo set_radio('livestock_managing_percent', '3');                 
                ?> 
            />75%
            </label>
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="Full Time" 
                <?php
                    echo ($info[0]['livestock_managing_percent']=='Full Time') ? 'checked' : '';
                    echo set_radio('livestock_managing_percent', '4'); 
                ?> 
            />Full Time
            </label>
            <?php echo form_error($livestock_managing_percent['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$livestock_managing_percent['name']])?$errors[$livestock_managing_percent['name']]:''; ?>
        </div>
    </div>
<hr>
<h2>Leasing Experience</h2>
    <div class="control-group">
        <?php echo form_label('Number of years you have leased pasture', $number_years_experience['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($number_years_experience); ?>
            <?php echo form_error($number_years_experience['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$number_years_experience['name']])?$errors[$number_years_experience['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Largest lease you have had (# of livestock)', $largest_lease['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($largest_lease); ?>
            <?php echo form_error($largest_lease['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$largest_lease['name']])?$errors[$largest_lease['name']]:''; ?>
        </div>
    </div>
<hr>
<h2>Background</h2>
    <div class="control-group">
        <?php echo form_label('Education', $education['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($education); ?>
            <?php echo form_error($education['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$education['name']])?$errors[$education['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Any training related to land management, e.g. Ranching for Profit, Beef Cattle Short Course', $education['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo form_input($land_management_training); ?>
            <?php echo form_error($land_management_training['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$land_management_training['name']])?$errors[$land_management_training['name']]:''; ?>
        </div>
    </div>

<!--         <?php echo form_radio('active', '1', FALSE, (1 == $member->active) ? set_radio('active', $member->active, TRUE) : set_radio('active', '1')); ?> 
        <?php echo form_radio('active', '0', FALSE, (0 == $member->active) ? set_radio('active', $member->active, TRUE) : set_radio('active', '0')); ?> -->
    </div>
<hr>
<?php
$data = array(
    'name'        => 'edit',
    'id'          => 'edit',
    'value'       => 'Edit Account',
    'class'       => 'btn btn-primary',
    );
echo form_submit($data);
echo form_close(); 
?>

</div><!-- end edit_account -->
</div><!-- end row_fluid -->
</div><!-- end container_fluid -->