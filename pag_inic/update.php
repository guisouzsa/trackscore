<?php
session_start();
require_once '../login/conexao.php';
include_once '../login/protect.php';

// Variáveis padrão
$id = $album = $artista = $comentario = $foto_capa = "";

// PROCESSAMENTO DO POST (salvar atualização)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST["id"];
    $album = $_POST["album"];
    $artista = $_POST["artista"];
    $comentario = $_POST["comentario"];
    $foto_capa = $_POST["foto_capa_atual"]; // valor padrão (caso não envie novo)

    // Se o usuário enviou uma nova imagem
    if (isset($_FILES['foto_capa']) && $_FILES['foto_capa']['error'] === UPLOAD_ERR_OK) {
        $novo_nome = uniqid() . "_" . $_FILES['foto_capa']['name'];
        $destino = "../pag_inic/" . $novo_nome;

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

        $stmt->bindParam(':album', $album);
        $stmt->bindParam(':artista', $artista);
        $stmt->bindParam(':comentario', $comentario);
        $stmt->bindParam(':foto_capa', $foto_capa);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: read_dados.php?msg=atualizado");
            exit;
        } else {
            echo "<p>Erro ao atualizar registro.</p>";
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}

// CARREGAR DADOS PARA O FORMULÁRIO
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    try {
        $stmt = $conexao->prepare("SELECT * FROM avaliacoes WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
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
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
        exit;
    }
} else if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<p>ID inválido.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
    <title>Editar Avaliação</title>
</head>
<body>
    <main id="container_geral">
        <div id="div_voltar">
            <a href="index.php"><button id="botao-voltar" aria-label="Voltar"></button></a>
        </div>

        <section id="formulario_avaliacao">
            <div class="titulo1">
                <h1>Editar Avaliação</h1>
            </div>

            <div id="div_principal">
                <form action="update.php" class="linha" method="POST" enctype="multipart/form-data" name="form_upload">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                    <input type="hidden" name="foto_capa_atual" value="<?= htmlspecialchars($foto_capa) ?>">

                    <div class="div_inputs">
                        <div class="coluna_infor">
                            <label for="album" class="nomes">Nome:</label>
                            <input type="text" name="album" value="<?= htmlspecialchars($album) ?>" required>

                            <label for="artista" class="nomes">Artista:</label>
                            <input type="text" name="artista" value="<?= htmlspecialchars($artista) ?>" required>

                            <label for="comentario" class="nomes">Comentário:</label>
                            <input type="text" name="comentario" id="input_comentario" value="<?= htmlspecialchars($comentario) ?>">
                        </div>

                        <div id="foto_capa" class="file-upload">
                            <label class="custom-file-label">Selecionar nova imagem (opcional)</label>
                            <input type="file" name="foto_capa" id="foto_input" style="display:none;">
                            <span id="file-name"><?= $foto_capa ? htmlspecialchars($foto_capa) : 'Nenhum arquivo escolhido' ?></span>
                        </div>
                    </div>

                    <div id="buttonsalvar">
                        <input type="submit" value="Salvar Alterações" id="Enviar">
                    </div>
                </form>
            </div>
        </section>

        <section>
            <div class="mensagens_cadastro">
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] === 'atualizado') {
                    echo '<p>Avaliação atualizada com sucesso!</p>';
                }
                ?>
            </div>
        </section>
    </main>

    <script src="script/script.js"></script>
</body>
</html>
