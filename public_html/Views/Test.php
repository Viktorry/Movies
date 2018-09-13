<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/public_html/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/public_html/Model/Movie.php';

$searchQuery = 'Fight Club';
//$searchQuery1 = preg_replace("#[^0-9a-z]#i", "", $searchQuery);
//$jq = preg_replace("#[^0-9a-z]#i", "", $searchQuery);
$novi = new Model();
$n = $novi->searchMovie($searchQuery);
var_dump($n);

?>