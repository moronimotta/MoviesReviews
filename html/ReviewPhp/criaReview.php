<?php 

include_once "controller.php";

//especificar o tipo de adapter que o usecases vai usar
$controller = new ReviewController("JSON");

$output = new stdClass();

$item = (object)$_POST['dados'];

$result = $controller->create($item);
$output->success =$result;

echo json_encode($output);
