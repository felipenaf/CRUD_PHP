<?php include_once RAIZ . '/model/FilmeDao.php'; ?>
<?php include_once RAIZ . '/controller/ControllerFilme.php'; ?>

<!DOCTYPE html>
<html>

	<?php include_once("template/head.php") ?>

	<body>

		<?php include_once("template/nav.php") ?>

		<main class="container my-1">
				<div class="page-header py-1">
					<h3>Lista de Filmes</h3>	
				</div>

				<div class="col-md-12 mb-2">

					<form action="?controllerFilme=controllerFilme&acao=listar" method="POST">
						<input type="hidden" class="btn btn-dark" name="acao" value="listar">

						<table id="table_listar_filme" class="table table-hover my-4">
							<thead class="table-borderless bg-secondary text-white">
								<th>Título Original</th>
								<th>Título BR</th>
								<th>Ano</th>
								<th>Diretor</th>
								<th>Gênero</th>
								<th colspan="2" class="text-center">Ações</th>
							</thead>
							
							<?php 

								$cf = new ControllerFilme();

								//a variável $rs recebe o que foi retornado do  método listar() do Controller
								$rs = $cf->listar();

								//var_dump($rs);

								// calcula quantos dados retornaram
								// mysqli_num_rows() retorna o número de linhas que esxistem no registro
								$total = mysqli_num_rows($rs);
								$registro = array();

								for ($i=0; $i < $total; $i++) { 
								 	
								 	$linha = mysqli_fetch_assoc($rs);
								 	$registro['id'] 		= $linha['id'];
								 	$registro['tituloOr'] 	= $linha['tituloOr'];
								 	$registro['tituloBr']	= $linha['tituloBr'];
								 	$registro['ano']		= $linha['ano'];
								 	$registro['diretor'] 	= $linha['diretor'];
								 	$registro['genero'] 	= $linha['genero'];
							?>

							<tbody>
								<tr>
									<td class="py-1"><?= $registro['tituloOr'] 	?></td>
									<td class="py-1"><?= $registro['tituloBr'] 	?></td>
									<td class="py-1"><?= $registro['ano'] 		?></td>
									<td class="py-1"><?= $registro['diretor'] 	?></td>
									<td class="py-1"><?= $registro['genero'] 	?></td>
									<td class="py-1 text-center"><a class="btn btn-secondary btn-sm py-0" href="?controllerFilme=controllerFilme&acao=tela_editar&id=<?= $registro['id'] ?>">Editar</a></td>
									<td class="py-1 text-center"><a class="btn btn-danger btn-sm py-0" href="?controllerFilme=controllerFilme&acao=excluir&id=<?= $registro['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?')">Excluir</a></td>
								</tr>
							</tbody>

							<?php 

								}

							?>
							
						</table>
					</form>
				</div>
			</div>
			
		</main>

		<?php include_once("template/rodape.php") ?>
		<?php include_once("template/js.php") ?>
	</body>
</html>