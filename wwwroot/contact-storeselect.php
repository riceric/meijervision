<?php
//Connect to DB to get store info
include ("data/phpsqlsearch_dbinfo.php");

/** 
 * Gets store addresses from database
 * Updated 2013-03-01 to also return storeID number
 */
function getStoresJSON($strState) {
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

	// Search the rows for 1) address 2) store number in the 'location' table
	$query = "SELECT SUBSTRING_INDEX(address,',',1) AS optionValue, SUBSTRING_INDEX(address,',',1) AS optionDisplay, id AS storeId FROM `location` WHERE address like '%, ".mysql_real_escape_string($strState)."%'";
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
		getStoresJSON('IL');
		break;
	case 'Indiana':
		getStoresJSON('IN');
		break;
	case 'Michigan':
		getStoresJSON('MI');
		break;
	case 'Ohio':
		getStoresJSON('OH');
		break;
}
?>
