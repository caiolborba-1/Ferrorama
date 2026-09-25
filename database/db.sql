CREATE DATABASE ferrorama;
USE ferrorama;

CREATE TABLE administrador(
id INT AUTO_INCREMENT PRIMARY KEY,
nome_adm VARCHAR(100) NOT NULL,
email_adm VARCHAR(100) NOT NULL UNIQUE,
senha_adm VARCHAR(100) NOT NULL

);

CREATE TABLE usuario(
id INT AUTO_INCREMENT PRIMARY KEY,
nome_usuario VARCHAR(100) NOT NULL,
email_usuario VARCHAR(100) NOT NULL UNIQUE,
senha_usuario VARCHAR(100) NOT NULL

);

CREATE TABLE sensor(
id INT AUTO_INCREMENT PRIMARY KEY,
nome_sensor VARCHAR(100) NOT NULL,
localizacao_sensor VARCHAR(100) NOT NULL,
tipo_sensor VARCHAR(50) NOT NULL,
trem_alocado_sensor varchar(100) NOT NULL

);