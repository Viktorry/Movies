<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Model.php';


$novi = new Model();
$n = $novi->getactorsinmoviesbyid(19);
var_dump($n);

?>