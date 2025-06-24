<?php
session_start();
include_once '../assets/protect/protect.php';
include_once '../../login/conexao.php';

$id = $_SESSION['id'];

try {
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$user) {
        echo "Usuário não encontrado.";
        exit;
    }

} catch (PDOException $erro) {
    echo 'Erro: ' . $erro->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body class="container_dados_user">

    <div class="container_perfil">
        <div class="cartao">
            <div class="icone">
                <img src="../assets/foto/perfil_logo.png" alt="Imagem de Perfil" />
            </div>
            <div class="info">
                <h2><?php echo htmlspecialchars($user->nome); ?></h2>
                <p><?php echo htmlspecialchars($user->email); ?></p>
            </div>
        </div>

        <div class="botoes">
            <a href="update.php?id=<?php echo $user->id; ?>" class="botao atualizar">Atualizar</a>
            <a href="delete.php?id=<?php echo $user->id; ?>" class="botao deletar">Deletar</a>
        </div>
    </div>

</body>
</html>
