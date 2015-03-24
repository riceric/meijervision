<?php
//Connect to DB to get store info
include ("phpsqlsearch_dbinfo.php");

/** 
 * Return store info from database as array; used for locations-list.php
 */
function updateDatabase() {
	global $dbUnm, $dbPwd, $db;
	// Opens a connection to a mySQL server
	$connection=mysql_connect ('localhost', $dbUnm, $dbPwd);
	if (!$connection) {
	  error_log("Not connected : " . mysql_error());
	  exit(1);
	}

	// Set the active mySQL database
	$db_selected = mysql_select_db($db, $connection);
	if (!$db_selected) {
	  error_log("Can\'t use db : " . mysql_error());
	  exit(1);
	}

	// Search the rows in the location table
	$query = "UPDATE  `vcmeijer`.`location` SET  `hours` =  'Mon, Wed 9:30am - 6pm; Tue, Thu 11am - 7pm; Fri 9am - 5pm; Sat 8am - 3pm' WHERE  `location`.`id` = 2009";
	$rs = mysql_query($query);

	if (!$rs) {
	  error_log("Invalid query: " . mysql_error());
	  exit(1);
	}
	
}

updateDatabase();

?>