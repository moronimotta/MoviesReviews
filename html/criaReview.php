<?php 

include_once "Review/controller.php";

$controller = new ReviewController();

$output = new stdClass();

$item = (object)$_POST['dados'];

$result = $controller->create($item);
$output->success =$result;

echo json_encode($output);
