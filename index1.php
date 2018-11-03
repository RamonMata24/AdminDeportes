<?php

ob_start();
require_once("Models/model.php");
require_once("Models/crud.php");        
require_once("Controllers/controller.php");

$mvc = new MvcController();
//mostramos la funcion 
$mvc->pagina();

?>