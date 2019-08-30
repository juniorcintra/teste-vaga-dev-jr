<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
	header('Location: form-login.php');
}

$PDO = db_connect();

$sql = "SELECT * FROM candidatos";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$candidatos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

	<title>Painel | Controle de Candidatos</title>
</head>

<body class="text-center align-panel">

	<h1>Painel de Candidatos</h1>

	<p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php"><button type="button" class="btn btn-outline-danger">Sair</button></a></p>

	<p><a href="form-candidatos.php"><button type="button" class="btn btn-outline-primary">Novo Candidato</button></p></a>

	<table class="table table-bordered" style="margin-top: 20px;">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">Destaque</th>
				<th scope="col">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($candidatos as $key => $value) :?>
				<tr>
					<th scope="row"><?= $value["id"] ?></th>
					<td><?= $value["nome"] ?></td>
					<td><?= $value["email"] ?></td>
					<td class="text-center">
						<input class="checkbox" type='checkbox' id='ativo<?= $value['id'] ?>' data-id='<?= $value['id'] ?>' data-tbl='candidatos' data-idTbl='id' name='ativo' <?= $value['ativo'] == 1 ? "checked" : "" ?>>
						<label for='ativo<?= $value['id'] ?>'></label>
					</td>
					<td>
						<?php if ($value["lixeira"] == 1): ?>
							<button type="button" name="restaura" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-default btn-rounded btn-icon btn-restaurar">
							<span class="fa fa-undo"></span>
						</button>
						<?php else: ?>
							<a href="form-candidatos.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
								<span class="fa fa-pencil"></span>
							</a>
							<button type="button" name="lixeira" data-id="<?= $value['id'] ?>" data-tbl="candidatos" data-id-tbl="id" class="btn btn-light btn-rounded btn-icon btn-lixeira">
							<span class="fa fa-trash"></span>
						</button>
					<?php endif ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</body>
</html>