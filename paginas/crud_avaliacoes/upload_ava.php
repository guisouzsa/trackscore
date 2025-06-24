<?php 
include_once '../assets/protect/protect.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ysp4tri.css" />
    <title>Upload avaliações</title>
</head>
<body>
    <main id="container_geral">
        <div id="div_voltar">
            <a href="../index.php"><button id="botao-voltar" aria-label="Voltar"></button></a>
        </div>
        <section id="formulario_avaliacao">
                <div class="titulo1">
                    <h1 >Qual álbum deseja avaliar?</h1>
                </div>
                <div id="botao_read_centralizado">
                    <a href="read_dados.php" class="botao_read">Veja sua lista</a>
                </div>
                <div>
                <div id="div_principal">
                    <form action="envia_dados.php" class="linha" method="POST" enctype="multipart/form-data" name="form_upload">
                        <div class="div_inputs">
                            <div class="coluna_infor">
                                <label for="nomes" class="nomes">Nome:</label>
                                <input type="text" name="album" placeholder="Ex: Bloom" required>
                                <label for="nomes" class="nomes">Artista:</label>
                                <input type="text" name="artista" placeholder="Ex: Troye Sivan" required>
                                <label for="nomes" class="nomes">Comentário:</label>
                                <textarea type="text" name="comentario" id="input_comentario" placeholder="Ex: Muito bom!!!"></textarea>
                            </div>

                            <div id="foto_capa" class="file-upload">
                                <label class="custom-file-label">Selecionar imagem</label>
                                <input type="file" name="foto_capa" id="foto_input" required style="display:none;">
                                <span id="file-name">Nenhum arquivo escolhido</span>
                            </div>
                        </div>
                        
                        <div id="buttonsalvar">
                            <input type="submit" value="Enviar" id="Enviar">
                        </div>
                    </form>
            '   </div>
        </section>


        <section>
            <div class="mensagens_cadastro">
            <?php
            if (isset($_GET['cadastrado']) && $_GET['cadastrado'] == 1) {
                echo '<p>Álbum cadastrado com sucesso!!!</p>';
            } elseif (isset($_GET['errocadastro'])) {
                if ($_GET['errocadastro'] == 2) {
                    echo '<p>Erro ao cadastrar avaliação.</p>';
                } elseif ($_GET['errocadastro'] == 3) {
                    echo '<p>Preencha os dados corretamente.</p>';
                }
            } elseif (isset($_GET['acessoinvalido']) && $_GET['acessoinvalido'] == 4) {
                echo '<p>Acesso inválido</p>';
            }
            ?>
            </div>
        </section>

    </main>
    <script src="../assets/script/script.js"></script>
</body>
</html>