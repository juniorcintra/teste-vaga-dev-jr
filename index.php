<?php
session_start();
 
require 'php/init.php';
?>
<!DOCTYPE html>
<html>
<head>

	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">

	<!-- Style Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!-- Script Bootstrap -->
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<title>Controle de Candidatos</title>

</head>
<body class="text-center align">


	<h1>Controle de Candidatos</h1>

	<?php if (isLoggedIn()): ?>
		<p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="php/panel.php">Painel</a> | <a href="php/logout.php">Sair</a></p>
	<?php else: ?>
		<p>Olá, visitante. <a href="php/form-login.php">Login</a></p>
	<?php endif; ?>
	
	

</body>
</html>