<?php
//Check for ?sent=1
if (!isset($_REQUEST['sent']))
{
	header("Location: http://www.meijervision.com/contact.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<?php
//Sent from contact form
switch($_REQUEST['sent'])
{
	case "1":
		print "<title>Vision Center at Meijer | Thank you for contacting us!</title>";
		break;
	case "eyeexam":
		print "<title>Vision Center at Meijer | Your appointment request has been sent!</title>";
		break;
}

$_GET['page'] = 'contact';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/960_24_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<?php include 'inc/analytics.php' ?>
</head>
<body>
<?php include 'inc/header.php' ?>
<div class="container_24">
<div id="main">
<?php
//Sent from contact form
switch($_REQUEST['sent'])
{
	case "eyeexam":
		print "<h1>Your appointment request has been sent!</h1>";
		print "<p>Our Vision Center staff will contact you to confirm your appointment. We look forward to serving you!</p>";
		break;
	default:
		print "<h1>Your message has been sent!</h1>";
		print "<p>Thank you for taking the time to contact us. Our customer service team will be in touch with you soon.</p>";
		break;
}
?>
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