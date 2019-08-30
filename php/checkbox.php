<?php 

session_start();

require 'functions.php';

if (!isLoggedIn())
{
	header('Location: form-login.php');
}

$PDO = db_connect();

$id = isset($_POST['id']) ? (int)$_POST['id'] : ''; 	
$ativo = isset($_POST['ativo']) ? $_POST['ativo'] : '';
$destaque = isset($_POST['destaque']) ? $_POST['destaque'] : '';
$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

if ($acao == "ativo") {
	try{
		$stmt = $PDO->prepare('UPDATE candidatos SET ativo = :ativo WHERE id = :id');
		$stmt->execute(array(
			':ativo' => $ativo,
			':id' => $id
		));
	}catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
} elseif ($acao == "destaque") {
	try{
		$stmt = $PDO->prepare('UPDATE candidatos SET destaque = :destaque WHERE id = :id');
		$stmt->execute(array(
			':destaque' => $destaque,
			':id' => $id
		));
	}catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
} elseif ($acao == "deleta") {
	try{
		$stmt = $PDO->prepare('UPDATE candidatos SET lixeira = 1 WHERE id = :id');
		$stmt->execute(array(
			':id' => $id
		));
	}catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
}  elseif ($acao == "restaura") {
	try{
		$stmt = $PDO->prepare('UPDATE candidatos SET lixeira = 0 WHERE id = :id');
		$stmt->execute(array(
			':id' => $id
		));
	}catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
} 


?>