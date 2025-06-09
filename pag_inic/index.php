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
    <title>Trackscore</title>
</head>
<body>
  <header>
    <nav id="navbar_principal">

        <div id="logo_img">
            <img src="foto/logo.png" alt="Logo da Trackscore">
        </div>

        <form action="#" method="get">
            <input type="text" placeholder="Pesquise por avaliações" name="pesquisar" id="pesquisa_box">
        </form>
    
        <div>
            <button id="botao_avaliar">Crie sua avaliação</button>
            <a href="upload_ava.php"></a>
        </div>

    </nav>
    </header>

    <main>
        <section>

        <div class="divs_principais">
            <div class="div1">
                <p>
                    <a id="button_logout" href="../login/logout.php">Sair</a>
                </p>
            </div>
            <div class="div2">

            </div>
        </div>
        </section>
    </main>
</body>
</html>
