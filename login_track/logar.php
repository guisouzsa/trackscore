<?php
session_start();
require_once 'conexao.php';
require_once 'Usuario.class.php';

if(isset($_POST['email']) && !empty($_POST['email']) &&
   isset($_POST['senha']) && !empty($_POST['senha'])) {

    $u = new Usuario();

    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if($u->login($email, $senha)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Email ou senha incorretos!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}
?>
