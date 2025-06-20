<?php
require_once '../../login/conexao.php'; 


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_album = $_GET['id']; 


    $stmt = $conexao->prepare("DELETE FROM avaliacoes WHERE id = :id_album");
    $stmt->bindParam(':id_album', $id_album, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: read_dados.php?erro=1");
    exit; 
} else {
    header("Location: read_dados.php?erro=2");
}
?>
