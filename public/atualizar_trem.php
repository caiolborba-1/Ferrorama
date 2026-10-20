<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome_trem = $_POST["nome_trem"];
$destino_trem = $_POST["destino_trem"];
$horario_partida = $_POST["horario_partida"];
$horario_chegada = $_POST["horario_chegada"];

$sql = "UPDATE trens SET nome_trem='$nome_trem', destino_trem='$destino_trem', horario_partida='$horario_partida', horario_chegada='$horario_chegada' WHERE id = '$id'";

mysqli_query($conn, $sql);
header("Location: visualizar_trem_cadastrado.php");