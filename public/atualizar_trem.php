<?php
include('../infra/conexao.php');

if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    !isset($_POST['id']) ||
    !ctype_digit($_POST['id'])
) {
    header("Location: visualizar_trens.php");
    exit;
}

$id = (int)$_POST['id'];
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);
$nome_trem = trim($_POST['nome_trem'] ?? '');
$destino_trem = trim($_POST['destino_trem'] ?? '');
$horario_partida = $_POST['horario_partida'] ?? '';
$horario_chegada = $_POST['horario_chegada'] ?? '';

if (
    !$id_usuario ||
    $nome_trem === '' ||
    $destino_trem === '' ||
    !preg_match('/^\d{2}:\d{2}$/', $horario_partida) ||
    !preg_match('/^\d{2}:\d{2}$/', $horario_chegada)
) {
    exit("Preencha todos os campos corretamente.");
}

$sql = "UPDATE trens
        SET usuario_trem = ?,
            id_usuario = ?,
            nome_trem = ?,
            destino_trem = ?,
            horario_partida = ?,
            horario_chegada = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "iissssi",
    $id_usuario,
    $id_usuario,
    $nome_trem,
    $destino_trem,
    $horario_partida,
    $horario_chegada,
    $id
);

if ($stmt->execute()) {
    header("Location: visualizar_trens.php");
    exit;
}

echo "Erro ao atualizar o trem.";
?>