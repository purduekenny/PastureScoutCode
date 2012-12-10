<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Pasture Scout - Find it. Bid it. Lease it. </title>
    <!-- Main styles -->
    <link rel='stylesheet' href='assets/css/homepage/master.css' />
    <!-- Styles for styles for tables in horizontal mode -->
    <link rel='stylesheet' media='screen and (max-width:1000px)' href='assets/css/homepage/large.css' />
    <!-- Styles for tables in vertical mode and smartphones in horizonal mode -->
    <link rel='stylesheet' media='screen and (max-width:768px)' href='assets/css/homepage/medium.css' />
    <!-- Styles for smartphones -->
    <link rel='stylesheet' media='screen and (max-width: 480px)' href='assets/css/homepage/small.css' />
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
    <link rel="stylesheet" type="text/css" href="assets/css/homepage/slider_style.css" media="screen" />       
    
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
            <a href="<?php echo base_url(); ?>"><div id="logo"></div></a>
                <!-- NAVIGATION -->
                <div id="nav_wrapper">
                  <ul class="navList">
                        <li class="navLi"><a href="<?=base_url()?>about/">About</a></li>
                        <li class="navLi"><a href="<?=base_url()?>membership/">Membership</a></li>
                        <li class="navLi"><a href="<?=base_url()?>contact/">Contact</a></li>
                        <li class="navLi"><a href="<?= base_url()?>auth/register">Sign Up</a></li>
                    </ul><!-- close navigation -->
                        <a href="auth/login" id="button_login">
                            <img src="assets/images/homepage/login.png" alt="User Login" width="87" height="28" />
                        </a>
                </div><!--end nav wrapper -->
            </nav><!-- close navigation area-->
        </header><!-- close header -->

        <!-- INFO BAR -->
        <div id="infoBar">
            <div id="slider">
                <!--
                ##################################
                    -   KEN BURN BANNER -
                ##################################
                -->         


                <div class="bannercontainer light">
                    <ul>         
                        <!-- THE 1. SLIDE -->
                        <li data-transition="fade" data-startalign="center,top" data-zoom="in" data-zoomfact="1.6" data-endAlign="center,bottom" data-panduration="12" data-colortransition="4"><img alt="" src="assets/images/homepage/slider_images/slides/pscout1.png">                  
                                <div class="video_kenburner">
                                    <div class="video_kenburn_wrap">    
                                        <div class="video_video">
                                            <iframe class="video_clip" src="http://www.youtube.com/embed/SC4WNPnaMYo"></iframe>
                                        </div>
                                        <div class="video_details">
                                            <p class="cp-title">Pasture Scout</p>
                                            <p>PastureScout is an online marketplace that<br> allows users to list, find, and secure leases that meet their needs</p>
                                            <div class="clear"></div>                           
                                        </div>
                                        <div class="close"></div>
                                        
                                    </div>
                                </div>  
                                
                                <div class="creative_layer ">
                                    <div class="cp-left fade">
                                        <p class="cp-title">Leasing Made Simple</p>
                                        <p>PastureScout is an online marketplace <br> that allows users to list, find, and secure <br>leases that meet their needs.</p>
                                        <div class="clear"></div>                           
                                    </div>                                  
                                </div>
                        </li>        
                        <!-- THE 2. SLIDE -->
                        <li data-transition="slide" data-startalign="left,bottom" data-zoom="in" data-zoomfact="3" data-endAlign="center,center" data-panduration="8" data-colortransition="4"><img alt="" src="assets/images/homepage/slider_images/slides/pscout2.png">
                            <div class="creative_layer ">
                                    <div class="cp-bottom fadeup">
                                        <p class="cp-title">Why is PastureScout needed?</p>
                                        <p>There is growing demand for leased pasture.</p>
                                        <p>Leasing pasture is harder than it should be.</p>
                                    </div>                                  
                                </div>
                        </li>  
                        <!-- THE 3. SLIDE -->
                        <li data-transition="slide" data-startalign="left,bottom" data-zoom="in" data-zoomfact="3" data-endAlign="center,center" data-panduration="8" data-colortransition="4"><img alt="" src="assets/images/homepage/slider_images/slides/pscout3.png">
                            <div class="creative_layer ">
                                    <div class="cp-left fade">
                                        <p class="cp-title">How does PastureScout<br> Work?</p>
                                        <p>Discover and bid on pasture<br> leases that meet your needs</p>
                                        <p>Discover fair market price <br> for your pasture</p>                                           
                                    </div>                                  
                                </div>
                        </li>
                        <!-- THE 4. SLIDE -->
                        <li data-transition="fade" data-startalign="center,top" data-zoom="in" data-zoomfact="1.6" data-endAlign="center,bottom" data-panduration="12" data-colortransition="4"><img alt="" src="assets/images/homepage/slider_images/slides/pscout4.png">
                            <div class="creative_layer ">
                                    <div class="cp-right fade">
                                        <p class="cp-title">Sustainability</p>
                                        <p>Wise utilization of our forage <br>resources is more important<br>than ever.</p>                                           
                                    </div>                                  
                                </div>
                        </li>   
                    </ul>
                </div>      <!-- THE END OF THE BANNER EXMAPLE -->
                <div class="bannershadow centerme"><img width="100%" height="40px" src="assets/images/homepage/slider_images/bannershadow.png"></div>
            </div><!-- END SLIDER-->
            <!--
            ##############################
             - ACTIVATE THE BANNER HERE -
            ##############################
            -->
            <script type="text/javascript">
                
                var tpj=jQuery;
                tpj.noConflict();
                
                tpj(document).ready(function() {
                
                if (tpj.fn.cssOriginal!=undefined)
                    tpj.fn.css = tpj.fn.cssOriginal;

                    tpj('.bannercontainer').kenburn(
                        {                                       
                                                
                            thumbWidth:50,
                            thumbHeight:50,
                            
                            thumbAmount:5,                                                                                  
                            thumbStyle:"bullet",            //thumb, bullet, none, both
                            thumbVideoIcon:"off",
                            
                            thumbVertical:"top",
                            thumbHorizontal:"right",                            
                            thumbXOffset:20,
                            thumbYOffset:40,
                            bulletXOffset:0,
                            bulletYOffset:-16,
                            
                            hideThumbs:"on",
                            repairChromeBug:"on",
                                                                                                                                                                        
                            touchenabled:'on',
                            pauseOnRollOverThumbs:'off',
                            pauseOnRollOverMain:'on',
                            preloadedSlides:2,                          
                            
                            timer:14,
                            
                            debug:"off"                      
                        });     
                });
            </script>

           <!-- <div  id="signup" class="centerme"><a href="auth/register"><img src="assets/images/homepage/register.png" width="452" height="103" alt="Sign up" /></a></div>
               removed by client request--> 
                
            
        </div><!-- close info bar -->
        
        
        
        <!-- FIND BID LEASE -->
        <div id="findBidLease">
            <img src="assets/images/homepage/fbl.png" alt="Find Bid Lease">
        </div><!-- close find bid lease -->
        
        <!-- LONG TEXT CONTENT -->
        

        <div id="longContent">
                        <br /><br />
            <div id="poll">
                    <script type="text/javascript" charset="utf-8" src="http://static.polldaddy.com/p/6481409.js"></script>
                    <noscript><a href="http://polldaddy.com/poll/6481409/">When seeking a new pasture lease, how far are you willing to travel?</a></noscript>
            </div>

            <div id="blog">
                <!--[if IE]>
                <iframe src="http://www.pasturescout.com/blog/showlast3.php" type="text/html" style="border: none; background-color: #f8f8f8; " frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="300" height="100"></iframe>

                <![endif]-->
     
                <!--[if !IE]> <-->
                <object style="background-color: transparent;" type="text/html" data="http://www.pasturescout.com/blog/showlast3.php">
                <p>Visit our <a href="/blog">blog</a>.</p>
                </object>
                <!--> <![endif]-->

                <!--
                    <object data="http://www.pasturescout.com/blog/showlast3.php" width="300" height="100"> <embed src="http://www.pasturescout.com/blog/showlast3.php" width="300" height="100"> </embed> Error: Embedded data could not be displayed. </object>
                -->         
            </div>      
            <br style="clear: both;"> 
        </div><!-- close long text content -->
        
    </div><!-- close page container -->
    
    <!-- PUSH -->
    <div class="push"></div>

</div> <!-- close wrapper -->

<!-- FOOTER -->
<footer>

    <!-- GREEN FOOTER -->
    <div id="yellowLine"></div>
    <div id="greenFooter">
        <div id="asSeen">
        </div>
        
        <!-- FOOTER LINKS -->
        <div id="footerLinks">
            <!-- SITE LINKS -->
            <span id="siteLinks">
                <a href="<?=base_url()?>terms/">Terms of Service</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="<?=base_url()?>about">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="<?=base_url()?>membership">Membership</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="<?=base_url()?>contact">Contact</a>
            </span><!-- close site_links -->

            <!-- COPYRIGHT -->
            <span id="copyright">
                <p>Copyright &#169; 2012-2013 AgLink, LLC.</p>
            </span><!-- close copyright -->

            <!-- SOCIAL MEDIA LINKS -->
            <ul id="footerSocial">
                <li class="sociaMediaLi"><a href="http://www.facebook.com/pasturescout" target="_blank"><img src="assets/images/homepage/icon_facebook.png" width="24" height="24" alt="Facebook link" /></a></li>
                <li class="sociaMediaLi"><a href="http://www.twitter.com/pasturescout" target="_blank"><img src="assets/images/homepage/icon_twitter.png" width="24" height="24" alt="twitter link" /></li>
                <li class="sociaMediaLi"><a href="http://www.linkedin.com/company/ag-link-incorporated" target="_blank"><img src='<?= base_url("assets/images/main/icon_linkedin.png"); ?>' width="24" height="24" alt="Linked In" /></a></li>
                  <li class="sociaMediaLi"><a href="http://pasturescout.com/blog/" target="_blank"><img src='<?= base_url("assets/images/main/icon_blog.png"); ?>' width="24" height="24" alt="Pasture Scout Blog" /></a></li>
            </ul><!-- close social media -->
            
        </div><!-- close footer links -->
        
    </div><!-- close green footer -->

</footer><!-- close footer -->
</body>
</html>

