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
					<td>
						<center><input type="checkbox" class="custom-control-input" id="destaque" name="destaque"><label class="custom-control-label" style="float: none;" for="destaque"></label></center>
					</td>
					<td></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>