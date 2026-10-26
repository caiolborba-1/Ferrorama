<?php

include "../infra/conexao.php";

$id = (int)$_POST["id"];
$nome_usuario = $_POST["nome_usuario"];
$email_usuario = $_POST["email_usuario"];
$senha_usuario = $_POST["senha_usuario"];
$cargo = $_POST["cargo"];

if (str_starts_with($senha_usuario, '$2y$')) {
    $sql = "UPDATE usuario SET nome_usuario = ?, email_usuario = ?, cargo = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nome_usuario, $email_usuario, $cargo, $id);
} else {
    $senha_com_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);
    $sql = "UPDATE usuario SET nome_usuario = ?, email_usuario = ?, senha_usuario = ?, cargo = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nome_usuario, $email_usuario, $senha_com_hash, $cargo, $id);
}

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: visualizar_cadastro.php");
exit;