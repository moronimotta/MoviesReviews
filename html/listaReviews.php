<?php 

include_once "Review/controller.php";

$controller = new ReviewController();

$dados = $controller->listByImdbID("tt0848228");

echo json_encode($dados);