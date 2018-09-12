<?php
	include_once RAIZ . '/model/conexao.php';
	include_once RAIZ . '/bean/Filme.Class.php';
	include_once RAIZ . '/controller/ControllerFilme.php';

	class FilmeDao{
		
		function inserir(Filme $f){
			try{
				$con = Conexao::getConexao();
				$tituloOr = $f->getTituloOr();
				$tituloBr = $f->getTituloBr();
				$ano	  = $f->getAno(); 
				$diretor  = $f->getDiretor();
				$genero   = $f->getGenero();

				$sql = "INSERT INTO crud.filme (tituloOr, tituloBr, ano, diretor, genero) 
						VALUES ('$tituloOr', '$tituloBr', $ano, '$diretor', '$genero')";
				$con->query($sql);

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
				$con = Conexao::getConexao();
				$sql = "SELECT * FROM crud.filme ORDER BY id DESC";
				$resultado = $con->query($sql);
			}catch(Exception $e){
				echo "Erro: {$e->getMessage()}";
				echo "<br>";
				echo "Linha: {$e->getLine()}";
			}
			return $resultado;
		}

		function excluir(Filme $f){
			try{
				$con = Conexao::getConexao();
				$id = $f->getId();
				$sql = "DELETE FROM crud.filme WHERE filme.id = $id";
				$con->query($sql);

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
			try{
				$con = Conexao::getConexao();

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

				$con->query($sql);

				echo "<script>alert('Alteração efetuada com sucesso!');</script>";
			}catch(Exception $e){
				echo "Erro: {$e->getMessage()}";
				echo "<br>";
				echo "Linha: {$e->getLine()}";
			}
		}

		function consultaId($id){
			try{
				$con = Conexao::getConexao();
				$sql = "SELECT * FROM crud.filme WHERE id = $id";
				$resultado = $con->query($sql);
			}catch(Exception $e){
				echo "Erro: {$e->getMessage()}";
				echo "<br>";
				echo "Linha: {$e->getLine()}";
			}

			return $resultado;
		}
	}
?>