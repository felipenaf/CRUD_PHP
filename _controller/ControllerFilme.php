<?php
	
	include_once '.\_model/FilmeDao.php';
	include_once '.\_bean/Filme.php';
	
	class ControllerFilme{

		public function index(){
			require_once '_view/main.php';
		}

		public function tela_cadastro(){
			require_once '_view/filme_cadastro.php';
		}

		public function tela_lista(){
			require_once '_view/filme_lista.php';
		}

		public function tela_editar(){
			require_once '_view/filme_editar.php';
		}

		public function cadastrar(){
			$f = new Filme();

			$f->setTituloOr	((isset($_POST["tituloOr"]))? $_POST["tituloOr"]:"");
			$f->setTituloBr	((isset($_POST["tituloBr"]))? $_POST["tituloBr"]:"");
			$f->setAno			((isset($_POST["ano"]))? $_POST["ano"]:"");
			$f->setDiretor	((isset($_POST["diretor"]))? $_POST["diretor"]:"");
			$f->setGenero		((isset($_POST["genero"]))? $_POST["genero"]:"");

			//var_dump($f);

			$fDao = new FilmeDao();

			$rs = $fDao->inserir($f);

			//var_dump($rs);
		}

		public function listar(){

			$fDao = new FilmeDao();

			//a variável $rs está recebendo o valor de retorno do método listar da Classe FilmeDao
			$rs = $fDao->listar();

			return $rs;
		}

		public function excluir(){
			$f = new Filme();

			$f->setId((isset($_GET["id"]))? $_GET["id"]:"");

			$fDao = new FilmeDao();

			$resultado = $fDao->excluir($f);

			if ($resultado) {
				$i = new ControllerFilme();
				$i->tela_lista();
				echo "<script>alert('Exclusão Efetuada com sucesso!');</script>";
			}else{
				$i = new ControllerFilme();
				$i->tela_lista();
				echo "<script>alert('Erro ao excluir o registro!');</script>";
			}

		}

		public function editar(){

			$cf = new ControllerFilme();

			$cf->tela_editar();
		}
	}
?>