<?php

require 'functions.php';
$PDO = db_connect();

$id = isset($_POST['id']) ? $_POST['id'] : ''; 	
$nome = isset($_POST['nome']) ? $_POST['nome'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$senha2 = isset($_POST['senha2']) ? $_POST['senha2'] : '';


if ($_POST["acao"] == "insert") {
	if ($senha == $senha2) {
		try{
			$stmt = $PDO->prepare('INSERT INTO users (name, email, password, dtCadastro) VALUES(:nome, :email, :senha, CURRENT_TIMESTAMP)');
			$stmt->execute(array(
				':nome' => $nome,
				':email' => $email,
				':senha' => make_hash($senha)
			));
			echo "<script>alert('Cadastro realizado com sucesso!');</script>";
			header('Location: panel.php');
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	} else {
		echo "<script>alert('Senhas não combinam.');</script>";
	}
	
} else {
	if ($senha != "") {
		try{
			$stmt = $PDO->prepare('UPDATE users SET name = :nome, email = :email, password = :senha WHERE id = :id');
			$stmt->execute(array(
				':nome' => $nome,
				':email' => $email,
				':senha' => make_hash($senha)
			));
			echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
			header('Location: panel-usuarios.php');
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();

		}
	} else {
		try{
			$stmt = $PDO->prepare('UPDATE users SET name = :nome, email = :email WHERE id = :id');
			$stmt->execute(array(
				':nome' => $nome,
				':email' => $email
			));
			echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
			header('Location: panel-usuarios.php');
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();

		}
	}
	
}






?>