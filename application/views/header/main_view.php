<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- set default device content size to 100% -->
    <base href="<?php echo base_url(); ?>" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Pasture Scout - Find it. Bid it. Lease it.</title>
    <!-- Styles for bootstrap -->
    <link rel="stylesheet" href='<?= base_url("assets/bootstrap/css/bootstrap.min.css"); ?>'>
    <!-- Styles for bootstrap responsive -->
    <link rel="stylesheet" href='<?= base_url("assets/bootstrap/css/bootstrap-responsive.min.css"); ?>'>
    <!-- jquery themes stylesheet-->
    <link rel="stylesheet" href='<?= base_url("assets/css/main/jquery/jquery.ui.theme.css"); ?>'>
    <!-- datepicker stylesheet -->
    <link rel='stylesheet' href='<?= base_url("assets/css/main/jquery/jquery.ui.datepicker.css"); ?>'>
    <!-- Main styles -->
    <link rel='stylesheet' href='<?= base_url("assets/css/main/master.css"); ?>'>
    <!-- Styles for styles for tables in horizontal mode -->
    <link rel='stylesheet' media='screen and (max-width:1000px)' href='<?= base_url("assets/css/main/large.css"); ?>'>
    <!-- Styles for tables in vertical mode and smartphones in horizonal mode -->
    <link rel='stylesheet' media='screen and (max-width:768px)' href='<?= base_url("assets/css/main/medium.css"); ?>'>
    <!-- Styles for smartphones -->
    <link rel='stylesheet' media='screen and (max-width: 480px)' href='<?= base_url("assets/css/main/small.css"); ?>'>
    <!-- Bootstrap Image Gallery styles -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plugins/bluimp/bootstrap-image-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?= base_url("assets/plugins/blueimp_file_upload/css/jquery.fileupload-ui.css"); ?>">
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC' rel='stylesheet' type='text/css'>
    <!-- base_url for javascript -->
    <script>
    /* <![CDATA[ */
        var baseurl = "<?php echo base_url(); ?>";
    /* ]]> */
    </script>
</head>
<!-- get controller/method for navigation styles-->
<body id = "<?=$this->router->class . '_' . $this->router->method?>">
<!-- WRAPPER -->
<div class="wrapper">

    <!-- PAGE CONTAINER -->
    <div id="pageContainer">
        
        <!-- HEADER -->
        <header>
            <a href="<?= base_url() . "properties"; ?>"><div id="logo"></div></a>
            <!-- NAVIGATION -->
            <div id="nav_wrapper">
                <ul class="navList">
                    
                    <?php
                        $email = $this->session->userdata('email');
                        if($email != '' ){
                            ?>
                                <li class="navLi"><a href='<?= base_url("properties"); ?>'>Pastures</a></li>
                                <li class="navLi"><a href='<?= base_url("forages"); ?>'>Harvested Forages</a></li>
                                <li class="navLi"><a href='<?= base_url("my_account"); ?>'>Account</a></li> 
                                <li class="navLi"><a href='<?= base_url("auth/logout"); ?>'>Logout</a></li>
                                </ul><!-- close navigation -->
                            <?php
                        }else{ ?>
                        <a href="<?php echo base_url() . 'auth/login'; ?>"><img src='<?= base_url("assets/images/main/login.png"); ?>' alt="User Login" id="login_btn"></a>
                        <?php

                        }
                    ?>
            </div><!--end nav wrapper -->
        </header><!-- close header -->
        <?php
            //show flashdata message
            if ($message = $this->session->flashdata('message')) {
                echo "<p class='alert'>";
                echo $message;
                echo "<a class=\"close\" data-dismiss=\"alert\" href=\"#\">&times;</a>";
                echo "</p>";
            }
        ?>