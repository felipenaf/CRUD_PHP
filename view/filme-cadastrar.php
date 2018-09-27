<?php include_once(RAIZ . '/model/FilmeDao.class.php') ?>

<!DOCTYPE html>
<html>

	<?php include_once("template/head.php") ?>

	<body>

		<?php include_once("template/nav.php") ?>

		<main class="container my-1">
				<div class="page-header py-1">
					<h3>Cadastrar Filme</h3>	
				</div>

				<div class="col-md-5 mb-2">
				
					<form action="?controllerFilme=controllerFilme&acao=cadastrar" method="POST">

						<div class="form-group">
						  <label for="TituloOriginal">Título Original</label>
						  <input type="text" class="form-control" name="tituloOr" placeholder="Informe o Título Original">
						</div>

						<div class="form-group">
						  <label for="TituloBrasil">Título no Brasil</label>
						  <input type="text" class="form-control" name="tituloBr" placeholder="Informe o Título no Brasil">
						</div>

						<div class="form-group">
						  <label for="Ano">Ano</label>
						  <input type="text" class="form-control" name="ano" placeholder="Informe o ano de lançamento" maxlength="4">
						</div>

						<div class="form-group">
						  <label for="Diretor">Diretor</label>
						  <input type="text" class="form-control" name="diretor" placeholder="Informe o Diretor">
						</div>

						<div class="form-group">
						  <label for="Genero">Gênero</label>
						  <select class="form-control" name="genero">

							<?php include_once("template/filme_genero.php") ?>
							
						  </select>
						</div>

					  <button type="submit" class="btn btn-dark" name="acao">Cadastrar</button>
					</form>
				</div>
			</div>
		</main>

		<?php include_once("template/rodape.php") ?>
		<?php include_once("template/js.php") ?>
	</body>
</html>