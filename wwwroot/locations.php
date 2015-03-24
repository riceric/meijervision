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
<title>Vision Center at Meijer | Come visit one of our 21 stores in Illinois, Indiana, Michigan and Ohio</title>
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
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/analytics.php"); ?>
</head>
<body>
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php"); ?>
<div class="container_24" id="mapc">
	<h1>Find a Vision Center nearest you</h1>
	<p>The Vision Center is currently located in 21 Meijer stores that service 6 major markets across the Midwest. Use the store locator below to find a Vision Center nearest you!</p>
	<p>Doctor hours vary by location. Please call your local vision center to schedule your appointment.</p>
	<form id="form-locator" name="form-locator">
	<div id="divmap">
	  <table border="0" cellpadding="0" cellspacing="0"> 
		<tbody> 
		  <tr>
			<td width="400" valign="top">
			<div style="padding:10px;background-color:#eee;">
				<div style="float:left;">
				<input type="text" id="addressInput2" size="30" title="Zip, City/State or Address" value="<?php echo $addressInput; ?>" />
				<input type="hidden" id="radiusSelect" value="50" /></div>
				<div style="float:left;"><a id="aLocateStore" class="button" href="#" onclick="searchLocations()"><span>Locate Store</span></a></div>
				<div class="clear"></div>
			</div>   		
			<div id="sidebar" style="overflow: auto; height:348px;"></div>
			</td>
			<td>
<div id="map" style="overflow: hidden; width:520px; height:400px"></div></td>
		  </tr> 
		</tbody>
	  </table>
	</div> 
	</form>   
</div><!--.container_24 #map_container-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>