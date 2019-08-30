<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
  header('Location: form-login.php');
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$PDO = db_connect();

$sql = 'SELECT nome, email, telefone, celular, DATE_FORMAT(dtNascimento,"%d/%m/%Y") as data, faculdade, pretSalario, resumoHab, ativo, destaque, DATE_FORMAT(dtCadastro,"%d/%m/%Y %H:%i:%s") as cadastro  FROM candidatos WHERE id = :id';
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$candidato = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
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

  <title>Controle de Candidatos</title>

</head>
<body class="text-center align-panel">

  <h1>Informações do Candidato: <?= $candidato['nome'] ?></h1>

  <div>
    <p><strong>Nome:</strong> <?= $candidato['nome'] ?></p>
    <p><strong>E-mail:</strong> <?= $candidato['email'] ?></p>
    <p><strong>Telefone:</strong> <?= $candidato['telefone'] ?></p>
    <p><strong>Celular:</strong> <?= $candidato['celular'] ?></p>
    <p><strong>Data de Nascimento:</strong> <?= $candidato['data'] ?></p>
    <p><strong>Faz faculdade?</strong> <?= $candidato['faculdade'] == 1 ? "Sim" : "Não"; ?></p>
    <p><strong>Pretensão Salarial:</strong> <?= $candidato['pretSalario'] ?></p>
    <p><strong>Resumo de Habilidades:</strong> <?= $candidato['resumoHab'] ?></p>
    <p><strong>Cadastrado em:</strong> <?= $candidato['cadastro'] ?></p>
  </div>

  <!-- Jquery Mask -->
  <script type="text/javascript" src="../js/jquery.mask.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#telefone").mask("(99)9999-9999");
      $("#celular").mask("(99)99999-9999");
      $("#salario").mask("R$9.999,99")
    });
  </script>

</body>
</html>