<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
	header('Location: form-login.php');
}

$PDO = db_connect();

$sql = "SELECT * FROM users";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);



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

	<p><a href="form-usuarios.php"><button type="button" class="btn btn-outline-primary">Novo Usuario</button></p></a>
	<p><a href="panel-candidatos.php"><button type="button" class="btn btn-outline-primary">Painel de Candidatos</button></p></a>


	<h2>Usuarios Existentes</h2>
	<table class="table table-bordered" style="margin-top: 20px;">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">Ação</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($usuarios as $key => $value) :?>
				<tr>
					<th scope="row"><?= $value["id"] ?></th>
					<td><?= $value["name"] ?></td>
					<td><?= $value["email"] ?></td>
					<td>
						<a href="form-usuarios.php?id=<?= $value['id'] ?>" class="btn btn-light btn-rounded btn-icon">
							<i class="fas fa-edit"></i>
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>




	<script type="text/javascript" src="../js/checkbox.js"></script>
</body>
</html>