<?php
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
?>

<div class="span8 content">
    <h2>Delete your account</h2>
<?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>

    <div class="control-group">
		<?php echo form_label('Password', $password['id'], array('class' => 'control-label')); ?>
        <div class="controls">
		<?php echo form_password($password); ?>
		<?php echo form_error($password['name'], '<span class="error">', '</span>'); ?>
            <?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
        </div>
    </div>
<?php
$data = array(
    'name'        => 'edit',
    'id'          => 'edit',
    'value'       => 'Delete Account',
    'class'       => 'btn btn-danger btn-block',
    'style'       => 'width:95%;'
    );
echo form_submit($data);
echo form_close(); ?>

</div><!-- end span8 -->

</div><!-- end row_fluid -->
</div><!-- end container_fluid -->