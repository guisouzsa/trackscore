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
    $foto_capa = isset($_POST['foto_capa']) ? trim($_POST['foto_capa']) : '';
    $comentario = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';

    if ($album && $artista && $comentario) {
        try {
            $stmt = $conexao->prepare("
                INSERT INTO avaliacoes (id_usuario, album, artista, foto_capa, comentario)
                VALUES (:id_usuario, :album, :artista, :foto_capa, :comentario)
            ");

            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->bindValue(':album', $album);
            $stmt->bindValue(':artista', $artista);
            $stmt->bindValue(':foto_capa', $foto_capa);
            $stmt->bindValue(':comentario', $comentario);

            if ($stmt->execute()) {
                echo "valiação cadastrada com sucesso!";
            } else {
                echo "Erro ao cadastrar avaliação.";
            }
        } catch (PDOException $e) {
            echo "Erro no banco de dados: " . $e->getMessage();
        }
    } else {
        echo "Preencha todos os campos obrigatórios (álbum, artista, comentário).";
    }
} else {
    echo "Acesso inválido.";
}
?>
