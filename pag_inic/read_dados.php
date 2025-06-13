<?php
session_start();
require_once '../login/conexao.php'; 
include_once '../login/protect.php'; 
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="body_estilo">
    <div id="div_voltar">
      <button id="botao-voltar" aria-label="Voltar"></button>
    </div>
    <div class="container_geral">
      <div class="reviews-container">
        <div id="titulo_reviews">
          <h1 >Reviews</h1>
        </div>
        <div class="reviews-wrapper">
          <div class="coluna_reviews">
            <?php
            try {
              $stmt = $conexao->prepare("SELECT * FROM avaliacoes ORDER BY id DESC");
              if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                  echo '<div class="review">';
                  echo   '<div class="review-left">';
                  echo     '<img src="../pag_inic/' . htmlspecialchars($rs->foto_capa) . '" alt="Capa do álbum">';
                  echo   '</div>';
                  echo   '<div class="review-right">';
                  echo     '<h3>' . htmlspecialchars($rs->album) . '</h3>';
                  echo     '<p>' . nl2br(htmlspecialchars($rs->comentario)) . '</p>';
                
                  echo   '<div class="buttons">';
                  echo     '<a href="update.php?id=' . htmlspecialchars($rs->id) . '" class="update">Atualizar</a>';
                  echo     '<a href="delete.php?id=' . htmlspecialchars($rs->id) . '" class="delete" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>';
                  echo   '</div>';
                
                  echo   '</div>';
                  echo '</div>';
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
    <div id="">
      <a href="upload_ava.php" id="botao-voltar" aria-label="Voltar">Voltar</a>    
    </div>
    <div class="delete-success">
        <?php
          if (isset($_GET['erro']) && $_GET['erro'] == 1) {
              echo '<p>Avaliação deletada com sucesso!!!</p>';
          }
        ?>
    <div>
    <div class="delete-success">
      <?php
        if (isset($_GET['erro']) && $_GET['erro'] == 2) {
            echo '<p>ID da avalição invalido</p>';
        }
        ?>
    <div>
    <script src="script/script.js"></script>
</body>
</html>
