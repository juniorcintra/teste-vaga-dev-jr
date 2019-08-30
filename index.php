<?php
session_start();

require 'php/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

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
		<div class="alert alert-success" role="alert" style="width: 400px;margin: 0 auto;">
			<p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="php/panel-candidatos.php"><button type="button" class="btn btn-outline-primary">Painel de Candidatos</button></a> <a href="php/panel-usuarios.php"><button type="button" class="btn btn-outline-primary">Painel de Usuários</button></a> | <a href="php/logout.php"><button type="button" class="btn btn-outline-danger">Sair</button></a></p>
		</div>
		
		<?php else: ?>
			<div class="alert alert-danger" role="alert" style="width: 400px;margin: 0 auto;">
				<p>Olá, visitante. Já tem cadastro?</p>
				<p><a href="php/form-login.php"><button type="button" class="btn btn-outline-primary">Login</button></a></p>
				<p>Não!?</p>
				<p><a href="php/form-usuarios.php"><button type="button" class="btn btn-outline-primary">Cadastre-se agora mesmo!</button></a></p>
			</div>
		<?php endif; ?>
	</body>
	</html>