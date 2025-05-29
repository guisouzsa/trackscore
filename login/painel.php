<?php
include_once 'protect.php';
include_once 'conexao.php';
if (isset($_POST['nome'])) {
    
    $nome = trim($_POST['email']);
    $sql = "SELECT * FROM usuarios WHERE nome = :nome";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nome' => $nome]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="pag_logado" >
        <div id="divbem_vindo">
            <h1 >Bem vindo <?php echo htmlspecialchars($nome); ?></h1>
        </div>
        <div>
            <p>
                <a id="button_logout"  href="logout.php">Sair</a>
            </p>
        </div>
    </div>
</body>
</html>