<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- set default device content size to 100% -->
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
</head>
<!-- get controller/method for navigation styles-->
<body id = "<?=$this->router->class . '_' . $this->router->method?>">
<!-- WRAPPER -->
<div class="wrapper">

    <!-- PAGE CONTAINER -->
    <div id="pageContainer">
        
        <!-- HEADER -->
        <header>
            <a href="<?= base_url(); ?>"><div id="logo"></div></a>
            <!-- NAVIGATION -->
            <div id="nav_wrapper">
                <ul class="navList">
                    
                    <?php
                        $email = $this->session->userdata('email');
                        if($email != '' ){
                            ?>
                                <li class="navLi"><a href='<?= base_url("properties"); ?>'>Pastures</a></li>
                                <li class="navLi"><a href='<?= base_url("my_account"); ?>'>Hi, <?php echo $email ?></a></li> 
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
                echo "<p class='message'>";
                echo $message;
                echo "</p>";
            }
        ?>