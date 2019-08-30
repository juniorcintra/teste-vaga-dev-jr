<?php
 
require 'functions.php';
 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
 
if (empty($email) || empty($senha))
{
    echo "Informe email e senha";
    exit;
}
 
$senhaHash = make_hash($senha);
 
$PDO = db_connect();
 
$sql = "SELECT id, name FROM users WHERE email = :email AND password = :senha";
$stmt = $PDO->prepare($sql);
 
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senhaHash);
 
$stmt->execute();
 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
if (count($users) <= 0)
{
    echo "Email ou senha incorretos";
    exit;
}
 
$user = $users[0];
 
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
 
header('Location: ../index.php');
?>