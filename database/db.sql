

CREATE DATABASE ferrorama;
USE ferrorama;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email_usuario VARCHAR(100) NOT NULL,
    senha_usuario VARCHAR(100) NOT NULL,
    cargo ENUM('adm', 'usuario') NOT NULL
);

CREATE TABLE sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_sensor VARCHAR(100) NOT NULL,
    localizacao_sensor VARCHAR(100) NOT NULL,
    tipo_sensor VARCHAR(50) NOT NULL,
    trem_alocado_sensor VARCHAR(100) NOT NULL
);

<<<<<<< HEAD
CREATE TABLE trens (
=======


CREATE TABLE trens(
>>>>>>> bfc0f1852eb5c77cc67f67260cd49ee6bbb773ea
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_trem VARCHAR(100) NOT NULL,
    destino_trem VARCHAR(100) NOT NULL,
    horario_partida TIME NOT NULL,
    horario_chegada TIME NOT NULL
);

<<<<<<< HEAD
CREATE TABLE rotas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_rota VARCHAR(100) NOT NULL,
    descricao_rota VARCHAR(100) NOT NULL,
    distancia_rota FLOAT NOT NULL,
    trem_rota VARCHAR(100) NOT NULL,
    duracao_rota FLOAT NOT NULL,
    data_criacao DATETIME NOT NULL,
    id_trens INT NOT NULL,
    CONSTRAINT fk_rotas_trens FOREIGN KEY (id_trens) REFERENCES trens(id)
);
=======
>>>>>>> bfc0f1852eb5c77cc67f67260cd49ee6bbb773ea

insert into usuario (nome_usuario, email_usuario, senha_usuario, cargo) values ('Caio', 'Caio@pentelho.com','12345','adm');