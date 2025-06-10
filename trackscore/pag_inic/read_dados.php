<?php
session_start();
require_once '../login/conexao.php'; 
include_once '../login/protect.php'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Avaliações</title>
</head>
<body>
    <h1>Lista de Avaliações</h1>
    <table border="1" width="100%">
        <tr>
            <th>Álbum</th>
            <th>Artista</th>
            <th>Capa</th>
            <th>Comentário</th>
            <th>Ações</th>
        </tr>
        <?php
        try {
            $stmt = $conexao->prepare("SELECT * FROM avaliacoes");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>" . $rs->album . "</td>";
                    echo "<td>" . $rs->artista . "</td>";
                    echo "<td><img src='" . $rs->foto_capa . "' alt='Capa do álbum' width='100'></td>";
                    echo "<td>" . nl2br($rs->comentario) . "</td>";
                    echo "<td>
                        <a href=\"?act=upd&id=" . $rs->id . "\">[Alterar]</a> | 
                        <a href=\"?act=del&id=" . $rs->id . "\">[Excluir]</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Erro: Não foi possível recuperar os dados do banco de dados</td></tr>";
            }
        } catch (PDOException $erro) {
            echo "<tr><td colspan='5'>Erro: " . $erro->getMessage() . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>
