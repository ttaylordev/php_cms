<?php
$path = $_SERVER['DOCUMENT_ROOT'] . "/cms";
$file = $path . "/includes/data.txt";
$passphrass = '';

if ($handle = fopen($file, 'r')) {
    $readFile = fread($handle, filesize($file));
    fclose($handle);
    $passphrass =  $readFile;
} else {
    echo "not able to read the file";
}
