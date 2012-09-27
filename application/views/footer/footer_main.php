   <!-- PUSH -->
    <div class="push"></div>
    </div> <!-- close page_container -->
</div> <!-- close wrapper -->

<!-- FOOTER -->
<footer>

    <!-- GREEN FOOTER -->
    <div id="greenFooter">

        <!-- FOOTER LINKS -->
        <div id="footerLinks">
            <!-- SITE LINKS -->
            <span id="siteLinks">
                <a href="#">Terms of Service</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://pasturescout.com/blog/about-us/">About</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Contact</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Feedback</a>
            </span><!-- close site_links -->

            <!-- COPYRIGHT -->
            <span id="copyright">
                <p>Copyright &#169; 2012-2013 PastureScout, LLC.</p>
            </span><!-- close copyright -->

            <!-- SOCIAL MEDIA LINKS -->
            <ul id="footerSocial">
                <li class="sociaMediaLi"><a href="http://www.facebook.com/pasturescout" target="_blank"><img src='<?= base_url("assets/images/main/icon_facebook.png"); ?>' width="24" height="24" alt="Facebook link" /></a></li>
                <li class="sociaMediaLi"><a href="http://www.twitter.com/pasturescout" target="_blank"><img src='<?= base_url("assets/images/main/icon_twitter.png"); ?>' width="24" height="24" alt="Twitter link" /></a></li>
            </ul><!-- close social media -->
            
        </div><!-- close footer links -->
        
    </div><!-- close green footer -->

</footer><!-- close footer -->
<!-- jquery -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!-- bootstrap js -->
<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<!-- jquery plugin -->
<script type="text/javascript" src="<?= base_url("assets/plugins/stock_jquery/jquery.ui.core.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/plugins/stock_jquery/jquery.ui.widget.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/plugins/stock_jquery/jquery.ui.datepicker.js"); ?>"></script>

<script>
    $(function() {
        $( ".datepicker" ).datepicker();
    });
</script>
</body>
</html>

