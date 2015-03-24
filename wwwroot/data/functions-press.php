<?php 
/** 
 * Return all press / news articles in the database
 */
function dbPrintPressArticleLinks($startdate, $num=0)
{
	$sql = "SELECT id,datepub,seo_url,h1 FROM vcm_press WHERE datepub > $startdate ORDER BY datepub DESC";
	if ($num > 0) 
	{
		$sql .= " LIMIT 0, $num";
	}
	try {
		$dbh = new Database;
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute();
		$rows = $stmt -> fetchAll();
		$stmt->closeCursor ( ) ;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	/** Begin printing **/
	foreach ($rows as $article) 
	{
		$timestamp = strtotime($article["datepub"]);
		print "<p><strong><a href=\"/about/$article[seo_url]?newsid=$article[id]\">$article[h1]</a></strong><br />".date("M. j, Y",$timestamp)."</p>";
	}
}

/**
 * Print formatted press article
 * Paramter: article id number (int)
 */
function dbPrintArticle($id)
{
	$sql = "SELECT * FROM vcm_press WHERE id=$id";
	try {
		$dbh = new Database;
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute();
		$rows = $stmt -> fetchAll();
		$stmt->closeCursor ( ) ;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	$article = $rows[0];
	//Print article
	print "<h1>$article[h1]</h1>";
	print "<h2>$article[h2]</h2>";
	print "$article[body]";
}

/**
 * Retrieve press article data as an array 
 * Paramter: article id number (int)
 */
function dbGetArticle($id)
{
	$sql = "SELECT * FROM vcm_press WHERE id=$id";
	try {
		$dbh = new Database;
		$stmt = $dbh->prepare ( $sql );
		$stmt->execute();
		$rows = $stmt -> fetchAll();
		$stmt->closeCursor ( ) ;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
	if (!empty($rows)) {
		$article = $rows[0];
		//Print article
		return $array = array(
			"h1" => $article["h1"],
			"h2" => $article["h2"],
			"body" => $article["body"],
			"img_url" => $article["img_url"],
			"img_caption" => $article["img_caption"]
		);
	}
	else
		return false;
}
?>