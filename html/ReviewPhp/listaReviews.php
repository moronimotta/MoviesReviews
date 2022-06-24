<?php 

include_once "controller.php";

$controller = new ReviewController();

$imdbID = $_POST["imdbID"];
$dados = $controller->listByImdbID($imdbID);

echo json_encode($dados);