<?php 

require_once "../db/entityManager.php";

include_once "entity.php";

$entityManager = getEntityManager();

try{
    Review::createSchema($entityManager);
}catch(Exception $e){
    echo $e->getMessage();
}

$output = new stdClass();
$output->success = true;
echo json_encode($output);
