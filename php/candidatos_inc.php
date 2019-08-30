<?php
 
require 'functions.php';

$nome = isset($_POST['nome']) ? $_POST['nome'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '';
$data = isset($_POST['data']) ? $_POST['data'] : '';
$salario = isset($_POST['salario']) ? $_POST['salario'] : '';
$resumo = isset($_POST['resumo']) ? $_POST['resumo'] : '';
 
if (empty($email) || empty($senha))
{
    echo "Informe email e senha";
    exit;
}
 

$PDO = db_connect();
 
try {

  $stmt = $PDO->prepare('INSERT INTO candidatos (nome, ) VALUES(:nome)');
  $stmt->execute(array(
    ':nome' => 'Ricardo Arrigoni'
  ));
   
} catch(PDOException $e) {
  echo 'Erro: ' . $e->getMessage();
  
}

?>