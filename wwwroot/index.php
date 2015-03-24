<?php
//Remove request parameters:
list($path) = explode('?', $_SERVER['REQUEST_URI']);
//Remove script path:
$path = substr($path, strlen(dirname($_SERVER['SCRIPT_NAME']))+1);
//Explode path to directories and remove empty items:
$pathInfo = array();
foreach (explode('/', $path) as $dir) {
    if (!empty($dir)) {
        $pathInfo[] = urldecode($dir);
    }
}
if (count($pathInfo) > 0) {
    //Remove file extension from the last element:
    $last = $pathInfo[count($pathInfo)-1];
    list($last) = explode('.', $last);
    $pathInfo[count($pathInfo)-1] = $last;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta property="twitter:account_id" content="126078115" />
<title>Vision Center at Meijer | Eyeglasses, Contact Lenses, Sunglasses and Eye Exams</title>
<?php 
@include($_SERVER['DOCUMENT_ROOT'] . "/data/currentPromoData.php"); 
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/960_24_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery.labelify.js"></script>
<script src="js/jquery.easySlider.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(":text").labelify({
		labelledClass: "txt_inputhelp"
	});
	
	$("#slider").easySlider({
		auto: true,
		continuous: true,
		speed:1000,
		pause:5000,
		controlsShow:true,
		numeric:true
	});
});
</script>
<?php include 'inc/analytics.php' ?>
</head>
<body>
<?php include 'inc/header.php' ?>
<div class="container_24">
<div id="frontmain">
<div style="float:left;width:720px;">
	<div id="slider">
		<ul>
<?php
foreach ($currentPromos as $promo)
{
	print "<li><a href=\"".$promo['couponLandingPageUrl']."\"><img src=\"".$promo['bannerImgURL']."\" width=\"720\" height=\"300\" border=\"0\" title=\"".$promo['Summary']."\" alt=\"".$promo['Summary']."\" /></a></li>";
}
?>
			<li><img src="/images/720x300-2013rayban-launch.jpg" width="720" height="300" border="0" title="New Ray-Ban styles are now available at the Vision Center at Meijer!" alt="New Ray-Ban styles are now available at the Vision Center at Meijer!" /></li>
		</ul>
	</div>
</div>
<div style="float:left;width:240px;">
<a href="products.php"><img src="/images/240x300-lensupgrades-hd.jpg" width="240" height="300" border="0" alt="Learn more about our premium lens upgrades, such as our high-definition, free-form digital lenses" /></a>
</div>
</div><!--#front-->
</div><!--.container_24 #main-->
<?php include 'inc/footer.php' ?>
</body>
</html>