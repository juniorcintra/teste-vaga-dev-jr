<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
	header('Location: form-login.php');
}
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

</body>
</html>