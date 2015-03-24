<?php
include_once '../data/functions-db.php';
include_once '../data/functions-press.php';

if ($_REQUEST["newsid"] != "")
{
	$article = dbGetArticle($_REQUEST["newsid"]);
}
else
{
	$article = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?php print $article["h1"]; ?> | Vision Center at Meijer</title>
<?php 
$_GET['page'] = 'about';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="/css/reset.css" />
<link rel="stylesheet" href="/css/960_24_col.css" />
<link rel="stylesheet" href="/css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery.labelify.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(":text").labelify({
		labelledClass: "txt_inputhelp"
	});
});
</script>
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/analytics.php") ?>
</head>
<body>
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php") ?>
<div class="container_24">
<div class="grid_18">
<div id="main">
<p><br /><a href="/about/press.php">&laquo; View all articles</a></p>
<?php
if ($article != null)
{

	print "<h1>$article[h1]</h1>";
	print "<h2>$article[h2]</h2>";
	if ($article['img_url'] != NULL)
	{
		print "<img src=\"".$article['img_url']."\" alt=\"".$article['img_caption']."\" title=\"".$article['img_caption']."\" border=\"0\" style=\"float:right; margin:20px; \" />";
	}
	print "$article[body]";
}
else
{
	print "<h2>Sorry, the article you requested does not appear to exist on our servers.</h2>";
	print "<a href=\"\about\press.php\">View our complete listing of news articles</a>";
}
?>
<p><br /><a href="/about/press.php">&laquo; View all articles</a></p>
</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:1024px;">
<h1>We'd love to hear from you</h1>
<p>Enough about us, what about you?
<ul>
<li>Do you have questions about your vision health?</li>
<li>Would you like to know the latest styles that we have in stock?</li>
</ul>
<p>Our friendly staff will be happy to help you! Just <a href="/locations.php">locate one of our stores</a> and call or <a href="/contact.php">contact us</a> right here from our website.</p>
<h1>We're Hiring!</h1>
<p>Looking for a career opportunity? <a href="/about/careers.php">Apply Online</a></p>
<h1>Follow us on:</h1>
<a href="http://www.twitter.com/MeijerVision"><img src="/images/48x48-twitter.png" width="48" height="48" border="0" alt="Follow us on Twitter!" /></a>
<a href="http://www.facebook.com/MeijerVision"><img src="/images/48x48-fb.png" width="48" height="48" border="0" alt="Like us on Facebook!" /></a>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"-->
</div><!--.container_24 #main-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php") ?>
</body>
</html>