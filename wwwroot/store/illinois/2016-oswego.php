<?php
@include($_SERVER['DOCUMENT_ROOT'] . "/data/db-store-location-functions.php"); 
$storeNumber = "2016";
$storeDetails = getStoreLocationDetailsArray($storeNumber);

@include($_SERVER['DOCUMENT_ROOT'] . "/store/store.tpl.php"); 
?>
