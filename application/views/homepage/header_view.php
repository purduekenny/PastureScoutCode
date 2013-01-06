<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Pasture Scout - Find it. Bid it. Lease it. </title>
    <!-- Styles for bootstrap -->
    <link rel="stylesheet" href='<?= base_url("assets/bootstrap/css/bootstrap.min.css"); ?>'>
    <!-- Styles for bootstrap responsive -->
    <link rel="stylesheet" href='<?= base_url("assets/bootstrap/css/bootstrap-responsive.min.css"); ?>'>
    <!-- Main styles -->
    <link rel='stylesheet' href='<?= base_url("assets/css/homepage/master.css"); ?>' />
    <!-- Styles for styles for tables in horizontal mode -->
    <link rel='stylesheet' media='screen and (max-width:1000px)' href='<?= base_url("assets/css/homepage/large.css"); ?>' />
    <!-- Styles for tables in vertical mode and smartphones in horizonal mode -->
    <link rel='stylesheet' media='screen and (max-width:768px)' href='<?= base_url("assets/css/homepage/medium.css"); ?>' />
    <!-- Styles for smartphones -->
    <link rel='stylesheet' media='screen and (max-width: 480px)' href='<?= base_url("assets/css/homepage/small.css"); ?>' />
    <!-- google font -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display+SC' rel='stylesheet' type='text/css'>

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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

    <!-- KenBurn CSS STYLE -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/homepage/slider_style.css'); ?>" media="screen" />       
    
     <!-- jQuery KenBurn Slider  -->    
    <script type="text/javascript" src="<?= base_url('assets/plugins/slider_plugin/js/jquery.themepunch.plugins.min.js'); ?>"></script>            
    <script type="text/javascript" src="<?= base_url('assets/plugins/slider_plugin/js/jquery.themepunch.kenburn.min.js'); ?>"></script>        
    <!-- KEN BURN CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/slider_plugin/css/settings.css'); ?>" media="screen" />
    <!-- popbox login jquery -->
    <script type='text/javascript' charset='utf-8' src='<?= base_url("assets/plugins/popbox_plugin/popbox.js"); ?>'></script>
    <!-- popbox css-->
    <link rel='stylesheet' href='<?= base_url("assets/plugins/popbox_plugin/popbox.css"); ?>' type='text/css' media='screen' charset='utf-8'>
    <style type="text/css">
        body{
          /*  background-image:url("<?= base_url('assets/images/homepage/bg_body2.png'); ?>");*/
        }

        p, h2, h3{
            line-height: 1.5em;
        }
        h3{
            font-size: 18px;
            padding-top: 12px;
        }
        h1{
            font-size: 30px;
        }
        p{
            margin:0 0 15px 0;
        }
        h2{
            margin:10px 0 0px 0;
            font-size: 25px;
        }

        h1{
            margin:20px 0 0 0;
        }
        .content{
            width:90%;
            min-height:100px;
            margin: 0 0 10px 0;
            -webkit-border-radius:4px; 
            -moz-border-radius:4px; 
            border-radius: 4px;
            background: #fdfdfd;
            border:1px solid #ddd;
            padding: 0 30px 20px 30px;
        }
        ul{
            list-style:disc; 
            padding-left: 20px;
        }
        .error{
            display: inline-block;
            color:red;
        }
    </style>
</head>


<body>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- PAGE CONTAINER -->
    <div id="pageContainer">
        
        <!-- HEADER -->
        <header>
            <a href="<?php echo base_url(); ?>"><div id="logo"></div></a>
                <!-- NAVIGATION -->
                <div id="nav_wrapper">
                    <!-- SOCIAL MEDIA LINKS -->
                   
                    <ul class="navList">
                        <li class="navLi"><a href="<?=base_url()?>about/">About</a></li>
                        <li class="navLi"><a href="<?=base_url()?>membership/">Membership</a></li>
                        <li class="navLi"><a href="<?=base_url()?>contact/">Contact</a></li>
                    </ul><!-- close navigation -->
                        <a href="<?=base_url()?>auth/login" id="button_login">
                            <img src="<?= base_url('assets/images/homepage/login.png'); ?>" alt="User Login" width="87" height="28">
                        </a>
                </div><!--end nav wrapper -->
            </nav><!-- close navigation area-->
        </header><!-- close header -->
