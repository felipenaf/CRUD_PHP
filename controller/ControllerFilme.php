<?php

	include_once RAIZ . '/model/FilmeDao.php';
	include_once RAIZ . '/bean/Filme.Class.php';

	class ControllerFilme{

		public function index(){
			require_once RAIZ . '/view/main.php';
		}

		public function tela_cadastro(){
			require_once RAIZ . '/view/filme_cadastro.php';
		}

		public function tela_lista(){
			require_once RAIZ . '/view/filme_lista.php';
		}

		public function tela_editar(){
			require_once RAIZ . '/view/filme_editar.php';
		}

		public function cadastrar(){

			$f = new Filme();
			$f->setTituloOr	((isset($_POST["tituloOr"]))? $_POST["tituloOr"]:"");
			$f->setTituloBr	((isset($_POST["tituloBr"]))? $_POST["tituloBr"]:"");
			$f->setAno		((isset($_POST["ano"]))		? $_POST["ano"]		:"");
			$f->setDiretor	((isset($_POST["diretor"]))	? $_POST["diretor"]	:"");
			$f->setGenero	((isset($_POST["genero"]))	? $_POST["genero"]	:"");

			$fDao = new FilmeDao();
			$rs = $fDao->inserir($f);
		}

		public function listar(){

			$fDao = new FilmeDao();
			$rs = $fDao->listar();

			return $rs;
		}

		public function excluir(){

			$f = new Filme();
			$f->setId((isset($_GET["id"])) ? $_GET["id"] : '');

			$fDao = new FilmeDao();
			$fDao->excluir($f);
		}

		public function editar(){

			$f = new Filme();
			$f->setId		((isset($_POST['id'])) 		? $_POST['id'] 		: '');
			$f->setTituloOr	((isset($_POST["tituloOr"]))? $_POST["tituloOr"]: '');
			$f->setTituloBr	((isset($_POST["tituloBr"]))? $_POST["tituloBr"]: '');
			$f->setAno		((isset($_POST["ano"]))		? $_POST["ano"]		: '');
			$f->setDiretor	((isset($_POST["diretor"]))	? $_POST["diretor"]	: '');
			$f->setGenero	((isset($_POST["genero"]))	? $_POST["genero"]	: '');

			$fDao = new FilmeDao();
			$fDao->editar($f);

			$cf = new ControllerFilme();
			$cf->tela_lista();
		}
	}
?>