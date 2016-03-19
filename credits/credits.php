<?php

$imageData = getJsonData("../images/speciesimagedata-autogenerated.json");
$speciesData = getJsonData("../speciesdata-autogenerated.json");
// print_r ($imagedata); // debug

foreach ($speciesData as $abbr => $speciesItem)
{
//	print_r ($speciesItem);
	echo $speciesItem['fi'] . " " . $speciesItem['sci'] . ": <br>";
}


// Gets a JSON datafile and decodes it (COPY from allspecies_calss.php)
function getJsonData($jsonFilename)
{
	if (! file_exists($jsonFilename))
	{
	  return FALSE;
	}

	$json = file_get_contents($jsonFilename);
	$dataArr = json_decode($json, TRUE);

	//  print_r ($dataArr); // debug

	return $dataArr;
}



