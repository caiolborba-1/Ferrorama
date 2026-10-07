-- drop DATABASE ferrorama;

CREATE DATABASE ferrorama;
USE ferrorama;

CREATE TABLE usuario(
id INT AUTO_INCREMENT PRIMARY KEY,
nome_usuario VARCHAR(100) NOT NULL,
email_usuario VARCHAR(100) NOT NULL,
senha_usuario VARCHAR(100) NOT NULL,
cargo enum('adm','usuario') NOT NULL

);

CREATE TABLE sensor(
id INT AUTO_INCREMENT PRIMARY KEY,
nome_sensor VARCHAR(100) NOT NULL,
localizacao_sensor VARCHAR(100) NOT NULL,
tipo_sensor VARCHAR(50) NOT NULL,
trem_alocado_sensor varchar(100) NOT NULL

);

insert into usuario (nome_usuario, email_usuario, senha_usuario, cargo) values ('Caio', 'Caio@pentelho.com','12345','adm');