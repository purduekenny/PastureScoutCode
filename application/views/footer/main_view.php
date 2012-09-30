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
<script type="text/javascript" src="<?= base_url("assets/plugins/birthday/bday-picker.min.js"); ?>"></script>


</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?= base_url("assets/plugins/blueimp_file_upload/js/vendor/jquery.ui.widget.js"); ?>"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?= base_url("assets/plugins/blueimp_file_upload/js/jquery.iframe-transport.js"); ?>"></script>
<!-- The basic File Upload plugin -->
<script src="<?= base_url("assets/plugins/blueimp_file_upload/js/jquery.fileupload.js"); ?>"></script>
<!-- The File Upload file processing plugin -->
<script src="<?= base_url("assets/plugins/blueimp_file_upload/js/jquery.fileupload-fp.js"); ?>"></script>
<!-- The File Upload user interface plugin -->
<script src="<?= base_url("assets/plugins/blueimp_file_upload/js/jquery.fileupload-ui.js"); ?>"></script>
<!-- The main application script -->
<script src="<?= base_url("assets/plugins/blueimp_file_upload/js/main.js"); ?>"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="<?= base_url('assets/plugins/blueimp_file_upload/js/cors/jquery.xdr-transport.js'); ?>"></script><![endif]-->
<script>
    $(function() {
        $(".datepicker").datepicker();
        $("#first_name").focus();
});
</script>
</body>
</html>

