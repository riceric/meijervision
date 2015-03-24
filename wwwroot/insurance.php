<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Accepted Insurance, Vision Coverage, Discount Vision Plans and Payment Methods</title>
<?php 
$_GET['page'] = 'about';
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
<?php include 'inc/analytics.php' ?>
</head>
<body>
<?php include 'inc/header.php' ?>
<div class="container_24">
<div class="grid_18">
<div id="main">
<h1>Insurance, Vision Coverage and Discount Vision Programs</h1>
<p>We are able to accept managed care from a number of providers, and we are working to grow this list to best serve your needs. The Vision Center currently supports the following insurance and vision coverage plans (availability may vary by location)*:</p>
<div><img src="/images/logos-insurance-wide.png" width="660" height="200" border="0" alt="We accept managed and discount vision programs such as EyeMed, Delta, Avesis, Davis, Superior, Heritage, NVA, AlwaysCare, PHP, Aetna, Outlook Vision Services, Quality Vision Network (QVN)" />
</div>
<div style="float:left; width:240px; display:none;">
<ul>
	<li>EyeMed</li>
	<li>Delta</li>
	<li>Avesis</li>
	<li>Davis</li>
	<li>Superior</li>
</ul>
</div>
<div style="float:left; display:none;">
<ul>
	<li>Heritage</li>
	<li>NVA</li>
	<li>AlwaysCare</li>
	<li>PHP - through EyeMed</li>
	<li>Aetna - through EyeMed</li>
</ul>
</div>
<div class="clear"></div>
<br />
<hr />
<h2>Discount Vision Programs</h2>
<ul>
	<li>AARP - through EyeMed</li>
	<li>Outlook Vision Services</li>
	<li>Quality Vision Network (QVN)</li>
</ul>
<br />
<hr />
<h2>Payment methods</h2>
<p>We accept most methods of payment, including <strong>AmEx</strong>, <strong>Discover</strong>, <strong>CareCredit</strong>, <strong>Visa</strong> and <strong>Mastercard</strong>.</p>
<a href="http://www.carecredit.com/apply/" target="_blank"><img src="/images/logo-carecredit.png" border="0" alt="We accept CareCredit. Apply Now!" title="We accept CareCredit. Apply Now!" /></a>
<br /><br />
<hr />
<em class="xsmall">* Please <a href="/contact.php">contact your nearest Vision Center</a> to see if your vision plan is accepted.</em>

</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:720px;">
<h1>We'd love to hear from you</h1>
<ul>
<li>Do you have questions about your insurance or vision coverage?</li>
<li>Would you like to schedule an eye exam or contact lens fitting?</li>
</ul>
<p>Our friendly staff will be happy to help you! Just <a href="locations.php">locate one of our stores</a> and call or <a href="contact.php">contact us</a> right here from our website.</p>
<h1>Follow us on:</h1>
<a href="http://www.twitter.com/MeijerVision"><img src="images/48x48-twitter.png" width="48" height="48" border="0" alt="Follow us on Twitter!" /></a>
<a href="http://www.facebook.com/MeijerVision"><img src="images/48x48-fb.png" width="48" height="48" border="0" alt="Like us on Facebook!" /></a>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"-->
</div><!--.container_24 #main-->
<?php include 'inc/footer.php' ?>
</body>
</html>