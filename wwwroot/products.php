<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Only the Best in Frame Styles and Lens Technology</title>
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
<h1>Only the Best in Frame Styles and Lens Technology</h1>

<h2>Eyeglasses</h2>
<p>We have over 700 eyeglass frames to choose from, including name brands, private label, childrens, safety and sport, etc.  We offer everyday low prices on all of our frames to ensure everyone can find a pair of glasses in their price range.</p>
<hr />

<h2>Lenses</h2>
<p>We offer thousands of different lens choices, including CR-39, Polycarbonate, Hi-Index, Glass, etc.  All of these can be supplemented with add-ons such as anti-reflective coating, tints, transitions, polarized lenses, high-definition, free-form progressives, etc. We offer basic lenses as well as name brand lenses from all of the various lens companies. </p>
<hr />

<h2>Contact Lenses</h2>
<p>Our contact lens selection is nearly unlimited.  We work with all of the major contact lens companies, and therefore are able to offer our contact lenses at discount prices.  Due to the number of stores in our chain, we are able to pass along price savings from the contact lens manufacturers directly to our patients.</p>

</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:580px;">
<h1>We'd love to hear from you</h1>
<ul>
<li>Do you have questions about our HD free-form digital progressive lenses?</li>
<li>Would you like to know more about the advantages of A/R lens coatings?</li>
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