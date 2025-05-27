<?php
require_once 'conexao.php';

if(isset($_POST['email'], $_POST['senha'])) {
    
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if(empty($email)) {
        echo "Preencha seu email";
    } else if(empty($senha)) {
        echo "Preencha sua senha";
    } else {
    
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':senha' => $senha
        ]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario) {
            session_start();
            $_SESSION['id'] = $usuario['id'];
            header("Location: painel.php");
            exit;
        } else {
            echo "E-mail ou senha incorretos.";
        }
    }
}
?>
