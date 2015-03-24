<?php
@include($_SERVER['DOCUMENT_ROOT'] . "/data/functions-db.php"); 
@include($_SERVER['DOCUMENT_ROOT'] . "/data/functions-press.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | About Us</title>
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
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/analytics.php"); ?>
</head>
<body>
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php"); ?>
<div class="container_24">
<div class="grid_9">
<div id="main" style="border-right:solid 1px #eee; height:1080px;">
<h1>About Us</h1>
<h2>Our Mission</h2>
<blockquote>&quot;Providing quality eye care, fashionable eyewear, and savings you can see.&rdquo;</blockquote>

<p><br />The Vision Center at Meijer is wholly owned by Exodus Vision, LLC.  We are a licensee of Meijer, Inc., which allows us to provide the highest quality exams, eyeglasses, and contact lenses at discounted prices.</p>

<h2>Eyeglasses</h2>
<p>We have over 700 eyeglass frames to choose from, including name brands, private label, childrens, safety and sport, etc.  We offer everyday low prices on all of our frames to ensure everyone can find a pair of glasses in their price range.</p>

<h2>Lenses</h2>

<p>We offer thousands of different lens choices, including CR-39, Polycarbonate, Hi-Index, Glass, etc.  All of these can be supplemented with add-ons such as anti-reflective coating, tints, transitions, polarized lenses, etc.   We offer basic lenses as well as name brand lenses from all of the various lens companies. </p>

<h2>Contact Lenses</h2>

<p>Our contact lens selection is nearly unlimited.  We work with all of the major contact lens companies, and therefore are able to offer our contact lenses at discount prices.  Due to the number of stores in our chain, we are able to pass along price savings from the contact lens manufacturers directly to our patients.</p>


</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_9">
<div id="subnav" style="background-color:#fff; padding:0 14px;">
<h1>In the News</h1>
<?php dbPrintPressArticleLinks('2000-01-01', 3); ?>

<h2>Managed Care</h2>
<p>We are able to accept managed care from a number of providers including specific contracts from Eyemed, Davis Vision, Heritage, Avesis, etc.</p>

<p><a href="/insurance.php">View Accepted Insurance &amp; vision coverage plans</a>
</p>
</div>
</div><!--end .grid_6-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:1080px;">
<h1>We'd love to hear from you</h1>
<p>Enough about us, what about you?
<ul>
<li>Do you have questions about your vision health?</li>
<li>Would you like to know the latest styles that we have in stock?</li>
</ul>
<p>Our friendly staff will be happy to help you! Just <a href="locations.php">locate one of our stores</a> and call or <a href="contact.php">contact us</a> right here from our website.</p>
<h1>We're Hiring!</h1>
<p>Looking for a career opportunity? <a href="/about/careers.php">Apply Online</a></p>
<h1>Follow us on:</h1>
<a href="http://www.twitter.com/MeijerVision"><img src="images/48x48-twitter.png" width="48" height="48" border="0" alt="Follow us on Twitter!" /></a>
<a href="http://www.facebook.com/MeijerVision"><img src="images/48x48-fb.png" width="48" height="48" border="0" alt="Like us on Facebook!" /></a>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"-->
</div><!--.container_24 #main-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>