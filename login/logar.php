<?php
session_start();
require_once 'conexao.php';

if(isset($_POST['email'], $_POST['senha'])) {
    
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if(empty($email)) {
        header("Location: index.php?email=1");
            exit;
    } else if(empty($senha)) {
        header("Location: index.php?senha=2");
            exit;
    } else {
    
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([':email' => $email]);

        $usuario = $stmt->fetch(PDO::FETCH_OBJ);

        if($usuario && password_verify($senha, $usuario->senha)) {
            $_SESSION['id'] = $usuario->id;
            header("Location: ../paginas/index.php");
            exit;
        } else {
            header("Location: index.php?erro=3");
            exit;
        }
    }
}
?>