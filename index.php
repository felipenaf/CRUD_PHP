<?php

define("RAIZ", __DIR__);

include_once 'controller/ControllerFilme.php';

//Recebe o nome da classe
$controller = !empty($_GET['ControllerFilme']);
// Recebendo o método da classe
$acao = !empty($_GET['acao']) ? $_GET['acao'] : 'index' ;
$pagina = new ControllerFilme();
$pagina->$acao();

?>