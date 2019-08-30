<?php
session_start();

require 'functions.php';

if (!isLoggedIn())
{
  header('Location: form-login.php');
}

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$PDO = db_connect();

$sql = "SELECT * FROM candidatos WHERE id = :id";
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

  <?php if ($id != ""): ?>

    <h1>Editar Candidato: </h1>

    <?php else: ?>

      <h1>Novo Candidato</h1>
    <?php endif ?>

    <form id="formCandi" action="candidatos_inc.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php if($id != '') {echo $id;} else {echo '';}?>">
      <div class="form-group">
        <label for="nome">Nome: </label>
        <input type="text" class="form-control w-100" id="nome" name="nome" aria-describedby="emailHelp" placeholder="Nome" required="" value="<?= (isset($candidato['nome'])) ? $candidato['nome'] : null ?>">
      </div>
      <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" class="form-control w-100" id="email" name="email" placeholder="E-mail" required="" value="<?= (isset($candidato['email'])) ? $candidato['email'] : null ?>">
      </div>
      <div  style="display: flex;">
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" class="form-control w-100" id="telefone" name="telefone" placeholder="Telefone" value="<?= (isset($candidato['telefone'])) ? $candidato['telefone'] : null ?>">
        </div>
        <div class="form-group">
          <label for="celular" class="ml-2">Celular:</label>
          <input type="text" class="form-control w-100 ml-2" id="celular" name="celular" placeholder="Celular" value="<?= (isset($candidato['celular'])) ? $candidato['celular'] : null ?>">
        </div>
      </div>
      <div  style="display: flex;">
        <div class="form-group">
          <label for="data">Nascimento:</label>
          <input type="date" class="form-control w-100" id="data" name="data" required="" value="<?= (isset($candidato['dtNascimento'])) ? $candidato['dtNascimento'] : null ?>">
        </div>
        <div class="form-group">
          <label for="salario" class="ml-2">Pretensão Salarial:</label>
          <input type="text" class="form-control w-100 ml-2" id="salario" name="salario" placeholder="Pretensão Salarial" required="" value="<?= (isset($candidato['pretSalario'])) ? $candidato['pretSalario'] : null ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="resumo">Resumo de Habilidades e Experiências</label>
        <textarea class="form-control" id="resumo" name="resumo" rows="3"> <?= (isset($candidato['resumoHab'])) ? $candidato['resumoHab'] : null ?> </textarea>
      </div>
      <div class="custom-control custom-checkbox mr-sm-2">
        <input type="checkbox" class="custom-control-input" id="faculdade" name="faculdade" <?= $candidato['faculdade'] == 1 ? "checked" : "" ?>>
        <label class="custom-control-label" for="faculdade">Faz Faculdade</label>
      </div>
      <div class="custom-control custom-checkbox mr-sm-2">
        <input type="checkbox" class="custom-control-input" id="ativo" name="ativo" <?= $candidato['ativo'] == 1 ? "checked" : "" ?>>
        <label class="custom-control-label" for="ativo">Ativo</label>
      </div>
      <div class="custom-control custom-checkbox mr-sm-2">
        <input type="checkbox" class="custom-control-input" id="destaque" name="destaque" <?= $candidato['destaque'] == 1 ? "checked" : "" ?>>
        <label class="custom-control-label" for="destaque">Destaque</label>
      </div>
      <input type="hidden" name="acao" value="<?php if($id != ''){ echo 'edit';} else {echo 'insert';} ?>">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="panel-candidatos.php" id="voltarCandi"><button type="button" class="btn btn-secondary">Voltar</button></a>
      </div>
    </form>

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