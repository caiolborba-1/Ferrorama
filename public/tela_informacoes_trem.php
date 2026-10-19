<?php

include "../infra/conexao.php";

if (!isset($_GET['id'])) {
    echo "<script>alert('ID do trem não fornecido.'); window.location.href = 'tela_inicial.php';</script>";
    exit;
}

$id = $_GET['id'];


?>