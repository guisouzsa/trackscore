<?php 
include_once '../login/protect.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
    <title>Upload avaliações</title>
</head>
<body>
    <main>

        <section>
            <form action="envia_dados.php" method="POST" name="form_upaload" >
                <input type="text" name="album" placeholder="Ex: Bloom" required>  
                <input type="artista" name="artista" placeholder="Ex: Troye sivan" required>  
                <input type="text" name="comentario" placeholder="Ex: Muito bom!!!" required>  
                <input type="file" name="nome_album" placeholder="Ex: Bloom" required>  
                <input type="submit"value="salvar" id="salvar">
            </form>
        </section>

    </main>
</body>
</html>