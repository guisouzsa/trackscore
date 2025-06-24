<?php
    require_once '../../login/conexao.php'; 


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; 


    $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../../login/index.php?erro=1");
    exit; 
} else {
    header("Location: perfil.php?erro=2");
}
?>
