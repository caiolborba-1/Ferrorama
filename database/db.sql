CREATE DATABASE IF NOT EXISTS ferrorama;
USE ferrorama;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email_usuario VARCHAR(100) NOT NULL UNIQUE,
    senha_usuario VARCHAR(255) NOT NULL,
    cargo ENUM('usuario', 'adm') NOT NULL DEFAULT 'usuario',
    cep_usuario VARCHAR(10) NULL,
    logradouro_usuario VARCHAR(255) NULL,
    bairro_usuario VARCHAR(100) NULL,
    cidade_usuario VARCHAR(100) NULL,
    uf_usuario CHAR(2) NULL
);

CREATE TABLE sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_sensor VARCHAR(100) NOT NULL,
    localizacao_sensor VARCHAR(100) NOT NULL,
    tipo_sensor VARCHAR(50) NOT NULL,
    trem_alocado_sensor VARCHAR(100) NOT NULL
);

CREATE TABLE trens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_trem INT NOT NULL,
    nome_trem VARCHAR(100) NOT NULL,
    destino_trem VARCHAR(100) NOT NULL,
    horario_partida TIME NOT NULL,
    horario_chegada TIME NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT fk_trens_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuario(id)
);

CREATE TABLE rotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_rota VARCHAR(100) NOT NULL,
    descricao_rota VARCHAR(100) NOT NULL,
    distancia_rota FLOAT NOT NULL,
    trem_rota VARCHAR(100) NOT NULL,
    duracao_rota FLOAT NOT NULL,
    data_criacao DATETIME NOT NULL,
    id_trens INT NOT NULL UNIQUE,
    CONSTRAINT fk_rotas_trens
        FOREIGN KEY (id_trens)
        REFERENCES trens(id)
);

INSERT INTO usuario (
    nome_usuario,
    email_usuario,
    senha_usuario,
    cargo,
    cep_usuario,
    logradouro_usuario,
    bairro_usuario,
    cidade_usuario,
    uf_usuario
) VALUES (
    'Administrador',
    'adm@padrao.com',
    '$2y$10$UnI.67aA7NvgE.Q9L5H3sO9.sA71a1c/27.m5C7iJ8z5H11234567',
    'adm',
    '89201-000',
    'Rua das Palmeiras',
    'Centro',
    'Joinville',
    'SC'
);

ALTER TABLE trens ADD COLUMN imagem_trem VARCHAR(255) DEFAULT NULL;