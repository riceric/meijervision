<?php
function storeAddress($fname,$lname,$email){
	// Validation
	if(!$_REQUEST['email']){ return "No email address provided"; } 

	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_REQUEST['email'])) {
		print "<h1>Sign up for exclusive promotions via email!</h1><p>Oops! The email address '".$_REQUEST['email']."' is invalid. Please try again.</p>"; 
		reprintform();
		return false;
	}

	require_once('inc/MCAPI.class.php');
	// grab an API Key from http://admin.mailchimp.com/account/api/
	$api = new MCAPI('9db0419f35f4c49dfe3e340a3f6f6ce8-us2');
	
	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
	// Click the "settings" link for the list - the Unique Id is at the bottom of that page. 
	$list_id = "418779435f";

	$merge_vars = array('FNAME'=>$fname, 'LNAME'=>$lname);
	if($api->listSubscribe($list_id, $_REQUEST['email'], $merge_vars) === true) {
		// It worked!	
		return '<h1>Thank you for signing up!</h1> Please check your email to confirm your newsletter subscription.';
	}else{
		// An error ocurred, return error message	
		return '<h1>Oops!</h1>' . $api->errorMessage;
	}	
}
function reprintform()
{
	print "<form id=\"form_newsletter2\" name=\"form_newsletter\" method=\"post\" action=\"newsletterthankyou.php\">";
	print "<input type=\"text\" name=\"fullname\" id=\"fullname\" value=\"\"  title=\"Your name\" /><br />";
	print "<input type=\"text\" name=\"email\" id=\"email\" value=\"\" title=\"Email address\" /><br />";
	print "<a class=\"button\" href=\"#\" onclick=\"document.forms['form_newsletter2'].submit();\"><span>Sign Me Up!</span></a></form>";
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Thank you for signing up for our newsletter</title>
<?php 
$_GET['page'] = 'contact';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/960_24_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery.labelify.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(":text").labelify({
		labelledClass: "txt_inputhelp"
	});
});
</script>
</head>
<?php include 'inc/analytics.php' ?>
<body>
<?php include 'inc/header.php' ?>
<div class="container_24">
<div id="main">
<?php 
if($_REQUEST){
	$arrname = explode(" ",$_REQUEST["fullname"]);
	$fname = $arrname[0];
	$lname = $arrname[count($arrname)-1];
	$email = $_REQUEST["email"];

	$message1 = "Hello,

Someone has signed up for your newsletter on your website!

Here is the information:

Name: $_REQUEST[fullname]
E-Mail: $_REQUEST[email]


";
	mail("info@meijervision.com", "MeijerVision.com Newsletter Signup", "$message1", "From: $email");


	print storeAddress($fname,$lname,$email); 
}
else
{
	reprintform();
}
?>
<div class="clear"></div>
<p></p>
<hr />
<h1>More ways to join the conversation</h1>
<p>Are you on Facebook? Do you have a Twitter account? Get social with us and get the inside scoop on our promotions and special events!<p>
<ul>
<li>Follow us on Twitter <strong><a href="http://www.twitter.com/MeijerVision">@MeijerVision</a></strong></li>
<li>Find us on Facebook <strong><a href="http://www.facebook.com/MeijerVision">http://facebook.com/MeijerVision</a></strong></li>
</ul>
<h1></h1>
</div><!--#main-->
</div><!--.container_24-->
<?php include 'inc/footer.php' ?>
</body>
</html>