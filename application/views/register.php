<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register Proof of Concept</title>

<style>
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
	background-image: url(images/info.png);
}
.success {
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url(<?= base_url() ?>images/success.png);
}
.warning {
	color: #9F6000;
	background-color: #FEEFB3;
	background-image: url(<?= base_url() ?>images/warning.png);
}
.error {
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url(<?= base_url() ?>images/error.png);
}
.validation {
    color: #D8000C;
    background-color: #FFBABA;
    background-image: url(<?= base_url() ?>images/validation.png);
}

</style>

</head>
<body>

<p>Remember, this is a functionality proof of concept. We'll make it beautiful in the next milestone. </p>

<?php echo validation_errors("<div class='validation'>","</div>"); ?>
<?php if(!empty($_SESSION["error"])) { echo "<div class='validation'>" . $_SESSION["error"] . "</div>"; $_SESSION["error"] = ""; }?>

<h3>Join Us</h3>
<form action="/users" method="post">

Email<br />
<input name="email" type="email"  value="someone@site.com" onfocus="this.value==this.defaultValue?this.value='':null" />
<br />

Password<br />
<input name="password" type="password" value="password" onfocus="this.value==this.defaultValue?this.value='':null" /><br />
<input type="submit" value="Join Us!" />
</form>

<p>Already registered? <a href="users/login">Login here</a>.</p>

</body>
</html>
