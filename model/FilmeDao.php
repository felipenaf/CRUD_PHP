<?php
	include_once 'conexao.php';
	include_once '.\_bean/Filme.php';
	include_once '.\_view/msg.php';
	include_once '.\_controller/ControllerFilme.php';

	class FilmeDao{
		
		function inserir(Filme $f){

			$con = getConnection();

			$tituloOr = $f->getTituloOr();
			$tituloBr = $f->getTituloBr();
			$ano	  	= $f->getAno(); 
			$diretor  = $f->getDiretor();
			$genero   = $f->getGenero();

			$sql = "INSERT INTO filme (tituloOr, tituloBr, ano, diretor, genero) VALUES ('$tituloOr', '$tituloBr', '$ano', '$diretor', '$genero')";
			
			if(mysqli_query($con, $sql)){
				
				$i = new ControllerFilme();
				$i->tela_cadastro();
				echo "<script>alert('Filme Cadastrado com sucesso');</script>";
				//$msg = new Msg();
				//$msg->sucesso();
			} else {

				$i = new ControllerFilme();
				$i->tela_cadastro();
				echo "<script>alert('Erro ao cadastrar o filme');</script>";
				//$msg->erro();
			}

			mysqli_close($con);
		}

		function listar(){

			// conecta com o banco de dados
			$con = getConnection();

			//Instrução a ser executada no banco
			$sql = "SELECT * FROM filme ORDER BY id desc";

			// executa a query
			$dados = mysqli_query($con, $sql) or die(mysqli_error());

			return $dados;

			mysqli_close($con);
		}

		function excluir(Filme $f){

			$con = getConnection();

			$id = $f->getId();

			$sql = "DELETE FROM filme WHERE filme.id = $id";

			$dados = mysqli_query($con, $sql) or die(mysqli_error());

			return $dados;

			mysqli_close($con);

		}

		function editar(Filme $f){
			$con = getConnection();

			$id = $f->getId();
			$tituloOr = $f->getTituloOr();
			$tituloBr = $f->getTituloBr();
			$ano	  	= $f->getAno(); 
			$diretor  = $f->getDiretor();
			$genero   = $f->getGenero();

			$sql = "UPDATE filme SET tituloOr = $tituloOr, tituloBr = $tituloBr, ano = $ano, diretor = $diretor, genero = $genero WHERE id = $id";

			$dados = mysqli_query($con, $sql) or die(mysqli_error());

			return $dados;

			mysqli_close($con);
		}

	}
?>