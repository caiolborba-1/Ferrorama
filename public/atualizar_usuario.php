<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome_usuario = $_POST["nome_usuario"];
$email_usuario = $_POST["email_usuario"];
$senha_usuario = $_POST["senha_usuario"];
$cargo = $_POST["cargo"];



if (str_starts_with($senha_usuario, '$2y$')) {
    
    $sql = "UPDATE usuario SET nome_usuario='$nome_usuario', email_usuario='$email_usuario', cargo='$cargo' WHERE id = '$id'";

} else {
    
    $senha_com_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);
    
    $sql = "UPDATE usuario SET nome_usuario='$nome_usuario', email_usuario='$email_usuario', senha_usuario='$senha_com_hash', cargo='$cargo' WHERE id = '$id'";
}

mysqli_query($conn, $sql);
header("Location: visualizar_cadastro.php");