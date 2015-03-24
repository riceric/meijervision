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
<img src="/images/meijer_367x307_coupon_feb.jpg" width="637" height="307" border="0" alt="Save an extra $20 on our current sale!" />
</div><!--.coupon-->
<div class="coupon" style="padding:10px;margin-top:2em;border:dashed 3px #666;width:640px;">
<div class="couponimg" style="float:left;">
<img src="/images/277x307_coupon_feb.jpg" width="277" border="0" title="Presidents&rsquo; Sale! $100 Off Any Complete Pair of Eyeglasses!" alt="Presidents&rsquo; Sale! $100 Off Any Complete Pair of Eyeglasses!" />
</div><!--.couponimg-->
<div class="couponspecs" style="float:left; padding:0 15px;font-family:Arial,sans-serif;font-size:11px;width:320px;line-height:1.5em;"><p style="font-size:1.2em;"><strong>Vision Center at Meijer</strong>
<br />www.meijervision.com</p>
  <p><strong>Presidents&rsquo; Sale<br>
    $100 Off Any Complete Pair of Eyeglasses</strong></p>
  <p>Purchase a complete pair of prescription eyeglasses and receive $100 off the retail value. Promotion does not apply to sportswear, non-prescription sunglasses, readers or other accessories. Cannot be combined or used in conjunction with any vision care plan, insurance benefits, package pricing or prior orders. Please see your local Vision Center for additional details. </p>
  <p>Offer ends February 28, 2013.</p>
  <!--.couponspecs-->
</div><div style="clear: both;"></div>
</div>

</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:780px;">
<h1>Battle Creek Locations</h1>
<div id="sidebar" style="overflow: auto; height:350px;"><div class="locationAddress" style="cursor: pointer;"><br>
  6405 B Drive North<br>Battle Creek, MI  60120<br>
  <span><span id="gc-number-0" class="gc-cs-link" title="Call with Google Voice">(269) 979-3128</span></span><br><br>Mon-Fri 10 am - 7 pm<br> Sat 9 am - 4 pm<br><a href="http://maps.google.com/maps?q=6405%20B%20Drive%20North%2C%20Battle%20Creek%2C%20MI%2049014">Get directions to this location</a><br></div>
  <div class="locationAddress" style="cursor: pointer;"><strong> </strong><br>
    2191 Columbia Ave West<br>Battle Creek, MI  60120<br>
    <span><span id="gc-number-1" class="gc-cs-link" title="Call with Google Voice">(269) 968-1600</span></span><br><br>Mon-Fri 10 am - 7 pm<br> Sat 9 am - 4 pm<br><a href="http://maps.google.com/maps?q=2191%20West%20Columbia%20Ave%0ABattle%20Creek%2C%20MI%2049015">Get directions to this location</a><br></div>
</div>
<p><strong>Looking for a different location?</strong></p>
<div class="locationAddress" style="cursor: pointer;"><a href="/locations-list.php?state=Illinois">View stores in Illinois</a><br><a href="/locations-list.php?state=Indiana">View stores in Indiana</a><br><a href="/locations-list.php?state=Michigan">View stores in Michigan</a><br><a href="/locations-list.php?state=Ohio">View stores in Ohio</a><br><a href="/locations-list.php">View all stores</a></div>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"-->
</div><!--.container_24 #main-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>