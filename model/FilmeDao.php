<?php
	include_once RAIZ . '/model/conexao.php';
	include_once RAIZ . '/bean/Filme.Class.php';
	include_once RAIZ . '/controller/ControllerFilme.php';

	class FilmeDao{
		
		function inserir(Filme $f){
			try{

				Conexao::getConexao();
				$tituloOr = $f->getTituloOr();
				$tituloBr = $f->getTituloBr();
				$ano	  = $f->getAno(); 
				$diretor  = $f->getDiretor();
				$genero   = $f->getGenero();

				$sql = "INSERT INTO crud.filme (tituloOr, tituloBr, ano, diretor, genero) 
						VALUES ('$tituloOr', '$tituloBr', $ano, '$diretor', '$genero')";
				$resultado = Conexao::getConexao()->query($sql);

				$cf = new ControllerFilme();
				$cf->tela_lista();
				echo "<script>alert('Filme Cadastrado com sucesso');</script>";

			}catch(Exception $e){

				echo "Erro: {$e->getMessage()}";
				echo "<br>";
				echo "Linha: {$e->getLine()}";
			}
		}

		function listar(){
			try{

				Conexao::getConexao();
				$sql = "SELECT * FROM crud.filme ORDER BY id DESC";
				$resultado = Conexao::getConexao()->query($sql);
			}catch(Exception $e){

				echo "Erro: {$e->getMessage()}";
				echo "<br>";
				echo "Linha: {$e->getLine()}";
			}
			return $resultado;
		}

		function excluir(Filme $f){
			try{

				Conexao::getConexao();
				$id = $f->getId();
				$sql = "DELETE FROM crud.filme WHERE filme.id = $id";
				Conexao::getConexao()->query($sql);

				$cf = new ControllerFilme();
				$cf->tela_lista();
				echo "<script>alert('Exclusão Efetuada com sucesso!');</script>";
			}catch(Exception $e){

				echo "Erro: {$e->getMessage()}";
				echo "<br>";
				echo "Linha: {$e->getLine()}";
			}
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