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

if (isset($_POST['atualizar'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if (empty($nome) || empty($email)) {
        $erro = "Preencha todos os campos!";
    } else {
        try {
            $update = $conexao->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");
            $update->bindValue(':nome', $nome);
            $update->bindValue(':email', $email);
            $update->bindValue(':id', $id);
            $update->execute();

            header('Location: perfil.php?sucesso=1');
            exit;
        } catch (PDOException $erro) {
            $erro = "Erro ao atualizar: " . $erro->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Atualizar Perfil</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body class="container_dados_user">

    <div class="container_perfil">
        <div class="cartao" style="flex-direction: column; align-items: stretch;">
            <form method="POST">
                <h2>Atualizar Perfil</h2>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($user->nome); ?>" />

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user->email); ?>" />

                <div class="botoes" style="justify-content: flex-start; margin-top: 15px;">
                    <button type="submit" name="atualizar" class="botao atualizar">Atualizar</button>
                    <a href="perfil.php" class="botao deletar" style="display: inline-flex; align-items: center; justify-content: center;">Cancelar</a>
                </div>

                <?php if (isset($erro)): ?>
                    <p style="color: red; margin-top: 10px;"><?php echo $erro; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>

</body>
</html>
