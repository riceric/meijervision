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
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/960_24_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="js/page-locations.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/jquery.labelify.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	function loadStoreListings(strState){
		if (strState != "")
		{
			$.getJSON("data/locations-list-JSON.php",{state: strState, ajax: 'true'}, function(j){
				var storeListing = '';
				for (var i = 0; i < j.length; i++) {
					urlAddress = escape(j[i].address);
					storeListing += '<div class=\"locationAddress locationAddressGridBox grid_7\"><strong>Vision Center at Meijer - ' + j[i].name + '</strong><br />' + j[i].address + '<br/>' + j[i].phone + '<br/>';
					//Add hours
					if (j[i].hours) {
					storeListing += '<strong>Hours</strong><br />';
					var lnhours = j[i].hours.split(";");
					for (var k=0;k<lnhours.length;k++)
					{
						storeListing += lnhours[k]+"<br />";
					}
					}
					storeListing += '<br/><a href=\"'+ j[i].page_url +'\">View store details</a>&nbsp;|&nbsp;<a href=\"http://maps.google.com/maps?q='+urlAddress+'\">Get driving directions</a><br/></div>';
					
					//Start new row of 3
					if ((i+1) % 3 == 0) {
						storeListing += '<div class=\"clear\"></div>';
					}
				}
				$("div.storeListings").html(storeListing);
			});
		}
	}
	
	//Populate store selects
	var statelisting = "<?php print $state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "All "; ?>";
	loadStoreListings(statelisting);
	
	$("#fullname, #email, #addressInput").labelify({
		labelledClass: "txt_inputhelp"
	});
	
});
</script>
<?php include 'inc/analytics.php' ?>
</head>
<body>
<?php include 'inc/header.php' ?>
<div class="container_24">
<div id="main">
	<h1>Store Directory: <?php print $state ?> Stores</h1>
	<p>The Vision Center is currently located in 21 Meijer stores that service 6 major markets across the Midwest.</p>
	<p>Doctor hours vary by location. Please call your local vision center to schedule your appointment.</p>
	<form id="form_storefinder" name="form_storefinder" method="post" action="locations.php">
	<div id="divmap">
		<div style="padding:10px;background-color:#eee;">
			<div style="float:left;">
			<input type="text" id="addressInput" name="addressInput" size="30" title="Zip, City/State or Address" value="" />
			<input type="hidden" id="radiusSelect" value="50" /></div>
			<div style="float:left;"><a class="button" href="#" onclick="document.getElementById('form_storefinder').submit();"><span>Locate Store</span></a></div>
			<div class="clear"></div>
		</div>   		
	</div> 
	</form>	
	<div class="storeListings"></div>  
</div><!--end #main-->
</div><!--.container_24 #map_container-->
<?php include 'inc/footer.php' ?>
</body>
</html>