<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
	header('Location: form-login.php');
}

$PDO = db_connect();

$sql = "SELECT * FROM candidatos WHERE lixeira = 0 AND destaque = 0 AND ativo = 1";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM candidatos WHERE lixeira = 0 AND destaque = 1 AND ativo = 1";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$candidatosdestaque = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM candidatos WHERE lixeira = 1 OR ativo = 0";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$candidatoslixeira = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">

	<!-- Style Bootstrap -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

	<!-- Script Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>

	<!-- Jquery -->
	<script type="text/javascript" src="../js/jquery-3.4.1.js"></script>


	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<script type="text/javascript" src="../js/all.js"></script>

	<title>Painel | Controle de Candidatos</title>
</head>

<body class="text-center align-panel">

	<h1>Painel de Candidatos</h1>

	<p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php"><button type="button" class="btn btn-outline-danger">Sair</button></a></p>

	<p><a href="form-candidatos.php"><button type="button" class="btn btn-outline-primary">Novo Candidato</button></p></a>
	<p><a href="panel-usuarios.php"><button type="button" class="btn btn-outline-primary">Painel de Usuários</button></p></a>



	<h2>Candidatos Destaque</h2>
	<table class="table table-bordered" style="margin-top: 20px;">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">Destaque</th>
				<th scope="col">Ativo</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($candidatosdestaque as $key => $value) :?>
				<tr>
					<th scope="row"><?= $value["id"] ?></th>
					<td><?= $value["nome"] ?></td>
					<td><?= $value["email"] ?></td>
					<td class="text-center">
						<input class="checkbox" type='checkbox' id='destaque<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='destaque' <?= $value['destaque'] == 1 ? "checked" : "" ?>>
						<label for='destaque<?= $value['id'] ?>'></label>
					</td>
					<td class="text-center">
						<input class="checkbox" type='checkbox' id='ativo<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='ativo' <?= $value['ativo'] == 1 ? "checked" : "" ?>>
						<label for='ativo<?= $value['id'] ?>'></label>
					</td>
					<td>
						<?php if ($value["lixeira"] == 1): ?>
							<button type="button" name="restaura" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-default btn-rounded btn-icon btn-restaurar">
								<i class="fa fa-undo"></i>
							</button>
							<?php else: ?>
								<a href="view-candidato.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
									<i class="far fa-eye"></i>
								</a>
								<a href="form-candidatos.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
									<i class="fas fa-edit"></i>
								</a>
								<button type="button" name="lixeira" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-light btn-rounded btn-icon btn-lixeira">
									<i class="fa fa-trash"></i>
								</button>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>


		<h2>Candidatos Ativos</h2>
		<table class="table table-bordered" style="margin-top: 20px;">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Nome</th>
					<th scope="col">E-mail</th>
					<th scope="col">Destaque</th>
					<th scope="col">Ativo</th>
					<th scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($candidatos as $key => $value) :?>
					<tr>
						<th scope="row"><?= $value["id"] ?></th>
						<td><?= $value["nome"] ?></td>
						<td><?= $value["email"] ?></td>
						<td class="text-center">
							<input class="checkbox" type='checkbox' id='destaque<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='destaque' <?= $value['destaque'] == 1 ? "checked" : "" ?>>
							<label for='destaque<?= $value['id'] ?>'></label>
						</td>
						<td class="text-center">
							<input class="checkbox" type='checkbox' id='ativo<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='ativo' <?= $value['ativo'] == 1 ? "checked" : "" ?>>
							<label for='ativo<?= $value['id'] ?>'></label>
						</td>
						<td>
							<?php if ($value["lixeira"] == 1): ?>
							<button type="button" name="restaura" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-default btn-rounded btn-icon btn-restaurar">
								<i class="fa fa-undo"></i>
							</button>
							<?php else: ?>
								<a href="view-candidato.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
									<i class="far fa-eye"></i>
								</a>
								<a href="form-candidatos.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
									<i class="fas fa-edit"></i>
								</a>
								<button type="button" name="lixeira" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-light btn-rounded btn-icon btn-lixeira">
									<i class="fa fa-trash"></i>
								</button>
							<?php endif ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<h2>Candidatos Descartados</h2>
			<table class="table table-bordered" style="margin-top: 20px;">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nome</th>
						<th scope="col">E-mail</th>
						<th scope="col">Destaque</th>
						<th scope="col">Ativo</th>
						<th scope="col">Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($candidatoslixeira as $key => $value) :?>
						<tr>
							<th scope="row"><?= $value["id"] ?></th>
							<td><?= $value["nome"] ?></td>
							<td><?= $value["email"] ?></td>
							<td class="text-center">
								<input class="checkbox" type='checkbox' id='destaque<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='destaque' <?= $value['destaque'] == 1 ? "checked" : "" ?>>
								<label for='destaque<?= $value['id'] ?>'></label>
							</td>
							<td class="text-center">
								<input class="checkbox" type='checkbox' id='ativo<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='ativo' <?= $value['ativo'] == 1 ? "checked" : "" ?>>
								<label for='ativo<?= $value['id'] ?>'></label>
							</td>
							<td>
								<?php if ($value["lixeira"] == 1): ?>
							<button type="button" name="restaura" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-default btn-rounded btn-icon btn-restaurar">
								<i class="fa fa-undo"></i>
							</button>
							<?php else: ?>
								<a href="view-candidato.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
									<i class="far fa-eye"></i>
								</a>
								<a href="form-candidatos.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
									<i class="fas fa-edit"></i>
								</a>
								<button type="button" name="lixeira" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-light btn-rounded btn-icon btn-lixeira">
									<i class="fa fa-trash"></i>
								</button>
							<?php endif ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>


				<script type="text/javascript" src="../js/checkbox.js"></script>
			</body>
			</html>