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
    <!-- Styles for IE7 -->
    <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie7.css">
    <![endif]-->

    <!-- html5.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- css3-mediaqueries.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
</head>

<body>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- PAGE CONTAINER -->
    <div id="pageContainer">
        
        <!-- HEADER -->
        <header>
            <a href="#"><div id="logo"></div></a>
            <!-- NAVIGATION -->
            <div id="nav_wrapper">
                <ul class="navList">
                    <li class="navLi"><a href="http://pasturescout.com/blog/about-us/">About</a></li>
                    <li class="navLi"><a href="#">Contact</a></li>
                    <li class="navLi"><a href="#">Feedback</a></li>
                </ul><!-- close navigation -->


                <a href="auth/login"><img src='<?= base_url("assets/images/main/login.png"); ?>' alt="User Login" id="login_btn"></a>
            </div><!--end nav wrapper -->
        </header><!-- close header -->
        <?php
            if ($message = $this->session->flashdata('message')) {
                echo "<p class='message'>";
                echo $message;
                echo "</p>";
            }
        ?>




