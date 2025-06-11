<?php
require_once '../login/conexao.php'; 


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_album = $_GET['id']; 


    $stmt = $conexao->prepare("DELETE FROM avaliacoes WHERE id = :id_album");
    $stmt->bindParam(':id_album', $id_album, PDO::PARAM_INT);
    $stmt->execute();

    echo 'Registro excluído com sucesso!'; 
} else {
    echo 'ID inválido!'; 
}
?>
