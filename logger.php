<?php

require_once "../../suomen-linnut.php"; // e.g. $logDirectory = "logs-SECRETKEY";

$logArray = Array();
foreach ($_POST as $key => $value)
{
	$logArray[$key] = htmlspecialchars($value);
}

$logString =  
	$logArray['ip'] . "\t" . 
	$logArray['datetime'] . "\t" . 
	$logArray['error'] . "\t" . 
	$logArray['latitude'] . "\t" . 
	$logArray['longitude'] . "\t" . 
	$logArray['N'] . "\t" . 
	$logArray['E'] . "\t" . 
	$logArray['accuracy'] . "\t" . 
	$logArray['altitude'] . "\t" . 
	$logArray['altitudeAccuracy'] . "\t" .
	$logArray['userAgent'] . "\t" .
	$logArray['innerWidth'] . "\t" .
	$logArray['innerHeight'] . "\t" .
	" ";

$logSuccess = file_put_contents(($logDirectory . "/js-log.txt"), ($logString . "\n"), FILE_APPEND);

if ($logSuccess === FALSE)
{
//	echo "Logged data: $logString"; // debug
	echo "Log failure";
}
else
{
//	echo "Logged data: $logString"; // debug
	echo "Log success";
}