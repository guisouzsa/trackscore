<?php
session_start();
require_once '../../login/conexao.php';
include_once '../assets/protect/protect.php'; 

$id = $album = $artista = $comentario = $foto_capa = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $album = $_POST["album"];
    $artista = $_POST["artista"];
    $comentario = $_POST["comentario"];
    $foto_capa = $_POST["foto_capa_atual"];

    if (isset($_FILES['foto_capa']) && $_FILES['foto_capa']['error'] === UPLOAD_ERR_OK) {
        $novo_nome = uniqid() . "_" . $_FILES['foto_capa']['name'];
        $destino = 'uploads/' . $novo_nome;

        if (move_uploaded_file($_FILES['foto_capa']['tmp_name'], $destino)) {
            $foto_capa = $novo_nome;
        } else {
            echo "<p>Erro ao salvar a nova imagem.</p>";
        }
    }

    try {
        $stmt = $conexao->prepare("
            UPDATE avaliacoes 
            SET album = :album, artista = :artista, comentario = :comentario, foto_capa = :foto_capa 
            WHERE id = :id
        ");

        $stmt->execute([
            ':album' => $album,
            ':artista' => $artista,
            ':comentario' => $comentario,
            ':foto_capa' => $foto_capa,
            ':id' => $id
        ]);

        header("Location: read_dados.php?msg=atualizado");
        exit;

    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    try {
        $stmt = $conexao->prepare("SELECT * FROM avaliacoes WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $rs = $stmt->fetch(PDO::FETCH_OBJ);
        if ($rs) {
            $album = $rs->album;
            $artista = $rs->artista;
            $comentario = $rs->comentario;
            $foto_capa = $rs->foto_capa;
        } else {
            echo "<p>Registro não encontrado.</p>";
            exit;
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p>ID inválido.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
    <title>Editar Avaliação</title>
</head>
<body>
<main id="container_geral">
    <div id="div_voltar">
        <a href="read_dados.php"><button id="botao-voltar" aria-label="Voltar"></button></a>
    </div>

    <section id="formulario_avaliacao">
        <div class="titulo1">
            <h1>Editar Avaliação</h1>
        </div>

        <div id="div_principal">
            <form action="update.php" method="POST" enctype="multipart/form-data" class="linha">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <input type="hidden" name="foto_capa_atual" value="<?= htmlspecialchars($foto_capa) ?>">

                <div class="div_inputs">
                    <div class="coluna_infor">
                        <label class="nomes" for="album">Nome:</label>
                        <input type="text" name="album" value="<?= htmlspecialchars($album) ?>" required>

                        <label class="nomes" for="artista">Artista:</label>
                        <input type="text" name="artista" value="<?= htmlspecialchars($artista) ?>" required>

                        <label class="nomes" for="comentario">Comentário:</label>
                        <input type="text" name="comentario" value="<?= htmlspecialchars($comentario) ?>" id="input_comentario">
                    </div>

                    <div id="foto_capa" class="file-upload">
                        <label class="custom-file-label">Selecionar nova imagem (opcional)</label>
                        <input type="file" name="foto_capa" id="foto_input" style="display:none;">
                        <span id="file-name"><?= htmlspecialchars($foto_capa ?: 'Nenhum arquivo escolhido') ?></span>
                    </div>
                </div>

                <div id="buttonsalvar">
                    <input type="submit" value="Salvar Alterações" id="update_enviar">
                </div>
            </form>
        </div>
    </section>

    <section>
        <div class="mensagens_cadastro">
            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'atualizado') echo '<p>Avaliação atualizada com sucesso!</p>'; ?>
        </div>
    </section>
</main>

<script src="../assets/script/script.js"></script>
</body>
</html>
