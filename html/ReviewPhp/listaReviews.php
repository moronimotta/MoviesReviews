<?php 

include_once "controller.php";
include_once "entity.php";
include_once __DIR__ . "/../db/entityManager.php";

//especificar o tipo de adapter que o usecases vai usar
$controller = new ReviewController("DB");

$imdbID = $_POST["imdbID"];
$dados = $controller->listByImdbID($imdbID);

echo json_encode($dados);
