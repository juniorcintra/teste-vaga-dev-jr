<?php
session_start();
 
require 'functions.php';

if (!isLoggedIn())
{
    header('Location: form-login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Painel | Sistema de Login ULTIMATE PHP</title>
    </head>
 
    <body>
         
        <h1>Painel do Usuário</h1>
 
        <p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>
    </body>
</html>