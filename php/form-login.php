<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../css/login.css">

    <!-- Style Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

    <!-- Script Bootstrap -->
    <script type="text/javascript" src="../js/bootstrap.js"></script>

    <title>Login | Controle de Candidatos</title>
</head>

<body class="text-center">

    <form class="form-signin" action="login.php" method="post">
        <img src="../images/phplogo.png">
        <label for="email" class="sr-only">E-mail</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
        <label for="senha" class="sr-only">Senha</label>
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; Junior Cintra</p>
    </form>


</body>
</html>