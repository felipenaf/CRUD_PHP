<? include_once RAIZ . '/model/FilmeDao.php'; ?>
<? include_once RAIZ . '/controller/ControllerFilme.php'; ?>

<!DOCTYPE html>
<html>

	<?php include_once("template/head.php") ?>

	<body>

		<?php include_once("template/nav.php") ?>

		<main class="container my-1">
				<div class="page-header py-1">
					<h3>Editar Filme</h3>	
				</div>

				<?php 
					$id = !empty($_GET['id']) ? $_GET['id'] : '';
					$fDao = new FilmeDao();
					$resultado = array();
					$resultado = $fDao->consultaId($id);

					/* Validando a variável $resultado */
					if (is_array($resultado) || is_object($resultado)){

						foreach ($resultado as $filme) {
							$id				= $filme['id'];
							$tituloOr = $filme['tituloOr'];
							$tituloBr = $filme['tituloBr'];
							$ano 			= $filme['ano'];
							$diretor 	= $filme['diretor'];
							$genero 	= $filme['genero'];
						}

					}
				?>

				<div class="col-md-5 mb-2">

					<form action="?controllerFilme=controllerFilme&acao=editar" method="POST">
						<input type="hidden" name="id" value="<?= $id ?>" >
						
					<div class="form-group">
					  <label for="TituloOriginal">Título Original</label>
					  <input type="text" class="form-control" name="tituloOr" placeholder="Informe o Título Original" value="<?= $tituloOr ?>" >
					</div>

					<div class="form-group">
					  <label for="TituloBrasil">Título no Brasil</label>
					  <input type="text" class="form-control" name="tituloBr" placeholder="Informe o Título no Brasil" value="<?= $tituloBr ?>">
					</div>

					<div class="form-group">
					  <label for="Ano">Ano</label>
					  <input type="text" class="form-control" name="ano" placeholder="Informe o ano de lançamento" maxlength="4" value="<?= $ano ?>">
					</div>

					<div class="form-group">
					  <label for="Diretor">Diretor</label>
					  <input type="text" class="form-control" name="diretor" placeholder="Informe o Diretor" value="<?= $diretor ?>">
					</div>

					<div class="form-group">
					  <label for="Genero">Gênero</label>
					  <select class="form-control" name="genero">

						<option value="<?= $genero ?>"><?= $genero ?></option>

						<? include_once("template/filme_genero.php") ?>
						
					  </select>
					</div>
					<button type="submit" class="btn btn-dark" name="acao">Salvar</button>
				
					</form>
				</div>
			</div>
			
		</main>
				

		<? include_once("template/rodape.php") ?>
		<? include_once("template/js.php") ?>
	</body>
</html>