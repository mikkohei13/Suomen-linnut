<?php

require_once "../../suomen-linnut.php"; // e.g. $logDirectory = "logs-SECRETKEY";

if ($_GET['secret'] != $secret)
{
	exit("Not authorized");
}

$logString = file_get_contents(($logDirectory . "/js-log.txt"));

$logRowsArr = explode("\n", $logString);


$totalCount = 0;
$totalIps = 0;
$ipArr = Array();

foreach ($logRowsArr as $rowNumber => $row)
{
	$rowCells = explode("\t", $row);

	@$ipArr[$rowCells[0]]++;
	$totalCount++;
}

echo "<pre>";
echo $totalCount . " views\n";
echo count($ipArr) . " IPs\n\n";

print_r ($ipArr);

/*
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

*/
