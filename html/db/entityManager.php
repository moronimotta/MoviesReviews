<?php

require_once __DIR__."/../vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [__DIR__."/../ReviewPhp/"];
$isDevMode = true;
//aqui configuramos a conexão com banco de dados
$params = [
    'url' => "mysql://root:patofu20@db_local/movies_reviews"
];
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);


//Obter a instância da classe Entity Manager
function getEntityManager(){
    global $config, $params;
    $entityManager = EntityManager::create($params, $config);
    return $entityManager;
}