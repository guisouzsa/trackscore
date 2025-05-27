<?php
require_once '../login/conexao.php'; 

if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    if(empty($nome) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "E-mail inválido.";
        exit;
    }


    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sqlCheck = "SELECT id FROM usuarios WHERE email = :email";
    $stmtCheck = $pdo->prepare($sqlCheck);
    $stmtCheck->execute([':email' => $email]);

    if ($stmtCheck->rowCount() > 0) {
        echo "Este e-mail já está cadastrado.";
        exit;
    }

 
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);

    $resultado = $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senhaHash
    ]);

    if ($resultado) {
        echo "Usuário cadastrado com sucesso! <a href='../login/index.php'>Voltar para login</a>";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
} else {
    echo "Acesso inválido.";
}
?>
