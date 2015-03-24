<?php 
//Page variables
$monthlyPromoSummary = "$25 Student Eye Exams! Hurry, offer ends September 30, 2013.";
$monthlyPromoDetails = "For a limited time, student eye exams are only $25! Hurry, offer ends September 30, 2013! Don't forget about our $99 Frame and Lens Package for Kids, too!";
$imgCouponURL = "/eblasts/277x307-2013-25-exe-exam.jpg";

$_GET['page'] = 'coupons';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer Coupons <?php echo " | ".$monthlyPromoSummary;?></title>
<!--<title>Vision Center at Meijer | Our Monthly Specials and Printable Coupons!</title>-->
<?php 
@include($_SERVER['DOCUMENT_ROOT'] . "/data/currentPromoData.php"); 
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/960_24_col.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/print.css" media="print">
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
<h1>Current Monthly Special</h1>
<a class="button" href="#" onclick="window.print();return false;" style="margin-bottom:1em;"><span>PRINT COUPONS</span></a>
<div class="clear"></div>

<?php
foreach ($currentPromos as $promo)
{
	if (isset($promo['couponImgURL'])) //Do not add promos that do not specify a coupon image
	{
		print "<div class=\"coupon\" style=\"padding:10px;margin-top:2em;border:dashed 3px #666;width:640px;\">
		<div class=\"couponimg\" style=\"float:left;\">
		<img src=\"".$promo['couponImgURL']."\" width=\"277\" border=\"0\" title=\"".$promo['Summary']."\" alt=\"".$promo['Summary']."\" />
		</div><!--.couponimg-->
		<div class=\"couponspecs\" style=\"float:left; padding:0 15px;font-family:Arial,sans-serif;font-size:11px;width:320px;line-height:1.5em;\"><p style=\"font-size:1.2em;\"><strong>Vision Center at Meijer</strong>
		<br />www.meijervision.com</p>
		  <p><strong>".$promo['Title']."<br></strong></p>
		  <p>".$promo['Details']." <strong>".$promo['expiration']."</strong></p>
		  <p></p>
		  <!--.couponspecs-->
		</div><div style=\"clear: both;\"></div>
		</div>";
	}
}
?>
</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:1280px;">
<h1>We'd love to hear from you</h1>
<ul>
<li>Do you have questions about your vision health?</li>
<li>Would you like to know the latest styles that we have in stock?</li>
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