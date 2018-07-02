<?php

include_once '_controller/controllerFilme.php';
include_once '_controller/controllerUsuario.php';

//essa variável está recendo o nome da classe
$controller = (isset($_GET['controllerfilme'])) ? $_GET['controllerfilme'] : 'controllerfilme' ;

//$controller = (isset($_GET['controllerUsuario'])) ? $_GET['controllerUsuario'] : 'controllerUsuario' ;

// e essa está recebendo o método da classe
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : 'index' ;

// echo "<br>";
// var_dump($controller);
// echo "<br>";
// var_dump($acao);

$pagina = new $controller();

$pagina->$acao();

?>