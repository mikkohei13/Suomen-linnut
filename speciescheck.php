<?php

echo "<pre>";

// ----------------------------------------------------------------

$atlasSpecies = file_get_contents("data/lintuatlas3-SIIVOTTU.txt");

$atlasSpeciesArr = explode("\n", $atlasSpecies);

$atlasSCI = Array();

foreach ($atlasSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

	$c = 0;
	foreach ($cells as $cellNumber => $cell)
	{
		$cell = trim($cell);
		if ($c == 3)
		{
//			echo $cell . "<br />";
			$atlasSCI[$cell] = 1;
		}

		$c++;
	}
}

//print_r ($atlasSCI);

//exit("DEBUG");


// ----------------------------------------------------------------
// Luokitus

$uhexSpecies = file_get_contents("data/uhex-luokat-SIIVOTTU.txt");

$uhexSpeciesArr = explode("\n", $uhexSpecies);

foreach ($uhexSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

//	print_r ($cells);	exit("debug");


	$sci = $cells[1] . " " . $cells[2];

	if (@$atlasSCI[$sci] == 1)
	{
//				echo "FOUND from atlasSCI: /" . $cell . "/<br />";
	}
	else
	{
		echo "Missing from atlasSCI: /" . $sci . "/<br />";
	}


}


/*

// ----------------------------------------------------------------
// Liite 2

$uhexSpecies = file_get_contents("data/uhex-liite2-SIIVOTTU.txt");

$uhexSpeciesArr = explode("\n", $uhexSpecies);

foreach ($uhexSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

	$c = 0;
	foreach ($cells as $cellNumber => $cell)
	{
		$cell = trim($cell);
		if ($c == 1)
		{
			if (@$atlasSCI[$cell] == 1)
			{
//				echo "FOUND from atlasSCI: /" . $cell . "/<br />";
			}
			else
			{
				echo "Missing from atlasSCI: /" . $cell . "/<br />";
			}
		}

		$c++;
	}
}

*/

print_r ($atlasSCI);


?>
END