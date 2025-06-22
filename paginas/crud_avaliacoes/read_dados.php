<?php
    session_start();
    require_once '../../login/conexao.php'; 
    include_once '../assets/protect/protect.php'; 


    if (!isset($_SESSION['id'])) {
        header('Location: ../../login/login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviews</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body class="body_estilo">

    <div id="div_voltar">
        <a href="upload_ava.php"><button id="botao-voltar" aria-label="Voltar"></button></a>
    </div>

    <div class="container_geral">
        <div class="reviews-container">
            <div id="titulo_reviews">
                <h1>Reviews</h1>
            </div>
            <div class="reviews-wrapper">
                <div class="coluna_reviews">

                <?php
                    try {
                        // Prepara a consulta para buscar apenas as avaliações do usuário logado
                        $stmt = $conexao->prepare("SELECT * FROM avaliacoes WHERE id_usuario = :id_usuario ORDER BY id DESC");
                        $stmt->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_INT);

                        if ($stmt->execute()) {
                            if ($stmt->rowCount() > 0) {
                                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    echo '<div class="review">';
                                    echo   '<div class="review-left">';
                                    echo     '<img src="' . htmlspecialchars($rs->foto_capa) . '" alt="Capa do álbum" />';
                                    echo   '</div>';
                                    echo   '<div class="review-right">';
                                    echo     '<h3>' . htmlspecialchars($rs->album) . '</h3>';
                                    echo     '<p>' . nl2br(htmlspecialchars($rs->comentario)) . '</p>';
                                    echo     '<div class="buttons">';
                                    echo       '<a href="update.php?id=' . htmlspecialchars($rs->id) . '" class="update">Atualizar</a>';
                                    echo       '<a href="delete.php?id=' . htmlspecialchars($rs->id) . '" class="delete">Excluir</a>';
                                    echo     '</div>';
                                    echo   '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<p>Você ainda não fez nenhuma avaliação.</p>';
                            }
                        } else {
                            echo '<p>Erro ao buscar avaliações no banco de dados.</p>';
                        }
                    } catch (PDOException $erro) {
                        echo '<p>Erro: ' . $erro->getMessage() . '</p>';
                    }
                ?>

                </div>
            </div>
        </div>
    </div>

    <div class="delete-success">
        <?php
        if (isset($_GET['erro']) && $_GET['erro'] == 1) {
            echo '<p>Avaliação deletada com sucesso!</p>';
        }
        ?>
    </div>

    <div class="delete-success">
        <?php
        if (isset($_GET['erro']) && $_GET['erro'] == 2) {
            echo '<p>ID da avaliação inválido.</p>';
        }
        ?>
    </div>

<script src="../assets/script/script.js"></script>
</body>
</html>
