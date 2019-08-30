<?php

require 'functions.php';
$PDO = db_connect();

$id = isset($_POST['id']) ? $_POST['id'] : ''; 	
$nome = isset($_POST['nome']) ? $_POST['nome'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : '';
$salario = isset($_POST['salario']) ? $_POST['salario'] : '';
$resumo = isset($_POST['resumo']) ? $_POST['resumo'] : '';
$faculdade = isset($_POST['faculdade']) ? 1 : 0;
$ativo = isset($_POST['ativo']) ? 1 : 0;
$destaque = isset($_POST['destaque']) ? 1 : 0;



if ($_POST["acao"] == "insert") {
	try{
		$stmt = $PDO->prepare('INSERT INTO candidatos (nome, email, telefone, celular, dtNascimento, faculdade, pretSalario, resumoHab, ativo, destaque, dtCadastro) VALUES(:nome, :email, :telefone, :celular, :dtNascimento, :faculdade, :pretSalario, :resumoHab, :ativo, :destaque, CURRENT_TIMESTAMP)');
		$stmt->execute(array(
			':nome' => $nome,
			':email' => $email,
			':telefone' => $telefone,
			':celular' => $celular,
			':dtNascimento' => $data,
			':faculdade' => $faculdade,
			':pretSalario' => $salario,
			':resumoHab' => $resumo,
			':ativo' => $ativo,
			':destaque' => $destaque
		));
		echo "<script>alert('Cadastro realizado com sucesso!');</script>";
		header('Location: panel.php');
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
} else {
	try{
		$stmt = $PDO->prepare('UPDATE candidatos SET nome = :nome, email = :email, telefone = :telefone, celular = :celular, dtNascimento = :dtNascimento, faculdade = :faculdade, pretSalario = :pretSalario, resumoHab = :resumoHab, ativo = :ativo, destaque = :destaque WHERE id = :id');
		$stmt->execute(array(
			':nome' => $nome,
			':email' => $email,
			':telefone' => $telefone,
			':celular' => $celular,
			':dtNascimento' => $data,
			':faculdade' => $faculdade,
			':pretSalario' => $salario,
			':resumoHab' => $resumo,
			':ativo' => $ativo,
			':destaque' => $destaque,
			':id' => $id
		));
		echo "<script>alert('Cadastro atualizado com sucesso!');</script>";
		header('Location: panel.php');
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();

	}
}






?>