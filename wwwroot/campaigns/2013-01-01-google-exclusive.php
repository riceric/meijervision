<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Savings You Can See!</title>
<?php 
$_GET['page'] = 'coupons';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="/css/reset.css" />
<link rel="stylesheet" href="/css/960_24_col.css" />
<link rel="stylesheet" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/print.css" media="print">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="/js/jquery.labelify.js"></script>
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
<div class="grid_18">
<div id="main">
<h1>Savings You Can See!</h1>
<a class="button" href="#" onclick="window.print();return false;" style="margin-bottom:1em;"><span>PRINT COUPONS</span></a>
<div class="clear"></div>
<div class="coupon" style="padding:10px;margin-top:0em;border:dashed 3px #666;width:640px;">
<img src="/images/637x307-2013-01-01-25OFFCoupon.jpg" width="637" height="307" border="0" alt="Save an extra $20 on our current sale!" />
</div><!--.coupon-->
<div class="coupon" style="padding:10px;margin-top:2em;border:dashed 3px #666;width:640px;">
<div class="couponimg" style="float:left;">
<img src="/eblasts/277x307-2012Dec.jpg" width="277" border="0" title="SAVE 52% on your next pair of eyeglasses! Or SAVE 25% on contact lenses! Offer ends December 31, 2012." alt="SAVE 52% on your next pair of eyeglasses! Or SAVE 25% on contact lenses! Offer ends December 31, 2012." />
</div><!--.couponimg-->
<div class="couponspecs" style="float:left; padding:0 15px;font-family:Arial,sans-serif;font-size:11px;width:320px;line-height:1.5em;"><p style="font-size:1.2em;"><strong>Vision Center at Meijer</strong>
<br />www.meijervision.com</p>
<strong>DECEMBER SALE!</strong> Purchase a complete pair of prescription eyeglasses and receive 52% off the retail value of the frame and lenses. Order a year's supply of contact lenses and receive 25% off the retail value of the lenses, plus free shipping to your home or office. Promotion does not apply to sportswear, non-prescription sunglasses, readers or other accessories. Cannot be combined or used in conjunction with any other offer, vision care plan, package pricing or prior orders. Please see your local retail store for additional details. <strong>Offer ends December 31, 2012.</strong>
</div><!--.couponspecs-->
<div style="clear: both;"></div>
</div>

</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:780px;">
<h1>Ohio Locations</h1>
<div id="sidebar" style="overflow: auto; height:520px;"><div class="locationAddress" style="cursor: pointer;"><strong>Canal Winchester</strong><br>8300 Meijer Drive
Canal Winchester, OH 43110 <br><span><span id="gc-number-0" class="gc-cs-link" title="Call with Google Voice">(614) 920-1643</span></span><br><br>Mon-Fri 10 am - 7 pm<br> Sat 9 am - 4 pm<br><a href="http://maps.google.com/maps?q=8300%20Meijer%20Drive%0ACanal%20Winchester%2C%20OH%2043110%20">Get directions to this location</a><br></div><div class="locationAddress" style="cursor: pointer;"><strong>Reynoldsburg</strong><br>8000 E. Broad St
Reynoldsburg, OH 43068<br><span><span id="gc-number-1" class="gc-cs-link" title="Call with Google Voice">(614) 751-3902</span></span><br><br>Mon-Fri 10 am - 7 pm<br> Sat 9 am - 4 pm<br><a href="http://maps.google.com/maps?q=8000%20E.%20Broad%20St%0AReynoldsburg%2C%20OH%2043068">Get directions to this location</a><br></div><div class="locationAddress" style="cursor: pointer;"><strong>Grove City</strong><br>2811 London-Groveport Rd
Grove City, OH 43123<br><span><span id="gc-number-2" class="gc-cs-link" title="Call with Google Voice">(614) 875-0506</span></span><br><br>Mon-Fri 10 am - 7 pm<br> Sat 9 am - 4 pm<br><a href="http://maps.google.com/maps?q=2811%20London-Groveport%20Rd%0AGrove%20City%2C%20OH%2043123">Get directions to this location</a><br></div>
</div>
<p><strong>Looking for a different location?</strong></p>
<div class="locationAddress" style="cursor: pointer;"><a href="/locations-list.php?state=Illinois">View stores in Illinois</a><br><a href="/locations-list.php?state=Indiana">View stores in Indiana</a><br><a href="/locations-list.php?state=Michigan">View stores in Michigan</a><br><a href="/locations-list.php?state=Ohio">View stores in Ohio</a><br><a href="/locations-list.php">View all stores</a></div>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"-->
</div><!--.container_24 #main-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>