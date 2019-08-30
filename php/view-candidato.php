<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
  header('Location: form-login.php');
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$PDO = db_connect();

$sql = 'SELECT nome, email, telefone, celular, DATE_FORMAT(dtNascimento,"%d/%m/%Y") as data, faculdade, pretSalario, resumoHab, ativo, destaque, DATE_FORMAT(dtCadastro,"%d/%m/%Y") as cadastro  FROM candidatos WHERE id = :id';
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
    <p>Nome: <?= $candidato['nome'] ?></p>
    <p>E-mail: <?= $candidato['email'] ?></p>
    <p>Telefone: <?= $candidato['telefone'] ?></p>
    <p>Celular: <?= $candidato['celular'] ?></p>
    <p>Data de Nascimento: <?= $candidato['data'] ?></p>
    <p>Faz faculdade? <?= $candidato['faculdade'] == 1 ? "Sim" : "Não"; ?></p>
    <p>Pretensão Salarial: <?= $candidato['pretSalario'] ?></p>
    <p>Resumo de Habilidades: <?= $candidato['resumoHab'] ?></p>
    <p>Cadastrado em: <?= $candidato['cadastro'] ?></p>
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