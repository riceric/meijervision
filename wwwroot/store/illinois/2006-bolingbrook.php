<?php
@include($_SERVER['DOCUMENT_ROOT'] . "/data/db-store-location-functions.php"); 
$storeNumber = "2006";
$storeDetails = getStoreLocationDetailsArray($storeNumber);

@include($_SERVER['DOCUMENT_ROOT'] . "/store/store.tpl.php"); 
?>