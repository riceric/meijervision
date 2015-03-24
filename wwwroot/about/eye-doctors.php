<?php
@include($_SERVER['DOCUMENT_ROOT'] . "/data/db-store-location-functions.php"); 
$docList = getFullDoctorsArray();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Meet The Eye Doctors at Our Vision Center at Meijer Stores</title>
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

<div id="section-doctors" class="container_24">
<div class="special-fx">
<div class="grid_24 content-padding">
	<h2>Meet The Eye Doctors at our Vision Centers</h2>
	<p>Providing quality eye care for our patients is our number one priority. Our experienced team of eye doctors at our Vision Centers are skilled professionals who offer a lot more than just an updated prescription for your eyeglasses or contact lenses. Our eye doctors provide tests to diagnose, treat, and manage vision changes and diseases&mdash;including diabetic retinopathy, cataracts, glaucoma, and macular degeneration.</p>
</div><!--.grid_24-->
<div class="clear"></div>
<?php
foreach ($docList as $doctor)
{
	$docStores = getDoctorsStoresArray($doctor["doctor_id"]);
	print "<div class=\"grid_5 content-padding\">";
	print "<img src=\"".$doctor["photo_url"]."\" width=\"150\" height=\"0\" border=\"0\" title=\"Dr. ".$doctor["full_name"].", Eye Doctor\" alt=\"Dr. ".$doctor["full_name"].", Eye Doctor\" class=\"profile-photo\" /></div><!--.grid_5-->";
	print "<div class=\"grid_19 content-padding doctor-bio\">";
	print "<hr /><h3>".$doctor["full_name"].", ".$doctor["doctoral_degree"]."</h3>";
	print $doctor["bio"];
	print "<p><strong>Dr.&nbsp;".$doctor["last_name"]." is now seeing patients at these convenient locations:</strong></p>";
	foreach ($docStores as $store)
	{
		print "<div class=\"grid_5\"><strong>".$store["name"].", Store #".$store["location_id"]."</strong><br />";
		print $store["addr_line1"]."<br />";
		print $store["city"].", ".abbrState($store["state"])." ".$store["zip"]."<br />";
		print $store["phone"]."<br />";
		print "<a href=\"".$store["page_url"]."\">View store hours</a><br /><a href=\"/schedule-eye-exam.php?state=".$store["state"]."&storeID=".$store["location_id"]."\">Schedule an eye exam</a></div>";
	}
	
	print "</div><!--.doctor-bio-->";
	print "<div class=\"clear\"></div>";
}
?>
</div><!--.special-fx-->
</div><!--#section-doctors .container_24-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>