<?php 
    require_once 'assets/protect/protect.php'; 
    require_once '../login/conexao.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
    <title>Trackscore</title>
</head>
<body class="tela_inicial">
    <header>
        <nav id="nav_principal">
            <div id="logo_img">
                <img src="assets/foto/logo.png" alt="Logo da Trackscore">
            </div>

            <div>
                <form action="#" method="get">
                    <div>
                        <input type="text" placeholder="Pesquise por avaliações" name="pesquisar" id="pesquisa_box">
                    </div>
                </form>
            </div>
            
            <div id="div_avaliar">
                <div>
                    <a href="crud_avaliacoes/upload_ava.php" id="botao_avaliar">Crie sua avaliação</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="divs_principais">
            <div class="div1">
                <div class="grupo-cima">
                    <a class="botao_menu" href="cadastro/perfil.php">
                        <img src="assets/foto/perfil.png" class="icone_botao" alt="Perfil">
                        Perfil
                    </a>
                    <a class="botao_menu" href="#">
                        <img src="assets/foto/favoritos.png" class="icone_botao" alt="Favoritos">
                        Favoritos
                    </a>
                    <a class="botao_menu" href=" crud_avaliacoes/read_dados.php">
                        <img src="assets/foto/coracao.png" class="icone_botao" alt="Minhas Avaliações">
                        Minhas Avaliações
                    </a>
                </div>

                <div class="separador">
                    <span>Tools</span>
                </div>

                <div class="grupo-baixo">
                    <a class="botao_menu" href="#">
                        <img src="assets/foto/sobre.png" class="icone_botao" alt="Sobre">
                        Sobre
                    </a>
                    <a class="botao_menu" href="#">
                        <img src="assets/foto/ajuda.png" class="icone_botao" alt="Ajuda">
                        Ajuda
                    </a>
                    <a class="botao_menu" href="#">
                        <img src="assets/foto/politica.png" class="icone_botao" alt="Políticas">
                        Políticas de Privacidade
                    </a>
                    <a class="botao_menu" id="button_logout" href="../login/logout.php">
                        <img src="assets/foto/sair.png" class="icone_botao" alt="Sair">
                        Sair
                    </a>
                </div>
            </div>

            <div class="div2">
                <!-- futuro conteúdo -->
            </div>
        </div>
    </main>
</body>
</html>
