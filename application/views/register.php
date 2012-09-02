<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>PastureScout</title>
    <!-- Main styles -->
    <link rel='stylesheet' href='assets/css/main/master.css' />
    <!-- Styles for styles for tables in horizontal mode -->
    <link rel='stylesheet' media='screen and (max-width:1000px)' href='assets/css/main/large.css' />
    <!-- Styles for tables in vertical mode and smartphones in horizonal mode -->
    <link rel='stylesheet' media='screen and (max-width:768px)' href='assets/css/main/medium.css' />
    <!-- Styles for smartphones -->
    <link rel='stylesheet' media='screen and (max-width: 480px)' href='assets/css/main/small.css' />
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

    <!-- KenBurn CSS STYLE -->
    <link rel="stylesheet" type="text/css" href="assets/css/main/slider_style.css" media="screen" />       
    
     <!-- jQuery KenBurn Slider  -->    
    <script type="text/javascript" src="assets/plugins/slider_plugin/js/jquery.themepunch.plugins.min.js"></script>            
    <script type="text/javascript" src="assets/plugins/slider_plugin/js/jquery.themepunch.kenburn.min.js"></script>        
    <!-- KEN BURN CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/slider_plugin/css/settings.css" media="screen" />
    <!-- popbox login jquery -->
    <script type='text/javascript' charset='utf-8' src='assets/plugins/popbox_plugin/popbox.js'></script>
    <!-- popbox css-->
    <link rel='stylesheet' href='assets/plugins/popbox_plugin/popbox.css' type='text/css' media='screen' charset='utf-8'>
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
                    <!-- SOCIAL MEDIA LINKS -->
                    <ul class="socialMediaList">
                        <li class="socialMediaLi"><a href="#" target="_blank"><img src="assets/images/main/icon_facebook.png" width="24" height="24" alt="Facebook link" /></a></li>
                        <li class="socialMediaLi"><a href="#" target="_blank"><img src="assets/images/main/icon_twitter.png" width="24" height="24" alt="Twitter link" /></a></li>
                    </ul><!-- close social media -->
                    <ul class="navList">
                        <li class="navLi"><a href="#">About</a></li>
                        <li class="navLi"><a href="#">Contact</a></li>
                        <li class="navLi"><a href="#">Feedback</a></li>
                    </ul><!-- close navigation -->
                        <!-- BEGIN POPBOX PLUGIN -->
                    <div class='popbox'>
                        <a class='open' href='#'>
                          <img src='assets/images/main/login.png' alt="User Login" >
                        </a>
                        <div class='collapse'>
                            <div class='box'>
                                <div class='arrow'></div>
                                <div class='arrow-border'></div>

                                    <form action="http://gristmill.createsend.com/t/j/s/nklki/" method="post" id="subForm">
                                            <div class="input">
                                                <input type="text" name="cm-name" id="name" placeholder="Name" />
                                            </div>
                                            <div class="input" style="padding:10px 0">
                                                <input type="text" name="cm-nklki-nklki" id="nklki-nklki" placeholder="Email" />
                                            </div>
                                        <input type="submit" value="Sign In" /> <a href="#" class="close">Cancel</a>
                                    </form>

                                </div>
                            </div>
                        </div><!-- end popbox plugin-->
                </div><!--end nav wrapper -->
                    <script type='text/javascript'>
                        jQuery.noConflict();
                        jQuery(document).ready(function(){
                            jQuery('.popbox').popbox();
                        });
                    </script>
            </nav><!-- close navigation area-->
        </header><!-- close header -->

    <?php
        $firstName = array(
            'name'        => 'firstName',
            'id'          => 'firstName',
            'value'       => 'First Name',
            'maxlength'   => '50',
            'style'       => 'width:50%',
        );

        $lastName = array(
            'name'        => 'lastName',
            'id'          => 'lastName',
            'value'       => 'Last Name',
            'maxlength'   => '100',
            'style'       => 'width:50%',
        );

        $email = array(
            'name'        => 'email',
            'id'          => 'email',
            'value'       => 'email',
            'maxlength'   => '100',
            'style'       => 'width:50%',
        );

        $zipCode = array(
            'name'        => 'zipCode',
            'id'          => 'zipCode',
            'value'       => 'zipCode',
            'maxlength'   => '7',
            'style'       => 'width:50%',
        );

        $button = array(
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Join Now',
            'content' => 'Join Now'
        );

        echo form_open('register/submit');
        echo form_input($firstName);
        echo form_input($lastName);
        echo form_input($email);
        echo form_input($zipCode);
        echo form_button($button);
        echo form_close();
    ?>
    
    <!-- PUSH -->
    <div class="push"></div>

</div> <!-- close wrapper -->

<!-- FOOTER -->
<footer>

    <!-- GREEN FOOTER -->
    <div id="greenFooter">

        <!-- FOOTER LINKS -->
        <div id="footerLinks">
            <!-- SITE LINKS -->
            <span id="siteLinks">
                <a href="#">Terms of Service</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Contact</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Feedback</a>
            </span><!-- close site_links -->

            <!-- COPYRIGHT -->
            <span id="copyright">
                <p>Copyright &#169; 2012-2013 PastureScout, LLC.</p>
            </span><!-- close copyright -->

            <!-- SOCIAL MEDIA LINKS -->
            <ul id="footerSocial">
                <li class="sociaMediaLi"><a href="#" target="_blank"><img src="images/icon_facebook.png" width="24" height="24" alt="Facebook link" /></a></li>
                <li class="sociaMediaLi"><a href="#" target="_blank"><img src="images/icon_twitter.png" width="24" height="24" alt="Twitter link" /></a></li>
            </ul><!-- close social media -->
            
        </div><!-- close footer links -->
        
    </div><!-- close green footer -->

</footer><!-- close footer -->

</body>
</html>

