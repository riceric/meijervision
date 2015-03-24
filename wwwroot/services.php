<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Premium services at your convenience</title>
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
<h1>Our Services</h1>

<h2>Comprehensive Eye Exams</h2>
<p>Our Vision Centers can give you a complete eye exam in about 20 minutes. An annual eye examination is important for your vision health, and can be important in detecting early indicators of eye conditions. Our doctors care about the health of your eyes, and they will take the time to make sure that you have a precise, up-to-date prescription. Call ahead and schedule an eye exam with one of our optometrists today! Walk-ins are also welcome.</p>

<p><strong>Already have a prescription?</strong> <a href="/locations.php">Come on in</a> and we'll help you pick out the perfect pair of eyewear that meets your vision needs and style!</p>

<p><a class="button" href="/schedule-eye-exam.php"><span>Schedule an Eye Exam</span></a><br /><br /></p>


<hr />

<h2>Lens Customization</h2>
<p>We offer a number of lens upgrades that can help customize your glasses to best fit your vision needs and lifestyle, including: Transitions lenses, anti-reflective coatings, computer glasses, no-line bifocals, and the latest in high-definition, digital lens technology.</p>
<hr />
<h2>Insurance / Vision Coverage</h2>
<p>We are able to accept vision coverage and payments from a number of providers including specific contracts from <strong>EyeMed</strong>, <strong>Davis Vision</strong>, <strong>CareCredit</strong>, <strong>Heritage</strong>, <strong>Avesis</strong>. <a href="/insurance.php">View a complete list of our supported programs</a>.</p>
<hr />
<h2>Frame Repairs and Adjustments</h2>
<p>Are your glasses sitting a little bit crooked on your nose? Come into the Vision Center for a <strong>complimentary adjustment and cleaning</strong>! We also offer minor frame repairs.<sup>*</sup></p>

<br />
<br />
<br />
<br />
<hr />
<em class="xsmall">*For our Ohio locations, please <a href="http://www.meijervision.com/locations-list.php?state=Ohio">call ahead to schedule adjustments or repairs</a>. The state of Ohio prohibits the adjusting or dispensing of eyeglasses unless there is a licensed optician on the premise.</em>
</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:680px;">
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