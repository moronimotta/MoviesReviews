<?php

include_once "controller.php";
include_once "entity.php";
include_once __DIR__ . "/../db/entityManager.php";

//especificar o tipo de adapter que o usecases vai usar
$controller = new ReviewController("DB");

$output = new stdClass();

try {

    //chamar o controller para criar o review
    $item = (object) $_POST['dados'];
    $result = $controller->create($item);
    $output->success =$result;
    $output->message = "Review criado com sucesso!";
} catch (Exception $e) {
    $output->success = false;
    $output->message = $e->getMessage();
}

echo json_encode($output);


