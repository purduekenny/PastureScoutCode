<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<base href="<?php echo base_url(); ?>"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Pasture Scout - Find it. Bid it. Lease it. </title>

<style type="text/css">
* { margin:0; }
html { height:100%; }
body { background-color:#f8f8f8; margin:0px; padding:0px; height:100%; font-family:Arial, Helvetica, sans-serif; }

p { font-size:13px; color:#9d9c9c; margin:3px 0 0 133px; font-style:italic; }

#wrapper-1 { width:750px; margin:0px auto; }
#wrapper-2 { margin:70px 0 0 0; height:530px; background-image:url('assets/images/viral/JohnWayne.png'); background-repeat:no-repeat; text-align:left; display:inline-block; }
#content { width:487px; margin:110px 0 0 131px; display:inline-block; text-align:center; }

.sub_message { margin:25px 0 0 0; }
#signup_form { width:330px; margin:40px 0 0 0; }

.email { background-color:#ffffff; border:1px solid #dbdbdb; padding:5px; -webkit-border-radius:8px; -moz-border-radius:8px; height:40px; font-size:20px; font-family:Arial, Helvetica, sans-serif; float:left; color:#d7d7d7; }

/***** Button Hover *****/
#form { position:relative; float:right; }
#form li { margin:0px; padding:0px; list-style:none; position:absolute; }
#form li { height:53px; display:block; }
#form a { height:53px; display:block; background-image:url('assets/images/viral/btn_sprite.png'); }

#update { left:0px; top:0px; width:196px; }
#update a { background-position:0px 0px; }
#update a:hover { background-position:0px -53px; }

/***** STICKY FOOTER *****/
.wrapper { min-height:100%; height:auto !important; height:100%; margin:0 auto -60px; /* the bottom margin is the negative value of the footer's height */ }
.push { height:60px; /* .push must be the same height as .footer */ }
.footer { background-image:url('assets/images/viral/grass.png'); background-repeat:repeat-x; height:60px; /* .push must be the same height as .footer */ }

/* VALIDATION ERROR MESSAGES */
.notice, .success, .warning, .error, .validation {
	border: 1px solid;
	margin: 10px 0px;
	padding:15px 10px 15px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
}
.notice {
	color: #00529B;
	background-color: #BDE5F8;
	background-image: url(assets/images/info.png);
}
.success {
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url(assets/images/success.png);
}
.warning {
	color: #9F6000;
	background-color: #FEEFB3;
	background-image: url(assets/images/warning.png);
}
.error {
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url(assets/images/error.png);
}
.validation {
    color: #D8000C;
    background-color: #FFBABA;
    background-image: url(assets/images/validation.png);
}

</style>

<script type="text/javascript">
function submitform()
{
  document.viral.submit();
}
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30898443-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>


<body>

<div class="wrapper">
	<div id="wrapper-1">
	    <div id="wrapper-2">
			<div id="content">
		    	<img src="assets/images/viral/main_message.png" alt="Having trouble finding or securing a pasture lease?" />
	            <img class="sub_message" src="assets/images/viral/sub_message.png" alt="Be part of the next evolution in pasture leasing." />
                
                <?php echo validation_errors("<div class='validation'>","</div>"); ?>
                <?php
					
					if(!empty($SESSION['success'])) {
						 echo "<div class='success'>" . $SESSION['success']. "</div>"; 
					}
				 ?>
                 <div id="signup_form">
	                
               		<form id="viral" name="viral" method="post" action="viral">
               		 <input type="text" class="email" name="email" value="What is your email?" onfocus="this.value==this.defaultValue?this.value='':null" size="25" /> 
	                </form>
                
	                <ul id="form">
						<li id="update"><a href="javascript: submitform()"  ></a></li>
					</ul>

				</div> <!-- CLOSE SIGNUP_FORM -->

    
		    </div> <!-- CLOSE CONTENT -->
            <p>Sign up to be notified when PastureScout goes live.</p>
		</div> <!-- CLOSE WRAPPER-2 -->
	</div> <!-- CLOSE WRAPPER-1 --> 

	<div class="push"></div>
</div> <!-- CLOSE WRAPPER -->
<div class="footer"></div>

</body>
</html>