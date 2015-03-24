<?php
//if zipcode is provided, then populate
$addressInput = isset($_REQUEST['addressInput']) ? $_REQUEST['addressInput'] : '';
?>
<!DOCTYPE html>
<!--
 Vision Center at Meijer (Google Maps API): ABQIAAAA1fEDSdxR3qeEd0gXXNiT2RSVsZIxeIEVONIS-Zki7AqpxKur-hRmEaDZ2jYpCKIqVl2U3XXEBDfUcA
 localhost: bak.meijervision -> ABQIAAAA1fEDSdxR3qeEd0gXXNiT2RS45ipYmAPbuflkonYumCE__MY7vRSF2jMnR5w6fpYoHASDfMg8fGv-Bw
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Vision Center at Meijer | Come visit one of our 19 stores in Illinois, Indiana, Michigan and Ohio</title>
<?php 
$_GET['page'] = 'locations';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php");
?>
<link rel="stylesheet" href="/css/reset.css" />
<link rel="stylesheet" href="/css/960_24_col.css" />
<link rel="stylesheet" href="/css/style.css" />
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="/js/page-locations.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="/js/jquery.labelify.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	load();//Google Maps API
	<?php if ($addressInput != ''): //Run script if address is given ?>
	searchLocations();
	<?php endif ?>
	$('#addressInput2').keypress(function(e) {
		if(e.which == 13) {
			$(this).blur();
			$('#aLocateStore').focus().click();
			return false;
		}
	});
	
	$("#fullname, #email, #addressInput").labelify({
		labelledClass: "txt_inputhelp"
	});
	
});
</script>
<?php include '../inc/analytics.php' ?>
</head>
<body>
<?php include '../inc/header.php' ?>
<div class="container_24" id="mapc">
	<h1>Grand Openings in Indiana!</h1>
	<p>The Vision Center is currently located in 19 Meijer stores that service 6 major markets across the Midwest. Use the store locator below to find a Vision Center nearest you!</p>
	<p>Doctor hours vary by location. Please call your local vision center to schedule your appointment.</p>

<div class="storeListings">
<div class="locationAddress"><strong>Vision Center at Meijer - Indianapolis</strong><br>8375 East 96th Street, Indianapolis, IN<br><span><span id="gc-number-19" class="gc-cs-link" title="Call with Google Voice">(317) 842-6235</span></span><br><strong>Hours</strong><br>Coming Nov 10, 2012!<br><br><a href="http://maps.google.com/maps?q=8375%20East%2096th%20Street%2C%20Indianapolis%2C%20IN">Get directions to this location</a><br></div><div class="locationAddress"><strong>Vision Center at Meijer - Avon</strong><br>10841 E US 36, Avon, IN 46123<br><span><span id="gc-number-20" class="gc-cs-link" title="Call with Google Voice">(317) 209-8321</span></span><br><strong>Hours</strong><br>Coming Nov 10, 2012!<br><br><a href="http://maps.google.com/maps?q=10841%20E%20US%2036%2C%20Avon%2C%20IN%2046123">Get directions to this location</a><br></div></div>	
	
</div><!--.container_24 #map_container-->
<?php include '../inc/footer.php' ?>
</body>
</html>