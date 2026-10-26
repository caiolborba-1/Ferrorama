CREATE DATABASE IF NOT EXISTS ferrorama;
USE ferrorama;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email_usuario VARCHAR(100) NOT NULL UNIQUE,
    senha_usuario VARCHAR(255) NOT NULL,
    cargo ENUM('usuario', 'adm') NOT NULL DEFAULT 'usuario'
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
    id_trens INT NOT NULL,
    CONSTRAINT fk_rotas_trens
        FOREIGN KEY (id_trens)
        REFERENCES trens(id)
);