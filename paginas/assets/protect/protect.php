<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Não Autorizado</title>
        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
    </head>
    <body>
        <div class="erro_naologado">
            <h2>Você não pode acessar essa página porque não está logado</h2>
            <p><a href="../../../trackscore/login/index.php">Tela de login</a></p>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
