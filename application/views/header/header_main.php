<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Pasture Scout - Find it. Bid it. Lease it.</title>
    <!-- Main styles -->
    <link rel='stylesheet' href='<?= base_url("assets/css/main/master.css"); ?>' />
    <!-- Styles for styles for tables in horizontal mode -->
    <link rel='stylesheet' media='screen and (max-width:1000px)' href='<?= base_url("assets/css/main/large.css"); ?>' />
    <!-- Styles for tables in vertical mode and smartphones in horizonal mode -->
    <link rel='stylesheet' media='screen and (max-width:768px)' href='<?= base_url("assets/css/main/medium.css"); ?>' />
    <!-- Styles for smartphones -->
    <link rel='stylesheet' media='screen and (max-width: 480px)' href='<?= base_url("assets/css/main/small.css"); ?>' />
    <!-- Styles for jquery -->
    <link rel='stylesheet' href='<?= base_url("assets/css/main/jquery/jquery.ui.datepicker.css"); ?>' />
    

    <!-- html5.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- css3-mediaqueries.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url("assets/plugins/stock_jquery/jquery.ui.core.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/plugins/stock_jquery/jquery.ui.widget.js"); ?>"></script>
    <script type="text/javascript" src="<?= base_url("assets/plugins/stock_jquery/jquery.ui.datepicker.js"); ?>"></script>

    <script>
        $(function() {
            $( ".datepicker" ).datepicker();
        });
    </script>
</head>

<body>

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
            //show message
            if ($message = $this->session->flashdata('message')) {
                echo "<p class='message'>";
                echo $message;
                echo "</p>";
            }
        ?>




