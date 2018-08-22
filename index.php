<?php

define("RAIZ", __DIR__);

include_once 'controller/controllerFilme.php';
include_once 'controller/controllerUsuario.php';

//essa variável está recebendo o nome da classe
$controller = $_GET['ControllerFilme'];

//$controller = (isset($_GET['controllerUsuario'])) ? $_GET['controllerUsuario'] : 'controllerUsuario' ;

// e essa está recebendo o método da classe
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'index' ;

$pagina = new $controller();

$pagina->$acao();




?>