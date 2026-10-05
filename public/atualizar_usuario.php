<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome_usuario = $_POST["nome_usuario"];
$email_usuario = $_POST["email_usuario"];
$senha_usuario = $_POST["senha_usuario"];

$sql = "UPDATE usuario SET nome_usuario='$nome_usuario',email_usuario='$email_usuario',senha_usuario='$senha_usuario' WHERE id = '$id'";

mysqli_query($conn, $sql);
header("Location: visualizar_cadastro.php");