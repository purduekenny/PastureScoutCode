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
    'value' => isset($info[0]['state']) ? $info[0]['state'] : set_select('state'),
    'maxlength' => 30
);
$state_value = isset($info[0]['state']) ? $info[0]['state'] : set_select('state');
$zip_code = array(
    'name'  => 'zip_code',
    'id'    => 'zip_code',
    'value' => isset($info[0]['zip_code']) ? $info[0]['zip_code'] : set_value('zip_code'),
    'maxlength' => 5
);

$birthday = array(
    'name'  => 'birthday',
    'id'    => 'birthday',
    'value' => isset($info[0]['birthday']) ? $info[0]['birthday'] : set_value('birthday'),
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
    'name'  => 'operation_type[]',
    'checked' => isset($info[0]['operation_type']) ? 'checked' : '',
);

$livestock_type_owned = array(
    'name'  => 'livestock_type_owned[]',
    'value' => 'cattle'
);

$livestock_number = array(
    'name'  => 'livestock_number',
    'id'    => 'livestock_number',
    'value' => isset($info[0]['livestock_number']) ? $info[0]['livestock_number'] : set_value('livestock_number'),
    'maxlength' => 100
);
$livestock_managing_percent = array(
    'name'  => 'livestock_managing_percent',
    'id'    => 'livestock_managing_percent',
    'value' => isset($info[0]['livestock_managing_percent']) ? $info[0]['livestock_managing_percent'] : set_value('livestock_managing_percent'),
    'maxlength' => 100
);
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
        <?php echo form_label('State', $state['id'], array('class' => 'control-label')); ?>
        <div class="controls">
            <? echo state_dropdown('state', $state_value, 'state','state'); ?>
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
                <input type="radio" name="operation_type" value="cow" <?php echo set_radio('operation_type', 'cow'); ?> />Cow/Calf
            </label>
            <label class="radio">
                <input type="radio" name="operation_type" value="stocker" <?php echo set_radio('operation_type', 'stocker'); ?>
                 />Stocker
            </label>
            <label class="radio">
                <input type="radio" name="operation_type" value="seedstock" <?php echo set_radio('operation_type', 'seedstock');
                 ?> /> Seedstock
            </label>
            <label class="radio">
                <input type="radio" name="operation_type" value="hobby" <?php echo set_radio('operation_type', 'hobby'); ?> /> Hobby
            </label>
            <?php echo form_error($operation_type['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$operation_type['name']])?$errors[$operation_type['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Livestock Type Owned (Check all that apply)', 'livestock_type_owned', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned" value="cow" <?php echo set_checkbox('livestock_type_owned[]', 'cattle'); ?> />Cattle
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned" value="stocker" <?php echo set_checkbox('livestock_type_owned[]', 'goats'); ?> />Goats
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned" value="seedstock" <?php echo set_checkbox('livestock_type_owned[]', 'sheep'); ?> />Sheep
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned" value="hobby" <?php echo set_checkbox('livestock_type_owned[]', 'horses'); ?> />Horses
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned" value="hobby" <?php echo set_checkbox('livestock_type_owned[]', 'exotics'); ?> />Exotics
            </label>
            <label class="checkbox">
                <input type="checkbox" name="livestock_type_owned" value="hobby" <?php echo set_checkbox('livestock_type_owned[]', 'swine'); ?> />Swine
            </label>
            <?php echo form_error($livestock_type_owned['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$livestock_type_owned['name']])?$errors[$livestock_type_owned['name']]:''; ?>
        </div>
        <div class="control-group">
        <?php echo form_label('Total Number of Livestock', 'livestock_number', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="livestock_number" value="1" <?php echo set_radio('livestock_number', '1'); ?> />0-100
            </label>
            <label class="radio">
                <input type="radio" name="livestock_number" value="2" <?php echo set_radio('livestock_number', '2'); ?>
                 />101-300
            </label>
            <label class="radio">
                <input type="radio" name="livestock_number" value="3" <?php echo set_radio('livestock_number', '3');
                 ?> />301-500
            </label>
            <label class="radio">
                <input type="radio" name="livestock_number" value="4" <?php echo set_radio('livestock_number', '4'); ?> />500+
            </label>
            <?php echo form_error($livestock_number['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$livestock_number['name']])?$errors[$livestock_number['name']]:''; ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label('Percent of Time Spent Managing Livestock', 'livestock_managing_percent', array('class' => 'control-label')); ?>
        <div class="controls">
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="1" <?php echo set_radio('livestock_managing_percent', '1'); ?> />25% or less
            </label>
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="2" <?php echo set_radio('livestock_managing_percent', '2'); ?>
                 />50%
            </label>
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="3" <?php echo set_radio('livestock_managing_percent', '3');
                 ?> />75%
            </label>
            <label class="radio">
                <input type="radio" name="livestock_managing_percent" value="4" <?php echo set_radio('livestock_managing_percent', '4'); ?> />Full Time
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
            <?php echo form_input($education); ?>
            <?php echo form_error($education['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$education['name']])?$errors[$education['name']]:''; ?>
        </div>
    </div>

<!--         <?php echo form_radio('active', '1', FALSE, (1 == $member->active) ? set_radio('active', $member->active, TRUE) : set_radio('active', '1')); ?> 
        <?php echo form_radio('active', '0', FALSE, (0 == $member->active) ? set_radio('active', $member->active, TRUE) : set_radio('active', '0')); ?> -->
    </div>
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