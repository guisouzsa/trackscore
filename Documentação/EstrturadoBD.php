CREATE DATABASE IF NOT EXISTS trackscore CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE trackscore;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);



CREATE TABLE IF NOT EXISTS avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    album VARCHAR(150) NOT NULL,
    artista VARCHAR(100) NOT NULL,
    comentario TEXT NOT NULL,
    foto_capa VARCHAR(255),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);


CREATE TABLE IF NOT EXISTS favoritos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_avaliacao INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_avaliacao) REFERENCES avaliacoes(id),
    CONSTRAINT unico_favorito UNIQUE (id_usuario, id_avaliacao)
);


CREATE TABLE IF NOT EXISTS historico_avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_avaliacao INT NOT NULL,
    comentario_antigo TEXT NOT NULL,
    data_edicao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_avaliacao) REFERENCES avaliacoes(id)
);


SELECT     
    u.nome AS nome_usuario,    
    a.album,    
    a.artista,    
    a.comentario
FROM favoritos f
JOIN usuarios u ON f.id_usuario = u.id
JOIN avaliacoes a ON f.id_avaliacao = a.id
ORDER BY u.nome
LIMIT 0, 25;
