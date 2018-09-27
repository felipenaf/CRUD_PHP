<?php include_once RAIZ . '/model/FilmeDao.class.php'; ?>
<?php include_once RAIZ . '/controller/ControllerFilme.class.php'; ?>

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

					<form action="?ControllerFilme=ControllerFilme&acao=listar" method="POST">

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

								$fDao = new FilmeDao();
								$resultado = $fDao->listar();	

								while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){
							?>

							<tbody>
								<tr>
									<td class="py-1"><?= $linha['tituloOr'] ?></td>
									<td class="py-1"><?= $linha['tituloBr'] ?></td>
									<td class="py-1"><?= $linha['ano'] 		?></td>
									<td class="py-1"><?= $linha['diretor'] 	?></td>
									<td class="py-1"><?= $linha['genero'] 	?></td>
									<td class="py-1 text-center"><a class="btn btn-secondary btn-sm py-0" href="/view/filme-editar.php">Editar</a></td>
									<td class="py-1 text-center"><a class="btn btn-danger btn-sm py-0" href="?ControllerFilme=ControllerFilme&acao=excluir&id=<?= $linha['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir o registro?')">Excluir</a></td>
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