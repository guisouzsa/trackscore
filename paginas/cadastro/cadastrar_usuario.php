<?php
require_once '../../login/conexao.php';

if (!isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
    header("Location: cadastro.php?acessinvalid=1");
    exit;
}
        $nome = trim($_POST['nome']);   
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

if (!$nome || !$email || !$senha) {
    header("Location: cadastro.php?erro_campos=2");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: cadastro.php?email=3");
    exit;
}

    $stmtCheck = $conexao->prepare("SELECT id FROM usuarios WHERE email = :email");
    $stmtCheck->execute([':email' => $email]);

if ($stmtCheck->rowCount()) {
    header("Location: cadastro.php?emailcadastrado=4");
    exit;
}

try {
    $stmt = $conexao->prepare("
        INSERT INTO usuarios (nome, email, senha)
        VALUES (:nome, :email, :senha)
    ");

    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':senha', password_hash($senha, PASSWORD_DEFAULT));

    if ($stmt->execute()) {
        header('Location: ../../login/index.php');
        exit;
    } else {
        header("Location: cadastro.php?erro_banco=5");
        exit;
    }
} catch (PDOException $e) {
    exit("Erro no banco de dados: " . $e->getMessage());
}
?>
