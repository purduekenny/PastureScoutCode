<?php
$name = array(
    'name'  => 'name',
    'id'    => 'name',
    'value' => set_value('name'),
    'maxlength' => 100
);
$farm = array(
    'name'  => 'farm',
    'id'    => 'farm',
    'value' => set_value('farm'),
    'maxlength' => 100
);
$zip = array(
    'name'  => 'zip',
    'id'    => 'zip',
    'value' => set_value('zip'),
    'maxlength' => 5
);
$email = array(
    'name'  => 'email',
    'id'    => 'email',
    'value' => set_value('email'),
    'maxlength' => 100
);
$phone = array(
    'name'  => 'phone',
    'id'    => 'phone',
    'value' => set_value('phone'),
    'maxlength' => 100
);
$subject = array(
    'name'  => 'subject',
    'id'    => 'subject',
    'value' => set_value('subject'),
    'maxlength' => 100
);
$message = array(
    'name'  => 'message',
    'id'    => 'message',
    'value' => set_value('message'),
    'rows'  => 30,
    'cols'  => 30
);
?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="content">
            <div class="row-fluid">
                <br />

         <div class="tabbable span12" style="margin-left: -5px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tabs1-pane1" data-toggle="tab">Contact Us?</a></li>
                    <li><a href="#tabs1-pane2" data-toggle="tab">Commonly Asked Questions?</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs1-pane1">
                       <?php
                //show flashdata message
                if ($message = $this->session->flashdata('message')) {
                    echo "<p class='alert' style='margin-top:10px'>";
                    echo $message;
                    echo "<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a>";
                    echo "</p>";
                }
                ?>
                    <h1>Contact Us</h1>
                    <p>We care about your questions and want your feedback to help us improve.  Fill in the form below to contact the PastureScout team directly, or just give us a call.</p>
                    <?php echo form_open(base_url().'contact/email/', array('class' => 'form-horizontal')) ?>
                        <div class="control-group">
                            <?php echo form_label('Your Name', $name['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input($name); ?>
                                <?php echo form_error($name['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$name['name']])?$errors[$name['name']]:''; ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <?php echo form_label('Farm or Business Name', $farm['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input($farm); ?>
                                <?php echo form_error($farm['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$farm['name']])?$errors[$farm['name']]:''; ?>
                            </div>
                        </div> 
                        <div class="control-group">
                            <?php echo form_label('Zip Code', $zip['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input($zip); ?>
                                <?php echo form_error($zip['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$zip['name']])?$errors[$zip['name']]:''; ?>
                            </div>
                        </div> 
                        <div class="control-group">
                            <?php echo form_label('Email', $email['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input($email); ?>
                                <?php echo form_error($email['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
                            </div>
                        </div> 
                        <div class="control-group">
                            <?php echo form_label('Phone', $phone['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input($phone); ?>
                                <?php echo form_error($phone['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?>
                            </div>
                        </div> 
                        <div class="control-group">
                            <?php echo form_label('Subject', $subject['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input($subject); ?>
                                <?php echo form_error($subject['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$subject['name']])?$errors[$subject['name']]:''; ?>
                            </div>
                        </div>                
                        <div class="control-group">
                            <?php echo form_label('Message', $message['id'], array('class' => 'control-label')); ?>
                            <div class="controls">
                                <?php echo form_textarea($message); ?>
                                <?php echo form_error($message['name'], '<span class="error">', '</span>'); ?>
                                <?php echo isset($errors[$message['name']])?$errors[$message['name']]:''; ?>
                            </div>
                        </div>
                        <?php 
                            $data = array(
                            'name'        => 'submit',
                            'id'          => 'submit',
                            'value'       => 'Send Email',
                            'class'       => 'btn btn-primary btn-block'
                            );
                            echo form_submit($data);
                            echo form_close();
                        ?>



                        <h2>Contact Information</h2>

                        <p>PastureScout<br>
                        PO Box 5191<br>
                        Kingsville, TX  78364<br>
                        (719) 297-1318<br>
                        <a href="mailto:info@pasturescout.com">info@pasturescout.com</a><br>
                        <a href="http://pasturescout.com">www.pasturescout.com</a>
                        </p>
                    
                    </div>
                    <div class="tab-pane" id="tabs1-pane2">
                    
                    <h1>Commonly Asked Questions</h1>

                    <h3>Is PastureScout a real estate broker or auctioneer?</h3>
                    <p>Neither. Think of PastureScout as a salebarn, a place where individuals come to network and do business.  PastureScout simply offers the location and technology for private parties to conduct transactions on terms they set themselves. PastureSout does not set the terms of any transaction or buy and sell any property.</p>

                    <h3>Does PastureScout charge commission?</h3>
                    <p>No. Fees are charged for membership and for the use of the auction technology.</p>

                    <h3>Does the highest bidder always win?</h3>
                    <p>Not necessarily. It is entirely the pasture owners choice who the auction winner is.</p>

                    <h3>What is pasture?</h3>
                    <p>Pasture is a piece of land that can be grazed by livestock.  This includes native range, improved pasture, dryland pasture, irrigated pasture, corn stalks, winter wheat, the list goes on!</p>

                    <h3>Is there a minimum lease term?</h3>
                    <p>No. Lease length is completely determined by a pasture owner. sPastureScout is a good way to find a summer grazing lease, a winter grazing lease, a monthly grazing lease, or a yearly grazing lease.</p>

                    <h3>What is harvested forage?</h3>
                    <p>All types of hay and silage are considered harvested forage.</p>
                    
                    <h3>How do I pay for or get paid for a lease?</h3>
                    <p>It is the responsibility of the pasture owner and seeker to come to exchange payment for a lease. PastureScout does not transfer payment between seekers and owners. PastureScout is simply a place where pasture owners and seekers can find one another and conduct business.  The auction tool is technology we provide for those who wish to use it.  Auction lengths, auction winners, and leasing contract details are set by the pasture owner.</p>


                    <h2>Contact Information</h2>

                    <p>PastureScout<br>
                    PO Box 5191<br>
                    Kingsville, TX  78364<br>
                    (719) 297-1318<br>
                    <a href="mailto:info@pasturescout.com">info@pasturescout.com</a><br>
                    <a href="http://pasturescout.com">www.pasturescout.com</a>
                    </p>

                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.tabbable -->
        </div>
        </div>
    </div><!-- end row-fluid -->
</div><!-- end container-fluid -->
