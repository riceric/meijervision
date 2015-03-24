<?php
//Connect to DB to get store info
include ("phpsqlsearch_dbinfo.php");

/** 
 * Gets full store info from database; used for locations-list.php
 */
function getStoresFullJSON($strState) {
	global $dbUnm, $dbPwd, $db;
	// Opens a connection to a mySQL server
	$connection=mysql_connect ('localhost', $dbUnm, $dbPwd);
	if (!$connection) {
	  die("Not connected : " . mysql_error());
	}

	// Set the active mySQL database
	$db_selected = mysql_select_db($db, $connection);
	if (!$db_selected) {
	  die ("Can\'t use db : " . mysql_error());
	}

	// Search the rows in the location table
	if ($strState != "ALL")
	{
		$query = "SELECT name,address,phone,hours,page_url FROM `location` WHERE address like '%, ".mysql_real_escape_string($strState)."%'";
	}
	else {
		$query = "SELECT name,address,phone,hours,page_url FROM `location` ORDER BY state ASC";
	}
	$rs = mysql_query($query);

	if (!$rs) {
	  die("Invalid query: " . mysql_error());
	}
	
	$rows = array();
	while($result = mysql_fetch_assoc($rs)) {
		$rows[] = $result;
	}
	print json_encode($rows);
}

$state = $_REQUEST['state'];
switch($state) {
	case 'Illinois':
		getStoresFullJSON('IL');
		break;
	case 'Indiana':
		getStoresFullJSON('IN');
		break;
	case 'Michigan':
		getStoresFullJSON('MI');
		break;
	case 'Ohio':
		getStoresFullJSON('OH');
		break;
	default:
		getStoresFullJSON('ALL');
		break;
}
?>
