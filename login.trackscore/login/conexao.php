<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=trackscore;charset=utf8mb4",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
        ]
    );
    $pdo->exec("set names utf8mb4");
} catch (PDOException $erro) {
    echo "Erro na conexão: " . $erro->getMessage();
}
?>
