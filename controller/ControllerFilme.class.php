<?php

	include_once RAIZ . '/model/FilmeDao.class.php';
	include_once RAIZ . '/model/Filme.class.php';

	class ControllerFilme{

		public static function main(){
			require_once RAIZ . '/view/filme-listar.php';
		}

		public function tela_cadastro(){
			require_once RAIZ . '/view/filme-cadastrar.php';
		}

		public function tela_lista(){
			require_once RAIZ . '/view/filme-listar.php';
		}

		public function tela_editar(){
			require_once RAIZ . '/view/filme-editar.php';
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