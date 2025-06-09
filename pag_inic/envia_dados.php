<?php
session_start();
require_once '../login/conexao.php'; 

if (!isset($_SESSION['id'])) {
    exit("Você precisa estar logado para fazer uma avaliação.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_usuario = $_SESSION['id'];
    $album = isset($_POST['album']) ? trim($_POST['album']) : '';
    $artista = isset($_POST['artista']) ? trim($_POST['artista']) : '';
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';

    
    if (isset($_FILES['foto_capa']) && $_FILES['foto_capa']['error'] === 0) {
        $imagem = file_get_contents($_FILES['foto_capa']['tmp_name']);
    } else {
        exit("Erro no envio da imagem.");
    }

    if ($album && $artista && $comentario && $imagem) {
        try {
            $stmt = $conexao->prepare("
                INSERT INTO avaliacoes (id_usuario, album, artista, foto_capa, comentario)
                VALUES (:id_usuario, :album, :artista, :foto_capa, :comentario)
            ");

            $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT); // ID vindo da sessão
            $stmt->bindValue(':album', $album);
            $stmt->bindValue(':artista', $artista);
            $stmt->bindValue(':foto_capa', $imagem, PDO::PARAM_LOB);
            $stmt->bindValue(':comentario', $comentario);

            if ($stmt->execute()) {
                header("Location: upload_ava.php?cadastrado=1");
                exit;
            } else {
                header("Location: upload_ava.php?errocadastro=2");
                exit;
            }
        } catch (PDOException $e) {
            echo "Erro no banco de dados: " . $e->getMessage();
        }
    } else {
        header("Location: upload_ava.php?errocadastro=3");
        exit;
    }
} else {
        header("Location: upload_ava.php?acessoinvalido=4");
}
?>








<!-- 

<?php
session_start();
require_once '../login/conexao.php'; 

if (!isset($_SESSION['id'])) {
    exit("Você precisa estar logado para fazer uma avaliação.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['id'];
    $album = trim($_POST['album'] ?? '');
    $artista = trim($_POST['artista'] ?? '');
    $comentario = trim($_POST['comentario'] ?? '');

    // Verifica e move a imagem
    if (isset($_FILES['foto_capa']) && $_FILES['foto_capa']['error'] === 0) {
        $nome_arquivo = uniqid() . '_' . $_FILES['foto_capa']['name'];
        $caminho_imagem = 'uploads/' . $nome_arquivo;

        if (!move_uploaded_file($_FILES['foto_capa']['tmp_name'], $caminho_imagem)) {
            exit("Erro ao salvar a imagem.");
        }
    } else {
        exit("Erro no envio da imagem.");
    }

    // Salva os dados no banco
    if ($album && $artista && $comentario && $caminho_imagem) {
        try {
            $stmt = $conexao->prepare("
                INSERT INTO avaliacoes (id_usuario, album, artista, foto_capa, comentario)
                VALUES (:id_usuario, :album, :artista, :foto_capa, :comentario)
            ");

            $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->bindValue(':album', $album);
            $stmt->bindValue(':artista', $artista);
            $stmt->bindValue(':foto_capa', $caminho_imagem); // agora é só o caminho
            $stmt->bindValue(':comentario', $comentario);

            if ($stmt->execute()) {
                header("Location: upload_ava.php?cadastrado=1");
                exit;
            } else {
                header("Location: upload_ava.php?errocadastro=2");
                exit;
            }
        } catch (PDOException $e) {
            echo "Erro no banco de dados: " . $e->getMessage();
        }
    } else {
        header("Location: upload_ava.php?errocadastro=3");
        exit;
    }
} else {
    header("Location: upload_ava.php?acessoinvalido=4");
}
?> -->
