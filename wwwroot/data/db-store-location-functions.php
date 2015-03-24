<?php
//Connect to DB to get store info
include ("phpsqlsearch_dbinfo.php");

/** 
 * Return store info from database as array; used for locations-list.php
 */
function getStoreLocationDetailsArray($storeID) {
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
	$query = "SELECT name,lat,lng,address,addr_line1,state,city,zip,phone,hours,page_url FROM `location` WHERE id=".mysql_real_escape_string($storeID);
	$rs = mysql_query($query);

	if (!$rs) {
	  error_log("Invalid query: " . mysql_error());
	  exit(1);
	}
	
	$rows = array();
	while($result = mysql_fetch_assoc($rs)) {
		$rows[] = $result;
	}
	
	$rows[0]["services"] = getStoreServicesArray($storeID);
	$rows[0]["doctors"] = getDoctorBiosArray($storeID);

	return $rows[0];
}
/** 
 * Return store services array; used for locations-list.php
 */
function getStoreServicesArray($storeID) {
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
	$query = "SELECT location_service.service_id,description FROM location_service,service WHERE location_service.service_id=service.service_id AND location_service.location_id=".mysql_real_escape_string($storeID);
	$rs = mysql_query($query);

	if (!$rs) {
	  error_log("Invalid query: " . mysql_error());
	  exit(1);
	}
	
	$rows = array();
	while($result = mysql_fetch_assoc($rs)) {
		$rows[] = $result;
	}
	return $rows;
}
/** 
 * Return store services array; used for locations-list.php
 */
function getDoctorBiosArray($storeID) {
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
	$query = "SELECT location_doctor.doctor_id, full_name, doctoral_degree, bio, photo_url
				FROM location_doctor, doctor
				WHERE location_doctor.doctor_id = doctor.doctor_id
				AND location_doctor.location_id =".mysql_real_escape_string($storeID);
	$rs = mysql_query($query);

	if (!$rs) {
	  error_log("Invalid query: " . mysql_error());
	  exit(1);
	}
	
	$rows = array();
	while($result = mysql_fetch_assoc($rs)) {
		$rows[] = $result;
	}
	return $rows;
}
/** 
 * Return FULL listing of doctors; used for eye-doctors.php
 */
function getFullDoctorsArray() {
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
	$query = "SELECT doctor_id, SUBSTRING_INDEX(full_name,' ',-1) AS last_name, full_name, doctoral_degree, bio, photo_url FROM doctor ORDER BY last_name";
	$rs = mysql_query($query);

	if (!$rs) {
	  error_log("Invalid query: " . mysql_error());
	  exit(1);
	}
	
	$rows = array();
	while($result = mysql_fetch_assoc($rs)) {
		$rows[] = $result;
	}
	return $rows;
}

/** 
 * Return FULL listing of stores that a doctor works at; used for eye-doctors.php
 */
function getDoctorsStoresArray($doctorId) {
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
	$query = "SELECT location_id, name, addr_line1, city, state, zip, phone, page_url FROM location_doctor, location WHERE location_doctor.location_id=location.id AND doctor_id=".mysql_real_escape_string($doctorId)." ORDER BY location_id";
	$rs = mysql_query($query);

	if (!$rs) {
	  error_log("Invalid query: " . mysql_error());
	  exit(1);
	}
	
	$rows = array();
	while($result = mysql_fetch_assoc($rs)) {
		$rows[] = $result;
	}
	return $rows;
}
/**
 *Abbreviate the full name of the Vision Center state to its 2-char equivalent
 *Returns string (2 chars)
 */
function abbrState($strState)
{
	switch($strState) {
		case "Illinois":
			return "IL";
			break;
		case "Indiana":
			return "IN";
			break;
		case "Michigan":
			return "MI";
			break;
		case "Ohio":
			return "OH";
			break;
		default:
			return "";
			break;
	}
}
?>