<?php

require_once "controller.php";

$controller = new ReviewController();

$id = $_POST["id"];

$dados = $controller->delete($id);