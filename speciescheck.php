<?php

echo "<pre>";

// ----------------------------------------------------------------

/*
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
*/

//print_r ($atlasSCI);

//exit("DEBUG");


// ----------------------------------------------------------------
// Luokitus

/*
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
*/


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

// ----------------------------------------------------------------
// Atlas 1&2 nimilista

$atlas12Species = file_get_contents("data/atlas-lajit.txt");

$atlas12SpeciesArr = explode("\n", $atlas12Species);

$atlas12SCI = Array();

foreach ($atlas12SpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode(",", $row);

//	print_r ($cells);	exit("debug");

	$sci = $cells[1];

	$atlas12SCI[$sci] = 1;

/*
	echo "Testing " . $sci . "<br />";

	if (!isset($atlasSCI[$sci]))
	{
		echo "Missing (B) from atlasSCI: /" . $sci . "/<br />";
	}
	elseif ($atlasSCI[$sci] == 1)
	{
		echo "FOUND from atlasSCI: /" . $sci . "/<br />";
	}
	else
	{
		echo "Missing (A) from atlasSCI: /" . $sci . "/<br />";
	}
*/

}


$atlasSpecies = file_get_contents("data/lintuatlas3-SIIVOTTU.txt");

$atlasSpeciesArr = explode("\n", $atlasSpecies);

foreach ($atlasSpeciesArr as $number => $row)
{
	$row = trim($row);
	$cells = explode("\t", $row);

	$sci = $cells[3];

	if (!isset($atlas12SCI[$sci]))
	{
		echo "Missing (B) from atlas12SCI: /" . $sci . "/<br />";
	}
	elseif ($atlas12SCI[$sci] == 1)
	{
//		echo "FOUND from atlas12SCI: /" . $sci . "/<br />";
	}
	else
	{
		echo "Missing (A) from atlas12SCI: /" . $sci . "/<br />";
	}
}



print_r ($atlas12SCI);


?>
END