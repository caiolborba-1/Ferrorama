<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "INSERT INTO livros (nome, email, senha) VALUES (?, ?, ?)";

header("Location: ../tela_inicial.php");
exit();
?>