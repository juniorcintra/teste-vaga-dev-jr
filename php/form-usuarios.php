<?php
session_start();

require 'functions.php';

$id = isset($_GET["id"]) ? $_GET["id"] : "";

$PDO = db_connect();

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

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

  <title>Controle de usuarios</title>

</head>
<body class="text-center align-panel">

  <?php if ($id != ""): ?>

    <h1>Editar usuario: </h1>

    <?php else: ?>

      <h1>Novo usuario</h1>
    <?php endif ?>

    <form id="formCandi" action="usuarios_inc.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php if($id != '') {echo $id;} else {echo '';}?>">
      <div class="form-group">
        <label for="nome">Nome: </label>
        <input type="text" class="form-control w-100" id="nome" name="nome" placeholder="Nome" required="" value="<?= (isset($usuario['name'])) ? $usuario['name'] : null ?>">
      </div>
      <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" class="form-control w-100" id="email" name="email" placeholder="E-mail" required="" value="<?= (isset($usuario['email'])) ? $usuario['email'] : null ?>">
      </div>
      <div class="form-group">
        <label for="senha">Senha: </label>
        <input type="password" class="form-control w-100" id="senha" name="senha" placeholder="Senha" required="" value="">
      </div>
      <div class="form-group">
        <label for="senha2">Verifique a Senha: </label>
        <input type="password" class="form-control w-100" id="senha2" name="senha2" placeholder="Verifique a Senha" required="" value="">
      </div>
      <input type="hidden" name="acao" value="<?php if($id != ''){ echo 'edit';} else {echo 'insert';} ?>">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="panel-usuarios.php" id="voltarCandi"><button type="button" class="btn btn-secondary">Voltar</button></a>
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