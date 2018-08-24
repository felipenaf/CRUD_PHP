<?php
	include_once RAIZ . '/model/conexao.php';
	include_once RAIZ . '/bean/Filme.Class.php';
	include_once RAIZ . '/controller/ControllerFilme.php';

	class FilmeDao{
		
		function inserir(Filme $f){

			$con = getConnection();

			$tituloOr = $f->getTituloOr();
			$tituloBr = $f->getTituloBr();
			$ano	  = $f->getAno(); 
			$diretor  = $f->getDiretor();
			$genero   = $f->getGenero();

			$sql = "INSERT INTO crud.filme (tituloOr, tituloBr, ano, diretor, genero) 
					VALUES ('$tituloOr', '$tituloBr', $ano, '$diretor', '$genero')";
			$dados = mysqli_query($con, $sql) or die(mysqli_error($con));

			$cf = new ControllerFilme();

			if($dados){
				
				$cf->tela_lista();
				echo "<script>alert('Filme Cadastrado com sucesso');</script>";
			} else {

				$cf->tela_lista();
				echo "<script>alert('Erro ao cadastrar o filme');</script>";
			}

			mysqli_close($con);
		}

		function listar(){

			$con = getConnection();

			$sql = "SELECT * FROM crud.filme 
					ORDER BY id DESC";
			$dados = mysqli_query($con, $sql) or die(mysqli_error());
			return $dados;

			mysqli_close($con);
		}

		function excluir(Filme $f){

			$con = getConnection();

			$id = $f->getId();

			$sql = "DELETE FROM crud.filme 
					WHERE filme.id = $id";
			$dados = mysqli_query($con, $sql) or die(mysqli_error());

			$cf = new ControllerFilme();

			if ($dados){
				
				$cf->tela_lista();
				echo "<script>alert('Exclusão Efetuada com sucesso!');</script>";
			}else{

				$cf->tela_lista();
				echo "<script>alert('Erro ao excluir o registro!');</script>";
			}

			mysqli_close($con);
		}

		function editar(Filme $f){
			$con = getConnection();

			$id 		= $f->getId();
			$tituloOr 	= $f->getTituloOr();
			$tituloBr 	= $f->getTituloBr();
			$ano	  	= $f->getAno(); 
			$diretor  	= $f->getDiretor();
			$genero   	= $f->getGenero();

			$sql = "UPDATE crud.filme 
					SET tituloOr = '$tituloOr', tituloBr = '$tituloBr', 
						ano = $ano, diretor = '$diretor', genero = '$genero' 
					WHERE id = $id;";

			$dados = mysqli_query($con, $sql) or die(mysqli_error($con));

			if($dados){
				echo "<script>alert('Alteração salva com sucesso');</script>";
			} else {
				echo "<script>alert('Erro ao alterar as informações');</script>";
			}				

			mysqli_close($con);
		}

		function consultaId($id){
			$con = getConnection();
			$sql = "SELECT * FROM crud.filme WHERE id = $id";
			$dados = mysqli_query($con, $sql) or die(mysqli_error());

			return $dados;

			mysqli_close($con);
		}

	}
?>