<?php
ini_set('memory_limit','256M');

header('Content-Type: text/html; charset=utf-8');
echo "<pre>";

require_once "../../suomen-linnut.php";
if ($_GET['secret'] != $secret)
{
	exit("secret parameter needed");
}


$data = Array();



// ------------------------------------------
// Griddata

$gridData = file_get_contents("data/atlas3-grid-data.txt");

$gridDataArr = explode("\n", $gridData);

$gridAdditionalData = Array();

foreach ($gridDataArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

	$grid = $cells[1] . $cells[2];

	$gridAdditionalData[$grid]['alueNumero'] = $cells[3];
	$gridAdditionalData[$grid]['yhdistysFI'] = $cells[4];
	$gridAdditionalData[$grid]['yhdistysSV'] = $cells[5];
	$gridAdditionalData[$grid]['kunta'] = $cells[6];
	$gridAdditionalData[$grid]['ruudunNimi'] = $cells[7];
	$gridAdditionalData[$grid]['level1'] = $cells[8];
	$gridAdditionalData[$grid]['level2'] = $cells[9];
	$gridAdditionalData[$grid]['level3'] = $cells[10];
	$gridAdditionalData[$grid]['level4'] = $cells[11];
	$gridAdditionalData[$grid]['level5'] = $cells[12];
	$gridAdditionalData[$grid]['activitySum'] = $cells[13];
	$gridAdditionalData[$grid]['activityCategory'] = $cells[14];
}

print_r ($gridAdditionalData);

// ------------------------------------------
// Speciesdata

$breedingData = file_get_contents("data/atlas3-breeding-data.txt");

$breedingDataArr = explode("\n", $breedingData);

$gridMem = FALSE;
$new = Array();

$gridCount = 1;

foreach ($breedingDataArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

//	print_r ($cells); // debug

	// This presumes that data is ordered by grid!

	$grid = $cells[4];

	// Starting new grid
	if ($grid != $gridMem)
	{
		if ($gridMem === FALSE)
		{
			$gridMem = $grid;
		}
		else
		{
			// Add grid data and save
			$new['grid'] = $gridAdditionalData[$grid];
			saveGridJson($new, $grid);

			// Clear new
			unset($new);
			$new = Array();

			$gridMem = $grid;

			$gridCount++;
			if ($gridCount % 100 == 0)
			{
				echo $gridCount . " grids done\n";
//				exit("DEBUG 2: ENDED AFTER $gridCount"); // debug
			}
		}
	}

	$abbr = $cells[1];
	$new['species'][$abbr]['pvindeksi'] = $cells[5];
	$new['species'][$abbr]['pvluokka'] = $cells[6];

}


// ------------------------------------------
// Helpers

function saveGridJson($data, $grid)
{
	$json = json_encode($data);

//	echo "grid:" . $grid; print_r ($data); exit(); // debug

	file_put_contents("griddata/$grid.json", $json);

//	exit("DEBUG 1: ENDED AFTER 1: $grid");
}





echo "TOTAL: " . $gridCount . " grids done.\n";

?>

END
