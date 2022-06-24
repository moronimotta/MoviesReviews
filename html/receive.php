<?php

$requestPayLoad = file_get_contents("php://input");

$object = json_decode($requestPayLoad);
var_dump($object);