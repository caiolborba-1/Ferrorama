
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

$verificar = $conn->prepare(
    "SELECT id FROM rotas WHERE id_trens = ? LIMIT 1"
);
$verificar->bind_param("i", $id);
$verificar->execute();

if ($verificar->get_result()->num_rows > 0) {
    $verificar->close();
    header("Location: visualizar_trens.php?erro=vinculado");
    exit;
}

$verificar->close();

$stmt = $conn->prepare("DELETE FROM trens WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    $stmt->close();
    header("Location: visualizar_trens.php?mensagem=excluido");
    exit;
}

$stmt->close();
header("Location: visualizar_trens.php?erro=excluir");
exit;
?>
