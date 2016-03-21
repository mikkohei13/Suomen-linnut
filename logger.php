<?php

//$logString = $_POST[];

// TODO: security
$logString =  
	$_POST['ip'] . "\t" . 
	$_POST['datetime'] . "\t" . 
	$_POST['error'] . "\t" . 
	$_POST['latitude'] . "\t" . 
	$_POST['longitude'] . "\t" . 
	$_POST['N'] . "\t" . 
	$_POST['E'] . "\t" . 
	$_POST['accuracy'] . "\t" . 
	$_POST['altitude'] . "\t" . 
	$_POST['altitudeAccuracy'] . "\t" .
	$_POST['userAgent'] . "\t" .
	$_POST['innerWidth'] . "\t" .
	$_POST['innerHeight'] . "\t" .
	" ";

file_put_contents("logs/js-log.txt", ($logString . "\n"), FILE_APPEND);

echo "Loggasin: $logString";
