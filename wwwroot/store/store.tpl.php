<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | <?php print $storeDetails["phone"]; ?> | <?php print $storeDetails["address"]; ?></title>
<?php 
$_GET['page'] = 'about';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="/css/reset.css" />
<link rel="stylesheet" href="/css/960_24_col.css" />
<link rel="stylesheet" href="/css/style.css" />
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/js/jquery.labelify.js"></script>
<script src="/js/page-locations.js"></script>
<script src="http://plugins.learningjquery.com/expander/jquery.expander.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	loadLatLng(<?php print $storeDetails["lat"];?>,<?php print $storeDetails["lng"];?>);

	$(":text").labelify({
		labelledClass: "txt_inputhelp"
	});
	
	/** View more / less **/
	$(".doctor-bio").expander({
		slicePoint: 500,
		expandText: 'Read more',
		expandPrefix: '&hellip; ',
		userCollapseText: 'Less',
		userCollapsePrefix: ' ',
	});
	
});
</script>

<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/analytics.php"); ?>
</head>
<body class="page-store">
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php"); ?>
<form id="store-location-map-vars">
<input type="hidden" id="radiusSelect" value="25" />
</form>
<div id="section-main" class="container_24">
<div class="grid_8">
<div class="content-padding" xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Organization">
<div class="icon-label-container"><h1 class="address" property="v:name"><?php print $storeDetails["name"];?> </h1><span style="font-size:10px;color:#999;">(Store #<?php print $storeNumber; ?>)</span></div>
<div rel="v:address">
<div typeof="v:Address"><?php 
	print "<span property=\"v:street-address\">".$storeDetails["addr_line1"]."</span><br />";
	print "<span property=\"v:locality\">".$storeDetails["city"]."</span>,&nbsp;<span property=\"v:region\">".$storeDetails["state"]."</span>&nbsp;<span property=\"v:postal-code\">".$storeDetails["zip"]."</span><br />";
	//$trans = array("\n" => "<br />");	//Convert semi-colons to HTML linebreaks
	//print strtr($storeDetails["address"],$trans);
?>
<?php print $storeDetails["phone"];?><br /><br /></div><!--v:Address-->
</div><!--v:address-->
<div rel="v:geo">
  <span typeof="v:Geo">
	 <span property="v:latitude" content="<?php print $storeDetails["lat"];?>"></span>
	 <span property="v:longitude" content="<?php print $storeDetails["lng"];?>"></span>
  </span>
</div><!--v:geo-->
<div class="icon-label-container">
<div class="icon-label"><strong>Hours</strong></div>
<div class="icon-hours"></div></div><!--.icon-label-container-->
<br />
<?php 
	$trans = array(";" => "<br />");	//Convert semi-colons to HTML linebreaks
	print strtr($storeDetails["hours"],$trans);
?>
</p>
<p><a class="button" href="/schedule-eye-exam.php?state=<?php print $storeDetails["state"]; ?>&storeID=<?php print $storeNumber; ?>"><span>Schedule an Appointment</span></a></p>
<br /><br />
<div class="clear"></div>
<div class="icon-label-container"><div class="icon-label"><strong>Available Services</strong></div></div><!--.icon-label-container-->
<ul>
<?php
foreach ($storeDetails["services"] as $service)
{
		print "<li>".$service["description"]."</li>";
}
?>
</ul>
</div><!--v:Organization-->
</div><!--.grid_8"-->
<div class="grid_16">
<div class="content-padding" style="padding-top:20px;">
<div id="map" style="border:solid 1px #ccc; overflow: hidden; width: 580px; height: 280px;"></div>
<a href="http://maps.google.com/maps?q=<?php 
	$trans = array("\n" => ",", " " => "+");	//Convert semi-colons to HTML linebreaks
	print strtr($storeDetails["address"],$trans);
?>" target="_blank">View Larger Map / Directions</a>
</div><!--.content-padding-->
</div><!--.grid_16"-->
</div><!--#section-main .container_24-->
<div id="section-payment" class="container_24">
<div class="special-fx">
<div class="grid_8">
<div class="content-padding">
<div class="icon-label-container"><div class="icon-label"><strong>Accepted Insurance/Vision Coverage</strong></div></div><!--.icon-label-container-->
<ul>
<?php
//Insert regional insurance
if ($storeDetails["state"] == "Michigan") {
	print "<li>Blue Cross Blue Shield of Michigan</li>";
	print "<li>EyeMed</li>";
	print "<li>Delta</li>";
}
else
{
	print "<li>EyeMed</li>";
	print "<li>Delta</li>";
	print "<li>Avesis</li>";
}
?>
	<li><a href="/insurance.php">View full listing</a></li><!--
	<li>Davis</li>
	<li>Superior</li>
	<li>Heritage</li>
	<li>National Vision Administrators (NVA)</li>
	<li>AlwaysCare</li>
	<li>Physicians Health Plan (PHP)</li>
	<li>Aetna</li>
</ul>

<p><strong>Discount Vision Programs</strong></p>
<ul>
	<li>AARP - through EyeMed</li>
	<li>Outlook Vision Services</li>
	<li>Quality Vision Network (QVN)</li>-->
</ul>
</div><!--#main-->
</div><!--.grid_8"-->
<div class="grid_8">
<div class="content-padding">
We accept most methods of payment, including <strong>AmEx</strong>, <strong>Discover</strong>, <strong>CareCredit</strong>, <strong>Visa</strong> and <strong>Mastercard.<br /></strong>
<div class="icon-label-container">
<div class="icon-label"></div>
<div class="icons-cc"></div></div><!--.icon-label-container-->
</div><!--.content-padding-->
</div><!--.grid_8"-->
<div class="grid_8">
<div class="content-padding">
<?php
//Insert regional logos
if ($storeDetails["state"] == "Michigan") {
	print "<a href=\"/insurance.php\"><img src=\"/images/logo-bcbs-mi.png\" border=\"0\" alt=\"Now Accepting Blue Cross Blue Shield of Michigan!\" /></a>";
}
?>
<a href="/insurance.php"><img src="/images/logo-carecredit.png" border="0" alt="We accept CareCredit" /></a>
</div><!--.content-padding-->
</div><!--.grid_8"-->
</div><!--.special-fx-->
</div><!--.container_24-->
<div id="section-doctors" class="container_24">
<div class="special-fx">
<div class="grid_24 content-padding">
	<h2>Meet The Eye Doctors at our <?php print $storeDetails["city"].", ".abbrState($storeDetails["state"]); ?> Vision Center</h2>
	<p>Providing quality eye care for our patients is our number one priority. Our experienced team of eye doctors at our <?php print $storeDetails["city"].", ".abbrState($storeDetails["state"]); ?> Vision Center are skilled professionals who offer a lot more than just an updated prescription for your eyeglasses or contact lenses. Our optometrists provide tests to diagnose, treat, and manage vision changes and diseases&mdash;including diabetic retinopathy, cataracts, glaucoma, and macular degeneration.</p>
</div><!--.grid_24-->
<div class="clear"></div>
<?php
foreach ($storeDetails["doctors"] as $doctor)
{
	print "<div class=\"grid_5 content-padding\">";
	print "<img src=\"".$doctor["photo_url"]."\" width=\"150\" height=\"0\" border=\"0\" title=\"Dr.".$doctor["full_name"].", ".$storeDetails["city"].", ".abbrState($storeDetails["state"])." Eye Doctor\" alt=\"Dr.".$doctor["full_name"].", ".$storeDetails["city"].", ".abbrState($storeDetails["state"])." Eye Doctor\" class=\"profile-photo\" /></div><!--.grid_5-->";
	print "<div class=\"grid_19 content-padding doctor-bio\">";
	print "<h3>".$doctor["full_name"].", ".$doctor["doctoral_degree"]."</h3>";
	print $doctor["bio"];
	print "</div><!--.doctor-bio-->";
	print "<div class=\"clear\"></div>";
}
?>
</div><!--.special-fx-->
</div><!--#section-doctors .container_24-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>