<?php

//$logString = $_POST[];

// TODO: security
$logString =  $_POST['error'] . "\t" . $_POST['latitude'] . "\t" . $_POST['longitude'] . "\t" . $_POST['N'] . "\t" . $_POST['E'] . "\t" . $_POST['accuracy'] . "\t" . $_POST['altitude'] . "\t" . $_POST['altitudeAccuracy'];

file_put_contents("logs/js-log.txt", ($logString . "\n"), FILE_APPEND);

echo "Loggasin: ";
print_r ( $_POST );
